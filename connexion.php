<?php
//$connect = mysqli_connect("sql.free.fr", "jaimelageo", "ornette", "jaimelageo");


//$link = mysql_connect('127.0.0.1', 'root', '') or exit('Erreur lors de la connexion : ' . mysql_error());
//mysql_select_db('jaimelageo') or exit('Erreur de la sélection de la base de données : ' . mysql_error());
$link = mysql_connect('sql.free.fr', 'jaimelageo', 'ornette') or exit('Erreur lors de la connexion : ' . mysql_error());
mysql_select_db('jaimelageo') or exit('Erreur de la sélection de la base de données : ' . mysql_error());
?>