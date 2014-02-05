<?php

class Usuarios extends CI_Model {

	//getterrs
	public function getUsers( $options=array() ){

	}


	//setters
	public function addUser( $userdata=array() ){

	}

	public function updateUser( $userdata=array() ){

	}

	public function deleteUser( $id = null ){

	}

	//especials
	public function doLogin($username=null,$password=null){

		if($username==null or $password==null){
			return false;
		}
		else{
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query = $this->db->get('usuarios');
			if ($query->num_rows() > 0)
			{
				return true;
			}
			else{
				return false;
			}
		}
	}

}


?>