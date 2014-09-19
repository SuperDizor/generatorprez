<!DOCTYPE HTML> 
<!-- by SuperDizor - Version 0.1 -->
<html>
<head>
<title>Générateur de Présentation ethor.net</title>
  <link rel="stylesheet" href="style.css">
  <style>
  .wrong {
    margin-top: 5px;
    padding: 5px;
    background-color: #F00;
    border: 2px solid #666;
    width: 40%;
    color: #FFFFFF ;
}
.error {color: #FF0000;}
  </style>
</head>
<body> 

<?php
//VARIABLE
$torrentname = $imgurl = $numberseason = $infoseason = $synopsis = $qualitytext = $codectext = $formattext = $languagetext = $numbershow = $gotext = $mediainfo = $imdburl = $mediainforeplace = "";
//VARIABLE ERROR
$torrentnameErr = $imgurlErr = $numberseasonErr = $synopsisErr = $qualitytextErr = $codectextErr = $formattextErr = $languagetextErr = $numbershowErr = $gotextErr = $mediainfoErr = $imdburlErr = "";
//AJOUT DE CASE A REMPLIR (INPUT)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//UNIVERSAL INPUT
//NOM DU TORRENT
   if (empty($_POST["torrentname"])) {
     $torrentnameErr = "Nom du Torrent Requis";
	 $torrentname = "";
   } else {
	 $torrentname = test_input($_POST["torrentname"]);
   }
//IMAGE DU TORRENT
   if (empty($_POST["imgurl"])) {
     $imgurlErr = "URL Requis";
   $imgurl = "";
   } else {
     $imgurl = test_input($_POST["imgurl"]);
   }

   //SYNOPSIS
   if (empty($_POST["synopsis"])) {
     $synopsisErr = "Nom du Torrent Requis";
	 $synopsis = "";
   } else {
	 $synopsis = test_input($_POST["synopsis"]);
   }
   
	 //LANGUAGE
   if (empty($_POST["languagetext"])) {
     $languagetextErr = "Langue Requise";
   $languagetext = "";
   } else {
     $languagetext = test_input($_POST["languagetext"]);
   }
   //NOMBRE DE GIGAOCTET LE POST
   if (empty($_POST["gotext"])) {
     $gotextErr = "Taille du Post Requis";
   $gotext = "";
   } else {
     $gotext = test_input($_POST["gotext"]);
   }
   //MEDIAINFO
   if (empty($_POST["mediainfo"])) {
     $mediainfoErr = "MediaInfo Requis";
	 $mediainfo = "";
   } else {
	 $mediainfo = test_input($_POST["mediainfo"]);
	 $mediainforeplace = preg_replace("/\r\n|\r|\n/",'<br/>',$mediainfo);
	    //$mediainfo=eregi_replace(chr(13),"<br>",$mediainfo); // replace chr(13) ( LineBreak Char ) with <br> ( Line break html code )
   }
   //IMdb URL
   if (empty($_POST["imdburl"])) {
     $imdburlErr = "URL Requis";
   $imdburl = "";
   } else {
     $imdburl = test_input($_POST["imdburl"]);
   }
   
   //INPUT SERIE
   //NOMBRE DE SAISON
   if (empty($_POST["numberseason"])) {
     $numberseasonErr = "Nombre de Saison Requis";
   $numberseason = "";
   } else {
     $numberseason = test_input($_POST["numberseason"]);
	 if (!preg_match("/^[0-9]*$/",$numberseason)) {
       $numberseasonErr = "Seulement Chiffre accepté"; 
     }
   }
   //NOMBRE DE SAISON
   if (empty($_POST["numbershow"])) {
     $numbershowErr = "Nombre d'épisode Requis";
   $numbershow = "";
   } else {
     $numbershow = test_input($_POST["numbershow"]);
	 if (!preg_match("/^[0-9]*$/",$numbershow)) {
       $numbershowErr = "Seulement Chiffre accepté"; 
     }
   }
   //INFO SUR LA SAISON
   if (empty($_POST["infoseason"])) {
   $infoseason = "";
   } else {
     $infoseason = test_input($_POST["infoseason"]);
   }
  //QUALITY
   if (empty($_POST["qualitytext"])) {
     $qualitytextErr = "Qualité Requise";
   $qualitytext = "";
   } else {
     $qualitytext = test_input($_POST["qualitytext"]);
	 }
	 //CODEC
   if (empty($_POST["codectext"])) {
     $codectextErr = "Codec Requis";
   $codectext = "";
   } else {
     $codectext = test_input($_POST["codectext"]);
	 }
	 //FORMAT
   if (empty($_POST["formattext"])) {
     $formattextErr = "Format Requis";
   $formattext = "";
   } else {
     $formattext = test_input($_POST["formattext"]);
	 }
   
   
}
//INPUT DATA
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<!-- Menu de navigation du site -->
<ul class="navbar">
  <li><a href="home.php">HOME</a>
  <li><a href="application.php">Application</a>
  <li><a href="bluray-film">Blueray - Film</a>
  <li><a href="dvdr-film">DVD-R - Film</a>
  <li><a href="dvdr-serietv">DVD-R - Série-Télé</a>
  <li><a href="hd-film">HD - Film</a>
  <li><a href="hd-serietv">HD - Série-Télé</a>
  <li><a href="jeu.php">Jeu</a>
  <li><a href="musique.php">Musique</a>
  <li><a href="sd-film.php">SD - Film</a>
  <li><a href="sd-serietv.php">SD - Série-Télé</a>
  <li><a href="vcd-film.php">VCD - Film</a>
