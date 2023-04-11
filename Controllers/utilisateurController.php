<?php

session_start();
require_once 'Controller.php';

$action= $_GET['action'];

if($action == 'create') {
    extract($_POST);
	$login = $email;
	$utilisateur= $utilisateurdb->readEmail($email) ;
		if ($utilisateur == false && $login != null && $password != null)
		{
			
			if ($type == "client") {
				$id_key = $clientdb->create($nom, $telephone, $email);

			} else if ($type == "proprietaire") {
				$adresse = 'Non definie';
				$avatar = 'avatar.jpg';
				$id_key = $proprietairedb->create($nom, $telephone, $email, $adresse, $avatar);
			}
			
			$utilisateurdb->create($login, $password, $type, 1);

			$_SESSION['message'] = 'Un nouveau utilisateur a été crée';
			$_SESSION['msg_type'] = 'true';
			header('Location:../login.php');
		}
		else
		{
			echo $_SESSION['message'] = "L'utilisateur existe deja";
			$_SESSION['msg_type'] = 'false';
			// header('Location:../.Utilisateur/index.php');
		}
}

if($action == 'update') 
{
	
	$id= $_GET['id'];

	extract($_POST);
	
	$utilisateurdb->update($id, $login, $password, $role, $etat) ;
	$_SESSION['message'] = "Les informations ont été mises à jour";
	$_SESSION['msg_type'] = 'true';
	header('Location:../.Utilisateur/index.php');

}

if($action == 'exchange'){
	$etat = $_GET['etat'];
	$id = $_GET['id'];
	if ($etat == "actif") {
		$etat = "2";
	}elseif ($etat != "actif") {
		$etat = "1";
	}
	$req = $utilisateurdb->exchange($id, $etat);
	var_dump($req);

	$_SESSION['message'] = 'Opération éffectuée';
	$_SESSION['msg_type'] = 'true';

	echo "<script>";
	echo "history.back()";
	echo "</script>";

}


if($action == 'delete') 
{
		$id= $_GET['id'];
		$utilisateurdb->delete($id);
			$_SESSION['message'] = "L'utilisateur a été supprimé";
			$_SESSION['msg_type'] = 'true';
		header('Location:../utilisateur/index.php');
}


?>