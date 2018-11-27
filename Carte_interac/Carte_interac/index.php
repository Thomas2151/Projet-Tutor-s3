<html lang="fr-fr">
<head>
    <title>Carte interative</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


    <script>window.$q = []; window.$ = window.jQuery = function (a) { window.$q.push(a); };</script>
    <link rel="stylesheet" href="jstree/dist/themes/default/style.min.css" />
    
    
</head>
<body>
    <div id="using_events">
        <ul>
            <li id="r1">
                Root 1
                <ul>
                    <li id="n1">Child 1</li>
                    <li id="n2">Child 2</li>
                </ul>
            </li>
            <li id="r2">
                Root 2
                <ul>
                    <li id="n3">Child 3</li>
                    <li id="n4">Child 4</li>
                </ul>
            </li>
        </ul>
    </div>


            <div id="event_result" style="margin-top:2em; text-align:center;"></div>
     
            <script src="//static.jstree.com/3.3.7/assets/jquery-1.10.2.min.js"></script>
            <script src="//static.jstree.com/3.3.7/assets/jquery.address-1.6.js"></script>
            <script src="//static.jstree.com/3.3.7/assets/vakata.js"></script>
            <script src="//static.jstree.com/3.3.7/assets/dist/jstree.min.js"></script>
            <script>$.each($q, function (i, f) { $(f) }); $q = null;</script>

            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="jstree/dist/jstree.min.js"></script>
            <script src="app.js"></script>
</body>
</html>



<?php
require 'Marqueur.php';
require 'GoogleMap.php';
require 'BddManager.php';
require 'VueMarqueur.php';

try { //connexion à la bdd et verif si erreur ou non
    $BDD = new PDO('mysql:host=localhost;dbname=ptut_carte_interactive','root','');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$laBDD = new BddManager($BDD); //crée une instance de la base de données
$myMap = new GoogleMap(); //crée un objet de type GoogleMap
$arrayMarqueur = array(); //permet de crée une liste permettant d'enregistrer les marqueurs stockés dans la base de données
$myMap->createMap(); //affiche la carte
// site pour obtenir les coordonnées https://www.gps-longitude-latitude.net/longitude-latitude-coordonnees-gps-du-lieu
/*//Ajout d'un marqueur sur la carte et dans la base de donnée
$premierMarqueur = new Marqueur([
            'pays' => 'Australie',
            'latitude' =>   -38.262417,
            'longitude' => 144.580194,
            'ville'=>'Queenscliff',
            'info' => 'Stage 3 mois en développement web'
                ]);

$premierMarqueur->addMarker();

$laBDD->add($premierMarqueur);
*/

/*
$i=1;//permet de commencer a l'idM 1
$n=2;//permet de compter le nombre d'id qui n'existe pas dans la base de données pour ne pas terminer la boucle alors que tout les idM ne sont pas transmiot à la liste
while( $i<=sizeof($val = $laBDD->countidM())+$n){
    if(($res=$laBDD->getidM($i))==true){   //verifie l'existence dans la table
        $arrayMarqueur[$i] = $laBDD->get($i); //ajoute un marqueur dans la liste
        $arrayMarqueur[$i]->addMarker(); //affiche le marqueur sur la carte
        $i++;

    }else{
        //echo('erreur idM non existant '.$i);
        $i++;
        $n++;
    }
}*/

$arrayInfo = array();
$arrayInfo[1]="France";
$arrayInfo[2]="Angleterre";


sizeof($val = $laBDD->countNbPaysIdentique($arrayInfo[1]) );
echo($val['NB']); //PROCHAINE ETAPE AFFICHER LES PAYS DOUBLONS

$i=1;//permet de commencer a l'idM 1
$n=2;//permet de compter le nombre d'id qui n'existe pas dans la base de données pour ne pas terminer la boucle alors que tout les idM ne sont pas transmiot à la liste

while( $i<=sizeof($arrayInfo)){
    $j=1;
    while( $j<=sizeof($val = $laBDD->countNbPaysIdentique($arrayInfo[$i]) ) ){

    $arrayMarqueur[$j]= $laBDD->getPays($arrayInfo[$i]);
    $arrayMarqueur[$j]->addMarker(); //affiche le marqueur sur la carte
    $j++;


    }
    $i++;

}

?>

