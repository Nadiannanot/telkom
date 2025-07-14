<!-- <?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jenisOrder extends CI_Model
{

	private $table = 'jenis_order';

	public function getAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->table, ['jenis_teknisi' => $id])->row();
	}
	public function getAlljenis()
	{
		$this->db->select('jenis');
		return $this->db->get($this->table)->result_array();
	}
	// public function insert($data)
	// {
	// 	return $this->db->insert($this->table, $data);
	// }

	// public function update($nik, $data)
	// {
	// 	$this->db->where('nik_teknisi', $nik);
	// 	return $this->db->update($this->table, $data);
	// }

	// public function delete($nik)
	// {
	// 	$this->db->where('nik_teknisi', $nik);
	// 	return $this->db->delete($this->table);
	// }
}
// End of file M_Teknisi.php -->