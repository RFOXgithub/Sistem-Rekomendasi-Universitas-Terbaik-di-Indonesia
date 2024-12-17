<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Alternatif extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('alternatif_model');
    }

    public function index()
    {
        $data['title'] = "Alternatif Page";
        $data['alternatif'] = $this->alternatif_model->getAllAlternatif();

        $matrix = $this->session->userdata('matrix');
        $normalized_matrix = $this->session->userdata('normalized_matrix');
        $weights = $this->session->userdata('weights');
        $cr = $this->session->userdata('cr');

        $data['matrix'] = $matrix;
        $data['normalized_matrix'] = $normalized_matrix;
        $data['weights'] = $weights;
        $data['cr'] = $cr;

        $this->load->view('layout/header', $data);
        $this->load->view('SPK/alternatif', $data);
    }

    public function tambah()
    {
        $data['title'] = "Tambah Alternatif";
        $this->load->view('layout/header', $data);
        $this->load->view('SPK/tambah_alternatif', $data);
    }

    public function simpan()
    {
        $nama_universitas = $this->input->post('nama_universitas');
        $akreditasi = $this->input->post('akreditasi');
        $fasilitas = $this->input->post('fasilitas');
        $biaya = $this->input->post('biaya');

        $data = [
            'nama_universitas' => $nama_universitas,
            'akreditasi' => $akreditasi,
            'fasilitas' => $fasilitas,
            'biaya_perkuliahan' => $biaya,
        ];

        $this->alternatif_model->insertAlternatif($data);

        redirect('alternatif');
    }

    function deleteAlternatif($id)
    {
        $this->alternatif_model->delete($id);
        redirect('alternatif');
    }

    public function edit($id)
    {
        $data['row'] = $this->alternatif_model->get_by_id($id);

        $this->load->view('layout/header', $data);
        $this->load->view('SPK/edit_alternatif', $data);
    }

    public function update($id)
    {
        $data = array(
            'nama_universitas' => $this->input->post('nama_universitas'),
            'akreditasi' => $this->input->post('akreditasi'),
            'fasilitas' => $this->input->post('fasilitas'),
            'biaya_perkuliahan' => $this->input->post('biaya')
        );

        $this->alternatif_model->update($id, $data);

        redirect('alternatif');
    }

    public function process_wp()
    {

        $data['title'] = "Hasil";

        $matrix = $this->session->userdata('matrix');
        $normalized_matrix = $this->session->userdata('normalized_matrix');
        $weights = $this->session->userdata('weights');
        $cr = $this->session->userdata('cr');

        if (empty($matrix) || empty($normalized_matrix) || empty($weights) || empty($cr)) {
            $db_data = $this->alternatif_model->getAHPData();
            if (empty($db_data)) {
                echo "Data AHP tidak ditemukan di database.";
                return;
            }

            $matrix = $db_data['matrix'];
            $normalized_matrix = $db_data['normalized_matrix'];
            $weights = $db_data['weights'];
            $cr = $db_data['cr'];
        }

        $alternatif_data = $this->alternatif_model->getAllAlternatif();

        $alternatif = [];
        foreach ($alternatif_data as $row) {
            if (isset($row->nama_universitas) && isset($row->akreditasi) && isset($row->fasilitas) && isset($row->biaya_perkuliahan)) {
                $alternatif[] = [
                    'id_alternatif' => $row->id_alternatif,
                    'nama_universitas' => $row->nama_universitas,
                    'akreditasi' => $row->akreditasi,
                    'fasilitas' => $row->fasilitas,
                    'biaya_perkuliahan' => $row->biaya_perkuliahan,
                    'kriteria' => [
                        $row->akreditasi,
                        $row->fasilitas,
                        $row->biaya_perkuliahan
                    ]
                ];
            } else {
                log_message('error', 'Missing data in alternatif: ' . json_encode($row));
                echo "Data tidak lengkap pada baris ini: " . json_encode($row);
                return;
            }
        }

        $s_values = [];
        foreach ($alternatif as $alt) {
            $nilai = $alt['kriteria'];
            $s_value = 1;
            foreach ($nilai as $i => $val) {
                $s_value *= pow($val, $weights[$i]);
            }
            $s_values[] = $s_value;
        }

        $total_s = array_sum($s_values);

        $v_values = [];
        foreach ($s_values as $s_value) {
            $v_values[] = $s_value / $total_s;
        }

        foreach ($alternatif as $i => &$alt) {
            $alt['s_value'] = $s_values[$i];
            $alt['v_value'] = $v_values[$i];
        }

        usort($alternatif, function ($a, $b) {
            return $b['v_value'] <=> $a['v_value'];
        });

        foreach ($alternatif as $i => &$alt) {
            $alt['ranking'] = $i + 1;

            $this->alternatif_model->update_perhitungan($alt['id_alternatif'], $alt['s_value'], $alt['v_value'], $alt['ranking']);
        }

        $data['matrix'] = $matrix;
        $data['normalized_matrix'] = $normalized_matrix;
        $data['weights'] = $weights;
        $data['cr'] = $cr;
        $data['alternatif'] = $alternatif;

        $this->load->view('layout/header', $data);
        $this->load->view('SPK/hasil', $data);
    }
}
