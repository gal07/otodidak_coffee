<?php

/**
 *
 */
class Produk_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    public function save($data)
    {
        $save = $this->db->insert('produk', $data);

        if ($save) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function get()
    {
        $query = "SELECT `produk`.*, `kategori`.`kategori`
                  FROM `produk` JOIN `kategori`
                  ON `produk`.`id_kategori` = `kategori`.`id_kategori`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getServiceactive()
    {
        $query = "SELECT `produk`.*, `kategori`.`kategori`
                  FROM `produk` JOIN `kategori`
                  ON `produk`.`id_kategori` = `kategori`.`id_kategori`
                  WHERE `is_active` = 1
                ";
        return $this->db->query($query)->result_array();
    }

    // public function get()
    // {

    //     $show = $this->db->select('*')
    //         ->from('produk')
    //         ->get();

    //     if ($show->num_rows() > 0) {
    //         return $show->result_array();
    //     } else {
    //         return FALSE;
    //     }
    // }

    public function get_spesific($id)
    {

        $show = $this->db->select('*')
            ->from('produk')
            ->where('id_produk', $id)
            ->get();

        if ($show->num_rows() > 0) {
            return $show->row_array();
        } else {
            return FALSE;
        }
    }


    public function update($data, $id)
    {

        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }
}
