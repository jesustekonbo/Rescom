<?php

require_once 'Database.php';

class LocaliteDB {
	private $db;

	public function __construct() {
		$this->db= new Database();
	}


	public function create($nom) {
		$sql= "insert into localite set NOM_LOCALITE= ?";
		$attributes= array($nom);
		$this->db->prepare($sql, $attributes);
	}

	public function update($id, $nom){
		$sql= 'update localite set NOM_LOCALITE= ? where IDLOCALITE = ? ';
		$attributes= array($nom, $id);
		$this->db->prepare($sql, $attributes);
	}

	public function count()
	{
		$sql = "select count(IDLOCALITE) as cou from localite";
		$req= $this->db->prepare($sql);
		$data = $this->db->recover($req, true);
		return $data;
	}

	public function readAll() {
		$sql= 'select * from localite order by IDLOCALITE';
		$req= $this->db->prepare($sql);
		$datas= $this->db->recover($req);
		return $datas;
	}

	public function read($id){
		$sql= 'select * from localite where IDLOCALITE = ?';
		$attributes= array($id);
		$req= $this->db->prepare($sql, $attributes);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function delete($id) {
		$sql= 'delete from localite where IDLOCALITE = ? ';
		$attributes= array($id);
		$this->db->prepare($sql, $attributes);
	}
}

?>