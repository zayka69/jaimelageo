<?php
	session_start();
	include('connexion.php');

	
	$temp=0;
	$login=htmlentities(addslashes($_POST['login']));
	$password=htmlentities(addslashes($_POST['pw']));
	$requete = "SELECT Id, Pseudo from user where Login='".$login."' and Password='".$password."'";
	// Préparation de la requête
	$resultat = mysql_query($requete);
	
	/*$requete = "SELECT Id, Pseudo from user where Login=? and Password=?";
	$resultat = mysqli_prepare($connect, $requete);
	  // Liaison des paramètres.
	  $ok = mysql_stmt_bind_param($resultat, 'ss',$login,$password);
	  $login=htmlentities(addslashes($_POST['login']));
	  $password=htmlentities(addslashes($_POST['pw']));
	  $ok = mysqli_stmt_execute($resultat);

	  if ($ok == FALSE) {
		 echo "Echec de l'exécution de la requête.<br />";
	  }
	  else {
		// Association des variables de résultat.
		$ok = mysqli_stmt_bind_result($resultat,$Id,$Pseudo);
		while (mysqli_stmt_fetch($resultat)) {*/
		while ($ligne = mysql_fetch_assoc($resultat)) {
			$_SESSION['identifiant']=$ligne['Id'];
			$_SESSION['pseudo']=$ligne['Pseudo'];
			$temp=1;
		}
		//mysqli_stmt_close($resultat);   
	 // }
	  if ($temp==1) {
		header("location:accueil.php");
	  }
	  else {
		header("location:login.php?message=1");
	  }

?>	