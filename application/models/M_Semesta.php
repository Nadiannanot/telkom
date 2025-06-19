<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Semesta extends CI_Model
{
    public function getAllSemesta()
    {
        $this->db->select('u.*, r.nama AS sto_name, s.sektor AS sektor_name');
        $this->db->from('us_semesta u');
        $this->db->join('uslis r', 'u.s_sto = r.id', 'left');
        $this->db->join('sektor s', 'u.s_sektor = s.id', 'left');
        return $this->db->get()->result();
    }

    public function searchSemesta($keyword = '')
    {
        $this->db->select('u.*, r.nama AS sto_name, s.sektor AS sektor_name');
        $this->db->from('us_semesta u');
        $this->db->join('uslis r', 'u.s_sto = r.id', 'left');
        $this->db->join('sektor s', 'u.s_sektor = s.id', 'left');

        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('u.s_node_id_ip', $keyword);
            $this->db->or_like('u.s_odc', $keyword);
            $this->db->or_like('u.s_nd_inet', $keyword);
            $this->db->or_like('u.id', $keyword);
            $this->db->or_like('r.nama', $keyword);
            $this->db->or_like('s.sektor', $keyword);
            $this->db->group_end();
        }

        return $this->db->get()->result();
    }

    public function getSemestaById($id)
    {
        $this->db->select('u.*, r.nama AS sto_name, s.sektor AS sektor_name');
        $this->db->from('us_semesta u');
        $this->db->join('uslis r', 'u.s_sto = r.id', 'left');
        $this->db->join('sektor s', 'u.s_sektor = s.id', 'left');
        $this->db->where('u.id', $id);
        return $this->db->get()->row();
    }

    public function insertSemesta($data)
    {
        return $this->db->insert('us_semesta', $data);
    }

    public function updateSemesta($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('us_semesta', $data);

        log_message('debug', 'Query Update Semesta: ' . $this->db->last_query());

        return ($this->db->affected_rows() >= 0);
    }

    public function deleteSemesta($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('us_semesta');
    }

    public function checkIdExists($id)
    {
        return $this->db->get_where('us_semesta', ['id' => $id])->row();
    }

    public function insertCsvData($data)
    {
        return $this->db->insert_batch('us_semesta', $data);
    }
}
