<?php session_start();?>
<!DOCTYPE html>
<html> 
  <head> 	
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
	<title>JaimeLaGeo</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="keywords" content="J'aime la géo,géographie,jeu,game,google maps, accueil, jaimelageo, jquery" />
	<meta name="description" content="Page d'accueil du site j'aime la géo, site de jeu en ligne gratuit de géographie. Testez vos connaissances sur le Monde et la France" />
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
	body { background:url(images/ciel.jpg);height: 100%; margin: 0; padding: 0 }      
	#map_canvas { width:800px; height:500px;  border:3px solid #99c; }   
	.Intro {
		color:#ffff00;
		font-size:20px;
	}
	.Indice {
		color:#ffff00;
		font-size:20px;
	}
	#inscription {
		position:absolute;
		left:100px;
		top:55px;
		color:#ffff00;
		font-size:20px;
		font-weight:bold;
		z-index:2;
	}
	#rapide {
		position:absolute;
		left:10px;
		top:100px;
		color:#ffff00;
		font-size:24px;
		font-weight:bold;
	}
	#trouve {
		position:absolute;
		left:10px;
		top:130px;
		color:#ffff00;
		font-size:24px;
		font-weight:bold;
	}
	#titre {
		position:absolute;
		left:45%;
		top:5px;
		color:#ffff00;
		font-size:24px;
		font-weight:bold;
	}
	#login {
		position:absolute;
		left:5%;
		top:5px;
		color:#ffff00;
		font-size:24px;
		font-weight:bold;
	}
	#chrono {
		position:absolute;
		left:80%;
		top:5px;
		color:#ffff00;
		font-size:24px;
		font-weight:bold;
	}
	#debutant {
		position:absolute;
		left:800px;
		top:100px;
	}
	#intermediaire {
		position:absolute;
		left:900px;
		top:100px;
	}
	#international {
		position:absolute;
		left:1000px;
		top:100px;
	}
	#rejoue {
		position:absolute;
		left:1100px;
		top:100px;
	}
	#photo2 {
		position:relative;
		left:10px;
		top:-300px;
		height:0px;
		visibility="hidden";
	}
	#photo3 {
		position:relative;
		left:10px;
		top:-300px;
		height:0px;
		visibility="hidden";
	}
	
	#accordion {display="none";}
	#accordion2 {display="none";}
	#accordion3 {display="none";}
	#Indice {display="none";}
	#Intro {display="none";}
	#photo1 {visibility="hidden";}

	</style>     
	<script type="text/javascript"   src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCC3o4zcL-VFDIHek5E_KAhmZ0V8D-IOok&sensor=false&language=fr&region=FR"></script>
	<script type="text/javascript">
	var xhr = null;
	var xhr2 = null;

	//Créons une fonction de création d'objet XMLHttRequest
	function get_Xhr()
	 {
	  if(window.XMLHttpRequest)
	   {
		xhr = new XMLHttpRequest();
	   }
	  else if(window.ActiveXOject)
	   {
		try
		 {
		  xhr = new ActiveXObject("Msxml2.XMLHTTP");
		 }
		catch(e)
		 {
		  try
		   {
			xhr = new ActiveXObject("Microsoft.XMLHTTP");
		   }
		  catch(el)
		   {
			xhr = null;
		   }
		 }
	   }
	  else
	   {
		alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest\nVeuillez le mettre à jour");
	   }
	  return xhr;
	 }
	 
	 function get_Xhr2()
	 {
	  if(window.XMLHttpRequest)
	   {
		xhr2 = new XMLHttpRequest();
	   }
	  else if(window.ActiveXOject)
	   {
		try
		 {
		  xhr2 = new ActiveXObject("Msxml2.XMLHTTP");
		 }
		catch(e)
		 {
		  try
		   {
			xhr2 = new ActiveXObject("Microsoft.XMLHTTP");
		   }
		  catch(el)
		   {
			xhr2 = null;
		   }
		 }
	   }
	  else
	   {
		alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest\nVeuillez le mettre à jour");
	   }
	  return xhr2;
	 }
 
	var lyon = new google.maps.LatLng(45.768002, 4.836731);
	var paris = new google.maps.LatLng(48.85,2.32);
	var map;
	var markersArray = [];

	
	function HomeControl(controlDiv, map) {  
		// Set CSS styles for the DIV containing the control  
		// Setting padding to 5 px will offset the control  
		// from the edge of the map.
		controlDiv.style.padding = '5px';  
		// Set CSS for the control border.  
		var controlUI = document.createElement('DIV');
		controlUI.style.backgroundColor = 'white';  
		controlUI.style.borderStyle = 'solid';  
		controlUI.style.borderWidth = '2px';  
		controlUI.style.cursor = 'pointer';  
		controlUI.style.textAlign = 'center'; 
		controlUI.title = 'Cliquez pour mettre la carte sur Lyon';  
		controlDiv.appendChild(controlUI);  
		// Set CSS for the control interior.  
		var controlText = document.createElement('DIV');  
		controlText.style.fontFamily = 'Arial,sans-serif';  
		controlText.style.fontSize = '12px';  
		controlText.style.paddingLeft = '4px';  
		controlText.style.paddingRight = '4px';  
		controlText.innerHTML = 'Lyon';  
		controlUI.appendChild(controlText);  
		google.maps.event.addDomListener(controlUI, 'click', function() {    map.setCenter(lyon), map.setZoom(11)  });
	}
	
	function ParisControl(controlDiv, map) {  
		// Set CSS styles for the DIV containing the control  
		// Setting padding to 5 px will offset the control  
		// from the edge of the map.
		controlDiv.style.padding = '5px';  
		// Set CSS for the control border.  
		var controlUI = document.createElement('DIV');
		controlUI.style.backgroundColor = 'white';  
		controlUI.style.borderStyle = 'solid';  
		controlUI.style.borderWidth = '2px';  
		controlUI.style.cursor = 'pointer';  
		controlUI.style.textAlign = 'center'; 
		controlUI.title = 'Cliquez pour mettre la carte sur Paris';  
		controlDiv.appendChild(controlUI);  
		// Set CSS for the control interior.  
		var controlText = document.createElement('DIV');  
		controlText.style.fontFamily = 'Arial,sans-serif';  
		controlText.style.fontSize = '12px';  
		controlText.style.paddingLeft = '4px';  
		controlText.style.paddingRight = '4px';  
		controlText.innerHTML = 'Paris';  
		controlUI.appendChild(controlText);  
		google.maps.event.addDomListener(controlUI, 'click', function() {    map.setCenter(paris), map.setZoom(11)  });
	}
	
	function initialize() {
		var myOptions = {   
			center: new google.maps.LatLng(46.768002, 4.036731),
			mapTypeControl: true,
			mapTypeControlOptions: {      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU    },
			panControl: true,
			zoomControl: true, 
			zoomControlOptions: {       position: google.maps.ControlPosition.BOTTOM_LEFT    },
			scaleControl: true,
			zoom: 6,
			mapTypeId: google.maps.MapTypeId.ROADMAP        
		}; 
		map = new google.maps.Map(document.getElementById("map_canvas"),             myOptions);
		
		//pour avoir les photos géolocalisées avec flick
		//var georssLayer = new google.maps.KmlLayer('http://api.flickr.com/services/feeds/geo/?g=322338@N20&lang=en-us&format=feed-georss');
		//georssLayer.setMap(map);
		
		//ajout évènement click
		google.maps.event.addListener(map, 'click', function(event) {
			clearOverlays();
			placeMarker(event.latLng, map);  
			}
		);
		
		// Create the DIV to hold the control and call the HomeControl() constructor  
		// passing in this DIV.  
		var homeControlDiv = document.createElement('DIV');  
		var homeControl = new HomeControl(homeControlDiv, map);  
		homeControlDiv.index = 1;  
		map.controls[google.maps.ControlPosition.TOP_RIGHT].push(homeControlDiv);
		
		// Create the DIV to hold the control and call the HomeControl() constructor  
		// passing in this DIV.  
		var parisControlDiv = document.createElement('DIV');  
		var parisControl = new ParisControl(parisControlDiv, map);  
		parisControlDiv.index = 1;  
		map.controls[google.maps.ControlPosition.TOP_RIGHT].push(parisControlDiv);
	} 
	
	function placeMarker(position, map) {
	
		var nameLat="";
		var nameLong="";
		var pass=0;
		var chauff=0;
		var presque=0;
		/*for (i in position) {			
			//if (i.substring(1,2) == "a" && i.length == 2 ) {
			if (i.length == 2 ) {
				if (pass == 0) {
					nameLat = i;
					//alert(i);
					pass=1;
				}
				else {
					nameLong = i;
					//alert("i:"+i);
				}
			}
		}*/

		latitude1 = position.lat();
		longitude1 = position.lng();
		/*latitude1=eval("position."+nameLat);
		longitude1=eval("position."+nameLong);*/
		document.getElementById("latitude").innerHTML=latitude1;
		document.getElementById("longitude").innerHTML=longitude1;
        var marker = new google.maps.Marker({
          position: position,
		  draggable: true,
          map: map
        });
   	    markersArray.push(marker);
        map.panTo(position);
		if (Math.round(latitude1*100)/100 == document.getElementById('image'+niveau).alt && Math.round(longitude1*100)/100 == document.getElementById('image'+niveau).lang) {
			//BRAVO !!
			document.getElementById('div_bravo').style.left="500px";
			document.getElementById('div_bravo').style.top="300px";
			clearInterval(timer);	
			clearInterval(timer2);			
			//appelle Ajax pour enregistrer score
			get_Xhr();
			var score=0;
			xhr.onreadystatechange = function()
			   {
				if(xhr.readyState == 4 && xhr.status == 200)
				 {
				  // Que fera AJAX si tout se passe bien
				   score=xhr.responseText;
				   document.getElementById('temps_fin').innerHTML = document.getElementById('chrono').innerHTML.substring(9)+"s, score : "+score+" points";
					$("#a1").click();	
				 }
			   }
			xhr.open("GET", 'enreg_score.php?score='+temps+'&niveau='+niveau+'&lieu='+id_lieu, true); 
			xhr.send();			
			
		}
		else {
			if (document.getElementById('image'+niveau).alt < (Math.round(latitude1*100)/100)) {
				chauff=0;
				if ((Math.round(latitude1*100)/100 - document.getElementById('image'+niveau).alt) <= 0.03)  {
					chauff=1;
				}
			}
			else {
				chauff=0;
				if ((document.getElementById('image'+niveau).alt - Math.round(latitude1*100)/100) <= 0.03 ) {
					chauff=1;
				}
			}
			if (document.getElementById('image'+niveau).lang < (Math.round(longitude1*100)/100)) {
				if ((Math.round(longitude1*100)/100 - document.getElementById('image'+niveau).lang) <= 0.03) {
					chauff=chauff+1;
				}
			}
			else {
				if ((document.getElementById('image'+niveau).lang - Math.round(longitude1*100)/100) <= 0.03) {
					chauff=chauff+1;
				}
			}
			if (chauff==2) {
				alert('Tu chauffes !');				
			}	

			if (document.getElementById('image'+niveau).alt < (Math.round(latitude1*100)/100)) {
				presque=0;
				if ((Math.round(latitude1*100)/100 - document.getElementById('image'+niveau).alt) <= 0.08)  {
					presque=1;
				}
			}
			else {
				presque=0;
				if ((document.getElementById('image'+niveau).alt - Math.round(latitude1*100)/100) <= 0.08 ) {
					presque=1;
				}
			}
			if (document.getElementById('image'+niveau).lang < (Math.round(longitude1*100)/100)) {
				if ((Math.round(longitude1*100)/100 - document.getElementById('image'+niveau).lang) <= 0.08) {
					presque=presque+1;
				}
			}
			else {
				if ((document.getElementById('image'+niveau ).lang - Math.round(longitude1*100)/100) <= 0.08) {
					presque=presque+1;
				}
			}
			if (presque==2 && chauff!=2) {
				alert('Pas loin !');				
			}				
		}	
      }
	
		// Removes the overlays from the map, but keeps them in the array
	function clearOverlays() {
	  if (markersArray) {
		for (i in markersArray) {
		  markersArray[i].setMap(null);
		}
	  }
	}	
    </script>	

