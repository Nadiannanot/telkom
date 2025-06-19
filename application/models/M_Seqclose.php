<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Seqclose extends CI_Model
{
    public function getAllSeqclose()
    {
        return $this->db->get('seq_close')->result();
    }

    public function insertSeqclose($data)
    {
        return $this->db->insert('seq_close', $data);
    }

    public function getSeqcloseById($id)
    {
        return $this->db->get_where('seq_close', ['id' => $id])->row();
    }

    public function updateSeqclose($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('seq_close', $data);
    }

    public function deleteSeqclose($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('seq_close');
    }

    public function searchBySegmentasi($keyword)
    {
        $this->db->like('segmentasi', $keyword);
        return $this->db->get('seq_close')->result();
    }

    public function searchSeqclose($keyword)
    {
        $this->db->like('segmentasi', $keyword);
        $this->db->or_like('sub_segment', $keyword);
        return $this->db->get('seq_close')->result();
    }
}

/* End of file M_Seqclose.php */
