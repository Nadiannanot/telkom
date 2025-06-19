<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Sektor extends CI_Model
{
    public function getAllSektor()
    {
        return $this->db->get('sektor')->result();
    }

    public function insertSektor($data)
    {
        return $this->db->insert('sektor', $data);
    }

    public function getSektorById($id)
    {
        return $this->db->get_where('sektor', ['id' => $id])->row();
    }

    public function updateSektor($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('sektor', $data);
    }

    public function deleteSektor($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('sektor');
    }

    public function searchSektor($keyword)
    {
        $this->db->like('sektor', $keyword);
        return $this->db->get('sektor')->result();
    }
}

/* End of file M_Sektor.php */
