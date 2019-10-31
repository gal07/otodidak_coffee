<?php

class Order extends CI_Controller
{

    public function __constrsuct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('forbidden');
        } 
    }

    public function index($admin = 'order')
    {

        if (!$this->session->userdata('role') == 2) {
            redirect('forbidden');
        } 

        if (!file_exists(APPPATH . 'views/admin/' . $admin . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['order'] = $this->order_model->getOrder();
            $data['title'] = 'Dasbor Admin';
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/' . $admin);
            $this->load->view('admin/templates/footer');
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


    public function detail($admin = 'detail_order')
    {

        if (!$this->session->userdata('role') == 2) {
            redirect('forbidden');
        } 

        if (!file_exists(APPPATH . 'views/admin/' . $admin . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['order'] = $this->order_model->getOrder($this->input->get('id'));
            $data['title'] = 'Dasbor Admin';
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/' . $admin);
            $this->load->view('admin/templates/footer');
        }
    }

    public function getOrderAjax()
    {
        
        if (!$this->input->is_ajax_request()) {
            redirect('forbidden');
        }

        $order = $this->order_model->getOrderAntrian();
            $message = array();
            if ($order) {

                $detil = $this->order_model->orderDetail();
                $message = array(
                    'success'=>1,
                    'msg'=>' Order',
                    'data'=>$order,
                    'detail'=>$detil
                );
            } else {
                $message = array(
                    'success'=>0,
                    'msg'=>'Fail  Order',
                );
            }
            echo json_encode($message);


    }

    public function OrderSelesai()
    {
        if (!$this->input->is_ajax_request()) {
            redirect('forbidden');
        }
        $id = $this->input->post('idorder');
        $Finish = $this->order_model->OrderFinish($id);
            $message = array();
            if ($Finish) {
                $message = array(
                    'success'=>1,
                    'msg'=>'Finish Order',
                );
            } else {
                $message = array(
                    'success'=>0,
                    'msg'=>'Fail Update',
                );
            }
            echo json_encode($message);
    }

    public function OrderDiambil()
    {
        if (!$this->input->is_ajax_request()) {
            redirect('forbidden');
        }
        $id = $this->input->post('idorder');
        $Finish = $this->order_model->OrderFinish($id,3);
            $message = array();
            if ($Finish) {
                $message = array(
                    'success'=>1,
                    'msg'=>'Order Diambil',
                );
            } else {
                $message = array(
                    'success'=>0,
                    'msg'=>'Fail Update',
                );
            }
            echo json_encode($message);
    }



    public function DashOrderSelesai()
    {
        if (!$this->input->is_ajax_request()) {
            redirect('forbidden');
        }
        $Finish = $this->order_model->getOrderAntrian(NULL,2);
            $message = array();
            if ($Finish) {
                $message = array(
                    'success'=>1,
                    'data'=>$Finish,
                    'msg'=>'Finish Order',
                );
            } else {
                $message = array(
                    'success'=>0,
                    'msg'=>'Fail Update',
                );
            }
            echo json_encode($message);
    }

    


}
