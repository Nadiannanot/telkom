<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Order extends CI_Model
{
	public function getAllOrder()
	{
		return $this->db->get('tb_order')->result();
	}

	public function insertOrder($data)
	{
		return $this->db->insert('tb_order', $data);
	}

	public function getOrderById($id)
	{
		return $this->db->get_where('tb_order', ['id' => $id])->row();
	}

	public function updateOrder($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('tb_order', $data);
	}

	public function deleteOrder($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tb_order');
	}

	public function searchOrder($q)
	{
		$this->db->like('no_ticket', $q);
		$this->db->or_like('service_no', $q);
		$this->db->or_like('nik_teknisi', $q);
		return $this->db->get('tb_order')->result();
	}
}
