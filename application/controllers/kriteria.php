<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('kriteria_model');
        $this->load->model('alternatif_model');
    }

    public function index()
    {
        $data['title'] = "Kriteria Page";
        $data['kriteria'] = $this->kriteria_model->getAllKriteria();

        $grouped_kriteria = [];
        foreach ($data['kriteria'] as $row) {
            $grouped_kriteria[$row['nama_kriteria']][] = $row;
        }

        $this->load->view('layout/header', $data);
        $data['grouped_kriteria'] = $grouped_kriteria;
        $this->load->view('SPK/kriteria', $data);
    }

    public function perbandinganKriteria()
    {
        $data['title'] = "Perbandingan Kriteria Page";

        $this->session->unset_userdata('matrix');
        $this->session->unset_userdata('normalized_matrix');
        $this->session->unset_userdata('weights');
        $this->session->unset_userdata('cr');

        $this->load->view('layout/header', $data);
        $this->load->view('SPK/kriteria-a', $data);
    }

    public function hitung_matriks()
    {
        $data['title'] = "Hasil Perhitungan AHP";
        $akreditasi_fasilitas = $this->input->post('akreditasi_fasilitas');
        $akreditasi_biaya = $this->input->post('akreditasi_biaya');
        $fasilitas_biaya = $this->input->post('fasilitas_biaya');

        $matrix = [
            [1, $akreditasi_fasilitas, $akreditasi_biaya],
            [1 / $akreditasi_fasilitas, 1, $fasilitas_biaya],
            [1 / $akreditasi_biaya, 1 / $fasilitas_biaya, 1]
        ];

        $column_sum = array_map(function ($column) {
            return array_sum($column);
        }, array_map(null, ...$matrix));

        $normalized_matrix = [];
        $weights = [];
        foreach ($matrix as $i => $row) {
            $normalized_row = [];
            foreach ($row as $j => $value) {
                $normalized_row[] = $value / $column_sum[$j];
            }
            $normalized_matrix[] = $normalized_row;
            $weights[] = array_sum($normalized_row) / count($row);
        }

        $lambda_max = 0;
        foreach ($matrix as $i => $row) {
            $weighted_sum = 0;
            foreach ($row as $j => $value) {
                $weighted_sum += $value * $weights[$j];
            }
            $lambda_max += $weighted_sum / $weights[$i];
        }
        $lambda_max /= count($matrix);

        $n = count($matrix);
        $consistency_index = ($lambda_max - $n) / ($n - 1);
        $random_index = 0.58;
        $cr = $consistency_index > 0 ? $consistency_index / $random_index : 0.0001;

        $data['matrix'] = $matrix;
        $data['normalized_matrix'] = $normalized_matrix;
        $data['weights'] = $weights;
        $data['cr'] = $cr;

        $weightsMin = [];
        foreach ($matrix as $i => $row) {
            $normalized_row = [];
            foreach ($row as $j => $value) {
                $normalized_row[] = $value / $column_sum[$j];
            }
            $normalized_matrix[] = $normalized_row;
            if ($i == 2) {
                $weightsMin[] = -1 * (array_sum($normalized_row) / count($row));
            } else {
                $weightsMin[] = array_sum($normalized_row) / count($row);
            }
        }

        $this->session->set_userdata([
            'matrix' => $matrix,
            'normalized_matrix' => $normalized_matrix,
            'weights' => $weightsMin,
            'cr' => $cr
        ]);

        $this->alternatif_model->saveAHPData($matrix, $normalized_matrix, $weightsMin, $cr);

        $this->load->view('layout/header', $data);
        $this->load->view('SPK/kriteria-a-a', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */