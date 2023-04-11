<?php

session_start();
require_once 'Controller.php';

$action= $_GET['action'];

if($action == 'create') {
    extract($_POST);

		$salledb->create($nom);
		$_SESSION['message'] = 'La salle a été ajouté';
		$_SESSION['msg_type'] = 'true';

		header('Location:../salles/create.php');
}


if($action == 'update') {
    extract($_POST);

		$salledb->update($id, $nom);
		$_SESSION['message'] = 'La salle a été modifié';
		$_SESSION['msg_type'] = 'true';
		header('Location:../salle/index.php');
}


if($action == 'delete') {
	$id= $_GET['id'];
	$salledb->delete($id);
		$_SESSION['message'] = 'La salle a été supprimé';
		$_SESSION['msg_type'] = 'true';
	header('Location:../salle/index.php');
}


?>