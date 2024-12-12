<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Kriteria Page";

        $this->load->view('layout/header', $data);
        $this->load->view('SPK/kriteria', $data);
    }

    public function perbandinganKriteria()
    {
        $data['title'] = "Perbandingan Kriteria Page";

        $this->load->view('layout/header', $data);
        $this->load->view('SPK/perbandinganKriteria', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */