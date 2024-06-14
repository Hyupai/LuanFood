<?php include('faz_tudo.php'); ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Entregadores - Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
        <style> div#map1 {
      width: 100%;
      height: 400px;
    }
    
    div#map2 {
      width: 100%;
      height: 400px;
    }
    
    div#map3 {
      width: 100%;
      height: 400px;
    }</style>
  </head>
  <body>
    <div class="container-scroller">
     
      <?php echo $header;?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
         <br><br><h1 style="display:flex; justify-content:center; margin-bottom: 20px; margin-top: 20px;">Santa Cruz</h1><br>
                 <div id="map1"></div><br><br>
                 <h1 style="display:flex; justify-content:center; margin-bottom: 20px; margin-top: 20px;">Explanada</h1><br><br>
                  <div id="map2"></div><br><br>
                  <h1 style="display:flex; justify-content:center; margin-bottom: 20px; margin-top: 20px;">Centro</h1><br>
                   <div id="map3"></div><br><br>
               
            </div>
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
  <script>
  function initMap() {
    var worldMapData = [
      {
        "Id": "10020",
        "PropertyCode": "HELHAK",
        "address": "Siltasaarenkatu 14",
        "latitude": "60.1791466",
        "longitude": "24.9473743",
        "GMapIconImage": "/assets/markers/marker.png",
        "type": "Hotel",
        "hotelName": "Cumulus Hakaniemi Helsinki"
      },
      {
        "Id": "10080",
        "PropertyCode": "HELKAI",
        "address": "Kaisaniemenkatu 7",
        "latitude": "60.1716867",
        "longitude": "24.9458183",
        "GMapIconImage": "/assets/markers/marker.png",
        "type": "Hotel",
        "hotelName": "Cumulus Kaisaniemi Helsinki"
      },
      {
        "Id": "10170",
        "PropertyCode": "HELMEI",
        "address": "Tukholmankatu 2",
        "latitude": "60.1910171",
        "longitude": "24.9090258",
        "GMapIconImage": "/assets/markers/marker.png",
        "type": "Hotel",
        "hotelName": "Cumulus Meilahti Helsinki"
      },
      {
        "Id": "10090",
        "PropertyCode": "HELOLY",
        "address": "Läntinen Brahenkatu 2",
        "latitude": "60.1868253",
        "longitude": "24.946055",
        "GMapIconImage": "/assets/markers/marker.png",
        "type": "Hotel",
        "hotelName": "Cumulus Kallio Helsinki"
      },
      {
        "Id": "10280",
        "PropertyCode": "HELSEU",
        "address": "Kaivokatu 12",
        "latitude": "60.1700957",
        "longitude": "24.9377173",
        "GMapIconImage": "/assets/markers/marker.png",
        "type": "Hotel",
        "hotelName": "Hotel Seurahuone Helsinki"
      }
    ];

    var map1 = new google.maps.Map(document.getElementById('map1'), {
      zoom: 15,
      center: new google.maps.LatLng(-19.77494355383571, -42.15463518513082),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var map2 = new google.maps.Map(document.getElementById('map2'), {
      zoom: 15,
      center: new google.maps.LatLng(-19.779699892490953, -42.12576629578405),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var map3 = new google.maps.Map(document.getElementById('map3'), {
      zoom: 15,
      center: new google.maps.LatLng(-19.789568678162855, -42.14035300604519),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var marker, i, markerContent,
      infowindow = new google.maps.InfoWindow();

    for (i = 0; i < worldMapData.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(worldMapData[i].latitude, worldMapData[i].longitude),
        map: map1 // Altere para map2 ou map3 conforme necessário
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          markerContent = '<div><b>Hotel Name: </b> ' +
            worldMapData[i].hotelName +
            '</div><div><b>Address: </b>' +
            worldMapData[i].address + '</div>';

          infowindow.setContent(markerContent);
          infowindow.open(map1, marker); // Altere para map2 ou map3 conforme necessário
        }
      })(marker, i));
    }
  }
</script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl_3j4BivMuCGpS5DS73Rkt7SNvy29eBQ&amp;callback=initMap" async="" defer=""></script>
    <!-- End custom js for this page -->
  </body>
</html>