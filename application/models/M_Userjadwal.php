<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Userjadwal extends CI_Model
{
    private $table = 'jadwal';

    public function getAllJadwal()
    {
        return $this->db->get($this->table)->result();
    }

    public function getJadwalById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function updateJadwal($id, $data)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function searchJadwal($keyword)
    {
        $this->db->like('nik_teknisi', $keyword);
        $this->db->or_like('nama_teknisi', $keyword);
        $this->db->or_like('sektor', $keyword);
        $this->db->or_like('status', $keyword);
        return $this->db->get($this->table)->result();
    }
}
