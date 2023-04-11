<?php

require_once 'Database.php';

class ClientDB {
	private $db;

	public function __construct() {
		$this->db= new Database();
	}


	public function create($nom, $telephone, $email) {
		$sql= "insert into client set NOM= ?, TELEPHONE= ?, EMAIL= ?";
		$attributes= array($nom, $telephone, $email);
		$this->db->prepare($sql, $attributes);
	}

	public function update($id, $nom, $telephone, $email){
		$sql= 'update client set NOM= ?, TELEPHONE= ?, EMAIL= ? where ID= ? ';
		$attributes= array($nom, $telephone, $email, $id);
		$this->db->prepare($sql, $attributes);
	}

	public function count()
	{
		$sql = "select count(ID) as cou from client";
		$req= $this->db->prepare($sql);
		$data = $this->db->recover($req, true);
		return $data;
	}

	public function readAll() {
		$sql= 'select * from client order by ID desc';
		$req= $this->db->prepare($sql);
		$datas= $this->db->recover($req);
		return $datas;
	}

	public function read($id){
		$sql= 'select * from client where ID= ?';
		$attributes= array($id);
		$req= $this->db->prepare($sql, $attributes);
		$data= $this->db->recover($req, true);
		return $data;
	}
	
	public function readUser($EMAIL){
		$sql= 'select * from client where EMAIL= ?';
		$attributes= array($EMAIL);
		$req= $this->db->prepare($sql, $attributes);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function delete($id) {
		$sql= 'delete from client where ID= ? ';
		$attributes= array($id);
		$this->db->prepare($sql, $attributes);
	}
}

?>