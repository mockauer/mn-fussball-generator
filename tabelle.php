<?php
include("connect_db.php");

// Teams aus DB holen
$sql = 'SELECT
            *
        FROM
            tabelle';
$res = mysql_query($sql);
$i=1;

echo "<table border='1' width='680px'>";
// echo "<colgroup><col width='auto'><col width='auto'><col width='auto'><col width='auto'><col width='auto'><col width='auto'><col width='auto'><col width='auto'><col width='auto'></colgroup>";
echo "<tr><td align='center'>Platz</td><td align='center'>Verein</td align='center'><td align='center'>Spiele</td><td align='center'>S</td><td align='center'>U</td><td align='center'>N</td><td align='center'>Tore : Gegentore</td><td align='center'>Differenz</td><td align='center'>Punkte</td></tr>";

                 
				   while ($dsatz=  mysql_fetch_assoc($res)){
                   echo "<tr>";
                   echo "<td align='center'>" . $i . "</td>";
                   echo "<td align='center'>" . $dsatz['verein'] . "</td>";
                   echo "<td align='center'>" . $dsatz['spiele'] . "</td>";
                   echo "<td align='center'>" . $dsatz['siege'] . "</td>";
                   echo "<td align='center'>" . $dsatz['unentschieden'] . "</td>";
                   echo "<td align='center'>" . $dsatz['niederlagen'] . "</td>";
                   echo "<td align='center'>" . $dsatz['tore'] ." : ".$dsatz["gegentore"] ."</td>";
				   $dif= $dsatz['tore'] - $dsatz["gegentore"];
                   echo "<td align='center'>" . $dif ."</td>";
                   echo "<td align='center'>" . $dsatz['punkte'] . "</td>";
                   echo "</tr>";
				   $i++;
                   }
echo "</table>";

?>