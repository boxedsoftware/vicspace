<html>
<head>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
   <title>Google Maps Geocoding Demo</title>
   <script src="http://maps.google.com/maps/api/js?sensor=false"
           type="text/javascript"></script>
</head>
<body>
   <div id="map" style="width: 350px; height: 225px;"></div>

   <script type="text/javascript">
   
   
   var address = <?php echo json_encode($userweekend);?>+" Australia";

   var map = new google.maps.Map(document.getElementById('map'),
   {
       mapTypeId: google.maps.MapTypeId.ROADMAP,
       zoom: 15
   });

   var geocoder = new google.maps.Geocoder();

   geocoder.geocode(
   {
      'address': address
   },
   function(results, status) {
      if(status == google.maps.GeocoderStatus.OK) {
         new google.maps.Marker({
            position: results[0].geometry.location,
            map: map
         });
         map.setCenter(results[0].geometry.location);
      }
      else
      {
	document.write("Does not Exist Fool!");
	
      
         // Google couldn't geocode this request. Handle appropriately.
      }
   });

   </script>
</body>
</html>
