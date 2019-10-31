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
	
	public function getOrder($id=NULL,$status=NULL)
	{
		$get = NULL;
		if ($id != NULL) {
			$this->db->select('*');
			$this->db->from('order');
			$this->db->join('order_detail', 'order_detail.id_order = order.id_order');
			$this->db->join('produk', 'order_detail.id_produk = produk.id_produk');
			$this->db->where('order.id_order',$id);
			$get = $this->db->get();
		} else {
			$get = $this->db->select('*')
							->from('order')
							->order_by('tanggal','ASC')
							->get();
		}

		if ($get->num_rows() > 0) {
			return $get->result();
		} else {
			return FALSE;
		}
	}

	public function getAntrianDetail($id)
	{
			$wheres = array(
				'order_detail.status'=>1,
				'order_detail.id_order'=>$id
			);

			$this->db->select('antrian.id,order_detail.id AS id_detail,order_detail.id_order,produk.produk,order_detail.qty');
			$this->db->from('antrian');
			$this->db->join('order_detail', 'antrian.id_order_detail = order_detail.id');
			$this->db->join('produk', 'order_detail.id_produk = produk.id_produk');
			$this->db->where($wheres);
			$get = $this->db->get();

			if ($get->num_rows() > 0) {
				return $get->result();
			} else {
				return FALSE;
			}
	}

	public function getOrderAntrian($id=NULL,$status=NULL)
	{
		$get='';
		if ($status == NULL) {
			$get = $this->db->select('*')
						->from('order')
						->order_by('tanggal','ASC')
						->where('status',1)
						->get();
		} else {
			$get = $this->db->select('*')
						->from('order')
						->order_by('tanggal','ASC')
						->where('status',$status)
						->get();
		}
		
		
		

		if ($get->num_rows() > 0) {
			return $get->result();
		} else {
			return FALSE;
		}
	}

	public function orderDetail()
	{

		$this->db->select('order_detail.id,order_detail.id_order,order_detail.id_produk,order_detail.qty,order_detail.harga,produk.produk,order_detail.status');
		$this->db->from('order_detail');
		$this->db->join('produk', 'order_detail.id_produk = produk.id_produk');
		$orderDetail = $this->db->get();
		if ($orderDetail->num_rows() > 0) {
			return $orderDetail->result();
		} else {
			return FALSE;
		}
	}

	public function OrderFinish($id,$status=2)
	{

		$ids = array(
			'id_order'=>$id
		);

		$update = array(
			"status"=>$status
		);

		$this->db->where($ids);
		$this->db->update('order', $update);

		$this->db->where($ids);
		$this->db->update('order_detail', $update);

		return TRUE;
		
	}

	public function Hapus($id)
    {
       $this->db->where('id_order',$id);
	   $hapus = $this->db->delete('order');
	   return TRUE;
    }

	

	
}
