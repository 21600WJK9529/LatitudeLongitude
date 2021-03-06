
<html>
<body onload="getLocation();">
<p id="location">

</p>

<script>
var x = document.getElementById("location");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
    //cput latlong -33.930800, 18.430086
    var radlat1 = Math.PI * -33.930800/180;
	var radlat2 = Math.PI * position.coords.latitude/180;
	var theta = 18.430086-position.coords.longitude;
	var radtheta = Math.PI * theta/180;
	var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
    if (dist > 1) {
			dist = 1;
		}
		dist = Math.acos(dist);
		dist = dist * 180/Math.PI;
		dist = (dist * 60 * 1.1515)*1.609344;
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude+
  //Straight line distance
  //if distance >1km shouldnt work
  "<br>Distance to CPUT: "+Math.round(dist*100)/100+" Km";

}

// function distance(lat1, lon1, lat2, lon2, unit) {
// 	if ((lat1 == lat2) && (lon1 == lon2)) {
// 		return 0;
// 	}
// 	else {
// 		var radlat1 = Math.PI * lat1/180;
// 		var radlat2 = Math.PI * lat2/180;
// 		var theta = lon1-lon2;
// 		var radtheta = Math.PI * theta/180;
// 		var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
// 		if (dist > 1) {
// 			dist = 1;
// 		}
// 		dist = Math.acos(dist);
// 		dist = dist * 180/Math.PI;
// 		dist = dist * 60 * 1.1515;
// 		if (unit=="K") { dist = dist * 1.609344 }
// 		if (unit=="N") { dist = dist * 0.8684 }
// 		return dist;
// 	}
// }
</script>
</body>
</html>
