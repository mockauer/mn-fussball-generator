<?php

include("connect_db.php");

// meins
// $anzahlspieltage="SELECT max(spieltag) AS max FROM `spiele`";
// $queryspieltag=mysql_query($anzahlspieltage);
  
  // while ($dsatz=  mysql_fetch_assoc($queryspieltag) ){
  // echo "Maximale Spieltag: ".$dsatz["max"]."<br/>";
// }


$anzahlspieltage="SELECT max(spieltag) AS max FROM `spiele`";
$maxspieltage=0;
$queryspieltag=mysql_query($anzahlspieltage);
if(!$queryspieltag)echo "Fehler";
else {
 $row = mysql_fetch_row($queryspieltag);
 $maxspieltage=$row[0];
}
 
echo $maxspieltage;

//neuer Spieltag - Schleife
for($j=1; $j <= $maxspieltage; $j++){

$anzahlspiele="SELECT * FROM `spiele` WHERE spieltag=".$j;
// $anzahlspiele="SELECT * FROM `spiele` WHERE spieltag=".($i+$j);
echo "<br/><br/><strong><i>Neuer Spieltag</i></strong><br/>".$anzahlspiele."";
$all=mysql_query($anzahlspiele);
  $num=mysql_num_rows($all);
 
  // while ($dsatz=  mysql_fetch_assoc($all) ){
  // echo "Maximale Spieltag: ".$dsatz["max"]."<br/>";

// }
 
//ERgebnisseermittlung
  for($i=1; $i <=$num; $i++){
	echo "<br/><br/><strong>Spiel: ".$i."</strong><br/>";

$zufall = rand(1,20);
$zufall2 = rand(1,20);

if ($zufall <= 15) {
	$zahl = rand(0,3);

}
else if ($zufall > 15 | $zufall <= 18) {
	$zahl = rand(4,6);

}

else if ($zufall > 18){
	$zahl = rand(7,11);

}

if ($zufall2 <= 17) {
	$zahl2 = rand(0,3);

}
else if ($zufall2 > 17 | $zufall2 <= 19) {
	$zahl2 = rand(4,7);

}

else if ($zufall2 > 19){
	$zahl2 = rand(8,11);

}

// echo "Zufallszahl für Ergebnis: ".$zufall." | ";
// echo "Zufallszahl für Ergebnis: ".$zufall2."<br/><br/>";
echo "<br/>Tore-Heim: ".$zahl." : ".$zahl2." Tore-Auswärts<br/>";


  
$spieltagabfrage= "SELECT * FROM `spiele` WHERE id=".$i;

$spieltag=mysql_query($spieltagabfrage);

  while ($dsatz=  mysql_fetch_assoc($spieltag) )
  {
		
                   echo "Heimteam: " . $dsatz['team_heim'] . " - ";
                   // echo " " . $dsatz['teamname'] . " - ";
                   echo "Auswärtsteam: " . $dsatz['team_auswarts'] . "<br/>";
}



// $mysql="UPDATE spiele SET vorbei=1, `tore_heim` = '".$zahl."',
// `tore_auswarts` = '".$zahl2."' WHERE `spiele`.`id` = ".$i .";";
$mysql="UPDATE spiele SET vorbei=1, `tore_heim` = '".$zahl."',
`tore_auswarts` = '".$zahl2."' WHERE `spiele`.`id` = ".($i+($j-1)*($num)).";";
mysql_query($mysql);
echo $mysql;

}

}



















?>