<?php
require 'Marqueur.php';
require 'GoogleMap.php';

$myMap = new GoogleMap();
$myMap->createMap();

$premierMarqueur = new Marqueur(48.8314408, 2.3255684,'Paris','France','Stage 3 mois en développement web');
$premierMarqueur->addMarker();

?>
<script src='https://maps.googleapis.com/maps/api/js?key='>//lien permettant d'obtenir les ressources pour une carte google</script>

<html lang="fr">
    <head>
        <title>Carte Interative</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


    </head>
    <body>
        <h1>Bienvenue </h1>
    </body>
</html>


<div style='overflow:hidden;height:440px;width:700px;'> <!--position de la carte dans la page html-->
    <div id='gmap_canvas' style='height:600px;width:1000px;'></div>
    <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
</div>
