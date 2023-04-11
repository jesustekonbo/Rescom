<?php

require_once 'Database.php';

class SalleDB {
	private $db;

	public function __construct() {
		$this->db= new Database();
	}


	public function create($idtype_salle, $idlocalite, $IDPROPRIETAIRE , $superficie, $nbreplace, $nbrebath, $nbrebed, $parking, $prix, $image) {
		$sql= "insert into salle set IDTYPE_DE_SALLE = ?, IDLOCALITE = ?, IDPROPRIETAIRE  = ?, SUPERFICIE= ?, NBRE_PLACE= ?, NBRE_BATH = ?, NBRE_BED= ?, PARKING= ?, PRIX= ?, image= ?";
		$attributes= array($idtype_salle, $idlocalite, $IDPROPRIETAIRE , $superficie, $nbreplace, $nbrebath, $nbrebed, $parking, $prix, $image);
		$this->db->prepare($sql, $attributes);
	}

	public function update($id, $idtype_salle, $idlocalite, $IDPROPRIETAIRE , $superficie, $nbreplace, $nbrebath, $nbrebed, $parking, $prix, $image){
		$sql= 'update salle set IDTYPE_DE_SALLE = ?, IDLOCALITE = ?, IDPROPRIETAIRE  = ?, SUPERFICIE= ?, NBRE_PLACE= ?, NBRE_BATH = ?, NBRE_BED= ?, PARKING= ?, PRIX= ?, image= ? where IDSALLE= ? ';
		$attributes= array($idtype_salle, $idlocalite, $IDPROPRIETAIRE , $superficie, $nbreplace, $nbrebath, $nbrebed, $parking, $prix, $image, $id);
		$this->db->prepare($sql, $attributes);
	}

	public function count()
	{
		$sql = "select count(IDSALLE) as cou from salle";
		$req= $this->db->prepare($sql);
		$data = $this->db->recover($req, true);
		return $data;
	}

	public function readAll() {
		$sql= 'select * from salle order by IDSALLE desc';
		$req= $this->db->prepare($sql);
		$datas= $this->db->recover($req);
		return $datas;
	}
	public function readAllProp($id) {
		$sql= 'select * from salle where IDPROPRIETAIRE = ? order by IDSALLE desc';
		$attributes= array($id);
		$req= $this->db->prepare($sql, $attributes);
		$datas= $this->db->recover($req);
		return $datas;
	}

	public function read($id){
		$sql= 'select * from salle where IDSALLE= ?';
		$attributes= array($id);
		$req= $this->db->prepare($sql, $attributes);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function delete($id) {
		$sql= 'delete from salle where IDSALLE= ? ';
		$attributes= array($id);
		$this->db->prepare($sql, $attributes);
	}
}

?>