<!DOCTYPE html>
<html> 
  <head> 	
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
	<title>JaimeLaGeo</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="keywords" content="J'aime la géo,géographie,jeu,game,google maps, inscription, jaimelageo, jquery" />
	<meta name="description" content="Page d'accueil du site j'aime la géo" />
	<meta name="Author" content="olivier rollet"/>
	<meta name="Owner" content="olivier rollet"/>
	<meta name="Subject" content="jeu géographie"/>
	<meta name="Language" content="FR"/>
	<meta name="Robots" content="all | follow | index"/> 
	<meta name="Distribution" content="Global"/>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-30996221-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
    <style type="text/css"> 
	html { height: 100%;overflow: auto;  }      
	body { background:url(images/ciel.jpg);height: 100%; margin: 0; padding: 0;  } 
	.login {		
		font-size:24px;
		color:#ffffff;
		font-family: Helvetica, Arial, sans-serif;
	}
	
	#content {
		position:relative;
		left:200px;
		top:200px;
		width:600px;
	}
	
	#intro {
		position:relative;
		left:200px;
		top:130px;
		width:600px;
		font-size:24px;
		color:#ffffff;
		font-family: Helvetica, Arial, sans-serif;
	}
	
	#message {
		position:relative;
		left:200px;
		top:170px;
		width:600px;
		font-size:20px;
		color:#ff0000;
		font-family: Helvetica, Arial, sans-serif;
	}
	</style>  
	
<!-- *************************************** Jdock menu mac ***********************-->
	<script type='text/javascript' src='js/jquery-latest.min.js'></script>
	<script type='text/javascript' src='js/jquery.jqDock.min.js'></script>
	<style type='text/css'>
	/*position and hide the menu initially - leave room for menu items to expand...*/
	#page {padding-top:120px; padding-bottom:10px; width:100%;}
	#menu {
		position:absolute;
		top:50px;
		left:0;
		width:100%;
		display:none;
		background-color: #888;
	}
	/*dock styling...*/
	/*...centre the dock...*/
	#menu div.jqDockWrap {margin:0 auto;}
	/*...set the cursor...*/
	#menu div.jqDock {cursor:pointer;}
	/*label styling...*/
	div.jqDockLabel {padding:0 6px; white-space:nowrap; color:#ffff00; background-color:#6699ff; cursor:pointer;}
	#menu a {text-decoration:none;}
	</style>
	<script type='text/javascript'>
	jQuery(document).ready(function($){
	  // set up the options to be used for jqDock...
	  var dockOptions =
		{ align: 'middle' // horizontal menu, with expansion UP/DOWN from the middle
		, size: 36  // set the maximum minor axis (horizontal) image dimension to 36px
		, labels: 'tc'  // add labels (override the 'tl' default)
		};
	  // ...and apply...
	  $('#menu').jqDock(dockOptions);

	});
	
	function valider() {
		var temp=0;
		if (document.formulaire.login.value=="") {
			temp=1;
			alert('Login obligatoire');
		}
		else if (document.formulaire.pw.value=="") {
			temp=1;
			alert('Mot de passe obligatoire');
		}
		else if (document.formulaire.pseudo.value=="") {
			temp=1;
			alert('Pseudo obligatoire');
		}
		else if (document.formulaire.email.value=="") {
			temp=1;
			alert('Email obligatoire');
		}
		if (temp==0) {
			document.formulaire.submit();
		}
	}
	</script>
 
</head> 
<body >

<?php
include('menu.php');
?>
<div id="intro">
Votre inscription vous permet de: <br />
- sauvegarder votre score <br />
- visualiser vos scores dans les meilleurs scores <br />
Auncun email ne vous ai envoyé à l'insciption.
</div>
<div id="message">
<?php
if (isset($_GET['message'])) {
	$message=$_GET['message'];
	if ($message%2==1) {
		echo "Ce login existe déjà.<br />";
		$message=$message-1;
	}
	if ($message == 2 || $message == 6) {
		echo "Ce pseudo existe déjà.<br />";
		$message=$message-2;
	}
	if ($message == 4) {
		echo "Cet email existe déjà.<br />";
	}
}	
?>
</div>
<div id="content">
	<form action="enreg_user.php" method="POST" name="formulaire">
	<table>
	<tr>
		<td>
		<span class="login">Login:</span>
		</td>
		<td><input type="text" name="login" maxlength="30"/><span style="color:red"> *</span>
		</td>
	</tr>
	<tr>
		<td>
		<span class="login">Mot de passe:</span>
		</td>
		<td>
		<input type="text" name="pw" maxlength="20"/> <span style="color:red"> *</span>
		</td>
	</tr>
	<tr>
		<td>
		<span class="login">Pseudo:</span>
		</td>
		<td>
		<input type="text" name="pseudo" maxlength="30"/> <span style="color:red"> *</span>
		</td>
	</tr>
	<tr>
		<td>
		<span class="login">Age:</span>
		</td>
		<td>
		<input type="text" name="age" maxlength="3"/> 
		</td>
	</tr>
	<tr>
		<td>
		<span class="login"><img src="images/email_sign.png" width="30px;" height="30px" style="margin-bottom:-7px"/> :</span>
		</td>
		<td>
		<input type="text" name="email" maxlength="150"/> <span style="color:red"> *</span>
		</td>
	</tr>
	<tr>
		<td>
		<span class="login">&nbsp;</span>
		</td>
		<td>
		<input type="image" name="go" src="images/bouton.png" width="100px" height="40px" alt="Go" />
		<span style="position:relative; left:-81px; top: -16px;">
			<a href="#"  style="font-family: Helvetica, Arial, sans-serif; color:#ffffff; text-decoration:none;" onclick="valider()">Valider</a>
		</span>
		</td>
	</tr>
	</table>
	</form>
</div>  

</body> 

</html>