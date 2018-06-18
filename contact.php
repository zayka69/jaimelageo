<!DOCTYPE html>
<html> 
  <head> 	
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
	<title>JaimeLaGeo</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="keywords" content="J'aime la géo,géographie,jeu,game,google maps, contact, jaimelageo, jquery" />
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
	html { height: 100%; overflow: auto; }      
	body { background:url(images/ciel.jpg);height: 100%; margin: 0px; padding: 0px }   
	#contact {
		position:absolute;
		top:450px;
		left:450px;
		width:480px;
	}	
	.login {		
		font-size:24px;
		//color:#ffff00;
		font-family: Helvetica, Arial, sans-serif;
	}
	.caract_max {		
		font-size:16px;
		color:#ffffff;
		font-family: Helvetica, Arial, sans-serif;
	}
	#message_envoye {
		position:absolute;
		top:690px;
		left:820px;
		color:red;
		font-size:24px;
		font-family: Helvetica, Arial, sans-serif;
		z-index:3;
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
	</script>
	
<!-- *************************************** parallax ***********************-->
	<style type="text/css" media="all">

	@import "css/reset.css";
	@import "css/style_dark.css";

	#parallax div div
	  {font-family: Palatino, Georgia, Trebuchet MS, serif; font-size: 12em; line-height: 0.9em; }
	  
	.color1 {color:#9bc0e5;} 
	.color2 {color:#a4c522;} 
	.color3 {color:#e99400;} 
	.color4 {color:#b50c0c;} 
	</style>
	<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
	<script type="text/javascript" src="js/jquery.jparallax.js"></script>
	<script type="text/javascript">
	<!--
	// jQuery.noConflict();
	var corners = '';

	jQuery(document).ready(function(){
		
		jQuery('#parallax').jparallax({triggerExposesEdges: true}).append(corners);		
		jQuery('a.goto').click(function(){
		var ref=jQuery(this).attr("href");
		// console.log(ref);
		jQuery('#parallax').trigger("jparallax", [ref]);
		return false;
		});
	});

	//-->
	</script>
	
	<script type="text/javascript">
		function veriftext() {
			if (document.getElementById('message').value.length > 250) {
				alert('Nombre de caractères dépassé !');
				document.getElementById('message').value=document.getElementById('message').value.substr(0,250); 
				return false;
			}
			else {
				return true;
			}
		}
		
		function valider() {
		var temp=0;
		
		if (document.formulaire.nom.value=="") {
			temp=1;
			alert('Nom obligatoire');
		}
		else if (document.formulaire.email.value=="") {
			temp=1;
			alert('Email obligatoire');
		}
		if (temp==0) {
			temp=veriftext();
			if (temp==true) {
				document.formulaire.submit();
			}
		}
	}
	</script>
</head> 
<body >

<?php
include('menu.php');
?>
	
<div id="content">

  <div id="parallax" style="width:100em; height: 320px; ">

	<div style="width:1200px; height:640px;">
    <div class="color1" style="position:absolute; top:280px; left:70px;" >
      <a name="O"></a>
      O
    </div>
  </div>

	<div style="width:1800px; height:420px;">
    <div class="color2" style="position:absolute; top:180px; left:240px;">
      <a name="l"></a>
      l
    </div>
  </div>

	<div style="width:1400px; height:460px;">
    <div class="color3" style="position:absolute; top:140px; left:280px;">
      <a name="i"></a>
      i
    </div>
  </div>
  
  <div style="width:2000px; height:495px;">
    <div class="color4" style="position:absolute; top:260px; left:400px;">
      <a name="v"></a>
      v
    </div>
  </div>
  
  <div style="width:1540px; height:480px;">
    <div class="color3" style="position:absolute; top:230px; left:440px;">
      <a name="i2"></a>
      i
    </div>
</div>

 <div style="width:1540px; height:480px;">
    <div class="color4" style="position:absolute; top:200px; left:770px;">
      <a name="o2"></a>
      o
    </div>
</div>
	
  <div style="width:1800px; height:480px;">
    <div class="color2" style="position:absolute; top:220px; left:630px;">
      <a name="r"></a>
      r
    </div>
	</div>
	
  <div style="width:1320px; height:560px;">
    <div class="color2" style="position:absolute; top:190px; left:500px;">
      <a name="e"></a>
      e
    </div>
	</div>
	
  <div style="width:1400px; height:460px;">
    <div class="color1" style="position:absolute; top:120px; left:640px;">
      <a name="r2"></a>
      R
    </div>
	</div>
	
	<div style="width:1800px; height:500px;">
    <div class="color1" style="position:absolute; top:140px; left:880px;">
      <a name="l2"></a>
      l
    </div>
	</div>
	
	<div style="width:1600px; height:460px;">
    <div class="color2" style="position:absolute; top:140px; left:960px;">
      <a name="l3"></a>
      l
    </div>
	</div>
	
	<div style="width:1540px; height:480px;">
    <div class="color4" style="position:absolute; top:200px; left:1020px;">
      <a name="e2"></a>
      e
    </div>
	</div>
	
	<div style="width:1800px; height:520px;">
    <div class="color3" style="position:absolute; top:190px; left:1130px;">
      <a name="t"></a>
      t
    </div>
	</div>
	
</div>

</div>

<div class="email"> contact:<a href="#O" class="goto"> r </a><a href="#l" class="goto"> o </a><a href="#i" class="goto"> l </a><a href="#v" class="goto"> l </a><a href="#i2" class="goto"> e </a><a href="#e" class="goto"> t </a> &nbsp; <a href="#r" class="goto"> o </a><a href="#r2" class="goto"> l </a><a href="#o2" class="goto"> i </a><a href="#l2" class="goto"> v </a><a href="#l3" class="goto"> i </a><a href="#e2" class="goto"> e </a><a href="#t" class="goto"> r </a></div>
<?php
if (isset($_GET['message']) && $_GET['message'] == 1) {
	echo '<div id="message_envoye">Message envoyé</div>';
}
?> 
<div id="contact">
	<form action="enreg_contact.php" method="POST" name="formulaire">
	<table>
	<tr>
		<td>
		<span class="login color1">Nom:</span>
		</td>
		<td><input type="text" name="nom" maxlength="30"/>
		</td>
	</tr>
	<tr>
		<td>
		<span class="login color2">Prénom:</span>
		</td>
		<td>
		<input type="text" name="prenom" maxlength="20"/> 
		</td>
	</tr>
	<tr>
		<td>
		<span class="login color3">Email:</span>
		</td>
		<td>
		<input type="text" name="email" maxlength="150"/> 
		</td>
	</tr>
	<tr>
		<td>
		<span class="login color4">Message:</span><span class="caract_max color4"> (250 caracatères max)</span>
		</td>
		<td>
		<textarea name="message" id="message" cols="30" rows="6" onkeyup="veriftext()"></textarea> 
		</td>
	</tr>
	<tr >
		<td>
		&nbsp;
		</td>
		<td style="height:65px;">
			<input type="image" name="go" src="images/bouton.png" width="100px" height="40px" alt="Go" />
			<span style="position:relative; left:-82px; top: -15px;"><a href="#"  style="font-family: Helvetica, Arial, sans-serif; color:#ffffff; text-decoration:none;" onclick="valider()">Valider</a></span>
		</td>
	</tr>
	</table>
	</form>
</div>

</body> 

</html>