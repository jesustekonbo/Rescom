<?php

session_start();
require_once 'controller.php';

$action= $_GET['action'];

if($action == 'create') {
    extract($_POST);
    
	if ($image == null) {
		$image = 'avatar.jpg';
	}
    $image = 'avatar.jpg';

		$salledb->create($idtype_salle, $idlocalite, $idproprietaire , $superficie, $nbreplace, $nbrebath, $nbrebed, $parking, $prix, $image);
		$_SESSION['message'] = 'Une nouvelle Salle a été ajouté';
		$_SESSION['msg_type'] = 'true';
		header('Location:../salle.php');
}

if($action == 'update') {
    extract($_POST);

    $id = $_GET['id'];
	
	if ($image == null) {
		$image = 'avatar.jpg';
	}


		$salledb->update($id, $idtype_salle, $idlocalite, $IDPROPRIETAIRE , $superficie, $nbreplace, $nbrebath, $nbrebed, $parking, $prix, $image);
		$_SESSION['message'] = 'Les nouveaus informations ont été enregistrés avec succés';
		$_SESSION['msg_type'] = 'true';
		header('Location:../salle.php');
}


if($action == 'delete') {
	$id= $_GET['id'];
	$salledb->delete($id);
		$_SESSION['message'] = 'la Salle supprimé';
		$_SESSION['msg_type'] = 'true';
		header('Location:../salle.php');
}


?>