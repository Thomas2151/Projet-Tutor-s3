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
    private $pays;
    private $latitude;
    private $longitude;
    private $name;

    public function __construct($pays){
        $this->$pays=$pays;

    }
    public function addMarker($latitude,$longitude,$name){
        $this->$latitude=$latitude;
        $this->$longitude=$longitude;
        $this->$name=$name;
?>
        <script>
        function addMarker(lat , long,ville){
                marker = new google.maps.Marker({ map: map, position: new google.maps.LatLng(lat,long) });
                infowindow = new google.maps.InfoWindow({ content: '<strong>Titre</strong><br />'+ville+'<a href="info.php">Info</a>' });
                google.maps.event.addListener(marker, 'click', function () { infowindow.open(map, marker); });
                infowindow.open(map, marker);
            }
        google.maps.event.addDomListener(window, 'load', function () {
        addMarker(48.8314408, 2.3255684,'Paris');
            });
        </script>


<?php
    }


}

?>