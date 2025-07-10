<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_submenu extends CI_Model
{
	public function getAllSubmenu()
	{
		// Join dengan tabel user_menu jika ingin menampilkan nama menu induk
		$this->db->select('user_sub_menu.*, user_menu.menu');
		$this->db->from('user_sub_menu');
		$this->db->join('user_menu', 'user_sub_menu.menu_id = user_menu.id');
		return $this->db->get()->result_array();
	}

	public function getSubmenuById($id)
	{
		return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
	}

	public function addSubmenu($data)
	{
		return $this->db->insert('user_sub_menu', $data);
	}

	public function updateSubmenu($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('user_sub_menu', $data);
	}

	public function deleteSubmenu($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('user_sub_menu');
	}

	public function getAllMenu()
	{
		return $this->db->get('user_menu')->result_array();
	}
}
