<?php

session_start();
require_once 'Controller.php';

$action= $_GET['action'];

if($action == 'create') {
    extract($_POST);

		$clientdb->create($nom, $telephone, $email);
		$_SESSION['message'] = 'Le client a été ajouté';
		$_SESSION['msg_type'] = 'true';

		header('Location:../client/create.php');
}


if($action == 'update') {
    extract($_POST);

		$clientdb->update($id, $nom, $telephone, $email);
		$_SESSION['message'] = 'Le client a été modifié';
		$_SESSION['msg_type'] = 'true';
		header('Location:../client/index.php');
}


if($action == 'delete') {
	$id= $_GET['id'];
	$clientdb->delete($id);
		$_SESSION['message'] = 'Le client a été supprimé';
		$_SESSION['msg_type'] = 'true';
	header('Location:../client/index.php');
}


?>