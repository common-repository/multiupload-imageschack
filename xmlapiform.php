<?php

$i=0;
$image = array("thumb"=>array(), "ad_link"=>array(), "image_link"=>array(), "cote"=>array());
If (trim($_POST[roadtrip]) == "") {
	$roadtrip = rand(1,1000000000);
}
else {
	$roadtrip = $_POST[roadtrip];
}

while($_FILES[fileupload][name][$i]) {
	$redi[$i] = $_POST[optimage][$i];
	$dimension[$i] = $_POST[optsize][$i];
	/*****************************************************************
	/*      la c'est juste des affichages pour la mise au point      
	
	echo 'nom :'.$_FILES[fileupload][size][$i].'<br>';
	echo 'nom :'.$_FILES[fileupload][name][$i].'<br>';
	echo 'temp : '.$_FILES[fileupload][tmp_name][$i].'<br>';
	echo 'type : '.$_FILES[fileupload][type][$i].'<br>';
	echo 'erreur : '.$_FILES['fileupload']['error'][$i].'<br>';  
	/*****************************************************************/
	if(!$_FILES[fileupload][name][$i]){ 
		echo 'le fichier n\'existe pas';
		exit; }
		if (is_uploaded_file($_FILES[fileupload][tmp_name][$i])) {
			$source[$i] = $_FILES[fileupload][tmp_name][$i];
			$dest[$i] = "/tmp/".$_FILES[fileupload][name][$i];
			copy($source[$i],$dest[$i]);
		}
		else {
			echo 'pas de fichier upload';
		}
	/**********************************************************************
				Sens de l'image et Calcul du rapport largeur hauteur	
	***********************************************************************/
	$image["cote"][$i] = thumbail($dest[$i], $_POST[mini][$i]);	
				
//ici on appelle la fonction qui upload et on met le resultat dans une variable ($xmlstring)
	$xmlString = uploadToImageshack($dest[$i],$redi[$i],$dimension[$i]);
	unlink($source[$i]); unlink($dest[$i]);
	// debut du traitement de la variable $xmlstring
	//echo "xmlString : $xmlString <br /><br />" ; //la j'affiche la variable juste pour m'aider dans la mise au point
	//begin parsing xml data

	if ($xmlString == 'failed') { echo "Une erreur s'est produite"; exit; } // affichage du mesage si erreur
	$xmlData= explode("\n",$xmlString); //ici on decoupe la variable a chaque fin de ligne

	foreach($xmlData as $xmlDatum){ //ici on impute chaque bout au tableau $xmldatum
		$xmlDatum = trim($xmlDatum); //ici on enleve les espaces
		if($xmlDatum != "" && !eregi("links",$xmlDatum) && !eregi("xml",$xmlDatum)){
			$xmlDatum = str_replace(">","<",$xmlDatum);
			list($xmlNull,$xmlName,$xmlValue) = explode("<",$xmlDatum);
			$xmlr[$xmlName] = $xmlValue; //ici on impute au tableau $xmlr[nom] = valeur voir exemple dessous 
			//echo 'nom : '.$xmlName.'<br>valeur : '.$xmlr[$xmlName].'<br>';
		}
	}
	$image["thumb"][$i] = $xmlr["thumb_link"];
	$image["ad_link"][$i] = $xmlr["ad_link"];
	$image["image_link"][$i] = $xmlr["image_link"];
	$i++ ;
	
}


