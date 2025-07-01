<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Ibooster extends CI_Model
{
    public function getAllIbooster()
    {
        return $this->db->get('ibooster')->result();
    }

    public function insertIbooster($data)
    {
        return $this->db->insert('ibooster', $data);
    }

    public function getIboosterById($id)
    {
        return $this->db->get_where('ibooster', ['no' => $id])->row(); // pastikan 'no' adalah kolom primary key
    }

    public function updateIbooster($id, $data)
    {
        $this->db->where('no', $id);
        return $this->db->update('ibooster', $data);
    }

    public function deleteIbooster($id)
    {
        $this->db->where('no', $id);
        return $this->db->delete('ibooster');
    }

    public function searchByNdinet($keyword)
    {
        $this->db->like('nd_inet', $keyword);
        return $this->db->get('ibooster')->result();
    }

    public function searchIbooster($keyword)
    {
        $this->db->like('nd_inet', $keyword);
        $this->db->or_like('ip_embassy', $keyword);
        $this->db->or_like('cid', $keyword);
        $this->db->or_like('mac_address', $keyword);
        return $this->db->get('ibooster')->result();
    }
}

/* End of file M_Ibooster.php */
