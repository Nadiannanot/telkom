<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Cp extends CI_Model
{
	public function getAllCp()
	{
		return $this->db->get('db_cp')->result();
	}

	public function insertCp($data)
	{
		return $this->db->insert('db_cp', $data);
	}

	public function getCpById($id)
	{
		return $this->db->get_where('db_cp', ['id' => $id])->row();
	}

	public function updateCp($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('db_cp', $data);
	}

	public function deleteCp($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('db_cp');
	}

	public function searchByNdInet($keyword)
	{
		$this->db->like('nd_inet', $keyword);
		return $this->db->get('db_cp')->result();
	}

	public function searchCp($keyword)
	{
		$this->db->like('nd_inet', $keyword);
		$this->db->or_like('cp_dossier', $keyword);
		return $this->db->get('db_cp')->result();
	}
}

/* End of file M_Cp.php */
