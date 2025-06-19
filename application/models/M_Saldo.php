<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_saldo extends CI_Model
{
    public function getAllSaldo()
    {
        return $this->db->get('us_saldo_harian')->result();
    }

    public function insertSaldo($data)
    {
        return $this->db->insert('us_saldo_harian', $data);
    }

    public function getSaldoById($id)
    {
        return $this->db->get_where('us_saldo_harian', ['id' => $id])->row();
    }

    public function updateSaldo($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('us_saldo_harian', $data);
    }

    public function deleteSaldo($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('us_saldo_harian');
    }

    public function searchByNdInet($keyword)
    {
        $this->db->like('nd_inet', $keyword);
        return $this->db->get('us_saldo_harian')->result();
    }

    public function searchSaldo($keyword)
    {
        $this->db->like('nd_inet', $keyword);
        $this->db->or_like('type_pelanggan', $keyword);
        $this->db->or_like('status', $keyword);
        $this->db->or_like('nama_teknisi', $keyword);
        return $this->db->get('us_saldo_harian')->result();
    }

    
    public function getCpDataForSaldo()
    {
        $this->db->select('us_saldo_harian.*, db_cp.cp_dossier');
        $this->db->from('us_saldo_harian');
        $this->db->join('db_cp', 'db_cp.nd_inet = us_saldo_harian.nd_inet', 'left');
        return $this->db->get()->result();
    }
}

/* End of file M_saldo.php */
