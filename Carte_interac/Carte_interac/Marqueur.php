<?php

/**
 * Marqueur short summary.
 *
 * Marqueur description.
 *
 * @version 1.0
 * @author thoma
 */
class Marqueur
{
// Attributs
    private $id ;
    private $pays; // nom du pays pour le marqueur
    private $latitude; // latitude du marqueur
    private $longitude; // longitude du marqueur
    private $ville; // nom de la ville du marqueur
    private $info; // ceci est une petite info affiché sur le marqueur

// Constructeurs
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set'.ucfirst($key);
            // Si le setter correspondant existe
            if (method_exists($this, $method))
            {
                // On appelle le setter
                $this->$method($value);
            }
        }
    }

    //Constructeur qui appelle le constructeur par tableau
    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }
    
    /*Constructeur basique
    public function __construct($latitude,$longitude,$ville,$pays,$info){//permet de crée un point en php

        $this->setPays($pays);
        $this->setLatitude($latitude);
        $this->setLongitude($longitude);
        $this->setVille($ville);
        $this->setInfo($info);
    }*/

// GETTERS/SETTERS
    public function id(){
        $this->id;
    }
    public function setId($newId){
        if ((int)$newId > 0) {
            $this->id = (int)$newId;
        }
    }

    public function latitude() {
        return $this->latitude;
    }
    public function setLatitude($nouvelleLat) {
        $this->latitude=$nouvelleLat;     
    }

    public function longitude() {
        return $this->longitude;
    }
    public function setLongitude($nouvelleLong) {
        
            $this->longitude = $nouvelleLong;      
    }

    public function pays() {
        return $this->pays;
    }
    public function setPays($nouveauPays) {
        $this->pays = $nouveauPays;
    }

    public function info() {
        return $this->info;
    }
    public function setInfo($nouvelleInfo) {
        $this->info = $nouvelleInfo;
    }

    public function ville() {
        return $this->ville;
    }
    public function setVille($nouvelleVille) {
        $this->ville = $nouvelleVille;
    }

// Fonctions
    public function addMarker(){ //permet d'ajouter et de crée le point en javascript à la carte
?><script>
        function addMarker(lat , long,ville,pays,info){
                var marker = new google.maps.Marker({ map: map, position: new google.maps.LatLng(lat,long) });
                var infowindow = new google.maps.InfoWindow({ content: '<strong>'+pays+'</strong><br />'+ville+'<br/>'+info+'<br/><a href="info.php">Info</a>' });
                google.maps.event.addListener(marker, 'click', function () { infowindow.open(map, marker); });
                //infowindow.open(map, marker); //permet de forcer l'ouverture de la page info au dessus du ping
        }
        google.maps.event.addDomListener(window, 'load', function () {
        addMarker(
    lat = <?php echo(json_encode($this->latitude())); ?> ,
    long = <?php echo(json_encode($this->longitude())); ?>,
    ville = <?php echo(json_encode($this->ville())); ?>,
    pays = <?php echo(json_encode($this->pays())); ?>,
    info = <?php echo(json_encode($this->info())); ?>
    );
            });
        </script>


    <?php
    }


}

?>