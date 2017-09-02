<!DOCTYPE html>
<html>
<body>

<h1>My First Google Map</h1>

<div id="map" style="width:100%;height:500px"></div>

<script>

function myMap()
{
	var myCenter = new google.maps.LatLng(22.7215,75.8786);
	var myDiv = document.getElementById('map');
	var myOption = {center : myCenter, zoom : 19};
	var map = new google.maps.Map(myDiv, myOption);
	var marker = new google.maps.Marker({position : myCenter});
	marker.setMap(map);
}
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDm1YSq27mS7bmej3RScLtXWZvh9FT9SMI&callback=myMap"></script>

</body>
</html>