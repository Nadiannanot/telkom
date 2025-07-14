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

	public function getAllJadwalWithTeknisi()
	{
		$sql = "SELECT jadwal.*, teknisi.nama_teknisi, teknisi.sektor AS sektor_teknisi, teknisi.status AS status_teknisi
				FROM jadwal
				LEFT JOIN teknisi
				ON jadwal.nik COLLATE utf8mb4_0900_ai_ci = teknisi.nik_teknisi COLLATE utf8mb4_0900_ai_ci";
		return $this->db->query($sql)->result();
	}
}
