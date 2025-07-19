<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Order extends CI_Model
{
	public function getAllOrder()
	{
		return $this->db->get('tb_order')->result();
	}

	public function insertOrder($data)
	{
		return $this->db->insert('tb_order', $data);
	}

	public function getOrderById($id)
	{
		return $this->db->get_where('tb_order', ['id' => $id])->row();
	}

	public function updateOrder($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('tb_order', $data);
	}

	public function deleteOrder($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tb_order');
	}

	public function searchOrder($q)
	{
		$this->db->like('no_ticket', $q);
		$this->db->or_like('service_no', $q);
		$this->db->or_like('nik_teknisi', $q);
		$this->db->or_like('nama_teknisi', $q);
		return $this->db->get('tb_order')->result();
	}

	public function getAllOrderWithRelasi()
	{
		$this->db->select('
			tb_order.*,
			teknisi.nik_teknisi AS teknisi_nik,
			teknisi.nama_teknisi AS teknisi_nama,
			sektor.sektor AS sektor_nama,
			seq_close.segmentasi AS segmen_nama,
			seq_close.sub_segment,
			jadwal.tgl AS jadwal_tgl,
			jadwal.status AS jadwal_status
		');
		$this->db->from('tb_order');
		$this->db->join('teknisi', 'tb_order.nik_teknisi = teknisi.nik_teknisi', 'left');
		$this->db->join('sektor', 'tb_order.sektor = sektor.sektor', 'left');
		$this->db->join('seq_close', 'tb_order.segmentasi = seq_close.segmentasi', 'left');
		$this->db->join('jadwal', 'tb_order.nik_teknisi = jadwal.nik', 'left');
		return $this->db->get()->result();
	}

	public function searchOrderWithRelasi($q)
	{
		$this->db->select('
			tb_order.*,
			teknisi.nik_teknisi AS teknisi_nik,
			teknisi.nama_teknisi AS teknisi_nama,
			sektor.sektor AS sektor_nama,
			seq_close.segmentasi AS segmen_nama,
			seq_close.sub_segment,
			jadwal.tgl AS jadwal_tgl,
			jadwal.status AS jadwal_status
		');
		$this->db->from('tb_order');
		$this->db->join('teknisi', 'tb_order.nik_teknisi = teknisi.nik_teknisi', 'left');
		$this->db->join('sektor', 'tb_order.sektor = sektor.sektor', 'left');
		$this->db->join('seq_close', 'tb_order.segmentasi = seq_close.segmentasi', 'left');
		$this->db->join('jadwal', 'tb_order.nik_teknisi = jadwal.nik', 'left');
		$this->db->group_start();
		$this->db->like('tb_order.no_ticket', $q);
		$this->db->or_like('tb_order.service_no', $q);
		$this->db->or_like('tb_order.nik_teknisi', $q);
		$this->db->or_like('tb_order.nama_teknisi', $q);
		$this->db->or_like('teknisi.nama_teknisi', $q);
		$this->db->or_like('sektor.sektor', $q);
		$this->db->or_like('seq_close.segmentasi', $q);
		$this->db->group_end();
		return $this->db->get()->result();
	}
}
