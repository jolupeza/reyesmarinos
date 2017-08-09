    <?php $options = get_option('reyesmarinos_custom_settings'); ?>
    <?php
      $lat = isset($options['lat']) ? $options['lat'] : '';
      $long = isset($options['long']) ? $options['long'] : '';
      $address = isset($options['address']) ? $options['address'] : '';
      $email = isset($options['email']) ? $options['email'] : '';
    ?>

    <script>
      var map, marker, infowindow;
    </script>

    <?php wp_footer(); ?>

    <?php if (!empty($lat) && !empty($long)) : ?>
      <script>
        var lat = <?php echo $lat; ?>,
            lon = <?php echo $long; ?>;
        var contentString = '<div id="content" class="Marker">'+
              '<div id="siteNotice">'+
              '</div>'+
              '<h1 id="firstHeading" class="firstHeading Marker-title text-center">Reyes Marinos</h1>'+
              '<div id="bodyContent" class="Marker-body">'+
              '<ul class="Marker-list">'+
              '<li><strong>Dirección: </strong><?php echo $address; ?></li>'+
              '<li><strong>Correo: </strong><?php echo $email; ?></li>'+
              '</ul>'+
              '</div>'+
              '</div>';

        function initMap() {
          var mapCoord = new google.maps.LatLng(lat, lon);
          var opciones = {
            zoom: 16,
            center: mapCoord,
            scrollwheel: false,
          };

          infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 300
          });

          map = new google.maps.Map(document.getElementById('map'), opciones);

          marker = new google.maps.Marker({
            position: mapCoord,
            map: map,
            title: 'Reyes Marinos'
          });

          marker.addListener('click', function() {
            infowindow.open(map, marker);
          });
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuXaKNXI28wG0MIfBb7lsPXkOLXwY5_Ac&callback=initMap" async defer></script>
    <?php endif; ?>
  </body>
</html>
