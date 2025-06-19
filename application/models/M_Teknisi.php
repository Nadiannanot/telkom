<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Teknisi extends CI_Model {

    private $table = 'teknisi';

    public function getAll() {
        return $this->db->get($this->table)->result();
    }

    public function getById($nik) {
        return $this->db->get_where($this->table, ['nik_teknisi' => $nik])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($nik, $data) {
        $this->db->where('nik_teknisi', $nik);
        return $this->db->update($this->table, $data);
    }

    public function delete($nik) {
        $this->db->where('nik_teknisi', $nik);
        return $this->db->delete($this->table);
    }
}
