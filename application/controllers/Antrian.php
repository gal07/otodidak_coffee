<?php

class Antrian extends CI_Controller
{
    public function index($page = 'dasbor')
    {
        if (!file_exists(APPPATH . 'views/antrian/' . $page . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();

            $data['produk'] = $this->produk_model->get();
            $data['title'] = 'Dasbor Antrian';
            $this->load->view('antrian/templates/header', $data);
            $this->load->view('antrian/' . $page);
            $this->load->view('antrian/templates/footer');
        }
    }
}