<!-- *************************************** Magic zoom******************** -->	
	 <!-- link to magiczoom.css file -->
     <link href="css/magiczoom.css" rel="stylesheet" type="text/css" media="screen"/>
     <!-- link to magiczoom.js file -->
     <script src="js/magiczoom.js" type="text/javascript"></script>
	 <style type="text/css">
		   /* Styles for zoom pup window (that one what move with mouse above small image) 90a8d6*/
			.MagicZoomPup {
				background:     #6699ff;
				border:         1px solid #022e6f;
		  }
			/* Styles for header on large zoom window */
			.MagicZoomHeader {
				background:     #6699ff;
				font-size: 12px;
			}
			/* Styles for large zoom window */
			.MagicZoomBigImageCont {
				border:         1px solid #6699ff;
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
	
<!-- *************************************** Bravo fadding ***********************-->	
  <style type='text/css'>
      #div_bravo { position:absolute; z-index:2; top:0px; left:0px;width:450px; height:90px; color:#ffff00; }
      #div1 { position:relative; width:450px; height:180px; 
        font-size:36px; text-align:center; 
        color:#ffff00; background:#6699ff;
        padding-top:25px; 
        top:0px; left:0px; display:none; }
      #span1 { display:none; }
	  #a2 { text-decoration:none; color:#ffff00; font-size:20px;}
  </style>	
 <script src="js/jquery-latest.js"></script>
 
 
