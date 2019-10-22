<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{

	function __construct()
	{
		$this->load->database();
    }
    
	public function CreateOrder($data)
	{
		$this->db->insert('order',$data);
        return TRUE;
	}

	public function CartToOrderdetail($idorder)
    {

		/* Order Detail */
        $get = $this->db->select('*')
                        ->from('cart_sessions')
                        ->where('id_user',$this->session->userdata('id'))
                        ->get();
        if ($get->num_rows() > 0) {
            
            $data = $get->result();
            $lengthData = sizeof($data);
            for ($i=0; $i < $lengthData; $i++) {

                $inst = array(
                    "id_order"=>$idorder,
                    "id_produk"=>$data[$i]->id_produk,
                    "qty"=>$data[$i]->quantity,
                    "harga"=>$data[$i]->harga,
				);
				/* Insert Antrian */
				$this->db->insert('order_detail',$inst);

                /* Hapus Session cart */
                $this->db->where('id_user',$this->session->userdata('id'));
                $this->db->delete('cart_sessions');
			}

			/* Antrian */
			$orderDetail = $this->db->select('*')
									->from('order_detail')
									->where('id_order',$idorder)
									->get();

			$datas = $orderDetail->result();
			$lengthData = sizeof($datas);
            for ($i=0; $i < $lengthData; $i++) {
				$inst2 = array(
					"id_order_detail"=>$datas[$i]->id,
				);
				/* Insert */
				$this->db->insert('antrian',$inst2);
			}
			return TRUE;

        }else{
            return FALSE;
        }
    }

	
}
