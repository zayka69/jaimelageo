<?php
	session_start();
	include('connexion.php');

	$login=htmlentities(addslashes($_POST['login']));
	$password=htmlentities(addslashes($_POST['pw']));
	$pseudo=htmlentities(addslashes($_POST['pseudo']));
	$age=htmlentities(addslashes($_POST['age']));
	$email=htmlentities(addslashes($_POST['email']));
	//v�rifier si la personne est d�j� inscrite
	$requete = "SELECT * from user where Login='".$login."' or Pseudo='".$pseudo."' or Email='".$email."'";
	
	$requete = "SELECT 1 as 'temp', Login from user where Login='".$login."'";
	$requete = $requete." UNION  SELECT 2 as 'temp', Pseudo from user where Pseudo='".$pseudo."'"; 
	$requete = $requete." UNION  SELECT 3 as 'temp', Email from user where Email='".$email."'";
	
	// Pr�paration de la requ�te
	$resultat = mysql_query($requete);
	$temp=0;
	$message=0;
	while ($ligne = mysql_fetch_assoc($resultat)) {
		$temp=1;
		if ($ligne['temp'] == 1) {
			$message=1;
		}
		else if ($ligne['temp'] == 2) {
			$message=$message+2;
		}
		else if ($ligne['temp'] == 3) {
			$message=$message+4;
		}
	}
	if ($temp==1) {
		header("location:inscription.php?message=".$message);
	}
	else {	
		$requete = "INSERT INTO user (Login, Password, Pseudo, Age, Email) VALUES ('".$login."','".$password."','".$pseudo."',".$age.",'".$email."')";
		$resultat = mysql_query($requete);
		if ($resultat == FALSE) {
			 echo "Echec de l'ex�cution de la requ�te.<br />";
		}
		else {
			$_SESSION['identifiant']= mysql_insert_id();;
			$_SESSION['pseudo']=$pseudo;
			header("location:accueil.php");
		}
	}	   
	  
?>	