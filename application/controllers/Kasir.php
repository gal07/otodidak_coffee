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
            $setData = array(
                'id'=>$data['user']['id'],
                'nama'=>$data['user']['nama'],
                'email'=>$data['user']['email']
            );
            $this->session->set_userdata($setData);
            $data['produk'] = $this->produk_model->get();
            $data['title'] = 'Dasbor Kasir';
            $this->load->view('kasir/templates/header', $data);
            $this->load->view('kasir/' . $kasir);
            $this->load->view('kasir/templates/footer');
        }
    }

    public function addToCart()
    {
       
        $data = array(
            'id_user'=>$this->session->userdata('id'),
            'id_produk'=>$this->input->post('idproduk'),
            'nama_produk'=>$this->input->post('nama'),
            'quantity'=>1,
            'harga'=>$this->input->post('harga'),
            'total'=>$this->input->post('harga'),
        );
         
        $message = array();
        $save = $this->kasir_model->saveCart($data);
        if ($save) {
            // $cart_session = $this->GetCartSession($this->session->userdata('id'));
            $message = array(
                'success'=>1,
                'msg'=>'Saved',
                // 'data'=>$cart_session
            );
        }else{
            $message = array(
                'success'=>0,
                'msg'=>'Not Saved'
            );
        }

        echo json_encode($message);

    }
}
