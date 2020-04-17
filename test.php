<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <?php $lat = -25.363 ?>
    <script>
      function initMap() {
        var uluru = {lat: <?php echo $lat ?>, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxwTS9uno5k2KisGmryWkfs0l1jQ6Cr68&callback=initMap">
    </script>
  </body>
</html>