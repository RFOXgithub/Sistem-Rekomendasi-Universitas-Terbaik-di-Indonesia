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
        // Get data from POST request
        $nama_universitas = $this->input->post('nama_universitas');
        $akreditasi = $this->input->post('akreditasi');
        $fasilitas = $this->input->post('fasilitas');
        $biaya = $this->input->post('biaya');

        // Prepare data to be saved
        $data = [
            'nama_universitas' => $nama_universitas,
            'akreditasi' => $akreditasi,
            'fasilitas' => $fasilitas,
            'biaya_perkuliahan' => $biaya,
        ];

        // Insert data into the database
        $this->alternatif_model->insertAlternatif($data);

        // Redirect to the list page
        redirect('alternatif');
    }

    function deleteAlternatif($id)
    {
        $this->alternatif_model->delete($id);
        redirect('alternatif');
    }

    public function edit($id)
    {
        // Mengambil data alternatif berdasarkan ID
        $data['row'] = $this->alternatif_model->get_by_id($id);

        $this->load->view('layout/header', $data);
        $this->load->view('SPK/edit_alternatif', $data);
    }

    public function update($id)
    {
        // Menangkap data dari form
        $data = array(
            'nama_universitas' => $this->input->post('nama_universitas'),
            'akreditasi' => $this->input->post('akreditasi'),
            'fasilitas' => $this->input->post('fasilitas'),
            'biaya_perkuliahan' => $this->input->post('biaya')
        );

        // Memanggil method update di model
        $this->alternatif_model->update($id, $data);

        // Redirect ke halaman alternatif
        redirect('alternatif');
    }

    public function process_wp()
    {
        // Ambil data perhitungan AHP yang disimpan di session
        $matrix = $this->session->userdata('matrix');
        $normalized_matrix = $this->session->userdata('normalized_matrix');
        $weights = $this->session->userdata('weights');
        $cr = $this->session->userdata('cr');

        // Cek jika data AHP ada di session
        if (empty($matrix) || empty($normalized_matrix) || empty($weights) || empty($cr)) {
            // Tangani error jika data AHP tidak ada di session
            echo "Data AHP tidak ditemukan di session.";
            return;
        }

        // Ambil data alternatif dari model
        $this->load->model('alternatif_model');
        $alternatif_data = $this->alternatif_model->getAllAlternatif();

        // Format data alternatif (nama dan nilai kriteria)
        $alternatif = [];
        foreach ($alternatif_data as $row) {
            // Cek apakah properti yang diperlukan ada dalam setiap objek
            if (isset($row->nama_universitas) && isset($row->akreditasi) && isset($row->fasilitas) && isset($row->biaya_perkuliahan)) {
                // Memasukkan data alternatif ke dalam array
                $alternatif[] = [
                    'id_alternatif' => $row->id_alternatif, // ID Alternatif
                    'nama_universitas' => $row->nama_universitas, // Nama Universitas
                    'akreditasi' => $row->akreditasi, // Akreditasi
                    'fasilitas' => $row->fasilitas, // Fasilitas
                    'biaya_perkuliahan' => $row->biaya_perkuliahan, // Biaya perkuliahan
                    // Misalnya kriteria dapat berupa akreditasi, fasilitas, dan biaya
                    // Anda dapat menambahkan kriteria lain yang diperlukan untuk perhitungan WP
                    'kriteria' => [
                        $row->akreditasi,
                        $row->fasilitas,
                        $row->biaya_perkuliahan
                    ]
                ];
            } else {
                // Menangani kasus jika data tidak lengkap atau tidak valid
                log_message('error', 'Missing data in alternatif: ' . json_encode($row)); // Logging error untuk mempermudah debugging
                echo "Data tidak lengkap pada baris ini: " . json_encode($row);
                return;
            }
        }

        // Hitung vektor S dan nilai preferensi V (Weighted Product)
        $s_values = [];
        foreach ($alternatif as $alt) {
            $nilai = $alt['kriteria'];
            $s_value = 1;
            foreach ($nilai as $i => $val) {
                $s_value *= pow($val, $weights[$i]); // Nilai pangkat bobot dari AHP
            }
            $s_values[] = $s_value;
        }

        // Total dari semua vektor S
        $total_s = array_sum($s_values);

        // Hitung nilai preferensi V
        $v_values = [];
        foreach ($s_values as $s_value) {
            $v_values[] = $s_value / $total_s; // V = S / total S
        }

        // Gabungkan hasil ke data alternatif
        foreach ($alternatif as $i => &$alt) {
            $alt['s_value'] = $s_values[$i]; // Vektor S
            $alt['v_value'] = $v_values[$i]; // Nilai preferensi V
        }

        // Kirim data ke view
        $data['matrix'] = $matrix;
        $data['normalized_matrix'] = $normalized_matrix;
        $data['weights'] = $weights;
        $data['cr'] = $cr;
        $data['alternatif'] = $alternatif;

        // Tampilan hasil perhitungan
        $this->load->view('layout/header', $data);
        $this->load->view('SPK/hasil', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */