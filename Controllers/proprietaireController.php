<?php

session_start();
require_once 'controller.php';

$action= $_GET['action'];

if($action == 'create') {
    extract($_POST);

	if ($photo == null) {
		$photo = 'avatar.jpg';
	}

		$proprietairedb->create($nom, $telephone, $email, $adresse, $avatar);
		$_SESSION['message'] = 'Un nouveau proprietaire a été ajouté';
		$_SESSION['msg_type'] = 'true';
		header('Location:../.proprietaire/index.php');
}

if($action == 'update') {
    extract($_POST);

    $id = $_GET['id'];
	
	if ($photo == null) {
		$photo = 'avatar.jpg';
	}


		$proprietairedb->update($id, $nom, $telephone, $email, $adresse, $avatar);
		$_SESSION['message'] = 'Les nouveaus informations ont été enregistrés avec succés';
		$_SESSION['msg_type'] = 'true';
		header('Location:../.proprietaire/index.php');
}


if($action == 'delete') {
	$id= $_GET['id'];
	$proprietairedb->delete($id);
		$_SESSION['message'] = 'proprietaire supprimé';
		$_SESSION['msg_type'] = 'true';
	header('Location:../proprietaire/index.php');
}


?>