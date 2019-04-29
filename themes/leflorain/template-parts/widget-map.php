<div id="map-container">
  <h2 class="article-title">Où dépenser et où me procurer des florains</h2>
  <div id='map'></div>
</div>


<script>
  mapboxgl.accessToken = 'pk.eyJ1IjoidGhpYmF1bHQ1NCIsImEiOiJjam5tNnFmemIwaWp0M3BtcXdzdHRjcG16In0.eEWQcX2QFvGsQE_7FWJqUg';
  var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v9',
    center: [6.18, 48.69], // starting position
    zoom: 12 // starting zoom
});

// Add geolocate control to the map.
map.addControl(new mapboxgl.GeolocateControl({
    positionOptions: {
        enableHighAccuracy: true
    },
    trackUserLocation: true
}));
// Add zoom and rotation controls to the map.
map.addControl(new mapboxgl.NavigationControl());

map.on('load', function () {

map.addLayer({
  "id": "points",
  "type": "symbol",
  "source": {
    "type": "geojson",
    "data": "http://localhost/le-florain/wp-content/themes/leflorain/acteurs.geojson"
  },
  "layout": {
    "icon-image": "{icon}-15",
    "text-field": "{title}",
    "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
    "text-offset": [0, 0.6],
    "text-anchor": "top"
  }
  });
});

</script>
