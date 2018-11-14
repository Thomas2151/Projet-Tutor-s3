<?php
require 'Marqueur.php';
echo 'Hello  !';
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

<script type='text/javascript'>
    
    function init_map() {
        var myOptions = {
            zoom: 1,
            center: new google.maps.LatLng(48.8314408, 2.3255684),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        
    }
    google.maps.event.addDomListener(window, 'load', init_map);

        function addMarker(lat , long,ville,pays,info){
                var marker = new google.maps.Marker({ map: map, position: new google.maps.LatLng(lat,long) });
                var infowindow = new google.maps.InfoWindow({ content: '<strong>'+pays+'</strong><br />'+ville+'<br/>'+info+'<br/><a href="info.php">Info</a>' });
                google.maps.event.addListener(marker, 'click', function () { infowindow.open(map, marker); });
                //infowindow.open(map, marker);
    }

        google.maps.event.addDomListener(window, 'load', function () {
        addMarker(48.8314408, 2.3255684,'Paris','France','Stage 3 mois en développement web');
            });


</script>
