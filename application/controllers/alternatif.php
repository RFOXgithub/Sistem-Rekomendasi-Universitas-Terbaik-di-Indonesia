<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Alternatif extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Alternatif Page";

        $this->load->view('layout/header', $data);
        $this->load->view('SPK/alternatif', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */