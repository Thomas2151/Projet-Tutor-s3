<?php
require 'Marqueur.php';
echo 'Hello  !';
?>


<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'>//lien permettant d'obtenir les ressources pour une carte google</script>

<div style='overflow:hidden;height:440px;width:700px;'>
    <div id='gmap_canvas' style='height:440px;width:700px;'></div>
    <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
</div>
<script type='text/javascript'>
    
    function init_map() {
        var myOptions = { zoom: 2, center: new google.maps.LatLng(48.8314408, 2.3255684), mapTypeId: google.maps.MapTypeId.ROADMAP };
        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        
    }
    google.maps.event.addDomListener(window, 'load', init_map);

        function addMarker(lat , long,ville){
                marker = new google.maps.Marker({ map: map, position: new google.maps.LatLng(lat,long) });
                infowindow = new google.maps.InfoWindow({ content: '<strong>Titre</strong><br />'+ville+'<a href="info.php">Info</a>' });
                google.maps.event.addListener(marker, 'click', function () { infowindow.open(map, marker); });
                infowindow.open(map, marker);
            }
        google.maps.event.addDomListener(window, 'load', function () {
        addMarker(48.8314408, 2.3255684,'Paris');
            });


    //google.maps.event.addDomListener(window, 'load', function () {
    //    addMarker(2.3255684, 48.8314408,'Jsp');
    //});

</script>

<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6164165.513495061!2d-0.545352109931321!3d48.17009117320368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f29d8ceffd9675%3A0x409ce34b31458d0!2s21000+Dijon!5e0!3m2!1sfr!2sfr!4v1541513687316" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->