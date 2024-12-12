<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Home Page";

        $this->load->view('layout/header', $data);
        $this->load->view('SPK/home', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */