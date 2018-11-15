<?php

/**
 * GoogleMap short summary.
 *
 * GoogleMap description.
 *
 * @version 1.0
 * @author thoma
 */

class GoogleMap
{

    public function __construct(){


    }

    public function createMap(){
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