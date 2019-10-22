<?php

class Order extends CI_Controller
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

    public function NewOrder()
    {
       
        $dataOrder = array(
            "id_order"=>$this->input->post('orderid'),
            "id_user"=>$this->session->userdata('id'),
            "tanggal"=>date('Y-m-d'),
            "total_harga"=>$this->input->post('total'),
            "bayar"=>$this->input->post('bayar'),
            "kembalian"=>$this->input->post('kembalian'),
            "note"=>$this->input->post('note')
        );

        $CreateOrder = $this->order_model->CreateOrder($dataOrder);
        if ($CreateOrder) {
           
            $CreateOrderDetail = $this->order_model->CartToOrderdetail($this->input->post('orderid'));
            $message = array();
            if ($CreateOrderDetail) {
                $message = array(
                    'success'=>1,
                    'msg'=>'Create Order',
                );
            } else {
                $message = array(
                    'success'=>0,
                    'msg'=>'Fail Create Order',
                );
            }
            echo json_encode($message);
        }

    



    }
}
