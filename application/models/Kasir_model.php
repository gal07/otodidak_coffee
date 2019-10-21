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

    public function Update($data)
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
            $harga = $data['harga'];
            $totalQty = $data['quantity'];
            $totalHarga = $harga*$totalQty;
            $update = array(
                'quantity'=>$totalQty,
                'total'=>$totalHarga
            );
            $this->db->where($compare);
            $this->db->update('cart_sessions',$update);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function GetCartByUsers($id = NULL,$id_cart = NULL)
    {
        $get = NULL;
        if ($id_cart != NULL) {
            $wheres = array(
                'id_user'=>$id,
                'id'=>$id_cart
            );
            $get = $this->db->select('*')
            ->from('cart_sessions')
            ->where($wheres)
            ->get();
        } else {
            $get = $this->db->select('*')
            ->from('cart_sessions')
            ->where('id_user',$id)
            ->get();
        }
        
      
        if ($get->num_rows() > 0) {
            return $get->result();
        }else{
            return FALSE;
        }
    }

    public function DeleteCart($id,$all = NULL)
    {
        $this->db->where('id',$id);
        $delete = $this->db->delete('cart_sessions');

        if ($delete) {
            return TRUE;
        } else {
            return FALSE;
        }
        
    }

    public function CancelCart($id_user)
    {
        $this->db->where('id_user',$id_user);
        $cancel = $this->db->delete('cart_sessions');

        if ($cancel) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    

}
