<?php

echo 'Hello  !';
?>


<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>

<div style='overflow:hidden;height:440px;width:700px;'>
    <div id='gmap_canvas' style='height:440px;width:700px;'></div>
    <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
</div>
<script type='text/javascript'>
    function init_map() {
        var myOptions = { zoom: 2, center: new google.maps.LatLng(48.8314408, 2.3255684), mapTypeId: google.maps.MapTypeId.ROADMAP };
        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        marker = new google.maps.Marker({ map: map, position: new google.maps.LatLng(48.8314408, 2.3255684) });
        marker2 = new google.maps.Marker({ map: map, position: new google.maps.LatLng(2.3255684, 48.8314408) });
        infowindow = new google.maps.InfoWindow({ content: '<strong>Titre</strong><br>Paris <a href="test.php">test</a>'});
        infowindow2 = new google.maps.InfoWindow({ content: '<strong>Titre</strong><br>Test <a href="test.php">test</a>'});
        google.maps.event.addListener(marker, 'click', function () { infowindow.open(map, marker); });
        google.maps.event.addListener(marker2, 'click', function () { infowindow2.open(map, marker2); });
        infowindow.open(map, marker);
        infowindow2.open(map, marker2);
    }
    google.maps.event.addDomListener(window, 'load', init_map);


    </script>
<!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d21642.60804648608!2d5.0641126!3d47.3079694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1541513036282" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
    
        <div>
    <small>
        <a href="https://embedgooglemaps.com/es/">https://embedgooglemaps.com/es/</a>
        </small></div>
    <div><small>
        <a href="http://botonmegusta.org/">www://botonmegusta.org/</a>
        </small></div>-->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6164165.513495061!2d-0.545352109931321!3d48.17009117320368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f29d8ceffd9675%3A0x409ce34b31458d0!2s21000+Dijon!5e0!3m2!1sfr!2sfr!4v1541513687316" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>