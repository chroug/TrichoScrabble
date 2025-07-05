<?php
$inputFile = 'ods6.txt';

// Ouvrir les 26 fichiers en écriture (append)
$fichiers = [];
foreach (range('A', 'Z') as $lettre) {
    $fichiers[$lettre] = fopen("$lettre.txt", 'w'); // écrasement, ou 'a' pour ajouter
}

// Lire le fichier source ligne par ligne
$handle = fopen($inputFile, 'r');
if ($handle) {
    while (($ligne = fgets($handle)) !== false) {
        $mot = trim($ligne);
        $motMaj = strtoupper($mot);

        foreach (range('A', 'Z') as $lettre) {
            if (strpos($motMaj, $lettre) !== false) {
                fwrite($fichiers[$lettre], "$mot\n");
            }
        }
    }
    fclose($handle);
}

// Fermer tous les fichiers
foreach ($fichiers as $f) {
    fclose($f);
}

echo "Traitement terminé.\n";
