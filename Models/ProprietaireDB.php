<?php

require_once 'Database.php';

class ProprietaireDB {
	private $db;

	public function __construct() {
		$this->db= new Database();
	}


	public function create($nom, $telephone, $email, $adresse, $avatar) {
		$sql= "insert into proprietaire_salle set NOM= ?, TELEPHONE= ?, EMAIL= ?, ADRESSE= ?, AVATAR= ?";
		$attributes= array($nom, $telephone, $email, $adresse, $avatar);
		$this->db->prepare($sql, $attributes);
	}

	public function update($id, $nom, $telephone, $email, $adresse, $avatar){
		$sql= 'update proprietaire_salle set NOM= ?, TELEPHONE= ?, EMAIL= ?, ADRESSE= ?, AVATAR= ? where IDPROPRIETAIRE= ? ';
		$attributes= array($nom, $telephone, $email, $adresse, $avatar, $id);
		$this->db->prepare($sql, $attributes);
	}

	public function count()
	{
		$sql = "select count(IDPROPRIETAIRE) as cou from proprietaire_salle";
		$req= $this->db->prepare($sql);
		$data = $this->db->recover($req, true);
		return $data;
	}

	public function readAll() {
		$sql= 'select * from proprietaire_salle order by IDPROPRIETAIRE desc';
		$req= $this->db->prepare($sql);
		$datas= $this->db->recover($req);
		return $datas;
	}

	public function read($id){
		$sql= 'select * from proprietaire_salle where IDPROPRIETAIRE= ?';
		$attributes= array($id);
		$req= $this->db->prepare($sql, $attributes);
		$data= $this->db->recover($req, true);
		return $data;
	}
	public function readUser($EMAIL){
		$sql= 'select * from proprietaire_salle where EMAIL= ?';
		$attributes= array($EMAIL);
		$req= $this->db->prepare($sql, $attributes);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function delete($id) {
		$sql= 'delete from proprietaire_salle where IDPROPRIETAIRE= ? ';
		$attributes= array($id);
		$this->db->prepare($sql, $attributes);
	}
}

?>