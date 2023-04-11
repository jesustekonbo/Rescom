
<?php 
	require_once 'controller.php';

	$action = $_GET['action'];

	if ($action == "connecter")
	{

		$login = $_POST['login'];
		$password =  $_POST['password'];

		$utilisateur = $utilisateurdb->readCompte($login, $password);

		if (($utilisateur == true))
		{

			if ($utilisateur->ROLE == "administrateur" && $utilisateur->ETAT != 2)
			{
				$proprietaire = $proprietairedb->readUser($utilisateur->LOGIN);
				session_start();				
				$_SESSION['profil']= $proprietaire;
				$_SESSION['user']= $utilisateur;
				$_SESSION['message'] = "Bienvenue, $proprietaire->nom";
				$_SESSION['msg_type'] = 'true';
				header ("location: ../index.php");
			}
			else if ($utilisateur->ROLE == "proprietaire" && $utilisateur->ETAT != 2)
			{
					
				$proprietaire = $proprietairedb->readUser($utilisateur->LOGIN);
				session_start();		
				$_SESSION['profil']= $proprietaire;
				$_SESSION['user']= $utilisateur;	
				$_SESSION['message'] = "Bienvenue, $proprietaire->NOM";
				$_SESSION['msg_type'] = 'true';
				header ("location: ../index.php");
			}
			else if ($utilisateur->ROLE == "client" && $utilisateur->ETAT != 2)
			{
				$client = $clientdb->readUser($utilisateur->LOGIN);
				session_start();
				$_SESSION['profil']= $client;
				$_SESSION['user']= $utilisateur;
				$_SESSION['message'] = "Bienvenue, $client->nom";
				$_SESSION['msg_type'] = 'true';
				header ("location: ../index.php");
			}
			else
			{	session_start();
				$_SESSION['message'] = "Vous ne pouvez pas vous connecter avec ce compte !!";
				$_SESSION['msg_type'] = 'false';
				header("location: ../login.php");
			}

		}
		else
		{
			session_start();
			$_SESSION['message'] = "La connexion a echoué, verifier vos informations";
			$_SESSION['msg_type'] = 'false';
			header("location: ../login.php?error=echec");
		}
	}
	else
	{

		session_start();
		//var_dump($_SESSION['profil']);
		if($_SESSION['profil']->ROLE == "administrateur"){
			$utilisateurdb->updateETAT(0,$_SESSION['profil']->id);
		}

		if($_SESSION['profil']->ROLE == "proprietaire"){
			$proprietairedb->updateETAT(0,$_SESSION['profil']->id);
		}

		if($_SESSION['profil']->ROLE == "client"){
			$clientdb->updateETAT(0,$_SESSION['profil']->id);
		}
		
		// session_unset();
		// header('Location:../index.php');
	}
	if ($action == "deconnecter"){
		session_unset();
		header('Location:../login.php');
	}

 ?>