<!-- *************************************** indice accordion ***********************-->	
	<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
	<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.10.custom.min.js"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
	<script>
	var pass_indice=1;
	
	$(function() {
		$("#accordion").accordion({ 
					header: "h3",
					collapsible: true,
					autoHeight: false,
					active: 3,
					zoom: 1});
	});
	
	$(function() {
		$("#accordion2").accordion({ 
					header: "h3",
					collapsible: true,
					autoHeight: false,
					active: 3,
					zoom: 1});
	});
	
	$(function() {
		$("#accordion3").accordion({ 
					header: "h3",
					collapsible: true,
					autoHeight: false,
					active: 3,
					zoom: 1});
	});
	
	function Ajoute_1(compteur) {
		
		if (compteur != pass_indice) {
			$("#accordion").accordion( "activate" , pass_indice-1 );
		}
		else {
			pass_indice++;
		}
		temps=temps+60;
	}
	
	function Ajoute_2(compteur) {
		
		if (compteur != pass_indice) {
			$("#accordion2").accordion( "activate" , pass_indice-1 );
		}
		else {
			pass_indice++;
		}
		temps=temps+60;
	}
		
	</script>

<!-- *************************************** horloge ***********************-->		
	<SCRIPT language="javascript">
	var temps=0;
	var timer=0;
	var timer2=0;

   function Horloge() {
		temps=temps+1;
		secondes=temps%60;
		minutes=Math.floor(temps/60);
		minutes=minutes%60;
		heures=Math.floor(temps/3600);
		if (secondes < 10) {
			secondes="0"+secondes;
		}		
		if (minutes < 10) {
			minutes="0"+minutes;
		}
		if (heures < 10) {
			heures="0"+heures;
		}
		document.getElementById('chrono').innerHTML="Temps : "+heures+":"+minutes+":"+secondes;
   }
  
