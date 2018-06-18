<?php
include('connexion.php');
$email=htmlentities(addslashes($_POST['email']));
$requete = "SELECT * from user where email='".$email."'";
$resultat = mysql_query($requete);
while ($ligne = mysql_fetch_assoc($resultat)) {
	$Login=$ligne['Login'];
	$Password=$ligne['Password'];
	$Pseudo=$ligne['Pseudo'];
}
$to = $email;
$subject = 'Mot de passe de jaimelageo.free.fr';
$message = "Bonjour ".$Pseudo.",\r\n Votre login est:".$Login."\r\n"." et votre mot de passe est:".$Password."\r\n";
$headers = 'From: jaimelageo@free.fr\r\n'.
	'Reply-To: \r\n'.
	 'MIME-Version: 1.0'."\r\n".
	 'Content-type: text/html; charset=iso-8859-1'."\r\n";
//echo $message;
mail($to, $subject, $message, $headers); 
header("location:login.php");
?>