</ul>

<!-- PRINT ON PAGE--> 
<h1>Générateur de présentation ethor.net</h1>
<h2>Série-Télé / HD </h2>
<p><span class="error">* champs obligatoire.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Nom du Torrent: <br><textarea name="torrentname" rows="1" cols="50"><?php echo $torrentname;?></textarea><span class="error">* <?php echo $torrentnameErr;?></span>
   <br><br>
   Image du torrent "URL": <br><textarea name="imgurl" rows="1" cols="50"><?php echo $imgurl;?></textarea><span class="error">* <?php echo $imgurlErr;?></span>
   <br><br>
   Nombre de Saison: <br><textarea name="numberseason" rows="1" cols="2"><?php echo $numberseason;?></textarea><span class="error">* <?php echo $numberseasonErr;?></span>
   <br>Information suplémentaire ?  <br><textarea name="infoseason" rows="1" cols="50"><?php echo $infoseason;?></textarea>
    <br><br>
	Nombre d'épisode dans la Saison: <br><textarea name="numbershow" rows="1" cols="2"><?php echo $numbershow;?></textarea><span class="error">* <?php echo $numbershowErr;?></span>
	<br><br>
	URL IMDB: <br><textarea name="imdburl" rows="1" cols="50"><?php echo $imdburl;?></textarea><span class="error">* <?php echo $imdburlErr;?></span>
   <br><br>
   Synopsis: <br><textarea name="synopsis" rows="5" cols="50"><?php echo $synopsis;?></textarea><span class="error">* <?php echo $synopsisErr;?></span>
   <br><br>
   Qualité (Ex:Webrip 720p): <br><textarea name="qualitytext" rows="1" cols="20"><?php echo $qualitytext;?></textarea><span class="error">* <?php echo $qualitytextErr;?></span>
   <br>
   Codec (Ex:H264): <br><textarea name="codectext" rows="1" cols="20"><?php echo $codectext;?></textarea><span class="error">* <?php echo $codectextErr;?></span>
   <br>
   Format (Ex:MKV) : <br><textarea name="formattext" rows="1" cols="20"><?php echo $formattext;?></textarea><span class="error">* <?php echo $formattextErr;?></span>
   <br>
   Langue : <br><textarea name="languagetext" rows="1" cols="20"><?php echo $languagetext;?></textarea><span class="error">* <?php echo $languagetextErr;?></span>
   <br><br>
   Taille du Post: <br><textarea name="gotext" rows="1" cols="2"><?php echo $gotext;?></textarea><span class="error">* <?php echo $gotextErr;?></span>
	<br><br>
	MediaInfo: <br><textarea name="mediainfo" rows="35" cols="50"><?php echo $mediainfo;?></textarea><span class="error">* <?php echo $mediainfoErr;?></span>
   <br><br>
   <p><input type="image" name="submit" src="img/button.gif" ALT="Text In Case There Is No Image"></p>
   <!--INPUT TYPE="image" SRC="images/yourButtongif" HEIGHT="30" WIDTH="100" ALT="Text In Case There Is No Image" /-->
   <br>
   
   
