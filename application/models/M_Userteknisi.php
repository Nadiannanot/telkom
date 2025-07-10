<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Userteknisi extends CI_Model
{
    private $table = 'teknisi';

    public function getAllTeknisi()
    {
        return $this->db->get($this->table)->result();
    }

    public function getTeknisiByNik($nik_teknisi)
    {
        return $this->db->get_where($this->table, ['nik_teknisi' => $nik_teknisi])->row();
    }

    public function updateByNik($nik_teknisi, $data)
    {
        $this->db->where('nik_teknisi', $nik_teknisi);
        return $this->db->update($this->table, $data);
    }

    public function searchTeknisi($keyword)
    {
        $this->db->like('nik_teknisi', $keyword);
        $this->db->or_like('nama_teknisi', $keyword);
        $this->db->or_like('sektor', $keyword);
        $this->db->or_like('jenis', $keyword);
        $this->db->or_like('status', $keyword);
        return $this->db->get($this->table)->result();
    }
}
