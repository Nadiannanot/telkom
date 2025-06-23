<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Ibooster extends CI_Model
{
    public function getAllIbooster()
    {
        return $this->db->get('ibooster')->result();
    }

    public function searchByNdInet($nd_inet)
    {
        return $this->db
            ->like('nd_inet', $nd_inet)
            ->get('ibooster')
            ->result();
    }

    public function count_all()
    {
        return $this->db->count_all('ibooster');
    }

    public function get_paginated($limit, $start)
    {
        return $this->db->limit($limit, $start)->get('ibooster')->result();
    }

    public function insertIbooster($data)
    {
        return $this->db->insert('ibooster', $data);
    }

    public function getIboosterById($no)
    {
        return $this->db->get_where('ibooster', ['no' => $no])->row();
    }

    public function updateIbooster($no, $data)
    {
        return $this->db->where('no', $no)
                        ->update('ibooster', $data);
    }

    public function deleteIbooster($no)
    {
        return $this->db->where('no', $no)
                        ->delete('ibooster');
    }

    public function searchIbooster($keyword)
    {
        $this->db->like('nd_inet', $keyword);
        $this->db->or_like('ip_embassy', $keyword);
        $this->db->or_like('type_olt', $keyword);
        $this->db->or_like('cid', $keyword);
        $this->db->or_like('ip_ne', $keyword);
        $this->db->or_like('onu_serial_number', $keyword);
        $this->db->or_like('framed_ip_address', $keyword);
        $this->db->or_like('mac_address', $keyword);
        $this->db->or_like('status_koneksi', $keyword);
        return $this->db->get('ibooster')->result(); // fix bagian ini juga
    }
}

/* End of file M_Ibooster.php */
