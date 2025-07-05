<?php

use Html\WebPage;

$fichier = __DIR__ . '/../src/ods6.txt';

$lettres = strtoupper($_GET['id']);
$wordLetter = str_split($lettres);

$webpage = new Webpage();





$ligne_numero = 0;
$motpossible = 0;
$return  = "";
$handle = fopen($fichier, 'r');
while (($ligne = fgets($handle)) !== false) {
    $mot = trim($ligne);
    $ligne_numero++;


    $dicoLettres = str_split($mot);

    sort($dicoLettres);
    sort($wordLetter);

    if ($dicoLettres == $wordLetter) {
        $motpossible += 1 ;
        $return .= "$mot \n";
    }
}
fclose($handle);


$webpage->appendContent("Il y a $motpossible mot(s) possible(s) : \n");
$webpage->appendContent("$return </br>");

$webpage->appendContent("Possibilité -1 lettre :");

echo $webpage->toHtml();
