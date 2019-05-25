<?php
include("connect_db.php");

// Teams aus DB holen
$sql = 'SELECT
            *
        FROM
            teams';
$res = mysql_query($sql);

$teams = array();
while (($row = mysql_fetch_array($res))){
    $teams[] = $row['id'];
	echo $row['teamname']."<br/>";
}


// Benötigte Variablen setzen
$anzahl  = count($teams);                                       // Anzahl der Teams
$paare   = floor($anzahl / 2);                                  // Anzahl der möglichen Spielpaare
$plan    = array();                                             // Array für den kompletten Spielplan
$tage    = ($anzahl % 2) ? count($teams) : count($teams)-1;     // bei ungerader Anzahl an Teams brauchen wir einen Spieltag mehr
$base    = ($anzahl % 2) ? $anzahl-2 : $anzahl-1;               // die Basis für den Array-Index, bei ungerader Anzahl an Teams
                                                                // fangen wir beim vorletzten Team an

for ($tag = 1; $tag <= $tage; $tag++) {
    if ($anzahl % 2) {
        // letztes Element nach vorne
        array_unshift($teams, array_pop($teams));
    } else {
        // zweites Element mit array(letztes Element, zweites Element) ersetzen,
        // also letztes Element zwischen 1. und 2. Element einfügen
        array_splice($teams, 1, 1, array(array_pop($teams), $teams[1]));
    }

    for ($spiel = 0; $spiel < $paare; $spiel++) {
        $heim = $teams[$spiel];
        $gast = $teams[$base-$spiel];

        $plan[$tag][] = array($heim, $gast);

        /* Rückrunde */
        $plan[$tag+$tage][] = array($gast, $heim);
    }
}
ksort($plan);

// Spielplan ausgeben
echo "Spiel wurde erstellt und in die DB geschrieben";
foreach ($plan as $spieltag => $spiele) {
	

 
    foreach ($spiele as $spielnummer => $paarung) {
	//Spielplan in DB einstellen
	$mysql= "INSERT INTO spiele (id, spieltag,team_heim,team_auswarts,tore_heim,tore_auswarts) VALUES (NULL, '".$spieltag."', '".$paarung[0]."', '".$paarung[1]."','','')";
	


	mysql_query($mysql);

    }

} 

include_once("tabelleeintragen.php");
		echo "<meta http-equiv='refresh' content='1; URL=tabelle.php'/>";

?>