<?php
//VARIABLE
//UNIVERSAL VARIABLE
$center1 = "[center]";
$center2 = "[/center]";
$img1 = "[img]";
$img2 = "[/img]";
$imgprez = "http://imageshack.com/a/img690/3914/0bb4.png";
$colorteal = "[color=teal]";
$colorred = "[color=red]";
$colorblue = "[color=blue]";
$colorgreen = "[color=green]";
$size1 = "[size=1]";
$size2 = "[size=2]";
$size3 = "[size=3]";
$size4 = "[size=4]";
$size5 = "[size=5]";
$rmsize = "[/size]";
$bold1 = "[b]";
$bold2 = "[/b]";
$rmcolor = "[/color]";
$imgimbd = "http://imageshack.com/a/img46/4543/yqim.png";
$openurl = "[url=";
$closelink = "]";
$closeurl = "[/url]";
$imgsynopsis = "http://imageshack.com/a/img198/9161/cvfn.png";
$imguploadinfo = "http://imageshack.com/a/img839/4786/i0pw.png";
$rmurl = "[/url]";
$space = " ";
$langue = "Langue :";
$totalpost = "Total du Post :";
$giga = "Go";
$imgmediainfo = "http://imageshack.com/a/img10/4830/tx9d.png";
$quote1 = "[quote]";
$quote2 = "[/quote]";
$thanks = "http://imageshack.com/a/img440/1970/u2l2.png";
$signature = "http://imageshack.com/a/img196/449/4dsd.png";

//VARIABLE SERIE
$infoserie = "http://imageshack.com/a/img703/4166/erob.png";
$numberseasontext = "Nombre de saison: ";
$quality = "Qualité :";
$codec = "Codec :";
$format = "Format :";
$numbershowtext = "Nombre d'épisode dans cette saison: ";

//PRINT INPUT CODE

//CODE DOWNSIDE



//if (!isset($_POST['torrentname']) || empty($_POST['torrentname'])) {
//echo "ERROR";
// error message here

//} else {

if (!empty($_POST['torrentname']) && !empty($_POST['imgurl']) && !empty($_POST['numberseason']) && !empty($_POST['numbershow']) && !empty($_POST['imdburl']) && !empty($_POST['synopsis']) && !empty($_POST['qualitytext']) && !empty($_POST['codectext']) && !empty($_POST['formattext']) && !empty($_POST['languagetext']) && !empty($_POST['gotext']) && !empty($_POST['mediainfo'])){
//si la variable exemple_1 n'est pas vide (et donc existe et est remplie) alors il se passe ceci :
echo "<br><br>";
echo "<h1>VOTRE CODE:</h1>";
echo "<h2>Copier le code en entier ENTRE les 2 lignes</h2>";
echo "____________________________________________________";
echo "<br><br>";
echo $center1,$img1,$imgprez,$img2;
echo "<br>";
echo $colorteal,$size5,$bold1,$torrentname,$bold2,$rmsize,$rmcolor;
echo "<br>";
echo $img1,$imgurl,$img2;
echo "<br><br><br>";
echo $img1,$infoserie,$img2;
echo "<br>";
echo $size4,$colorred,$numberseasontext,$rmcolor,$colorblue,$numberseason,$space,$infoseason,$rmcolor,$rmsize;
echo "<br>";
echo $size4,$colorred,$numbershowtext,$rmcolor,$colorblue,$numbershow,$rmcolor,$rmsize;
echo "<br>";
echo $openurl,$imdburl,$closelink,$img1,$imgimbd,$img2,$closeurl;
echo "<br><br>";
echo $img1,$imgsynopsis,$img2;
echo "<br>";
echo $size3,$colorblue,$synopsis,$rmcolor,$rmsize;
echo "<br><br>";
echo $img1,$imguploadinfo,$img2;
echo "<br>";
echo $colorred,$quality,$rmcolor,$colorblue,$qualitytext,$rmcolor;
echo "<br>";
echo $colorred,$codec,$rmcolor,$colorblue,$codectext,$rmcolor;
echo "<br>";
echo $colorred,$format,$rmcolor,$colorblue,$formattext,$rmcolor;
echo "<br>";
echo $colorred,$langue,$rmcolor,$colorblue,$languagetext,$rmcolor;
echo "<br><br><br>";
echo $size4,$colorred,$totalpost,$rmcolor,$colorblue,$gotext,$rmcolor,$rmsize;
echo "<br><br><br>";
echo $img1,$imgmediainfo,$img2;
echo "<br>";
echo $quote1,$mediainforeplace,$quote2;
echo "<br><br>";
echo $img1,$thanks,$img2;
echo "<br><br>";
echo $img1,$signature,$img2;
echo $center2;
echo "<br><br>";
echo "____________________________________________________";
}
else
{//sinon il ce passe ceci : 
echo "<div class=\"wrong\">Pour générer votre code, veillez remplir les champs requis.</div>";
echo "<div class=\"wrong\">Le code pourra être généré avec tous les informations nécéssaires.</div>";
}

?>

</body>
</html>
