<?php  

class Database{
	private $dsn;
	private $user;
	private $password;

	private $pdo;

	public function __construct(){
		$this->dsn= "mysql:host=localhost;";
		$this->dsn= $this->dsn . "dbname=db_reservation;";
		$this->dsn= $this->dsn . "port=3306;";
		$this->dsn= $this->dsn . "charset=utf8";

		$this->user= "root";
		$this->password= "";
	}

	public function chaineConnection(){
		if ($this->pdo === null) {
			$pdo= new PDO($this->dsn,
							$this->user,
							$this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;	
		}
		return $this->pdo;
	}

	public function prepare($statement, $attributes=null){
		$pdo = $this->chaineConnection();
		$req = $pdo->prepare($statement);

		if ($attributes === null) {
			$req->execute();
		}
		else{
			$req->execute($attributes);
		}

		return $req;
	}


	public function recover($req, $one=false){
		// $datas;
		$req->setFetchMode(PDO::FETCH_OBJ);

		if ($one==true) {
			$datas = $req->fetch();
		}
		else{
			$datas = $req->fetchAll();
		}

		return $datas;
	}

}

?>