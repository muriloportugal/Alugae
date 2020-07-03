<?php
class User_model extends CI_Model
{
	function login($email, $password)
	{
		$query = $this->user_email($email);
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				if($row->is_email_verified == 1)
				{
					$store_password = $this->encrypt->decode($row->password);
					if($password == $store_password)
					{
						$this->session->set_userdata('id', $row->id);
						$this->session->set_userdata('name', $row->name);
						$this->session->set_userdata('email', $row->email);
					}
					else
					{
						return 'Senha incorreta';
					}
				}
				else
				{
					return 'Verifique seu e-mail primeiramente.';
				}
			}
		}
		else
		{
			return 'E-mail incorreto';
		}
	}

	function logout()
	{
		$data = $this->session->all_userdata();
		foreach ($data as $row => $rows_value) {
			$this->session->unset_userdata($row);
		}
	}

	function insert($data)
	{
		$this->db->insert("tbl_user", $data);
	}

	function update($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("tbl_user", $data);
	}

	function delete($id){
		$this->db->where("id", $id);
		$this->db->delete("tbl_user");
	}

	function user_email ($email)
	{
		$this->db->select("*");
		$this->db->from("tbl_user");
		$this->db->where("email", $email);
		$query = $this->db->get();
		return $query;
	}

	function fetch()
	{
		$this->db->select("*");
		$this->db->from("tbl_user");
		$query = $this->db->get();
		return $query;
	}
}

?>
