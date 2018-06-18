<?php
	session_start();
	include('connexion.php');

	$niveau=$_GET['niveau'];
	$score=$niveau*1000-$_GET['score'];
	$id_user=0;
	if (isset($_SESSION['identifiant'])) {
		$id_user=$_SESSION['identifiant'];
	}		
	$requete = "INSERT INTO score (Score, Date, Id_user, Id_niveau) VALUES (".$score.",NOW(),".$id_user.",".$niveau.")";
	$resultat = mysql_query($requete);
	if ($resultat == FALSE) {
		 echo "Echec de l'exécution de la requête.<br />";
	}
	else {
		echo $score;
	}
	
	/*$requete = "INSERT INTO score (Score, Date, Id_user) VALUES (?,NOW(),?)";
	// Préparation de la requête
	$resultat = mysqli_prepare($connect, $requete);
	  // Liaison des paramètres.
	  $ok = mysqli_stmt_bind_param($resultat, 'ii',$score,$id_user);

	  $ok = mysqli_stmt_execute($resultat);

	  if ($ok == FALSE) {
		 echo "Echec de l'exécution de la requête.<br />";
	  }
	  else {
			echo $score;
		}
	  mysqli_stmt_close($resultat);   */
	 
	  
?>	