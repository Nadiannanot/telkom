<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Jadwal extends CI_Model
{
	public function getAllJadwal()
	{
		return $this->db->get('jadwal')->result();
	}

	public function insertJadwal($data)
	{
		return $this->db->insert('jadwal', $data);
	}

	public function getJadwalById($id)
	{
		return $this->db->get_where('jadwal', ['id' => $id])->row();
	}

	public function updateJadwal($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('jadwal', $data);
	}

	public function deleteJadwal($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('jadwal');
	}

	public function searchJadwal($keyword)
	{
		$this->db->like('nik', $keyword);
		$this->db->or_like('sektor', $keyword);
		$this->db->or_like('status', $keyword);
		return $this->db->get('jadwal')->result();
	}
}
