
mapboxgl.accessToken = 'pk.eyJ1IjoidGhlbzYiLCJhIjoiY2xmazRpa2VzMDdiZDN0czR5Z2tiMGxheCJ9.GMZxHYFG0rGU8R6133k1kg';

const map = new mapboxgl.Map({
container: 'mapp', // container ID
// Choose from Mapbox's core styles, or make your own style with Mapbox Studio
style: 'mapbox://styles/mapbox/streets-v12', // style URL
center: [-1.6244,6.6918], // starting position [lng, lat]
zoom: 9 // starting zoom
});
 

const draw = new MapboxDraw({
displayControlsDefault: false,
// Select which mapbox-gl-draw control buttons to add to the map.
controls: {
polygon: true,
trash: true
},

// Set mapbox-gl-draw to draw by default.
// The user does not have to click the polygon control button first.
// defaultMode: 'draw_polygon'
});
map.addControl(draw,'top-left');
 
map.on('draw.create', updateArea);
map.on('draw.delete', updateArea);
map.on('draw.update', updateArea);
 
function updateArea(e) {
const data = draw.getAll();
const answer = document.getElementById('calculated-area');
console.log(data.features[0]['geometry']['coordinates']);
if (data.features.length > 0) {
const area = turf.area(data);
// Restrict the area to 2 decimal points.
const rounded_area = Math.round(area * 100) / 100;
answer.innerHTML = `<p><strong>${rounded_area}</strong></p><p>square meters</p>`;
} else {
answer.innerHTML = '';
if (e.type !== 'draw.delete')
alert('Click the map to draw a polygon.');
}
}
