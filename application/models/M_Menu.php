<?php
// filepath: application/models/M_Menu.php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Menu extends CI_Model
{
	public function getAllMenu()
	{
		return $this->db->get('user_menu')->result_array();
	}

	public function getMenuById($id)
	{
		return $this->db->get_where('user_menu', ['id' => $id])->row_array();
	}

	public function addMenu($data)
	{
		return $this->db->insert('user_menu', $data);
	}

	public function updateMenu($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('user_menu', $data);
	}

	public function deleteMenu($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('user_menu');
	}
}
