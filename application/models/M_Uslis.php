<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Uslis extends CI_Model
{
    public function getAllUslis()
    {
        return $this->db->get('uslis')->result();
    }

    public function insertUslis($data)
    {
        return $this->db->insert('uslis', $data);
    }

    public function getUslisById($id)
    {
        return $this->db->get_where('uslis', ['id' => $id])->row();
    }

    public function updateUslis($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('uslis', $data);
    }

    public function deleteUslis($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('uslis');
    }

    public function searchUslis($keyword)
    {
        $this->db->like('nama', $keyword);
        $this->db->or_like('nonwarranty', $keyword);
        $this->db->or_like('warranty', $keyword);
        return $this->db->get('uslis')->result();
    }
}

/* End of file M_Uslis.php */
