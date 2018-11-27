<?php

/**
 * GoogleMap short summary.
 *
 * GoogleMap description.
 *
 * @version 1.0
 * @author thoma
 */
?> 
<script src='https://maps.googleapis.com/maps/api/js?key='>//lien permettant d'obtenir les ressources pour une carte google</script>

<div style='overflow:hidden;height:440px;width:700px;'>

    <!--position de la carte dans la page html-->
    <div id='gmap_canvas' style='height:350px;width:700px;'></div>
    <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
</div>



<?php 
class GoogleMap
{

    public function __construct(){


    }

    public function createMap(){ //script permettant de générer la carte Google Map 
    ?>  <script>
            function init_map() {
            var myOptions = {
                zoom: 1,
                center: new google.maps.LatLng(48.8314408, 2.3255684),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);

        }
        google.maps.event.addDomListener(window, 'load', init_map);
       </script><?php
    }
}

?>