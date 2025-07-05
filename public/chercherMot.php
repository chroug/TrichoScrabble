<?php

$fichier = __DIR__ . '/../src/ods6.txt';

$lettres = $_GET['id'];
$wordLetter = str_split($lettres);

$ligne_numero = 0;
$handle = fopen($fichier, 'r');
while (($ligne = fgets($handle)) !== false) {
    $mot = trim($ligne);
    $ligne_numero++;


    $dicoLettres = str_split($mot);

    sort($dicoLettres);
    sort($wordLetter);

    if ($dicoLettres == $wordLetter) {
        echo 'mot possible : ',$mot,"\n";
    }
}
fclose($handle);

