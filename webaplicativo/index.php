<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Marker Animations</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

      // The following example creates a marker in Stockholm, Sweden using a DROP
      // animation. Clicking on the marker will toggle the animation between a BOUNCE
      // animation and no animation.

      var marker;

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: {lat: -16.1560624, lng:-42.3109163 }
        });

        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: {lat: -16.1560624, lng:-42.3109163 }
        });
        marker.addListener('click', toggleBounce);
      
      var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));}

      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdsHpm3uxrKBFz6y0PkTs-c7KKDlGMXEk&callback=initMap">
    </script>
  </body>
</html>