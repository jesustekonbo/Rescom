<?php

	require_once 'Models/ClientDB.php';
	require_once 'Models/ProprietaireDB.php';
	require_once 'Models/UtilisateurDB.php';
	require_once 'Models/Type_salleDB.php';
	require_once 'Models/LocaliteDB.php';
	require_once 'Models/SalleDB.php';
	
	
	$clientdb= new ClientDB();
	$proprietairedb= new ProprietaireDB();
	$utilisateurdb= new UtilisateurDB();
	$type_salledb= new Type_salleDB();
	$localitedb= new LocaliteDB();
	$salledb= new SalleDB();

?>