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
    private $idM ;  //id unique du marqueur réportoriant un stage
    private $pays; // nom du pays pour le marqueur
    private $latitude; // latitude du marqueur
    private $longitude; // longitude du marqueur
    private $ville; // nom de la ville du marqueur
    private $info; // ceci est une petite info affiché sur le marqueur

    private $domaine; //domaine réaliser durant le stage
    private $departement; //pas département au sens régional mais universitaire ("ex: informatique / gago / info-com...)
    private $annee; //annee du stage
    private $etablissement; //type d'établissement (entreprise / dueti / scolaire )

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


// GETTERS/SETTERS
    public function idM(){
        $this->idM;
    }
    public function setIdM($newIdM){
        if ((int)$newIdM > 0) {
            $this->id = (int)$newIdM;
        }
    }

    public function latitude() {
        return $this->latitude;
    }
    public function setLatitude($nouvelleLat) {
        $this->latitude=(float)$nouvelleLat;
    }

    public function longitude() {
        return $this->longitude;
    }
    public function setLongitude($nouvelleLong) {

            $this->longitude = (float)$nouvelleLong;
    }

    public function pays() {
        return $this->pays;
    }
    public function setPays($nouveauPays) {
        $this->pays = (string)$nouveauPays;
    }

    public function info() {
        return $this->info;
    }
    public function setInfo($nouvelleInfo) {
        $this->info = (string)$nouvelleInfo;
    }

    public function ville() {
        return $this->ville;
    }
    public function setVille($nouvelleVille) {
        $this->ville = (string) $nouvelleVille;
    }




    public function domaine(){
        return $this->domaine;

    }
    public function setDomaine($nouveauDomaine){
        $this->domaine = (string) $nouveauDomaine;
    }



    public function departement(){
        return $this->departement;

    }
    public function setDepartement($nouveauDepartement){
        $this->departement = (string) $nouveauDepartement;

    }


    public function annee(){
        return $this->annee;

    }
    public function setAnnee($nouveauAnnee){
        $this->annee = (string) $nouveauAnnee;

    }

    public function etablissement(){
        return $this->etablissement;

    }
    public function setEtablissement($nouveauEtablissement){
        $this->etablissement = (string) $nouveauEtablissement;

    }

    // Fonctions
    public function addMarker(){ //permet d'ajouter et de crée le point en javascript à la carte
?><script>
        function addMarker(lat , long,ville,pays,info,domaine,departement,annee,etablissement){
                var marker = new google.maps.Marker({ map: map, position: new google.maps.LatLng(lat,long) });
                var infowindow = new google.maps.InfoWindow({
    content: '<strong>'+pays+'</strong><br />'+ville+'<br/>'+info+'<br/>'+domaine+'<br/>'+departement+'<br/>'+annee+'<br/>'+etablissement+ ' <br/> <a href = "info.php"> Info </a> ' });
                google.maps.event.addListener(marker, 'click', function () { infowindow.open(map, marker); });
                //infowindow.open(map, marker); //permet de forcer l'ouverture de la page info au dessus du ping
        }
        google.maps.event.addDomListener(window, 'load', function () {
        addMarker(
    lat = <?php echo(json_encode($this->latitude())); ?> ,
    long = <?php echo(json_encode($this->longitude())); ?>,
    ville = <?php echo(json_encode($this->ville())); ?>,
    pays = <?php echo(json_encode($this->pays())); ?>,
    info = <?php echo(json_encode($this->info())); ?>,
    domaine = <?php echo(json_encode($this->domaine())); ?>,
    departement = <?php echo(json_encode($this->departement())); ?>,
    annee = <?php echo(json_encode($this->annee())); ?>,
    etablissement = <?php echo(json_encode($this->etablissement())); ?>
    );
            });
        </script>


    <?php
    }


}

?>