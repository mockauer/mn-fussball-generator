<?php
include("connect_db.php");

$anzahlspieltage="SELECT max(spieltag) AS max FROM `spiele`";
$maxspieltage=0;
$queryspieltag=mysql_query($anzahlspieltage);
if(!$queryspieltag)echo "Fehler";
else {
 $row = mysql_fetch_row($queryspieltag);
 $maxspieltage=$row[0];
}
 $spieltagarray=array();

 
for($i=1; $i<=$maxspieltage; $i++){


echo "<a href='test.php?spieltag=".$i."'>".$i."</a> | "; 

$spieltagarray[]=array($i);
// $spieltagerg="SELECT * FROM teams RIGHT JOIN spiele ON teams.id = spiele.team_heim WHERE spieltag=".$i;

// echo $spieltagerg;

// $ergebenisse=mysql_query($spieltagerg);




// if(!$ergebenisse)echo "Fehler";
// else {

// $dsatz=  mysql_fetch_assoc($ergebenisse)

// print_r($dsatz);


// while ($dsatz=  mysql_fetch_array($ergebenisse)){
// echo "<br/><br/>Spieltag : ".$i."<br/>Heimteam: ";
// while (($row = mysql_fetch_array($queryspieltag))){
// $heimteam[]=array[$spieltag][$dsatz["teamname"]];
// echo $dsatz["teamname"]."";

// $spieltagarray[]=array($i,$dsatz["teamname"]);

// }
// print_r($spieltagarray[$i]); 
// }

/*Auswärtsteam*/

// $spieltagerg="SELECT * FROM teams RIGHT JOIN spiele ON teams.id = spiele.team_auswarts WHERE spieltag=".$i;

// echo $spieltagerg;

// $ergebenisse=mysql_query($spieltagerg);




// if(!$ergebenisse)echo "Fehler";
// else {



// while ($dsatz=  mysql_fetch_array($ergebenisse)){
// echo "<br/><br/>Spieltag : ".$i."<br/>Auswärtsteam: ";

// echo $dsatz["teamname"]."";

// $spieltagarray[]=array($i,$dsatz["teamname"]);
// }
// }

// echo "<br/><br/>";
}

/*Heimteam*/
// print_r( $spieltagarray[0]);
// print_r($spieltagarray);

$spieltag = $_GET["spieltag"];
$heimteam="";
$auswartsteam="";

$spieltagerg="SELECT * FROM teams RIGHT JOIN spiele ON teams.id = spiele.team_heim WHERE spieltag=".$spieltag;

echo $spieltagerg;

$ergebenisse=mysql_query($spieltagerg);




if(!$ergebenisse)echo "Fehler";
else {

// $dsatz=  mysql_fetch_assoc($ergebenisse)

// print_r($dsatz);


while ($dsatz=  mysql_fetch_array($ergebenisse)){
echo "<br/><br/>Spieltag : ".$spieltag."<br/>Heimteam: ";
// while (($row = mysql_fetch_array($queryspieltag))){
// $heimteam[]=array[$spieltag][$dsatz["teamname"]];
echo $dsatz["teamname"];
echo "<br/>".$heimteam;


}
// print_r($spieltagarray[$spieltag]); 
}


/*Auswärts*/
 $spieltagerga="SELECT * FROM teams RIGHT JOIN spiele ON teams.id = spiele.team_auswarts WHERE spieltag=".$spieltag;

echo "<br/><br/>".$spieltagerga;

$ergebenissea=mysql_query($spieltagerga);




if(!$ergebenissea)echo "Fehler";
else {
while ($dsatz=  mysql_fetch_assoc($ergebenissea)){
echo "<br/><br/>Spieltag : ".$spieltag."<br/><br/>Auswärtsteam: ";
// while (($row = mysql_fetch_array($queryspieltag))){

echo $dsatz["teamname"];


}
// print_r($spieltagarray[$spieltag]); 

}

?>