</SCRIPT>

<!-- *************************************** session ***********************-->		
	<SCRIPT language="javascript">
   function affiche_session() {
		 <?php if (isset($_SESSION['pseudo']) && $_SESSION['pseudo'] != "") {
			echo "document.getElementById('login').innerHTML='Bonjour ".$_SESSION['pseudo']."';";
		}		
		?>
		document.getElementById("accordion").style.display="none";
		document.getElementById("accordion2").style.display="none";
		document.getElementById("accordion3").style.display="none";
		document.getElementById("Indice").style.display="none";
		document.getElementById("Intro").style.display="none";
		document.getElementById("photo1").style.visibility="hidden";
		document.getElementById("photo2").style.visibility="hidden";
		document.getElementById("photo3").style.visibility="hidden";
		<?php if (isset($_GET['go']) && $_GET['go'] == "1") {
			echo "go_debutant();";
		}		
		?>
   }   
   </SCRIPT>
   
<!-- *************************************** bouton debutant confirmé ***********************-->   
<SCRIPT language="javascript">
var niveau=0; //correspond aussi au numero image
var pass_debutant=0;
var pass_intermediaire=0;
var pass_monde=0;
var id_lieu=0;

   function go_debutant(id_lieu_param) {
		document.getElementById("rapide").innerHTML="Trouvez la photo en cliquant sur la carte ! Soyez rapide et";
		document.getElementById("trouve").innerHTML="trouvez l'endroit où a été prise une photo à <span style='color:#e73e01'>300m</span> près !";
		niveau=1; //correspond aussi au numero image
		id_lieu = id_lieu_param;
		if (pass_debutant == 0) {
			temps=0;
			clearInterval(timer2);	
		    timer=setInterval("Horloge()", 1000);
			pass_debutant = 1;
			 
			 document.getElementById("accordion").style.display="block";
			 document.getElementById("accordion2").style.display="none";
			 document.getElementById("accordion3").style.display="none";
			 document.getElementById("Indice").style.display="block";
			 document.getElementById("Intro").style.display="block";
			 document.getElementById("photo1").style.visibility="visible";
			 document.getElementById("photo2").style.visibility="hidden";
			 document.getElementById("photo3").style.visibility="hidden";			 
		 }
		 else {
			alert('Vous ne pouvez plus revenir en mode débutant.');
		 }
    } 

 function go_intermediaire(id_lieu_param) {
		niveau=2; //correspond aussi au numero image
		document.getElementById("rapide").innerHTML="Trouvez la photo en cliquant sur la carte ! Soyez rapide et";
		document.getElementById("trouve").innerHTML="trouvez l'endroit où a été prise une photo à <span style='color:#e73e01'>300m</span> près !";
		id_lieu = id_lieu_param;
		if (pass_intermediaire == 0) {
			temps=0;
			clearInterval(timer);		
			timer2=setInterval("Horloge()", 1000);
			pass_intermediaire=1;
			//document.getElementById("bouton1").disabled=true;
			 
		 document.getElementById("accordion").style.display="none";
		 document.getElementById("accordion2").style.display="block";
		 document.getElementById("accordion3").style.display="none";
		 document.getElementById("Indice").style.display="block";
		 document.getElementById("Intro").style.display="block";
		 document.getElementById("photo1").style.visibility="hidden";
		 document.getElementById("photo2").style.visibility="visible";
		 document.getElementById("photo3").style.visibility="hidden";
		 document.getElementById("photo2").style.top=
		 <?php
			include('connexion.php');
		 
			$requete = "SELECT * from lieu where Id_pays=1 and id_niveau=2 ORDER BY RAND() limit 1";
			$resultat = mysql_query($requete);
			while ($ligne = mysql_fetch_assoc($resultat)) {
				$id2=$ligne['Id'];
				$nom2=$ligne['Nom'];
				$latitude2=$ligne['Latitude'];
				$longitude2=$ligne['Longitude'];
				$image2=$ligne['Image'];
			}	
		 
			$requete = "SELECT * from indice where Id_lieu=".$id2." ORDER by ordre";
			$resultat = mysql_query($requete);			
			$compteur=0;
			while ($ligne = mysql_fetch_assoc($resultat)) {
				$compteur++;
			}
			if ($compteur == 1) {
				echo "'-290px';";
			}
			else if ($compteur == 2) {
				echo "'-270px';";
			}
			else {
				echo "'-250px';";
			}
		 ?>	
		 }
		 else {
			alert('Vous ne pouvez plus revenir en mode intermédiaire.');
		 }
    } 

	function go_monde(id_lieu_param) {
		niveau=3; //correspond aussi au numero image
		document.getElementById("rapide").innerHTML="Trouvez la photo en cliquant sur la carte ! Soyez rapide et";
		document.getElementById("trouve").innerHTML="trouvez l'endroit où a été prise une photo à <span style='color:#e73e01'>300m</span> près !";
		id_lieu = id_lieu_param;
		if (pass_monde == 0) {
			temps=0;
			clearInterval(timer);		
			timer3=setInterval("Horloge()", 1000);
			pass_monde=1;
			//document.getElementById("bouton1").disabled=true;
		}	 
		 document.getElementById("accordion").style.display="none";
		 document.getElementById("accordion2").style.display="none";
		 document.getElementById("accordion3").style.display="block";
		 document.getElementById("Indice").style.display="block";
		 document.getElementById("Intro").style.display="block";
		 document.getElementById("photo1").style.visibility="hidden";
		 document.getElementById("photo2").style.visibility="hidden";
		 document.getElementById("photo3").style.visibility="visible";
		 document.getElementById("photo3").style.top=
		 <?php
			include('connexion.php');
		 
			$requete = "SELECT * from lieu where Id_pays=2 ORDER BY RAND() limit 1";
			$resultat = mysql_query($requete);
			while ($ligne = mysql_fetch_assoc($resultat)) {
				$id3=$ligne['Id'];
				$nom3=$ligne['Nom'];
				$latitude3=$ligne['Latitude'];
				$longitude3=$ligne['Longitude'];
				$image3=$ligne['Image'];
			}	
		 
			$requete = "SELECT * from indice where Id_lieu=".$id3." ORDER by ordre";
			$resultat = mysql_query($requete);			
			$compteur=0;
			while ($ligne = mysql_fetch_assoc($resultat)) {
				$compteur++;
			}
			if ($compteur == 1) {
				echo "'-290px';";
			}
			else if ($compteur == 2) {
				echo "'-270px';";
			}
			else {
				echo "'-250px';";
			}
		 ?>	
    } 
	
