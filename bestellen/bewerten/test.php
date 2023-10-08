<?php
// Das angegebene Datum
$angegebenesDatum = strtotime('2023-09-24 16:59:34');

// Das aktuelle Datum und die aktuelle Zeit
$aktuellesDatum = time();

// Die Differenz in Sekunden berechnen
$differenzInSekunden = $aktuellesDatum - $angegebenesDatum;

// Die Differenz in Stunden berechnen
$differenzInStunden = $differenzInSekunden / 3600; // 3600 Sekunden entsprechen einer Stunde

// Die Differenz ausgeben
echo "Die Differenz beträgt {$differenzInStunden} Stunden.";
?>