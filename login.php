<?php 
	$title = 'Auth'; 
	require_once 'includes/_header.php';

  if (isset($_GET['error'])) {
    $_SESSION['message'] = "La connexion a echoué, verifier vos informations";
    echo $_GET['error'];
?>

  <script>
    alert("<?=$_SESSION['message']?>")
  </script>

<?php 
  }
?>

<?php 
    require_once('views/login.view.php')
?>


<?php 
	require_once 'includes/_footer.php' 
?>