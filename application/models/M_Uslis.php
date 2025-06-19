<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Uslis extends CI_Model
{
	public function getAllUslis()
	{
		$this->db->order_by('nama', 'asc');
		return $this->db->get('uslis')->result(); // Ganti 'anggota' ke 'uslis'
	}

	public function insertUslis($data)
	{
		return $this->db->insert('uslis', $data); // Ganti 'anggota' ke 'uslis'
	}

	public function getUslisById($id)
	{
		return $this->db->get_where('uslis', ['id' => $id])->row(); // Ganti 'anggota' ke 'uslis'
	}

	public function updateUslis($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('uslis', $data); // Ganti 'anggota' ke 'uslis'
	}

	public function deleteUslis($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('uslis'); // Ganti 'anggota' ke 'uslis'
	}
}

/* End of file M_Uslis.php */
