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
//Attributs
    private $pays;
    private $latitude;
    private $longitude;
    private $ville;
    private $info;

//Constructeur
    public function __construct($latitude,$longitude,$ville,$pays,$info){//permet de crée un point en php
        $this->setPays($pays);
        $this->setLatitude($latitude);
        $this->setLongitude($longitude);
        $this->setVille($ville);
        $this->setInfo($info);
    }
//GETTERS/SETTERS
    public function latitude() {
        return $this->latitude;
    }
    public function setLatitude($nouvelleLat) {
        if (!is_float($nouvelleLat)) {
            trigger_error('La valeur  doit être un nombre float', E_USER_WARNING);
            return;
        }
        $this->latitude=$nouvelleLat;
    }

    public function longitude() {
        return $this->longitude;
    }
    public function setLongitude($nouvelleLong) {
        if (!is_float($nouvelleLong)) {
            trigger_error('La valeur  doit être un nombre float', E_USER_WARNING);
            return;
        }
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
        return $this->name;
    }
    public function setVille($nouvelleVille) {
        $this->name = $newName;
    }

//Fonctions
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