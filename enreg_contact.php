<?php
	include('connexion.php');

	$nom=htmlentities(addslashes($_POST['nom']));
	$prenom=htmlentities(addslashes($_POST['prenom']));
	$message=htmlentities(addslashes($_POST['message']));
	$email=htmlentities(addslashes($_POST['email']));
	//vérifier email déjà présent.
	$requete = "INSERT INTO contact (Nom, Prenom, Email, Message) VALUES ('".$nom."','".$prenom."','".$email."','".$message."')";
	//echo $requete;
	$resultat = mysql_query($requete);
	if ($resultat == FALSE) {
		 echo "Echec de l'exécution de la requête.<br />";
	}
	else {
		$to = 'jaimelageo@free.fr';
		$subject = 'Contact';
		$message = "Nom:".$nom."\r\n"." Prénom:".$prenom."\r\n".$message;
		$headers = 'From: '.$email."\r\n".
			 'Reply-To: '.$email."\r\n".
			 'MIME-Version: 1.0'."\r\n".
			 'Content-type: text/html; charset=iso-8859-1'."\r\n";

		mail($to, $subject, $message, $headers);  

		header("location:contact.php?message=1");
	}
	 
	  
?>	