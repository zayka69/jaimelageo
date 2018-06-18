<?php
function degrade($img,$direction,$color1,$color2)
{
        if($direction=='h')
        {
                $size = imagesx($img);
                $sizeinv = imagesy($img);
        }
        else
        {
                $size = imagesy($img);
                $sizeinv = imagesx($img);
        }
        $diffs = array(
                (($color2[0]-$color1[0])/$size),
                (($color2[1]-$color1[1])/$size),
                (($color2[2]-$color1[2])/$size)
        );
        for($i=0;$i<$size;$i++)
        {
                $r = $color1[0]+($diffs[0]*$i);
                $g = $color1[1]+($diffs[1]*$i);
                $b = $color1[2]+($diffs[2]*$i);
                if($direction=='h')
                {
                        imageline($img,$i,0,$i,$sizeinv,imagecolorallocate($img,$r,$g,$b));
                }
                else
                {
                        imageline($img,0,$i,$sizeinv,$i,imagecolorallocate($img,$r,$g,$b));
                }
        }
        return $img;
}
//$img = imagecreatetruecolor(200,200);
//$img = degrade($img,'v',array(255,255,0),array(0,0,255));
header("Content-type: image/png"); 
include('connexion.php');	

$tableau_score = array(); 
$tableau_pseudo = array(); 

$niveau=$_GET['niveau'];
$requete = "SELECT * from score left join user on score.Id_user = user.Id WHERE id_niveau=".$niveau." ORDER BY Score desc limit 9";
if ($resultat = mysql_query($requete)) {
	/* fetch le tableau associatif */
	$j=0;
	while ($ligne = mysql_fetch_assoc($resultat)) {
		$tableau_score[$j]=$ligne['Score'];
		if ($ligne['Pseudo'] != null) {
			$tableau_pseudo[$j]=$ligne['Pseudo'];
		}
		else {
			$tableau_pseudo[$j]="Anonyme";
		}
		$j++;
	}
}

$largeurImage = 400; 
$hauteurImage = 400; 
//$image = imagecreate($largeurImage, $hauteurImage);  
$image = imagecreatetruecolor($largeurImage, $hauteurImage);       
//$blanc = imagecolorallocate($image, 120, 180, 255);  
$img = degrade($image,'v',array(255,255,0),array(0,0,255));

$noir = imagecolorallocate($image, 0, 0, 0);   
$rouge = imagecolorallocate($image, 255, 0, 0);  

// Affichage du numéro et du nom 
for ($i=1; $i<=$j; $i++) { 
	//imagestring($image, 5, 2,$i*40-7, $i, $noir);
	$hauteurRectangle = round(($tableau_score[$i-1])/5*1000/$tableau_score[0]); 	
	imagettftext($image, 14, 0, 2, $i*40+5, $noir, 'trebuc.ttf' , $i);
	imagettftext($image, 14, 0, 15, $i*40+5, $noir, 'trebuc.ttf' , $tableau_pseudo[$i-1]);	
	imagettftext($image, 14, 0, $hauteurRectangle+160, $i*40+7, $noir, 'trebuc.ttf' , $tableau_score[$i-1]);
	imagefilledrectangle($image,150,$i*40-6, $hauteurRectangle+150, $i*40+6, $rouge); 
} 

imagePng($image); 
imagedestroy($image); 
?>
