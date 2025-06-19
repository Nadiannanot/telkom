<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_About extends CI_Model
{
	// Contoh: ambil data profil dari database
	public function getProfil()
	{
		return $this->db->get('profil')->row();
	}
}
