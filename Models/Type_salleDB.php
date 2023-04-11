<?php

require_once 'Database.php';

class Type_salleDB {
	private $db;

	public function __construct() {
		$this->db= new Database();
	}


	public function create($nom) {
		$sql= "insert into type_de_salle set NOM_TYPE_BIEN= ?";
		$attributes= array($nom);
		$this->db->prepare($sql, $attributes);
	}

	public function update($id, $nom){
		$sql= 'update type_de_salle set NOM_TYPE_BIEN= ? where IDTYPE_DE_SALLE = ? ';
		$attributes= array($nom, $id);
		$this->db->prepare($sql, $attributes);
	}

	public function count()
	{
		$sql = "select count(IDTYPE_DE_SALLE ) as cou from type_de_salle";
		$req= $this->db->prepare($sql);
		$data = $this->db->recover($req, true);
		return $data;
	}

	public function readAll() {
		$sql= 'select * from type_de_salle order by IDTYPE_DE_SALLE';
		$req= $this->db->prepare($sql);
		$datas= $this->db->recover($req);
		return $datas;
	}

	public function read($id){
		$sql= 'select * from type_de_salle where IDTYPE_DE_SALLE = ?';
		$attributes= array($id);
		$req= $this->db->prepare($sql, $attributes);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function delete($id) {
		$sql= 'delete from type_de_salle where IDTYPE_DE_SALLE = ? ';
		$attributes= array($id);
		$this->db->prepare($sql, $attributes);
	}
}

?>