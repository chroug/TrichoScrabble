<?php

use Html\WebPage;

$webpage = new Webpage();

$webpage->setTitle('TrichoScrabble');
$webpage->appendCssUrl("css/indexStyle.css");
$webpage->appendContent('<h1>TrichoScrabble</h1>');

$webpage->appendContent(<<<HTML
    <form name="lettres" method="GET" action="chercherMot.php">
    <label>ECRIRE VOS LETTRES ICI <input name="id" type="text"></label>
    <button type="submit">Rechercher</button>


HTML
);


echo $webpage->toHTML();