<?php
require 'Marqueur.php';
require 'GoogleMap.php';
require 'BddManager.php';
require 'VueMarqueur.php';

try {//connection à la bdd et verif si erreur ou non
    $BDD = new PDO('mysql:host=localhost;dbname=ptut_carte_interactive','root','');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$laBDD = new BddManager($BDD);
$myMap = new GoogleMap();
$arrayMarqueur = array();


$myMap->createMap();

/*//Ajout d'un marqueur dans la base de donnée
$premierMarqueur = new Marqueur([
            'pays' => 'angleterre',
            'latitude' => 51.5085300,
            'longitude' => -0.1257400,
            'ville'=>'Londre',
            'info' => 'Stage 3 mois en développement web'
                ]);

$premierMarqueur->addMarker();

$laBDD->add($premierMarqueur);
*/

$i=1;//permet de commencer a l'id 1
$n=1;//permet de compter le nombre d'id qui n'existe pas dans la base de données pour ne pas terminer la boucle alors que tout les id ne sont pas 
while( $i<=sizeof($val = $laBDD->countId())+$n){
    if(($res=$laBDD->getId($i))==true){
        $arrayMarqueur[$i] = $laBDD->get($i);
        $arrayMarqueur[$i]->addMarker();
        $i++;
    }else{
        echo('erreur id non existant '.$i);
        $i++;
        $n++;
    }
}
echo('/nombre d id dans la bdd :'.sizeof($val = $laBDD->countId()));

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
