<?php
    session_start();
    require_once 'controllers/Controller_header.php';

    $profil= null;

    if(isset($_SESSION['profil']) == true) {
        $profil= $_SESSION['profil'];
        $user =  $_SESSION['user'];
        if ($user->ROLE == 'client') {
            $profil = $clientdb->readUser($user->LOGIN);
            $role = "client";
        }
        elseif ($user->ROLE == 'proprietaire') {
            $profil = $proprietairedb->readUser($user->LOGIN);
            $role = "proprietaire";
            $photo = $profil->AVATAR;
        }
        elseif ($user->ROLE == 'administrateur') {
            $profil = $administrateurdb->readUser($user->LOGIN);
            $role = "administrateur";
        }
        $_SESSION['profil'] = $profil;

        if ($profil == null) {
            $photo = 'avatar.jpg';
            $nom = '';
        }else {
            $nom = $profil->NOM;
        }

    }

    else {
        // header('Location:../Pages/index.php');
    }

    function Active($title, $page)
    {
        if ($title == $page) {
            echo "active";
        }
    }

?>



<!DOCTYPE html>
<html lang="fr">
<head>
<title>Reservation de salle en ligne</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Bluesky template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap4/bootstrap.min.css">
<link href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="assets/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="assets/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/rangeslider.js-2.3.0/rangeslider.css">
<link rel="stylesheet" type="text/css" href="assets/styles/property.css">
<link rel="stylesheet" type="text/css" href="assets/styles/property_responsive.css">
<link rel="stylesheet" type="text/css" href="assets/styles/properties.css">
<link rel="stylesheet" type="text/css" href="assets/styles/properties_responsive.css">
<link rel="stylesheet" type="text/css" href="assets/styles/about.css">
<link rel="stylesheet" type="text/css" href="assets/styles/about_responsive.css">
<link rel="stylesheet" type="text/css" href="assets/styles/contact.css">
<link rel="stylesheet" type="text/css" href="assets/styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="assets/styles/style.min.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="logo">
							<a href="#" style="font-size: 22px; font-family: algerian; color: #2eca6a">RESERVATION EN LIGNE</a>
						</div>
						<nav class="main_nav">
							<ul>
								<li class="<?php Active($title, 'Accueil')?>"><a href="index.php">Accueil</a></li>
								<li class="<?php Active($title, 'A propos')?>"><a href="about.php">A propos</a></li>
								<li class="<?php Active($title, 'Salles')?>"><a href="salles.php">Salles</a></li>
								<li class="<?php Active($title, 'Contact')?>"><a href="contact.php">Contact</a></li>
							




			<?php
                if(!isset($profil)){
            ?>
            				</ul>
						</nav>

							<div class="phone_num ml-auto">
								<div class="phone_num_inner">
									<img src="assets/images/phone.png" alt=""><span>+237 696-871-973</span>
								</div>
							</div>

						<ul>
							<li class="<?php Active($title, 'Auth')?>">
								<div class="phone_num ml-auto btn btn-light" style="cursor: pointer; padding: 4px; color: white; font-size: larger;">
									<div class="phone_num_inner">
										<i class="fa fa-user"></i><a href="login.php"><span>Connexion</span></a>
									</div>
								</div>
							</li>
						</ul>

            <?php
                } elseif(isset($profil) and $role == 'proprietaire'){
            ?>

                    <li class="<?php Active($title, 'profil')?>"><a class="" href="ajouter_salle.php">Ajouter</a></li>
                    <li class="<?php Active($title, 'profil')?>"><a class="" href="index.php">Mes salles</a></li>
					<li class="<?php Active($title, 'profil')?>"><a class="btn btn-danger" href="Controllers/connexionController.php?action=deconnecter"> Se Déconnecter</a></li>
					<li class="<?php Active($title, 'profil')?>"><a class="" href="index.php" ><span style="position: absolute;top: 25px;"><?=$profil->NOM?></span></a></li>
        
            
				</ul>
			</nav>

            <?php
                } elseif(isset($profil) and $role == 'client'){
            ?>

				<li class="<?php Active($title, 'profil')?>"><a class="" href="index.php" >Mes informations</a></li>
                <li class="<?php Active($title, 'profil')?>"><a class="btn btn-danger" href="Controllers/connexionController.php?action=deconnecter"> Se Déconnecter</a></li>
				<li class="<?php Active($title, 'profil')?>"><a class="" href="index.php" ><span style="position: absolute;top: 25px;"><?=$profil->NOM?></span></a></li>
                
            
			</ul>
		</nav>

            <?php
                } 
            ?>

						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo">
				<a href="assets/#">
					<div class="logo_container d-flex flex-row align-items-start justify-content-start">
						<div class="logo_image"><div>RESERVATION EN LIGNE</div></div>
					</div>
				</a>
			</div>
			<ul>
				<li class="menu_item"><a href="index.php">Accueil</a></li>
				<li class="menu_item"><a href="about.php">A propos</a></li>
				<li class="menu_item"><a href="salles.php">Salles</a></li>
				<li class="menu_item"><a href="contact.php">Contact</a></li>
				<li class="menu_item"><a href="login.php">Compte</a></li>
			</ul>
		</div>
		<div class="menu_phone"><span>Nous appeler : </span>+237 696-871-973</div>
	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="assets/images/about.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content d-flex flex-row align-items-end justify-content-start">
							<div class="home_title">Effectuez votre reservation dès maintenant</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Home Search -->
	<div class="home_search">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_search_container">
						<div class="home_search_content">
							<form action="#" class="search_form d-flex flex-row align-items-start justfy-content-start">
								<div class="search_form_content d-flex flex-row align-items-start justfy-content-start flex-wrap">
									<div>
										<select class="search_form_select">
											<option disabled selected>Meublée</option>
											<option>Oui</option>
											<option>Non</option>
										</select>
									</div>
									<div>
										<select class="search_form_select">
											<option disabled selected>Tous types</option>
											<option>Salle de mariage</option>
											<option>Salle de fête</option>
											<option>Salle de concert</option>
											<option>Salle de Baptême</option>
											<option>Salle de Reunion</option>
										</select>
									</div>
									<div>
										<select class="search_form_select">
											<option disabled selected>Ville</option>
											<option>Dschang</option>
											<option>Douala</option>
											<option>Yaoundé</option>
											<option>Bafoussam</option>
											<option>Ngaoundéré</option>
										</select>
									</div>
									<div>
										<select class="search_form_select">
											<option disabled selected>Chambres</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div>
									<div>
										<select class="search_form_select">
											<option disabled selected>Toilettes</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
										</select>
									</div>
								</div>
								<button class="search_form_button ml-auto">Rechercher</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
