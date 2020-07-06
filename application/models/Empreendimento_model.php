<?php
class Empreendimento_model extends CI_Model
{
	function insert($data)
	{
		$this->db->insert("tbl_empreendimento", $data);
	}

	function update($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("tbl_empreendimento", $data);
	}

	function delete($id){
		$this->db->where("id", $id);
		$this->db->delete("tbl_empreendimento");
	}

	function city_state ($city, $state)
	{
		$this->db->select("*");
		$this->db->from("tbl_empreendimento");
		$this->db->where("cidade", $city);
		$this->db->where("uf", $state);
		$query = $this->db->get();
		return $query;
	}

	function find ($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_empreendimento");
		$this->db->where("id", $id);
		$query = $this->db->get();
		return $query;
	}

	function find_user ($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_empreendimento");
		$this->db->where("user_id", $id);
		$query = $this->db->get();
		return $query;
	}

	function fetch()
	{
		$this->db->select("*");
		$this->db->from("tbl_empreendimento");
		$query = $this->db->get();
		return $query;
	}
}

?>