/********************************************************************
			test du tableau
********************************************************************
echo 'nombre d\'image : '.$i.'<br>';	
for ($j=0; $j<$i; $j++) {
	echo 'thumb'.$j.'='.$image["thumb"][$j].'<br>';
	echo 'ad_link'.$j.'='.$image["ad_link"][$j].'<br>';
	echo 'image_link'.$j.'='.$image["image_link"][$j].'<br>';
	echo 'cote'.$j.'='.$image["cote"][$j].'<br>';
	echo '<br>';
}
/****************************************************************************************
			Creation des liens
****************************************************************************************/
for ($j=0; $j<$i; $j++) {
	//$value = '<a href="'.$image["image_link"][$j].'"><img src="'.$image["image_link"][$j].'"'.$image["cote"][$j].'" alt="" title="essai" /></a>';
	$miniature[$j]='<img src="'.$image["thumb"][$j].'" border="0" onclick="copie_lien('.$j.')" />';
	$lightbox[$j]='<input  type="text" name="lien" size="20" value=\'<a href="'.$image["image_link"][$j].'"><img src="'.$image["image_link"][$j].'"'.$image["cote"][$j].'" alt="" title="essai" /></a>\'>';

//echo $lightbox[$j];
}
/****************************************************************************************
			Affichage des liens
****************************************************************************************/
$j=0;
echo '<table><tr>';
for($j=0; $j<= $i; $j++) {
	echo "<td>", $miniature[$j], "</td>\n";
	if ($j-(floor($j/5)*5)==4 || $j==$i) {
		echo '</tr><tr>';
		if ($j<=4) {
			for ($t=0; $t<=$j; $t++) {
			echo "<td align=\"center\"><b>", $lightbox[$t], "</b></td> \n";
			}
			$ligne = $t;
			echo '</tr>' ;	
		}
		else {			
			for ($t=$ligne; $t<=$j; $t++) {
			echo "<td align=\"center\"><b>", $lightbox[$t], "</b></td> \n";
			}
			echo '</tr>' ;
			$ligne=$t;
		}
	}
}		

echo '</tr></table>';
if ($_SERVER['HTTP_HOST']<> "moment-de-detente-chez-peg.fr.nf") {
?>
<script type="text/javascript">
function copie_lien(ordre) {
	var lien = document.getElementsByName("lien");
	var lien1 = " "+ lien[ordre].value+" ";
	parent.tinyMCE.execCommand('mceInsertContent',false,lien1);
	;
}
</script>
<?php
}
/****************************************************************************************
			DEBUT DES FONCTIONS
****************************************************************************************/
//two functions, one for uploading from from file, the other for uploading from url, editing below this line advised only to those who know what they are doing :)

        function uploadToImageshack($filename , $optimage, $optsize) {
                $ch = curl_init("http://www.imageshack.us/index.php");
				/*echo '<br /> redi '.$optimage ;
				echo '<br />';
				echo 'dimension :'.$optsize ;
				echo '<br />';*/
                $envoi['xml']='yes'; 
                $envoi['fileupload']='@'.$filename; 
                $envoi['optimage']= $optimage ; 
                $envoi['optsize']= $optsize ;
                $envoi['public'] ="no";
                $envoi['rembar']='yes'; 
                //$post['resolution']='150x150';
                                

                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 240);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $envoi);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect: ')); //?

                $result = curl_exec($ch); //le retour
                curl_close($ch); // on ferme la connection

                if (strpos($result, '<'.'?xml version="1.0" encoding="iso-8859-1"?>') === false) {
                    echo 'le retour est'.$result;   //j\'affiche la variable retour juste pour mettre au point
	                return 'failed'; // retourne failed si ca a echoué
                } else {
                        return $result; // XML data si c bon il retourne la variable qui contient le fichier XML 
                }
        }
// cette fonction est pour uploader a partir d'une URL
        function uploadURLToImageshack($url) {
                $ch = curl_init("http://www.imageshack.us/transload.php");

                $post['xml']='yes';
                $post['url']=$url;

                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect: '));

                $result = curl_exec($ch);
                curl_close($ch);

                if (strpos($result, '<'.'?xml version="1.0" encoding="iso-8859-1"?>') === false) {
                        return 'failed';
                } else {
                        return $result; // XML data
                }
        }
/***********************************************************/        
/* function taille miniature                               */
/* taille[0] = largeur                                     */
/* taille[1] = hauteur                                     */
/* cote = taille grand coté final                          */
/***********************************************************/

function thumbail($image, $cote) {
	$taille = getimagesize($image);
	if ($taille[0]>$taille[1]) {                      // format paysage
		$largeur = $cote ;
		$hauteur = $taille[1] * $cote / $taille[0];
	}
	else {                                            // format portrait
		$hauteur = $cote;
		$largeur = $taille[0] * $cote / $taille[1];
	}
	
$retour = " width=\"".$largeur."\" height=\"".$hauteur."\" ";
return $retour;
}
?>