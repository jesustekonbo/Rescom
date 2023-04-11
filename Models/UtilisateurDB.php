<?php

require_once 'Database.php';

class UtilisateurDB 
{
	private $db;

	public function __construct() 
	{
		$this->db= new Database();
	}

	public function create($login, $password, $role, $etat) 
	{
		$sql= "insert into utilisateur set LOGIN= ?, PASSWORD= ?, ROLE= ?, ETAT= ?";
		$attributes= array($login, $password, $role, $etat);
		$this->db->prepare($sql, $attributes);
	}	
	
	public function count()
	{
		$sql = "select count(*) as cou from utilisateur";
		$req= $this->db->prepare($sql);
		$data = $this->db->recover($req, true);
		return $data;
	}

	public function updateEtat($etat,$id) 
	{
		$sql= "update utilisateur set ETAT= ? where ID_USER = ?";
		$attributes= array($etat,$id);
		$this->db->prepare($sql, $attributes);
	}

	public function readAll() 
	{
		$sql= 'select * from utilisateur order by ID_USER desc';
		$req= $this->db->prepare($sql);
		$datas= $this->db->recover($req);
		return $datas;
	}

	public function read($id) 
	{
		$sql= 'select * from utilisateur where ID_USER =?';
		$attributes= array($id);
		$req= $this->db->prepare($sql, $attributes);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function readCompte($login, $password) 
	{
		$sql= 'select * from utilisateur where LOGIN= ? and PASSWORD= ?';
		$attributes= array($login, $password);
		$req= $this->db->prepare($sql, $attributes);
		$data= $this->db->recover($req, true);
		return $data;
	}
	public function readEmail($email) 
	{
		$sql= 'select * from utilisateur where LOGIN= ?';
		$attributes= array($email);
		$req= $this->db->prepare($sql, $attributes);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function update($id, $login, $password, $role, $etat) 
	{
		$sql= 'update utilisateur set LOGIN= ?, PASSWORD= ?, ROLE= ?, ETAT= ? where ID_USER= ?';
		$attributes= array($login, $password, $role, $etat, $id);
		$this->db->prepare($sql, $attributes);
	}

	public function update2($id, $login, $password) 
	{
		$sql= 'update utilisateur set LOGIN= ?, PASSWORD= ? where ID_USER= ?';
		$attributes= array($login, $password, $id);
		$this->db->prepare($sql, $attributes);
	}


	public function delete($id) 
	{
		$sql= 'delete from utilisateur where ID_USER= ? ';
		$attributes= array($id);
		$this->db->prepare($sql, $attributes);
	}

	public function exchange($id, $etat) 
	{
		$sql= "update utilisateur set ETAT= ? where ID_USER = ?";
		$attributes= array($etat,$id);
		$this->db->prepare($sql, $attributes);
	}
}

?>