<?php
define('MyConst', TRUE);
$header = 'Louisiana Emergency Response';
$title = 'Issue';
include_once 'includes/header.php';
include_once 'includes/navigation.php';
include_once 'includes/sidebar_right.php';
?>



<div class="main">

<h1>Report an Issue</h1>

<p>
Hi, please enable location services in order to report your issues.
</p>

<h1>Instructions</h1>
<p>
<p>Click the button to get your coordinates.</p>

<p id="demo">Click the button to get your position.</p>

<button onclick="getLocation()">Try It</button>

<div id="mapholder"></div>

</div>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    var latlon = position.coords.latitude + "," + position.coords.longitude;

    var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="
    +latlon+"&zoom=14&size=400x300&sensor=false";
    document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";

    x.innerHTML = "Latitude: " + position.coords.latitude +
    "<br>Longitude: " + position.coords.longitude;
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
</script>

<?php
    include_once 'includes/footer.php';
?>
