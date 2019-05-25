<?php
//Datenbankdaten
 $dbHost = "localhost";
 $dbUser = "root";
 $dbPass = "localhost";
 $dbName = "liga";

//connect
 $connect = @mysql_connect($dbHost, $dbUser, $dbPass);
 $selectDB = @mysql_select_db($dbName, $connect);
?>