<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/include/loginTest.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/include/themeTest.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/include/dateTest.php');
?>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Set accommodation | Travers</title>
        <link href='https://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="/static/css/style.css">
        <link rel="stylesheet" type="text/css" href="/static/css/placepage.css">
        <link rel="stylesheet" type="text/css" href="/static/css/progress.css">
        <link rel="stylesheet" type="text/css" href="/static/css/navbar_style.css">
        <style type = "text/css">
            a {
                text-decoration:none;
            }
        </style>
        <script>
            function clickLetsDoThis() {
                if (document.getElementById('place').value == "" || document.getElementById('hotelinfo').value == "") {
                    console.log("호텔을 선택하세요 에러메시지 띄우기");
                } else {
                    document.getElementById('cityinfo').setAttribute('value', document.getElementById('place').value);
                    document.getElementById('placeInfoForm').submit();
                }
            }
        </script>
    </head>
    <body>
        <?php
          require_once($_SERVER['DOCUMENT_ROOT'].'/include/navbar.inc');
        ?>
        <form action="/attraction/" method="post" id="placeInfoForm">
            <input type="hidden" name="cityinfo" id="cityinfo" value="">
            <input type="hidden" name="hotelinfo" id="hotelinfo" value="">
            <input type="hidden" name="hotelIDinfo" id="hotelIDinfo" value="">
        </form>
        <div class = "progress-box" style="width: 100%; text-align: center; padding-top: 35px;">
          <img src = "/static/image/place_pro.png">
        </div>
        <div id="textMapContainer" style="max-width: 1250px; margin-left: auto; margin-right: auto; margin-top: 100px; margin-bottom: 80px;">
            <div class="leftContent">
                <div class="text">search accomodation</div>
                <div class = "datepage_div">
                    <input type="text" id = "place" name="place" value = "">
                    <a href="#"><img src="/static/image/search_grey.png"></a>
                </div><br>
                <div id="listing">
                    <table id="resultsTable">
                        <tbody id="results"></tbody>
                    </table>
                </div>
                <div style="display: none">
                    <div id="info-content">
                        <table>
                          <tr id="iw-url-row" class="iw_table_row">
                            <td id="iw-icon" class="iw_table_icon"></td>
                            <td id="iw-url"></td>
                          </tr>
                          <tr id="iw-address-row" class="iw_table_row">
                            <td class="iw_attribute_name">Address:</td>
                            <td id="iw-address"></td>
                          </tr>
                          <tr id="iw-phone-row" class="iw_table_row">
                            <td class="iw_attribute_name">Telephone:</td>
                            <td id="iw-phone"></td>
                          </tr>
                          <tr id="iw-rating-row" class="iw_table_row">
                            <td class="iw_attribute_name">Rating:</td>
                            <td id="iw-rating"></td>
                          </tr>
                          <tr id="iw-website-row" class="iw_table_row">
                            <td class="iw_attribute_name">Website:</td>
                            <td id="iw-website"></td>
                          </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div id="controls" style="display: none">
              <select id="country">
                <option value="all" selected>All</option>
                <option value="ko" selected>Korea</option>
              </select>
            </div>
            <div id="map"></div>
        </div>
        <a href="#"><div class = "datepage_roundclick" onclick="clickLetsDoThis()">let's do this</div></a>
    </body>
    <script>
// This example uses the autocomplete feature of the Google Places API.
// It allows the user to find all hotels in a given place, within a given
// country. It then displays markers for all the hotels returned,
// with on-click details for each hotel.

var map, places, infoWindow;
var markers = [];
var autocomplete;
var countryRestrict = {};
var MARKER_PATH = '/static/image/marker_hotel.png';
var hostnameRegexp = new RegExp('^https?://.+?/');

var countries = {
  'ko': {
    center: {lat: 37.55, lng: 127},
    zoom: 10
  }
};

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: countries['ko'].zoom,
    center: countries['ko'].center,
    mapTypeControl: false,
    panControl: false,
    zoomControl: false,
    streetViewControl: false
  });

  infoWindow = new google.maps.InfoWindow({
    content: document.getElementById('info-content')
  });

  // Create the autocomplete object and associate it with the UI input control.
  // Restrict the search to the default country, and to place type "cities".
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */ (
          document.getElementById('place')), {
        types: ['(cities)'],
        componentRestrictions: countryRestrict
      });
  places = new google.maps.places.PlacesService(map);

  autocomplete.addListener('place_changed', onPlaceChanged);

  // Add a DOM event listener to react when the user selects a country.
  document.getElementById('country').addEventListener(
      'change', setAutocompleteCountry);
}

// When the user selects a city, get the place details for the city and
// zoom the map in on the city.
function onPlaceChanged() {
  var place = autocomplete.getPlace();
  if (place.geometry) {
    map.panTo(place.geometry.location);
    map.setZoom(15);
    search();
  } else {
    document.getElementById('place').placeholder = 'Enter a city';
  }
}

