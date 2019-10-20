<?php

class Kasir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        if (!$this->session->userdata('username')) {
            redirect('forbidden');
        } elseif ($this->session->userdata('role') == 1) {
            redirect('forbidden');
        }
    }
    public function index($kasir = 'dasbor')
    {
        if (!file_exists(APPPATH . 'views/kasir/' . $kasir . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();

            $data['produk'] = $this->produk_model->get();
            $data['title'] = 'Dasbor Kasir';
            $this->load->view('kasir/templates/header', $data);
            $this->load->view('kasir/' . $kasir);
            $this->load->view('kasir/templates/footer');
        }
    }
}
