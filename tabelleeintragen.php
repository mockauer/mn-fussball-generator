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
	echo $row['teamname']."<br/>";
		$mysql= "INSERT INTO tabelle (platz,verein,spiele,siege,unentschieden,niederlagen,tore,gegentore,differenz,punkte) VALUES ('0', '".$row['teamname']."', '0', '0' ,'0', '0', '0', '0', '0', '0')";
		
		// echo $mysql."<br/>";
		mysql_query($mysql);
}



?>