function go_rejoue() {
	window.location.href="accueil.php?go=1"
} 
</SCRIPT>

   
</head> 
<body onload="affiche_session();initialize();" >
	<div id="login"></div>
	<div id="titre">J'aime la Géo !</div>
	<div id="inscription">Inscrivez-vous afin de cumuler votre score ! >>></div>	
	<div id="chrono">Temps :</div>
	<div id="rapide" >Pour commencer à jouer, cliquer sur le bouton Débutant </div>
	<div id="trouve">ou Confirmé.</div>
	<?php
	$requete = "SELECT * from lieu where Id_pays=1 and id_niveau=1 ORDER BY RAND() limit 1";
	$resultat = mysql_query($requete);
	while ($ligne = mysql_fetch_assoc($resultat)) {
		$id=$ligne['Id'];
		$nom=$ligne['Nom'];
		$latitude=$ligne['Latitude'];
		$longitude=$ligne['Longitude'];
		$image=$ligne['Image'];
	}	
	
	?>
	<div id="debutant">
		<input type="image" name="go"  src="images/bouton.png" width="100px" height="40px" alt="Go" />
		<span style="position:relative; left:-86px; top: -17px;">
			<a href="#"  id="bouton1" style="font-family: Helvetica, Arial, sans-serif; color:#ffffff; text-decoration:none;" onclick="go_debutant(<?php echo $id;?>)">Débutant</a>
		</span>
	</div>
	<div id="intermediaire">
		<input type="image" name="go" src="images/bouton.png" width="100px" height="40px" alt="Go" />
		<span style="position:relative; left:-86px; top: -17px;">
			<a href="#"  style="font-family: Helvetica, Arial, sans-serif; color:#ffffff; text-decoration:none;" onclick="go_intermediaire(<?php echo $id2;?>)">Confirmé</a>
		</span>
	</div>
	<div id="international">
		<input type="image" name="go" src="images/bouton.png" width="100px" height="40px" alt="Go" />
		<span style="position:relative; left:-86px; top: -17px;">
			<a href="#"  style="font-family: Helvetica, Arial, sans-serif; color:#ffffff; text-decoration:none;" onclick="go_monde(<?php echo $id3;?>)"> &nbsp; Monde</a>
		</span>
	</div>
	<div id="rejoue">
		<input type="image" name="go" src="images/bouton.png" width="100px" height="40px" alt="Go" />
		<span style="position:relative; left:-86px; top: -17px;">
			<a href="#"  style="font-family: Helvetica, Arial, sans-serif; color:#ffffff; text-decoration:none;" onclick="go_rejoue()">Rejouer</a>
		</span>
	</div>
		
	<?php	
	include('menu.php');		
	?>
	<table width="100%" >
	<tr>
		<td width="30%" >
			<br><br>
			<span id="Indice" class="Indice">Attention, chaque indice lu ajoute 1 minute !</span>
			<div id="accordion">
				<?php
					$requete = "SELECT * from indice where Id_lieu=".$id." ORDER by ordre";
					$resultat = mysql_query($requete);
					
						$compteur=0;
						while ($ligne = mysql_fetch_assoc($resultat)) {
							$compteur++;
							echo '<h3><a href="#" onclick="Ajoute_1('.$compteur.')">Indice '.$compteur.'</a></h3>';
							echo "<div><p>".$ligne['texte']."</p></div>";
						}
				
					?>		
			</div>
			<div id="accordion2">
				<?php
					$requete = "SELECT * from indice where Id_lieu=".$id2." ORDER by ordre";
					$resultat = mysql_query($requete);
					
						$compteur=0;
						while ($ligne = mysql_fetch_assoc($resultat)) {
							$compteur++;
							echo '<h3><a href="#" onclick="Ajoute_2('.$compteur.')">Indice '.$compteur.'</a></h3>';
							echo "<div><p>".$ligne['texte']."</p></div>";
						}
				
					?>		
			</div>
			<div id="accordion3">
				<?php
					$requete = "SELECT * from indice where Id_lieu=".$id3." ORDER by ordre";
					$resultat = mysql_query($requete);
					
						$compteur=0;
						while ($ligne = mysql_fetch_assoc($resultat)) {
							$compteur++;
							echo '<h3><a href="#" onclick="Ajoute_2('.$compteur.')">Indice '.$compteur.'</a></h3>';
							echo "<div><p>".$ligne['texte']."</p></div>";
						}
				
					?>		
			</div>
			<br />
			<span id="Intro" class="Intro">Voici la photo à trouver :</span><br /> <br />	
			<div id="photo1">	
			<?php
			echo '<a  href="photos/'.$image.'" class="MagicZoom" rel="show-title: bottom" title="'.$nom.'">';
			echo '<img src="photos/'.$image.'" id="image1" alt="'.$latitude.'" lang="'.$longitude.'" width="250px" height="250px"/>';
			echo "</a>";
			?>
			</div>	
			<div id="photo2" >	
			<?php
			echo '<a  href="photos/'.$image2.'" class="MagicZoom" rel="show-title: bottom" title="'.$nom2.'">';
			echo '<img src="photos/'.$image2.'" id="image2" alt="'.$latitude2.'" lang="'.$longitude2.'" width="250px" height="250px"/>';
			echo "</a>";
			?>
			</div>	
			<div id="photo3" >	
			<?php
			echo '<a  href="photos/'.$image3.'" class="MagicZoom" rel="show-title: bottom" title="'.$nom3.'">';
			echo '<img src="photos/'.$image3.'" id="image3" alt="'.$latitude3.'" lang="'.$longitude3.'" width="250px" height="250px"/>';
			echo "</a>";
			?>
			</div>				
		</td>
		<td width="70%" valign="top">
			<br /><br />
			<div id="map_canvas"></div><br/>
			<div id="latitude" class="Intro" style="width:760px; height:20px; text-align:right;">Latitude</div>
			<div id="longitude" class="Intro" style="width:760px; height:20px; text-align:right;">Longitude</div>
		</td>
	</tr>
	</table>

	<div id="div_bravo">
       <a id="a1" href="#"></a>
        <div id="div1"><span id="span1">BRAVO ! <br />Tu as trouvé en <div id="temps_fin"></div><a id="a2" href="accueil.php?go=1">Clique ici pour continuer</a></span></div>
    </div>
	<script>
        $("#a1").click(function () {
          $("#div1").fadeIn(3000, function () {
            $("#span1").fadeIn(400);
          });
          return false;
        }); 
      </script>


</body> 

</html>