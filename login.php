<!DOCTYPE html>
<html> 
  <head> 	
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
	<title>JaimeLaGeo</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="keywords" content="J'aime la géo,géographie,jeu,game,google maps, login, jaimelageo, jquery" />
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
		position:relative;
		left:170px;
		top:0px;
		font-size:48px;
		color:#ffffff;
		font-family: Helvetica, Arial, sans-serif;
	}
	.pw {
		font-size:48px;
		color:#ffffff;
		font-family: Helvetica, Arial, sans-serif;
		width:600px;
	}
	.input_login {
		position:relative;
		left:180px;
		top:-6px;
	}
	.input_pw {
		position:relative;
		left:10px;
		top:-6px;
	}
	.go {
		position:relative;
		left:30px;
		top:-12px;
	}
	.pw_oublie {
		position:relative;
		left:310px;
		top:0px;
		color:#ffffff;
		text-decoration:underline;
	}
	.email {
		position:relative;
		left:0px;
		top:0px;
		font-size:24px;
		color:#ffffff;
		font-family: Helvetica, Arial, sans-serif;
	}
	#content {
		position:relative;
		left:200px;
		top:200px;
		width:800px;
	}
	#monDiv {
		display:none;
	}
	#envoyer {
		position:relative;
		left:0px;
		margin-top:20px;
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
	
	<!-- ***************************************Verif***********************-->
	function verif() {
		var temp=0;
		if (document.formulaire.login.value=="") {
			temp=1;
			alert('Login obligatoire');
		}
		else if (document.formulaire.pw.value=="") {
			temp=1;
			alert('Mot de passe obligatoire');
		}
		if (temp==0) {
			//document.formulaire.submit();
			return true;
		}
		else {
			return false;	
		}	
	}
	
	function envoyer() {
		if (document.formulaire.email.value=="") {
			alert('Email obligatoire');
		}
		else {
			alert('message envoyé');
			document.formulaire.action="envoi_pw.php";
			document.formulaire.submit();
		}
	}
	</script>
	
	<!-- *************************************** mot de passe oublie ***********************-->
	 <script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
	 <script type="text/javascript">
            jQuery(document).ready(function() {
             $("#declencheur").click(function () {
                  $("#monDiv").toggle("slow");
                });
            });
    </script>

 
</head> 
<body >

<?php
include('menu.php');
?>	
  

<div id="content">
	<span class="pw_oublie" id="declencheur">mot de passe oublié</span>
	<form action="enreg_login.php" method="POST" onsubmit="return verif()" name="formulaire">
		<span class="login">Login:</span><span class="input_login"><input type="text" name="login" maxlength="30"/></span><br />
		<span class="pw">Mot de passe:</span><span class="input_pw"><input type="text" name="pw" maxlength="20"/></span>
		<span class="go"><input type="image" name="go" src="images/entrer.png" width="50px" height="50px" alt="Go" /> </span>	
		<div id="monDiv" style="background-color:#6699ff;width:320px;height:155px;margin:10px;padding:10px;">
			<span class="email">Saisissez votre email pour recevoir votre mot de passe:</span>
			<input type="text" name="email" size="45" maxlength="150" style="margin-top:10px;"/>
			<div id="envoyer">
				<input type="image" name="go" src="images/bouton.png" width="100px" height="40px" alt="Go" />
				<span style="position:relative; left:-83px; top: -16px;">
					<a href="#"  style="font-family: Helvetica, Arial, sans-serif; color:#ffffff; text-decoration:none;" onclick="envoyer()">Envoyer</a>
				</span>
			</div>
		</div>		
	</form>
	<?php
	if (isset($_GET['message']) && $_GET['message'] == '1') {
		echo "<span style='color:#ff2222;font-size:40px;font-family: Helvetica, Arial, sans-serif'>login ou mot de passe incorrect</span>";
	}
	?>

</div>  

</body> 

</html>