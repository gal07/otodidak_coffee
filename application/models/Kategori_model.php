<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

	function __construct()
	{
		$this->load->database();
	}

	public function save($data)
	{
		$save = $this->db->insert('kategori', $data);

		if ($save) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get()
	{

		$show = $this->db->select('*')
			->from('kategori')
			->get();

		if ($show->num_rows() > 0) {
			return $show->result_array();
		} else {
			return FALSE;
		}
	}

	public function get_spesific($id)
	{

		$show = $this->db->select('*')
			->from('kategori')
			->where('id_kategori', $id)
			->get();

		if ($show->num_rows() > 0) {
			return $show->row_array();
		} else {
			return FALSE;
		}
	}


	public function update($data, $id)
	{

		$this->db->where('id_kategori', $id);
		$this->db->update('kategori', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori');
	}
}
