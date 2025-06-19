<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Tsel extends CI_Model
{
    public function getAllTsel()
    {
        return $this->db->get('tsel')->result();
    }

    public function insertTsel($data)
    {
        return $this->db->insert('tsel', $data);
    }

    public function getTselById($id)
    {
        return $this->db->get_where('tsel', ['id' => $id])->row();
    }

    public function updateTsel($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tsel', $data);
    }

    public function deleteTsel($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tsel');
    }

    public function searchByNdInet($keyword)
    {
        $this->db->like('nd_inet', $keyword);
        return $this->db->get('tsel')->result();
    }

    public function searchTsel($keyword)
    {
        $this->db->like('nd_inet', $keyword);
        $this->db->or_like('ncli_inet', $keyword);
        $this->db->or_like('witel', $keyword);
        $this->db->or_like('odp', $keyword);
        return $this->db->get('tsel')->result();
    }

    // Contoh fungsi tambahan jika ingin mengambil data relasi dengan tabel saldo (optional)
    public function getTselWithSaldo()
    {
        $this->db->select('tsel.*, us_saldo_harian.status, us_saldo_harian.nama_teknisi');
        $this->db->from('tsel');
        $this->db->join('us_saldo_harian', 'us_saldo_harian.nd_inet = tsel.nd_inet', 'left');
        return $this->db->get()->result();
    }
}

/* End of file M_Tsel.php */