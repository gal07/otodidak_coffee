<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir_model extends CI_Model
{

	function __construct()
	{
		$this->load->database();
    }

    public function saveCart($data)
    {

        $compare = array(
            'id_user'=>$data['id_user'],
            'id_produk'=>$data['id_produk']
        );

        $check = $this->db->select('*')
                          ->from('cart_sessions')
                          ->where($compare)
                          ->get();
        if ($check->num_rows() == 1) {
            $qty = 0;
            $harga = $data['harga'];
            foreach ($check->result() as $value) {
                $qty = $value->quantity;
            }
            $totalQty = $qty+$data['quantity'];
            $totalHarga = $harga*$totalQty;
            $update = array(
                'quantity'=>$totalQty,
                'total'=>$totalHarga
            );
            $this->db->where($compare);
            $this->db->update('cart_sessions',$update);
            return TRUE;
        } else {
            $save = $this->db->insert('cart_sessions',$data);
            return TRUE;
        }
        
    }
    

}