// Search for hotels in the selected city, within the viewport of the map.
function search() {
  if (window.innerWidth > 1000) {
      var search = {
        bounds: map.getBounds(),
        types: ['lodging']
      };
  } else {
      var place = autocomplete.getPlace();
      var search = {
        bounds: new google.maps.LatLngBounds(
            new google.maps.LatLng(place.geometry.location.lat() - 10,place.geometry.location.lng() - 10),
            new google.maps.LatLng(place.geometry.location.lat() + 10,place.geometry.location.lng() + 10)),
        types: ['lodging']
      };
  }

  places.nearbySearch(search, function(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
      clearResults();
      clearMarkers();
      var image = {
        url: '/static/image/marker_hotel.png',
        // This marker is 20 pixels wide by 32 pixels high.
        size: new google.maps.Size(60, 60),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(0, 0),
        scaledSize: new google.maps.Size(60, 60)
      };
      // Create a marker for each hotel found, and
      // assign a letter of the alphabetic to each marker icon.
      for (var i = 0; i < results.length; i++) {
        var markerLetter = String.fromCharCode('A'.charCodeAt(0) + i);
        var markerIcon = MARKER_PATH/* + markerLetter + '.png'*/;
        // Use marker animation to drop the icons incrementally on the map.
        markers[i] = new google.maps.Marker({
          position: results[i].geometry.location,
          animation: google.maps.Animation.DROP,
          icon: image
        });
        // If the user clicks a hotel marker, show the details of that hotel
        // in an info window.
        markers[i].placeResult = results[i];
        google.maps.event.addListener(markers[i], 'click', showInfoWindow);
        setTimeout(dropMarker(i), i * 100);
        addResult(results[i], i);
      }
    }
  });
}

function clearMarkers() {
  for (var i = 0; i < markers.length; i++) {
    if (markers[i]) {
      markers[i].setMap(null);
    }
  }
  markers = [];
}

// [START region_setcountry]
// Set the country restriction based on user input.
// Also center and zoom the map on the given country.
function setAutocompleteCountry() {
  var country = document.getElementById('country').value;
  if (country == 'all') {
    autocomplete.setComponentRestrictions([]);
    map.setCenter({lat: 15, lng: 0});
    map.setZoom(2);
  } else {
    autocomplete.setComponentRestrictions({'country': country});
    map.setCenter(countries[country].center);
    map.setZoom(countries[country].zoom);
  }
  clearResults();
  clearMarkers();
}
// [END region_setcountry]

function dropMarker(i) {
  return function() {
    markers[i].setMap(map);
  };
}

function addResult(result, i) {
  var results = document.getElementById('results');
  var markerLetter = String.fromCharCode('A'.charCodeAt(0) + i);
  var markerIcon = MARKER_PATH/* + markerLetter + '.png'*/;

  var tr = document.createElement('tr');
  tr.style.backgroundColor = (i % 2 === 0 ? '#F0F0F0' : '#FFFFFF');
    
  tr.onclick = function() {
    google.maps.event.trigger(markers[i], 'click');
    //this.setAttribute("style", "background-color: #FF0000");    
  };

  var iconTd = document.createElement('td');
  var nameTd = document.createElement('td');
  var icon = document.createElement('img');
  icon.src = markerIcon;
  icon.setAttribute('class', 'placeIcon');
  icon.setAttribute('className', 'placeIcon');
  var name = document.createTextNode(result.name);
  iconTd.appendChild(icon);
  nameTd.appendChild(name);
  tr.appendChild(iconTd);
  tr.appendChild(nameTd);
  results.appendChild(tr);
}

function clearResults() {
  var results = document.getElementById('results');
  while (results.childNodes[0]) {
    results.removeChild(results.childNodes[0]);
  }
}

// Get the place details for a hotel. Show the information in an info window,
// anchored on the marker for the hotel that the user selected.
function showInfoWindow() {
  var marker = this;
  places.getDetails({placeId: marker.placeResult.place_id},
      function(place, status) {
        if (status !== google.maps.places.PlacesServiceStatus.OK) {
          return;
        }
        infoWindow.open(map, marker);
        buildIWContent(place);
      });
}

// Load the place information into the HTML elements used by the info window.
function buildIWContent(place) {
  document.getElementById('iw-icon').innerHTML = '<img class="hotelIcon" ' +
      'src="' + place.icon + '"/>';
  document.getElementById('iw-url').innerHTML = '<b><a href="' + place.url +
      '">' + place.name + '</a></b>';
  document.getElementById('iw-address').textContent = place.vicinity;

  document.getElementById('hotelinfo').setAttribute('value', place.name); // 호텔이름 폼에 추가
  console.log(place.place_id);
  document.getElementById('hotelIDinfo').setAttribute('value', place.place_id); // 호텔 아이디 폼에 추가
    
  if (place.formatted_phone_number) {
    document.getElementById('iw-phone-row').style.display = '';
    document.getElementById('iw-phone').textContent =
        place.formatted_phone_number;
  } else {
    document.getElementById('iw-phone-row').style.display = 'none';
  }

  // Assign a five-star rating to the hotel, using a black star ('&#10029;')
  // to indicate the rating the hotel has earned, and a white star ('&#10025;')
  // for the rating points not achieved.
  if (place.rating) {
    var ratingHtml = '';
    for (var i = 0; i < 5; i++) {
      if (place.rating < (i + 0.5)) {
        ratingHtml += '&#10025;';
      } else {
        ratingHtml += '&#10029;';
      }
    document.getElementById('iw-rating-row').style.display = '';
    document.getElementById('iw-rating').innerHTML = ratingHtml;
    }
  } else {
    document.getElementById('iw-rating-row').style.display = 'none';
  }

  // The regexp isolates the first part of the URL (domain plus subdomain)
  // to give a short URL for displaying in the info window.
  if (place.website) {
    var fullUrl = place.website;
    var website = hostnameRegexp.exec(place.website);
    if (website === null) {
      website = 'http://' + place.website + '/';
      fullUrl = website;
    }
    document.getElementById('iw-website-row').style.display = '';
    document.getElementById('iw-website').textContent = website;
  } else {
    document.getElementById('iw-website-row').style.display = 'none';
  }
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG21Y5X-wARtfSC6WkgO1nxoVU0WwcjwE&signed_in=true&libraries=places&callback=initMap&language=en"
        async defer></script>
	<footer>
	</footer>
</html>