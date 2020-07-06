<?php
class Aluguel_model extends CI_Model
{
	function insert($data)
	{
		$this->db->insert("tbl_alugar", $data);
	}

	function update($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("tbl_alugar", $data);
	}

	function delete($id){
		$this->db->where("id", $id);
		$this->db->delete("tbl_alugar");
	}

	function fetch_user($id)
	{
		$this->db->select("t1.id request_id, t1.aprovado, t1.dt_created request, t2.*, t3.name locatario");
		$this->db->from("tbl_alugar t1, tbl_empreendimento t2, tbl_user t3");
		$this->db->where("locador_id", $id);
		$this->db->where('t2.id = t1.empreendimento_id');
		$this->db->where('t3.id = t2.user_id');

		$query = $this->db->get();
		return $query;
	}
	function fetch_request($id)
	{
		$this->db->select("t1.id request_id, t1.aprovado, t1.dt_created request, t2.*, t3.name locatario");
		$this->db->from("tbl_alugar t1, tbl_empreendimento t2, tbl_user t3");
		$this->db->where("user_id", $id);
		$this->db->where('t2.id = t1.empreendimento_id');
		$this->db->where("t3.id = t1.locador_id");

		$query = $this->db->get();
		return $query;
	}

	function fetch()
	{
		$this->db->select("*");
		$this->db->from("tbl_alugar");
		$query = $this->db->get();
		return $query;
	}

}

?>
