'use strict';

/* ===== Enable Bootstrap Popover (on element  ====== */

 

/* ===== Responsive Sidepanel ====== */
const sidePanelToggler = document.getElementById('sidepanel-toggler'); 
const sidePanel = document.getElementById('app-sidepanel');  
const sidePanelDrop = document.getElementById('sidepanel-drop'); 
const sidePanelClose = document.getElementById('sidepanel-close'); 
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
window.addEventListener('load', function(){
	responsiveSidePanel(); 
});

window.addEventListener('resize', function(){
	responsiveSidePanel(); 
});


function responsiveSidePanel() {
    let w = window.innerWidth;
	if(w >= 1200) {
	    // if larger 
	    //console.log('larger');
		sidePanel.classList.remove('sidepanel-hidden');
		sidePanel.classList.add('sidepanel-visible');
		
	} else {
	    // if smaller
	    //console.log('smaller');
	    sidePanel.classList.remove('sidepanel-visible');
		sidePanel.classList.add('sidepanel-hidden');
	}
};

sidePanelToggler.addEventListener('click', () => {
	if (sidePanel.classList.contains('sidepanel-visible')) {
		console.log('visible');
		sidePanel.classList.remove('sidepanel-visible');
		sidePanel.classList.add('sidepanel-hidden');
		
	} else {
		console.log('hidden');
		sidePanel.classList.remove('sidepanel-hidden');
		sidePanel.classList.add('sidepanel-visible');
	}
});



sidePanelClose.addEventListener('click', (e) => {
	e.preventDefault();
	sidePanelToggler.click();
});

sidePanelDrop.addEventListener('click', (e) => {
	sidePanelToggler.click();
});



/* ====== Mobile search ======= */
const searchMobileTrigger = document.querySelector('.search-mobile-trigger');
const searchBox = document.querySelector('.app-search-box');

searchMobileTrigger.addEventListener('click', () => {

	searchBox.classList.toggle('is-visible');
	
	let searchMobileTriggerIcon = document.querySelector('.search-mobile-trigger-icon');
	
	if(searchMobileTriggerIcon.classList.contains('fa-search')) {
		searchMobileTriggerIcon.classList.remove('fa-search');
		searchMobileTriggerIcon.classList.add('fa-times');
	} else {
		searchMobileTriggerIcon.classList.remove('fa-times');
		searchMobileTriggerIcon.classList.add('fa-search');
	}
	
		
	
});





function generateRandomId(length = 8) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  
    for (let i = 0; i < length; i++) {
      result += characters.charAt(Math.floor(Math.random() * characters.length));
    }
  
    return result;
  }
  


// ===============morning MAP FOR ADDDAILYFORECAST PAGE=========================

mapboxgl.accessToken = 'pk.eyJ1IjoidGhlbzYiLCJhIjoiY2xmazRpa2VzMDdiZDN0czR5Z2tiMGxheCJ9.GMZxHYFG0rGU8R6133k1kg';
var map = new mapboxgl.Map({
  container: 'mapAdmin1', // container id
  style: 'mapbox://styles/mapbox/streets-v9', //hosted style id
  zoom: 5,
  center: [-1.6244,6.6918],
});

var drawFeatureID = '';
var newDrawFeature = false;
var polygonsMorning = [];
// add draw
var draw = new MapboxDraw({
  displayControlsDefault: false,
  // this is used to allow for custom properties for styling
  // it appends the word "user_" to the property
  userProperties: true,
  controls: {
      'combine_features': false,
      'uncombine_features': false,
      polygon: true,
          trash: true
  },
  styles: [
      {
          'id': 'gl-draw-polygon-fill-inactive',
          'type': 'fill',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'Polygon'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'fill-color': '#f5f7f7',
              'fill-outline-color': '#f5f7f7',
              'fill-opacity': 0.1
          }
      },
      {
          'id': 'gl-draw-polygon-fill-active',
          'type': 'fill',
          'filter': ['all', ['==', 'active', 'true'],
              ['==', '$type', 'Polygon']
          ],
          'paint': {
              'fill-color': '#fbb03b',
              'fill-outline-color': '#fbb03b',
              'fill-opacity': 0.1
          }
      },
      {
          'id': 'gl-draw-polygon-midpoint',
          'type': 'circle',
          'filter': ['all', ['==', '$type', 'Point'],
              ['==', 'meta', 'midpoint']
          ],
          'paint': {
              'circle-radius': 3,
              'circle-color': '#fbb03b'
          }
      },
      {
          'id': 'gl-draw-polygon-stroke-inactive',
          'type': 'line',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'Polygon'],
              ['!=', 'mode', 'static']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#f5f7f7',
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-polygon-stroke-active',
          'type': 'line',
          'filter': ['all', ['==', 'active', 'true'],
              ['==', '$type', 'Polygon']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#fbb03b',
              'line-dasharray': [0.2, 2],
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-line-inactive',
          'type': 'line',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'LineString'],
              ['!=', 'mode', 'static']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#f5f7f7',
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-line-active',
          'type': 'line',
          'filter': ['all', ['==', '$type', 'LineString'],
              ['==', 'active', 'true']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#fbb03b',
              'line-dasharray': [0.2, 2],
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-polygon-and-line-vertex-stroke-inactive',
          'type': 'circle',
          'filter': ['all', ['==', 'meta', 'vertex'],
              ['==', '$type', 'Point'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'circle-radius': 5,
              'circle-color': '#fff'
          }
      },
      {
          'id': 'gl-draw-polygon-and-line-vertex-inactive',
          'type': 'circle',
          'filter': ['all', ['==', 'meta', 'vertex'],
              ['==', '$type', 'Point'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'circle-radius': 3,
              'circle-color': '#fbb03b'
          }
      },
      {
          'id': 'gl-draw-point-point-stroke-inactive',
          'type': 'circle',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'Point'],
              ['==', 'meta', 'feature'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'circle-radius': 5,
              'circle-opacity': 1,
              'circle-color': '#fff'
          }
      },
      {
          'id': 'gl-draw-point-inactive',
          'type': 'circle',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'Point'],
              ['==', 'meta', 'feature'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'circle-radius': 3,
              'circle-color': '#f5f7f7'
          }
      },
      {
          'id': 'gl-draw-point-stroke-active',
          'type': 'circle',
          'filter': ['all', ['==', '$type', 'Point'],
              ['==', 'active', 'true'],
              ['!=', 'meta', 'midpoint']
          ],
          'paint': {
              'circle-radius': 7,
              'circle-color': '#fff'
          }
      },
      {
          'id': 'gl-draw-point-active',
          'type': 'circle',
          'filter': ['all', ['==', '$type', 'Point'],
              ['!=', 'meta', 'midpoint'],
              ['==', 'active', 'true']
          ],
          'paint': {
              'circle-radius': 5,
              'circle-color': '#fbb03b'
          }
      },
      {
          'id': 'gl-draw-polygon-fill-static',
          'type': 'fill',
          'filter': ['all', ['==', 'mode', 'static'],
              ['==', '$type', 'Polygon']
          ],
          'paint': {
              'fill-color': '#404040',
              'fill-outline-color': '#404040',
              'fill-opacity': 0.1
          }
      },
      {
          'id': 'gl-draw-polygon-stroke-static',
          'type': 'line',
          'filter': ['all', ['==', 'mode', 'static'],
              ['==', '$type', 'Polygon']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#404040',
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-line-static',
          'type': 'line',
          'filter': ['all', ['==', 'mode', 'static'],
              ['==', '$type', 'LineString']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#404040',
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-point-static',
          'type': 'circle',
          'filter': ['all', ['==', 'mode', 'static'],
              ['==', '$type', 'Point']
          ],
          'paint': {
              'circle-radius': 5,
              'circle-color': '#404040'
          }
      },

     

      {
          'id': 'gl-draw-polygon-color-picker',
          'type': 'fill',
          'filter': ['all', ['==', '$type', 'Polygon'],
              ['has', 'user_portColor']
          ],
          'paint': {
              'fill-color': ['get', 'user_portColor'],
              'fill-outline-color': ['get', 'user_portColor'],
              'fill-opacity': 0.5
          }
      },
      {
          'id': 'gl-draw-line-color-picker',
          'type': 'line',
          'filter': ['all', ['==', '$type', 'LineString'],
              ['has', 'user_portColor']
          ],
          'paint': {
              'line-color': ['get', 'user_portColor'],
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-point-color-picker',
          'type': 'circle',
          'filter': ['all', ['==', '$type', 'Point'],
              ['has', 'user_portColor']
          ],
          'paint': {
              'circle-radius': 3,
              'circle-color': ['get', 'user_portColor']
          }
      },

  ]
})

map.addControl(draw, 'top-left');
let yellowBtn = document.querySelector("#yellow-color");
let orangeBtn = document.querySelector("#orange-color");

let redBtn = document.querySelector("#red-color");
let greenBtn = document.querySelector("#green-color");

yellowBtn.addEventListener("click", ()=>{
  changeColor('yellow')
});
orangeBtn.addEventListener("click", ()=>{
  changeColor('orange')
});
redBtn.addEventListener("click", ()=>{
  changeColor('red')
});

greenBtn.addEventListener("click", ()=>{
  changeColor('green')
});

//change colors
function changeColor(color) {
  if (drawFeatureID !== '' && typeof draw === 'object') {

      // add whatever colors you want here...
      if (color === 'yellow') {
          draw.setFeatureProperty(drawFeatureID, 'portColor', '#e9f542');
      }
       else if (color === 'orange') {
          draw.setFeatureProperty(drawFeatureID, 'portColor', '#eda411');
      }
       else if (color === 'red') {
          draw.setFeatureProperty(drawFeatureID, 'portColor', '#ff0000');
      } else if (color === 'green') {
          draw.setFeatureProperty(drawFeatureID, 'portColor', '#008000');
      }
 
      var feat = draw.get(drawFeatureID);
    //   console.log(feat);
      draw.add(feat)
// on change of  color, update the polygonsMorning  array
var drawId = feat.id;
if (polygonsMorning.length === 0) {
    polygonsMorning.push({
        'id': drawId,
        'cordinates': feat['geometry']['coordinates'],
        'color' : feat.properties.portColor,
    });
  } else {
    var index = polygonsMorning.findIndex(function(item) {
            return item.id === drawId;
        });
        if (index !== -1) {
                polygonsMorning.splice(index, 1);
                polygonsMorning.push({
                    'id': drawId,
                    'cordinates': feat['geometry']['coordinates'],
                    'color' : feat.properties.portColor,
                });
            }else{
                polygonsMorning.push({
                    'id': drawId,
                    'cordinates': feat['geometry']['coordinates'],
                    'color' : feat.properties.portColor,
                });
                console.log(`id doesn't exist: ${drawId}`)
            } 
        }
  console.log(polygonsMorning);
  }
  console.log(polygonsMorning);
}

 
var setDrawFeature= function(e) {
    if (e.features.length) {
        var feat = e.features[0];
        drawFeatureID = feat.id;
        if (polygonsMorning.length === 0) {
            polygonsMorning.push({
                'id': drawFeatureID,
                'cordinates': feat['geometry']['coordinates'],
                'color' : feat.properties.portColor,
            });
          } else {
            var index = polygonsMorning.findIndex(function(item) {
                    return item.id === drawFeatureID;
                });
                if (index !== -1) {
                        polygonsMorning.splice(index, 1);
                        polygonsMorning.push({
                            'id': drawFeatureID,
                            'cordinates': feat['geometry']['coordinates'],
                            'color' : feat.properties.portColor,
                        });
                    }else{
                        polygonsMorning.push({
                            'id': drawFeatureID,
                            'cordinates': feat['geometry']['coordinates'],
                            'color' : feat.properties.portColor,
                        });
                        console.log(`id doesn't exist: ${drawFeatureID}`)
                    } 
                }

  console.log(polygonsMorning);
    }
  }
/* Event Handlers for Draw Tools */

map.on('draw.create', function() {
  newDrawFeature = true;
  setDrawFeature;
});

map.on('draw.update', setDrawFeature);

map.on('draw.selectionchange', setDrawFeature);

map.on('draw.delete', function(event) {
    
    // use the deletedPolygonId to do something
    if (event.features.length) {
        var deletedPolygonId = event.features[0].id;
    //     var feat = event.features[0];
    //  var   draID = feat.id;
        if (polygonsMorning.length != 0) {
            
            var index = polygonsMorning.findIndex(function(item) {
                    return item.id === deletedPolygonId;
                });
                if (index !== -1) {
                        polygonsMorning.splice(index, 1);
                        // polygonsMorning.push({
                        //     'id': draID,
                        //     'cordinates': feat['geometry']['coordinates'],
                        //     'color' : feat.properties.portColor,
                        // });
                         console.log(`id DELETED: ${deletedPolygonId}`)
                    }else{
                        
                        console.log(`id doesn't exist: ${deletedPolygonId}`)
                    } 
                }

  console.log(polygonsMorning);
    }
   
  });




map.on('click', function(e) {
  if (!newDrawFeature) {
      var drawFeatureAtPoint = draw.getFeatureIdsAt(e.point);
      //if another drawFeature is not found - reset drawFeatureID
      drawFeatureID = drawFeatureAtPoint.length ? drawFeatureAtPoint[0] : '';
  }

 newDrawFeature = false;

});
 
 // Define an array to store all markers
var markers = [];
var selectedMarker = null;
//generate random id


// Define a function to create a new draggable marker and add it to the map
function addMarker(customValue) {
    const iddf = generateRandomId();
    if(customValue == "addRain"){
          // Define the marker's icon using an SVG element
var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
svgMarker.setAttribute('viewBox', '0 0 24 24');
svgMarker.innerHTML = '<path d="M4.176 11.032a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm.229-7.005a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10H13a3 3 0 0 0 .405-5.973z"/>';
// Scale the SVG icon down
var iconSize = 100;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor);
// set the aria-label attribute
svgMarker.setAttribute("aria-label", "Rain");
svgMarker.setAttribute("id", iddf);
    
    }else if(customValue == "addWind"){
 // Define the marker's icon using an SVG element
 var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarker.setAttribute('viewBox', '0 0 24 24');
 svgMarker.innerHTML = '<path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>';

 // Scale the SVG icon down
 var iconSize = 100;
 var scaleFactor = 0.5;
 svgMarker.setAttribute('width', iconSize * scaleFactor);
 svgMarker.setAttribute('height', iconSize * scaleFactor);
// set the aria-label attribute
svgMarker.setAttribute("aria-label", "Wind");
svgMarker.setAttribute("id", iddf);

    }
    else if(customValue == "addDust"){
         // Define the marker's icon using an SVG element
 var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarker.setAttribute('viewBox', '0 0 512 512');
 svgMarker.innerHTML = '<path d="m264.2 21.3a39.9 39.9 0 0 1 68.8 27.7c0 22-18 40-40 40h-284m139.2 123.7a39.9 39.9 0 0 0 68.8-27.7c0-22-18-40-40-40h-168" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="18"/><circle cx="96" cy="196" r="12"/><circle cx="180" cy="196" r="12"/><circle cx="264" cy="196" r="12"/><circle cx="222" cy="256" r="12"/><circle cx="306" cy="256" r="12"/><circle cx="390" cy="256" r="12"/><circle cx="172" cy="316" r="12"/><circle cx="256" cy="316" r="12"/><circle cx="340" cy="316" r="12"/><use height="234" transform="translate(86 139)" width="342" xlink:href="#a"/>';
 
 // Scale the SVG icon down
 var iconSize = 100;
 var scaleFactor = 0.5;
 svgMarker.setAttribute('width', iconSize * scaleFactor);
 svgMarker.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
svgMarker.setAttribute("aria-label", "Dust");
svgMarker.setAttribute("id", iddf);
    }
    else if(customValue == "addHail"){ 
         // Define the marker's icon using an SVG element
 var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarker.setAttribute('viewBox', '0 0 24 24');
 svgMarker.innerHTML = '<path d="M3.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zM7.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm3.592 3.724a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm1.247-6.999a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10.5H13a3 3 0 0 0 .405-5.973z"/>';
 
 // Scale the SVG icon down
 var iconSize = 100;
 var scaleFactor = 0.5;
 svgMarker.setAttribute('width', iconSize * scaleFactor);
 svgMarker.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
svgMarker.setAttribute("aria-label", "Hail");
svgMarker.setAttribute("id", iddf);
}
    else if(customValue == "addA"){
  // Define the marker's icon using an SVG element
 var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarker.setAttribute('viewBox', '0 0 384 512');
 svgMarker.innerHTML = '<path d="M221.5 51.7C216.6 39.8 204.9 32 192 32s-24.6 7.8-29.5 19.7l-120 288-40 96c-6.8 16.3 .9 35 17.2 41.8s35-.9 41.8-17.2L93.3 384H290.7l31.8 76.3c6.8 16.3 25.5 24 41.8 17.2s24-25.5 17.2-41.8l-40-96-120-288zM264 320H120l72-172.8L264 320z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarker.setAttribute('width', iconSize * scaleFactor);
 svgMarker.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
svgMarker.setAttribute("aria-label", "A");
svgMarker.setAttribute("id", iddf);
        
    }
    else if(customValue == "addB"){
          // Define the marker's icon using an SVG element
 var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarker.setAttribute('viewBox', '0 0 384 512');
 svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H192c70.7 0 128-57.3 128-128c0-46.5-24.8-87.3-62-109.7c18.7-22.3 30-51 30-82.3c0-70.7-57.3-128-128-128H64zm96 192H64V96h96c35.3 0 64 28.7 64 64s-28.7 64-64 64zM64 288h96 32c35.3 0 64 28.7 64 64s-28.7 64-64 64H64V288z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarker.setAttribute('width', iconSize * scaleFactor);
 svgMarker.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
svgMarker.setAttribute("aria-label", "B");
svgMarker.setAttribute("id", iddf);
     
    }
    else if(customValue == "addC"){  
                // Define the marker's icon using an SVG element
 var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarker.setAttribute('viewBox', '0 0 384 512');
 svgMarker.innerHTML = '<path d="M329.1 142.9c-62.5-62.5-155.8-62.5-218.3 0s-62.5 163.8 0 226.3s155.8 62.5 218.3 0c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3c-87.5 87.5-221.3 87.5-308.8 0s-87.5-229.3 0-316.8s221.3-87.5 308.8 0c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarker.setAttribute('width', iconSize * scaleFactor);
 svgMarker.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
svgMarker.setAttribute("aria-label", "C");
svgMarker.setAttribute("id", iddf);
    }
    else if(customValue == "addD"){  
    // Define the marker's icon using an SVG element
 var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarker.setAttribute('viewBox', '0 0 384 512');
 svgMarker.innerHTML = '<path d="M0 96C0 60.7 28.7 32 64 32h96c123.7 0 224 100.3 224 224s-100.3 224-224 224H64c-35.3 0-64-28.7-64-64V96zm160 0H64V416h96c88.4 0 160-71.6 160-160s-71.6-160-160-160z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarker.setAttribute('width', iconSize * scaleFactor);
 svgMarker.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
svgMarker.setAttribute("aria-label", "D");
svgMarker.setAttribute("id", iddf);
}
    else if(customValue == "addE"){  
            // Define the marker's icon using an SVG element
 var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarker.setAttribute('viewBox', '0 0 384 512');
 svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarker.setAttribute('width', iconSize * scaleFactor);
 svgMarker.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
svgMarker.setAttribute("aria-label", "E");
svgMarker.setAttribute("id", iddf);
}
    else if(customValue == "addF"){
        // Define the marker's icon using an SVG element
 var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarker.setAttribute('viewBox', '0 0 384 512');
 svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 448c0 17.7 14.3 32 32 32s32-14.3 32-32V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarker.setAttribute('width', iconSize * scaleFactor);
 svgMarker.setAttribute('height', iconSize * scaleFactor); 
 // set the aria-label attribute
svgMarker.setAttribute("aria-label", "F");
svgMarker.setAttribute("id", iddf);
    }
    else if(customValue == "addG"){
         // Define the marker's icon using an SVG element
 var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarker.setAttribute('viewBox', '0 0 384 512');
 svgMarker.innerHTML = '<path d="M224 96C135.6 96 64 167.6 64 256s71.6 160 160 160c77.4 0 142-55 156.8-128H256c-17.7 0-32-14.3-32-32s14.3-32 32-32H400c25.8 0 49.6 21.4 47.2 50.6C437.8 389.6 341.4 480 224 480C100.3 480 0 379.7 0 256S100.3 32 224 32c57.4 0 109.7 21.6 149.3 57c13.2 11.8 14.3 32 2.5 45.2s-32 14.3-45.2 2.5C302.3 111.4 265 96 224 96z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarker.setAttribute('width', iconSize * scaleFactor);
 svgMarker.setAttribute('height', iconSize * scaleFactor); 
 // set the aria-label attribute
svgMarker.setAttribute("aria-label", "G");
svgMarker.setAttribute("id", iddf);
}
    else if(customValue == "addH"){
         // Define the marker's icon using an SVG element
 var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarker.setAttribute('viewBox', '0 0 384 512');
 svgMarker.innerHTML = '<path d="M320 256l0 192c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V192L64 192 64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-192 256 0z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarker.setAttribute('width', iconSize * scaleFactor);
 svgMarker.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
svgMarker.setAttribute("aria-label", "H");
svgMarker.setAttribute("id", iddf);
 }
    else if(customValue == "addI"){
  // Define the marker's icon using an SVG element
 var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarker.setAttribute('viewBox', '0 0 384 512');
 svgMarker.innerHTML = '<path d="M32 32C14.3 32 0 46.3 0 64S14.3 96 32 96h96V416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H192V96h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H160 32z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarker.setAttribute('width', iconSize * scaleFactor);
 svgMarker.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
svgMarker.setAttribute("aria-label", "I");
svgMarker.setAttribute("id", iddf);
        
    }
    

  // Create a new marker with the customized icon
  var marker = new mapboxgl.Marker({
    element: svgMarker,
    draggable: true 
  });
 
 // Set the marker's initial position and add it to the map
  marker.setLngLat([-1.6244,6.6918]).addTo(map);
  // Add a dragend event listener to the marker
  marker.on('dragend', function() {
// on drag remove the maker and insert the new marker
    var index = markers.findIndex(function(item) {
        return item.id === marker.getElement().id;
    });
  if (index !== -1) {
    markers.splice(index, 1);
 // Add the new marker to the markers array
 markers.push({'id': marker.getElement().id, 'icontype': marker.getElement().getAttribute("aria-label"), 'lnglat' : marker.getLngLat()});
    }

  console.log(markers);
  });

 

  // Add a click event listener to each marker
  marker.getElement().addEventListener('click', function () {
    // Set the selectedMarker variable to the clicked marker
    selectedMarker = marker;
  });

  // Add the new marker to the markers array
  markers.push({'id':marker.getElement().id, 'icontype': marker.getElement().getAttribute("aria-label"), 'lnglat' : marker.getLngLat()});
}

  
 
// Define a function to remove a marker on click
function removeMarker(selectmarker) {
    var index = markers.findIndex(function(item) {
        return item.id === selectmarker.getElement().id;
    });
    
selectmarker.remove();
  if (index !== -1) {
    markers.splice(index, 1);
    }
    console.log(index);
    console.log(markers);

 }
  
 
// Define a function to update the position of a marker
function updateMarkerPosition(marker, lngLat) {
    marker.setLngLat(lngLat);
  }
  
  // Define a function to customize the appearance of a marker
  function customizeMarker(marker, iconUrl) {
    var el = document.createElement('div');
    el.className = 'marker';
    el.style.backgroundImage = 'url(' + iconUrl + ')';
    el.style.width = '32px';
    el.style.height = '32px';
    marker.setElement(el);
  }

  // Add an event listener to the button to create a new marker
document.getElementById('button1').addEventListener('click', function() {
// Retrieve the value of the custom attribute
const customValue = this.getAttribute('typeofIcon');

    addMarker(customValue);

  });
  
//  change  type of marker type:
var svgIcons = document.querySelectorAll('.svgicon');
var addicon = document.querySelector("#button1");
svgIcons.forEach(function(svgIcon) {
  svgIcon.addEventListener('click', function() {
    var id = this.id;
    var content = this.textContent.trim();
    addicon.setAttribute('typeofIcon', id);
       addicon.textContent = content;
    console.log('ID:', id);
    console.log('Content:', content);
  });
});


 
 
 // Add an event listener to the button to remove the selected marker
 document.getElementById('button2').addEventListener('click', function() {
    
    if (selectedMarker) {
      removeMarker(selectedMarker);
      selectedMarker = null;
    }
    console.log(markers);
  });


// ===============END OF MORNING  MAP FOR ADDDAILYFORECAST PAGE=========================

// ===============afternoon MAP FOR ADDDAILYFORECAST PAGE=========================

mapboxgl.accessToken = 'pk.eyJ1IjoidGhlbzYiLCJhIjoiY2xmazRpa2VzMDdiZDN0czR5Z2tiMGxheCJ9.GMZxHYFG0rGU8R6133k1kg';
var mapaf = new mapboxgl.Map({
  container: 'mapAdmin1af', // container id
  style: 'mapbox://styles/mapbox/streets-v9', //hosted style id
  zoom: 5,
  center: [-1.6244,6.6918],
});

var drawFeatureIDaf = '';
var newDrawFeatureaf = false;
var polygonAfternoon = [];
// add draw
var drawaf = new MapboxDraw({
  displayControlsDefault: false,
  // this is used to allow for custom properties for styling
  // it appends the word "user_" to the property
  userProperties: true,
  controls: {
      'combine_features': false,
      'uncombine_features': false,
      polygon: true,
          trash: true
  },
  styles: [
      {
          'id': 'gl-draw-polygon-fill-inactive',
          'type': 'fill',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'Polygon'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'fill-color': '#f5f7f7',
              'fill-outline-color': '#f5f7f7',
              'fill-opacity': 0.1
          }
      },
      {
          'id': 'gl-draw-polygon-fill-active',
          'type': 'fill',
          'filter': ['all', ['==', 'active', 'true'],
              ['==', '$type', 'Polygon']
          ],
          'paint': {
              'fill-color': '#fbb03b',
              'fill-outline-color': '#fbb03b',
              'fill-opacity': 0.1
          }
      },
      {
          'id': 'gl-draw-polygon-midpoint',
          'type': 'circle',
          'filter': ['all', ['==', '$type', 'Point'],
              ['==', 'meta', 'midpoint']
          ],
          'paint': {
              'circle-radius': 3,
              'circle-color': '#fbb03b'
          }
      },
      {
          'id': 'gl-draw-polygon-stroke-inactive',
          'type': 'line',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'Polygon'],
              ['!=', 'mode', 'static']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#f5f7f7',
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-polygon-stroke-active',
          'type': 'line',
          'filter': ['all', ['==', 'active', 'true'],
              ['==', '$type', 'Polygon']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#fbb03b',
              'line-dasharray': [0.2, 2],
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-line-inactive',
          'type': 'line',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'LineString'],
              ['!=', 'mode', 'static']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#f5f7f7',
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-line-active',
          'type': 'line',
          'filter': ['all', ['==', '$type', 'LineString'],
              ['==', 'active', 'true']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#fbb03b',
              'line-dasharray': [0.2, 2],
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-polygon-and-line-vertex-stroke-inactive',
          'type': 'circle',
          'filter': ['all', ['==', 'meta', 'vertex'],
              ['==', '$type', 'Point'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'circle-radius': 5,
              'circle-color': '#fff'
          }
      },
      {
          'id': 'gl-draw-polygon-and-line-vertex-inactive',
          'type': 'circle',
          'filter': ['all', ['==', 'meta', 'vertex'],
              ['==', '$type', 'Point'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'circle-radius': 3,
              'circle-color': '#fbb03b'
          }
      },
      {
          'id': 'gl-draw-point-point-stroke-inactive',
          'type': 'circle',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'Point'],
              ['==', 'meta', 'feature'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'circle-radius': 5,
              'circle-opacity': 1,
              'circle-color': '#fff'
          }
      },
      {
          'id': 'gl-draw-point-inactive',
          'type': 'circle',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'Point'],
              ['==', 'meta', 'feature'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'circle-radius': 3,
              'circle-color': '#f5f7f7'
          }
      },
      {
          'id': 'gl-draw-point-stroke-active',
          'type': 'circle',
          'filter': ['all', ['==', '$type', 'Point'],
              ['==', 'active', 'true'],
              ['!=', 'meta', 'midpoint']
          ],
          'paint': {
              'circle-radius': 7,
              'circle-color': '#fff'
          }
      },
      {
          'id': 'gl-draw-point-active',
          'type': 'circle',
          'filter': ['all', ['==', '$type', 'Point'],
              ['!=', 'meta', 'midpoint'],
              ['==', 'active', 'true']
          ],
          'paint': {
              'circle-radius': 5,
              'circle-color': '#fbb03b'
          }
      },
      {
          'id': 'gl-draw-polygon-fill-static',
          'type': 'fill',
          'filter': ['all', ['==', 'mode', 'static'],
              ['==', '$type', 'Polygon']
          ],
          'paint': {
              'fill-color': '#404040',
              'fill-outline-color': '#404040',
              'fill-opacity': 0.1
          }
      },
      {
          'id': 'gl-draw-polygon-stroke-static',
          'type': 'line',
          'filter': ['all', ['==', 'mode', 'static'],
              ['==', '$type', 'Polygon']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#404040',
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-line-static',
          'type': 'line',
          'filter': ['all', ['==', 'mode', 'static'],
              ['==', '$type', 'LineString']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#404040',
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-point-static',
          'type': 'circle',
          'filter': ['all', ['==', 'mode', 'static'],
              ['==', '$type', 'Point']
          ],
          'paint': {
              'circle-radius': 5,
              'circle-color': '#404040'
          }
      },

     

      {
          'id': 'gl-draw-polygon-color-picker',
          'type': 'fill',
          'filter': ['all', ['==', '$type', 'Polygon'],
              ['has', 'user_portColor']
          ],
          'paint': {
              'fill-color': ['get', 'user_portColor'],
              'fill-outline-color': ['get', 'user_portColor'],
              'fill-opacity': 0.5
          }
      },
      {
          'id': 'gl-draw-line-color-picker',
          'type': 'line',
          'filter': ['all', ['==', '$type', 'LineString'],
              ['has', 'user_portColor']
          ],
          'paint': {
              'line-color': ['get', 'user_portColor'],
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-point-color-picker',
          'type': 'circle',
          'filter': ['all', ['==', '$type', 'Point'],
              ['has', 'user_portColor']
          ],
          'paint': {
              'circle-radius': 3,
              'circle-color': ['get', 'user_portColor']
          }
      },

  ]
})

mapaf.addControl(drawaf, 'top-left');
let yellowBtnaf = document.querySelector("#yellow-coloraf");
let orangeBtnaf = document.querySelector("#orange-coloraf");

let redBtnaf = document.querySelector("#red-coloraf");
let greenBtnaf = document.querySelector("#green-coloraf");

yellowBtnaf.addEventListener("click", ()=>{
  changeColoraf('yellow')
});
orangeBtnaf.addEventListener("click", ()=>{
  changeColoraf('orange')
});
redBtnaf.addEventListener("click", ()=>{
  changeColoraf('red')
});

greenBtnaf.addEventListener("click", ()=>{
  changeColoraf('green')
});

//change colors
function changeColoraf(color) {
  if (drawFeatureIDaf !== '' && typeof drawaf === 'object') {
      // add whatever colors you want here...
      if (color === 'yellow') {
          drawaf.setFeatureProperty(drawFeatureIDaf, 'portColor', '#e9f542');
      }
       else if (color === 'orange') {
          drawaf.setFeatureProperty(drawFeatureIDaf, 'portColor', '#eda411');
      }
       else if (color === 'red') {
          drawaf.setFeatureProperty(drawFeatureIDaf, 'portColor', '#ff0000');
      } else if (color === 'green') {
          drawaf.setFeatureProperty(drawFeatureIDaf, 'portColor', '#008000');
      }

      var feataf = drawaf.get(drawFeatureIDaf);
      drawaf.add(feataf)

// on change of  color, update the polygonAfternoon  array
var drawId = feataf.id;
if (polygonAfternoon.length === 0) {
    polygonAfternoon.push({
        'id': drawId,
        'cordinates': feataf['geometry']['coordinates'],
        'color' : feataf.properties.portColor,
    });
  } else {
    var index = polygonAfternoon.findIndex(function(item) {
            return item.id === drawId;
        });
        if (index !== -1) {
                polygonAfternoon.splice(index, 1);
                polygonAfternoon.push({
                    'id': drawId,
                    'cordinates': feataf['geometry']['coordinates'],
                    'color' : feataf.properties.portColor,
                });
            }else{
                polygonAfternoon.push({
                    'id': drawId,
                    'cordinates': feataf['geometry']['coordinates'],
                    'color' : feataf.properties.portColor,
                });
                console.log(`afternoon id doesn't exist: ${drawId}`)
            } 
        }

        console.log(polygonAfternoon);

  }
}

// callback for draw.update and draw.selectionchange
var setDrawFeatureaf = function(e) {
    if (e.features.length) {
        var feataf = e.features[0];
        drawFeatureIDaf = feataf.id;
        if (polygonAfternoon.length === 0) {
            polygonAfternoon.push({
                'id': drawFeatureIDaf,
                'cordinates': feataf['geometry']['coordinates'],
                'color' : feataf.properties.portColor,
            });
          } else {
            var index = polygonAfternoon.findIndex(function(item) {
                    return item.id === drawFeatureIDaf;
                });
                if (index !== -1) {
                    polygonAfternoon.splice(index, 1);
                    polygonAfternoon.push({
                            'id': drawFeatureIDaf,
                            'cordinates': feataf['geometry']['coordinates'],
                            'color' : feataf.properties.portColor,
                        });
                    }else{
                        polygonAfternoon.push({
                            'id': drawFeatureIDaf,
                            'cordinates': feataf['geometry']['coordinates'],
                            'color' : feataf.properties.portColor,
                        });
                        console.log(`afternoon id doesn't exist: ${drawFeatureIDaf}`)
                    } 
                }

  console.log(polygonAfternoon);
    }
  }

// function(e) {
//   if (e.features.length && e.features[0].type === 'Feature') {
//       var feataf = e.features[0];
//       drawFeatureIDaf = feataf.id;
//       console.log(`afternoon:==  ${feataf['geometry']['coordinates']}` );
//   }
// }

/* Event Handlers for Draw Tools */

mapaf.on('draw.create', function() {
  newDrawFeatureaf = true;
});

mapaf.on('draw.update', setDrawFeatureaf);

mapaf.on('draw.selectionchange', setDrawFeatureaf);

mapaf.on('draw.delete', function(event) {
    // use the deletedPolygonId to do something
    if (event.features.length) {
        var deletedPolygonId = event.features[0].id;
    //     var feat = event.features[0];
    //  var   draID = feat.id;
        if (polygonAfternoon.length != 0) {
            
            var index = polygonAfternoon.findIndex(function(item) {
                    return item.id === deletedPolygonId;
                });
                if (index !== -1) {
                        polygonAfternoon.splice(index, 1);
                        // polygonsMorning.push({
                        //     'id': draID,
                        //     'cordinates': feat['geometry']['coordinates'],
                        //     'color' : feat.properties.portColor,
                        // });
                         console.log(`afternoon id DELETED: ${deletedPolygonId}`)
                    }else{
                        
                        console.log(`afternoon id doesn't exist: ${deletedPolygonId}`)
                    } 
                }
  console.log(polygonAfternoon);
    }
  });

mapaf.on('click', function(e) {
  if (!newDrawFeatureaf) {
      var drawFeatureAtPointaf = drawaf.getFeatureIdsAt(e.point);
      //if another drawFeature is not found - reset drawFeatureIDaf
      drawFeatureIDaf = drawFeatureAtPointaf.length ? drawFeatureAtPointaf[0] : '';
  }

  newDrawFeatureaf = false;

});
 
 // Define an array to store all markers
var markersaf = [];

// Variable to store the selected marker
var selectedMarkeraf = null;

// Define a function to create a new draggable marker and add it to the map
function addMarkeraf(customValue) {
    const iddf = generateRandomId();

    if(customValue == "addRainaf"){
          // Define the marker's icon using an SVG element
var svgMarkeraf = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
svgMarkeraf.setAttribute('viewBox', '0 0 24 24');
svgMarkeraf.innerHTML = '<path d="M4.176 11.032a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm.229-7.005a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10H13a3 3 0 0 0 .405-5.973z"/>';
// Scale the SVG icon down
var iconSize = 100;
var scaleFactor = 0.5;
svgMarkeraf.setAttribute('width', iconSize * scaleFactor);
svgMarkeraf.setAttribute('height', iconSize * scaleFactor);
// set the aria-label attribute
svgMarkeraf.setAttribute("aria-label", "Rain");
svgMarkeraf.setAttribute("id", iddf);
    
    }else if(customValue == "addWindaf"){
 // Define the marker's icon using an SVG element
 var svgMarkeraf = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkeraf.setAttribute('viewBox', '0 0 24 24');
 svgMarkeraf.innerHTML = '<path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>';

 // Scale the SVG icon down
 var iconSize = 100;
 var scaleFactor = 0.5;
 svgMarkeraf.setAttribute('width', iconSize * scaleFactor);
 svgMarkeraf.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
 svgMarkeraf.setAttribute("aria-label", "Wind");
 svgMarkeraf.setAttribute("id", iddf);

    }
    else if(customValue == "addDustaf"){
         // Define the marker's icon using an SVG element
 var svgMarkeraf = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkeraf.setAttribute('viewBox', '0 0 512 512');
 svgMarkeraf.innerHTML = '<path d="m264.2 21.3a39.9 39.9 0 0 1 68.8 27.7c0 22-18 40-40 40h-284m139.2 123.7a39.9 39.9 0 0 0 68.8-27.7c0-22-18-40-40-40h-168" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="18"/><circle cx="96" cy="196" r="12"/><circle cx="180" cy="196" r="12"/><circle cx="264" cy="196" r="12"/><circle cx="222" cy="256" r="12"/><circle cx="306" cy="256" r="12"/><circle cx="390" cy="256" r="12"/><circle cx="172" cy="316" r="12"/><circle cx="256" cy="316" r="12"/><circle cx="340" cy="316" r="12"/><use height="234" transform="translate(86 139)" width="342" xlink:href="#a"/>';
  
 
 // Scale the SVG icon down
 var iconSize = 100;
 var scaleFactor = 0.5;
 svgMarkeraf.setAttribute('width', iconSize * scaleFactor);
 svgMarkeraf.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
 svgMarkeraf.setAttribute("aria-label", "Dust");
 svgMarkeraf.setAttribute("id", iddf);
    }
    else if(customValue == "addHailaf"){ 
         // Define the marker's icon using an SVG element
 var svgMarkeraf = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkeraf.setAttribute('viewBox', '0 0 24 24');
 svgMarkeraf.innerHTML = '<path d="M3.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zM7.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm3.592 3.724a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm1.247-6.999a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10.5H13a3 3 0 0 0 .405-5.973z"/>';
 
 // Scale the SVG icon down
 var iconSize = 100;
 var scaleFactor = 0.5;
 svgMarkeraf.setAttribute('width', iconSize * scaleFactor);
 svgMarkeraf.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
 svgMarkeraf.setAttribute("aria-label", "Hail");
 svgMarkeraf.setAttribute("id", iddf);
}
    else if(customValue == "addAaf"){
  // Define the marker's icon using an SVG element
 var svgMarkeraf = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkeraf.setAttribute('viewBox', '0 0 384 512');
 svgMarkeraf.innerHTML = '<path d="M221.5 51.7C216.6 39.8 204.9 32 192 32s-24.6 7.8-29.5 19.7l-120 288-40 96c-6.8 16.3 .9 35 17.2 41.8s35-.9 41.8-17.2L93.3 384H290.7l31.8 76.3c6.8 16.3 25.5 24 41.8 17.2s24-25.5 17.2-41.8l-40-96-120-288zM264 320H120l72-172.8L264 320z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkeraf.setAttribute('width', iconSize * scaleFactor);
 svgMarkeraf.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
 svgMarkeraf.setAttribute("aria-label", "A");
 svgMarkeraf.setAttribute("id", iddf);
        
    }
    else if(customValue == "addBaf"){
          // Define the marker's icon using an SVG element
 var svgMarkeraf = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkeraf.setAttribute('viewBox', '0 0 384 512');
 svgMarkeraf.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H192c70.7 0 128-57.3 128-128c0-46.5-24.8-87.3-62-109.7c18.7-22.3 30-51 30-82.3c0-70.7-57.3-128-128-128H64zm96 192H64V96h96c35.3 0 64 28.7 64 64s-28.7 64-64 64zM64 288h96 32c35.3 0 64 28.7 64 64s-28.7 64-64 64H64V288z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkeraf.setAttribute('width', iconSize * scaleFactor);
 svgMarkeraf.setAttribute('height', iconSize * scaleFactor);
  // set the aria-label attribute
  svgMarkeraf.setAttribute("aria-label", "B");
  svgMarkeraf.setAttribute("id", iddf);
     
    }
    else if(customValue == "addCaf"){  
                // Define the marker's icon using an SVG element
 var svgMarkeraf = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkeraf.setAttribute('viewBox', '0 0 384 512');
 svgMarkeraf.innerHTML = '<path d="M329.1 142.9c-62.5-62.5-155.8-62.5-218.3 0s-62.5 163.8 0 226.3s155.8 62.5 218.3 0c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3c-87.5 87.5-221.3 87.5-308.8 0s-87.5-229.3 0-316.8s221.3-87.5 308.8 0c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkeraf.setAttribute('width', iconSize * scaleFactor);
 svgMarkeraf.setAttribute('height', iconSize * scaleFactor);
  // set the aria-label attribute
 svgMarkeraf.setAttribute("aria-label", "C");
 svgMarkeraf.setAttribute("id", iddf);
    }
    else if(customValue == "addDaf"){  
    // Define the marker's icon using an SVG element
 var svgMarkeraf = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkeraf.setAttribute('viewBox', '0 0 384 512');
 svgMarkeraf.innerHTML = '<path d="M0 96C0 60.7 28.7 32 64 32h96c123.7 0 224 100.3 224 224s-100.3 224-224 224H64c-35.3 0-64-28.7-64-64V96zm160 0H64V416h96c88.4 0 160-71.6 160-160s-71.6-160-160-160z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkeraf.setAttribute('width', iconSize * scaleFactor);
 svgMarkeraf.setAttribute('height', iconSize * scaleFactor);
  // set the aria-label attribute
  svgMarkeraf.setAttribute("aria-label", "D");
  svgMarkeraf.setAttribute("id", iddf);
}
    else if(customValue == "addEaf"){  
            // Define the marker's icon using an SVG element
 var svgMarkeraf = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkeraf.setAttribute('viewBox', '0 0 384 512');
 svgMarkeraf.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkeraf.setAttribute('width', iconSize * scaleFactor);
 svgMarkeraf.setAttribute('height', iconSize * scaleFactor);
  // set the aria-label attribute
  svgMarkeraf.setAttribute("aria-label", "E");
  svgMarkeraf.setAttribute("id", iddf);
}
    else if(customValue == "addFaf"){
        // Define the marker's icon using an SVG element
 var svgMarkeraf = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkeraf.setAttribute('viewBox', '0 0 384 512');
 svgMarkeraf.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 448c0 17.7 14.3 32 32 32s32-14.3 32-32V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkeraf.setAttribute('width', iconSize * scaleFactor);
 svgMarkeraf.setAttribute('height', iconSize * scaleFactor); 
  // set the aria-label attribute
  svgMarkeraf.setAttribute("aria-label", "F");
  svgMarkeraf.setAttribute("id", iddf);
    }
    else if(customValue == "addGaf"){
         // Define the marker's icon using an SVG element
 var svgMarkeraf = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkeraf.setAttribute('viewBox', '0 0 384 512');
 svgMarkeraf.innerHTML = '<path d="M224 96C135.6 96 64 167.6 64 256s71.6 160 160 160c77.4 0 142-55 156.8-128H256c-17.7 0-32-14.3-32-32s14.3-32 32-32H400c25.8 0 49.6 21.4 47.2 50.6C437.8 389.6 341.4 480 224 480C100.3 480 0 379.7 0 256S100.3 32 224 32c57.4 0 109.7 21.6 149.3 57c13.2 11.8 14.3 32 2.5 45.2s-32 14.3-45.2 2.5C302.3 111.4 265 96 224 96z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkeraf.setAttribute('width', iconSize * scaleFactor);
 svgMarkeraf.setAttribute('height', iconSize * scaleFactor); 
  // set the aria-label attribute
  svgMarkeraf.setAttribute("aria-label", "G");
  svgMarkeraf.setAttribute("id", iddf);
}
    else if(customValue == "addHaf"){
         // Define the marker's icon using an SVG element
 var svgMarkeraf = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkeraf.setAttribute('viewBox', '0 0 384 512');
 svgMarkeraf.innerHTML = '<path d="M320 256l0 192c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V192L64 192 64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-192 256 0z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkeraf.setAttribute('width', iconSize * scaleFactor);
 svgMarkeraf.setAttribute('height', iconSize * scaleFactor);
  // set the aria-label attribute
  svgMarkeraf.setAttribute("aria-label", "H");
  svgMarkeraf.setAttribute("id", iddf);
 }
    else if(customValue == "addIaf"){
  // Define the marker's icon using an SVG element
 var svgMarkeraf = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkeraf.setAttribute('viewBox', '0 0 384 512');
 svgMarkeraf.innerHTML = '<path d="M32 32C14.3 32 0 46.3 0 64S14.3 96 32 96h96V416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H192V96h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H160 32z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkeraf.setAttribute('width', iconSize * scaleFactor);
 svgMarkeraf.setAttribute('height', iconSize * scaleFactor);
  // set the aria-label attribute
  svgMarkeraf.setAttribute("aria-label", "I");
  svgMarkeraf.setAttribute("id", iddf);
        
    }
    


  // Create a new markeraf with the customized icon
  var markeraf = new mapboxgl.Marker({
    element: svgMarkeraf,
    draggable: true,
  });

  // Add a dragend event listener to the markeraf
  markeraf.on('dragend', function() {
    // on drag remove the maker and insert the new marker
    var index = markersaf.findIndex(function(item) {
        return item.id === markeraf.getElement().id;
    });
  if (index !== -1) {
    markersaf.splice(index, 1);
 // Add the new marker to the markers array
 markersaf.push({'id': markeraf.getElement().id, 'icontype': markeraf.getElement().getAttribute("aria-label"), 'lnglat' : markeraf.getLngLat()});
    }

  console.log(markersaf);
  });

  // Set the markeraf's initial position and add it to the map
  markeraf.setLngLat([-1.6244,6.6918]).addTo(mapaf);

  // Add a click event listener to each markeraf
  markeraf.getElement().addEventListener('click', function () {
    // Set the selectedMarkeraf variable to the clicked marker
    selectedMarkeraf = markeraf;
  });

  // Add the new marker to the markers array
 markersaf.push({'id': markeraf.getElement().id, 'icontype': markeraf.getElement().getAttribute("aria-label"), 'lnglat' : markeraf.getLngLat()});
}

  
 
// Define a function to remove a marker on click
function removeMarkeraf(markeraf) {
    
    markeraf.remove();
  // Remove the selected marker from the markersaf array
  var index = markersaf.findIndex(function(item) {
    return item.id === markeraf.getElement().id;
});
  if (index !== -1) {
    markersaf.splice(index, 1);
  }

console.log(index);
console.log(markersaf);
  }
  
 
// Define a function to update the position of a marker
function updateMarkerPositionaf(markeraf, lngLat) {
    markeraf.setLngLat(lngLat);
  }
  
  // Define a function to customize the appearance of a marker
  function customizeMarkeraf(markeraf, iconUrl) {
    var el = document.createElement('div');
    el.className = 'markeraf';
    el.style.backgroundImage = 'url(' + iconUrl + ')';
    el.style.width = '32px';
    el.style.height = '32px';
    markeraf.setElement(el);
  }

  // Add an event listener to the button to create a new marker
document.getElementById('button1af').addEventListener('click', function() {
    
// Retrieve the value of the custom attribute
var customValue = this.getAttribute('typeofIcon');
// console.log(customValue); 
    addMarkeraf(customValue);
    console.log('afternoon markers:', markersaf);

  });
  
//  change  type of marker type:
var svgIconsaf = document.querySelectorAll('.svgiconaf');
var addiconaf = document.querySelector("#button1af");
svgIconsaf.forEach(function(svgIconaf) {
  svgIconaf.addEventListener('click', function() {
    var id = this.id;
    var content = this.textContent.trim();
    addiconaf.setAttribute('typeofIcon', id);
       addiconaf.textContent = content;
    console.log('afternoon tID:', id);
    console.log('afternoon Content:', content);
  });
});


 
 // Add an event listener to the button to remove the selected marker
 document.getElementById('button2af').addEventListener('click', function() {
    
    if (selectedMarkeraf) {
      removeMarkeraf(selectedMarkeraf);
      selectedMarkeraf = null;
    }
   console.log('afternoon markers', markersaf);
  });


// ===============END OF AFTERNOON MAP FOR ADDDAILYFORECAST PAGE=========================



// ===============EVENING MAP FOR ADDDAILYFORECAST PAGE=========================

mapboxgl.accessToken = 'pk.eyJ1IjoidGhlbzYiLCJhIjoiY2xmazRpa2VzMDdiZDN0czR5Z2tiMGxheCJ9.GMZxHYFG0rGU8R6133k1kg';
var mapev = new mapboxgl.Map({
  container: 'mapAdmin1ev', // container id
  style: 'mapbox://styles/mapbox/streets-v9', //hosted style id
  zoom: 5,
  center: [-1.6244,6.6918],
});

var drawFeatureIDev = '';
var newDrawFeatureev = false;
var polygonsEvening = [];
// add draw
var drawev = new MapboxDraw({
  displayControlsDefault: false,
  // this is used to allow for custom properties for styling
  // it appends the word "user_" to the property
  userProperties: true,
  controls: {
      'combine_features': false,
      'uncombine_features': false,
      polygon: true,
          trash: true
  },
  styles: [
      {
          'id': 'gl-draw-polygon-fill-inactive',
          'type': 'fill',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'Polygon'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'fill-color': '#f5f7f7',
              'fill-outline-color': '#f5f7f7',
              'fill-opacity': 0.1
          }
      },
      {
          'id': 'gl-draw-polygon-fill-active',
          'type': 'fill',
          'filter': ['all', ['==', 'active', 'true'],
              ['==', '$type', 'Polygon']
          ],
          'paint': {
              'fill-color': '#fbb03b',
              'fill-outline-color': '#fbb03b',
              'fill-opacity': 0.1
          }
      },
      {
          'id': 'gl-draw-polygon-midpoint',
          'type': 'circle',
          'filter': ['all', ['==', '$type', 'Point'],
              ['==', 'meta', 'midpoint']
          ],
          'paint': {
              'circle-radius': 3,
              'circle-color': '#fbb03b'
          }
      },
      {
          'id': 'gl-draw-polygon-stroke-inactive',
          'type': 'line',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'Polygon'],
              ['!=', 'mode', 'static']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#f5f7f7',
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-polygon-stroke-active',
          'type': 'line',
          'filter': ['all', ['==', 'active', 'true'],
              ['==', '$type', 'Polygon']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#fbb03b',
              'line-dasharray': [0.2, 2],
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-line-inactive',
          'type': 'line',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'LineString'],
              ['!=', 'mode', 'static']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#f5f7f7',
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-line-active',
          'type': 'line',
          'filter': ['all', ['==', '$type', 'LineString'],
              ['==', 'active', 'true']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#fbb03b',
              'line-dasharray': [0.2, 2],
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-polygon-and-line-vertex-stroke-inactive',
          'type': 'circle',
          'filter': ['all', ['==', 'meta', 'vertex'],
              ['==', '$type', 'Point'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'circle-radius': 5,
              'circle-color': '#fff'
          }
      },
      {
          'id': 'gl-draw-polygon-and-line-vertex-inactive',
          'type': 'circle',
          'filter': ['all', ['==', 'meta', 'vertex'],
              ['==', '$type', 'Point'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'circle-radius': 3,
              'circle-color': '#fbb03b'
          }
      },
      {
          'id': 'gl-draw-point-point-stroke-inactive',
          'type': 'circle',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'Point'],
              ['==', 'meta', 'feature'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'circle-radius': 5,
              'circle-opacity': 1,
              'circle-color': '#fff'
          }
      },
      {
          'id': 'gl-draw-point-inactive',
          'type': 'circle',
          'filter': ['all', ['==', 'active', 'false'],
              ['==', '$type', 'Point'],
              ['==', 'meta', 'feature'],
              ['!=', 'mode', 'static']
          ],
          'paint': {
              'circle-radius': 3,
              'circle-color': '#f5f7f7'
          }
      },
      {
          'id': 'gl-draw-point-stroke-active',
          'type': 'circle',
          'filter': ['all', ['==', '$type', 'Point'],
              ['==', 'active', 'true'],
              ['!=', 'meta', 'midpoint']
          ],
          'paint': {
              'circle-radius': 7,
              'circle-color': '#fff'
          }
      },
      {
          'id': 'gl-draw-point-active',
          'type': 'circle',
          'filter': ['all', ['==', '$type', 'Point'],
              ['!=', 'meta', 'midpoint'],
              ['==', 'active', 'true']
          ],
          'paint': {
              'circle-radius': 5,
              'circle-color': '#fbb03b'
          }
      },
      {
          'id': 'gl-draw-polygon-fill-static',
          'type': 'fill',
          'filter': ['all', ['==', 'mode', 'static'],
              ['==', '$type', 'Polygon']
          ],
          'paint': {
              'fill-color': '#404040',
              'fill-outline-color': '#404040',
              'fill-opacity': 0.1
          }
      },
      {
          'id': 'gl-draw-polygon-stroke-static',
          'type': 'line',
          'filter': ['all', ['==', 'mode', 'static'],
              ['==', '$type', 'Polygon']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#404040',
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-line-static',
          'type': 'line',
          'filter': ['all', ['==', 'mode', 'static'],
              ['==', '$type', 'LineString']
          ],
          'layout': {
              'line-cap': 'round',
              'line-join': 'round'
          },
          'paint': {
              'line-color': '#404040',
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-point-static',
          'type': 'circle',
          'filter': ['all', ['==', 'mode', 'static'],
              ['==', '$type', 'Point']
          ],
          'paint': {
              'circle-radius': 5,
              'circle-color': '#404040'
          }
      },

     

      {
          'id': 'gl-draw-polygon-color-picker',
          'type': 'fill',
          'filter': ['all', ['==', '$type', 'Polygon'],
              ['has', 'user_portColor']
          ],
          'paint': {
              'fill-color': ['get', 'user_portColor'],
              'fill-outline-color': ['get', 'user_portColor'],
              'fill-opacity': 0.5
          }
      },
      {
          'id': 'gl-draw-line-color-picker',
          'type': 'line',
          'filter': ['all', ['==', '$type', 'LineString'],
              ['has', 'user_portColor']
          ],
          'paint': {
              'line-color': ['get', 'user_portColor'],
              'line-width': 2
          }
      },
      {
          'id': 'gl-draw-point-color-picker',
          'type': 'circle',
          'filter': ['all', ['==', '$type', 'Point'],
              ['has', 'user_portColor']
          ],
          'paint': {
              'circle-radius': 3,
              'circle-color': ['get', 'user_portColor']
          }
      },

  ]
})

mapev.addControl(drawev, 'top-left');
let yellowBtnev = document.querySelector("#yellow-colorev");
let orangeBtnev = document.querySelector("#orange-colorev");

let redBtnev = document.querySelector("#red-colorev");
let greenBtnev = document.querySelector("#green-colorev");


yellowBtnev.addEventListener("click", ()=>{
  changeColorev('yellow')
});
orangeBtnev.addEventListener("click", ()=>{
  changeColorev('orange')
});
redBtnev.addEventListener("click", ()=>{
  changeColorev('red')
});

greenBtnev.addEventListener("click", ()=>{
  changeColorev('green')
});

//change colors
function changeColorev(color) {
  if (drawFeatureIDev !== '' && typeof drawev === 'object') {
      // add whatever colors you want here...
      if (color === 'yellow') {
          drawev.setFeatureProperty(drawFeatureIDev, 'portColor', '#e9f542');
      }
       else if (color === 'orange') {
          drawev.setFeatureProperty(drawFeatureIDev, 'portColor', '#eda411');
      }
       else if (color === 'red') {
          drawev.setFeatureProperty(drawFeatureIDev, 'portColor', '#ff0000');
      } else if (color === 'green') {
          drawev.setFeatureProperty(drawFeatureIDev, 'portColor', '#008000');
      }

      var featev = drawev.get(drawFeatureIDev);
      drawev.add(featev);

// on change of  color, update the polygonsEvening  array
var drawId = featev.id;
if (polygonsEvening.length === 0) {
    polygonsEvening.push({
        'id': drawId,
        'cordinates': featev['geometry']['coordinates'],
        'color' : featev.properties.portColor,
    });
  } else {
    var index = polygonsEvening.findIndex(function(item) {
            return item.id === drawId;
        });
        if (index !== -1) {
            polygonsEvening.splice(index, 1);
            polygonsEvening.push({
                    'id': drawId,
                    'cordinates': featev['geometry']['coordinates'],
                    'color' : featev.properties.portColor,
                });
            }else{
                polygonsEvening.push({
                    'id': drawId,
                    'cordinates': featev['geometry']['coordinates'],
                    'color' : featev.properties.portColor,
                });
                console.log(`evening id doesn't exist: ${drawId}`)
            } 
        }
console.log(polygonsEvening);
      
  }
}

// callback for draw.update and draw.selectionchange
var setDrawFeatureev = function(e) {
    if (e.features.length) {
        var featev = e.features[0];
        drawFeatureIDev = featev.id;
        if (polygonsEvening.length === 0) {
            polygonsEvening.push({
                'id': drawFeatureIDev,
                'cordinates': featev['geometry']['coordinates'],
                'color' : featev.properties.portColor,
            });
          } else {
            var index = polygonsEvening.findIndex(function(item) {
                    return item.id === drawFeatureIDev;
                });
                if (index !== -1) {
                    polygonsEvening.splice(index, 1);
                    polygonsEvening.push({
                            'id': drawFeatureIDev,
                            'cordinates': featev['geometry']['coordinates'],
                            'color' : featev.properties.portColor,
                        });
                    }else{
                        polygonsEvening.push({
                            'id': drawFeatureIDev,
                            'cordinates': featev['geometry']['coordinates'],
                            'color' : featev.properties.portColor,
                        });
                        console.log(`evening id doesn't exist: ${drawFeatureIDev}`)
                    } 
                }

  console.log(polygonsEvening);
    }
  }


// function(e) {
//   if (e.features.length && e.features[0].type === 'Feature') {
//       var featev = e.features[0];
//       drawFeatureIDev = featev.id;
//       console.log(`evening:==  ${featev['geometry']['coordinates']}` );
//   }
// }

/* Event Handlers for Draw Tools */

mapev.on('draw.create', function() {
  newDrawFeatureev = true;
});

mapev.on('draw.update', setDrawFeatureev);

mapev.on('draw.selectionchange', setDrawFeatureev);


mapev.on('draw.delete', function(event) {
    // use the deletedPolygonId to do something
    if (event.features.length) {
        var deletedPolygonId = event.features[0].id;
    //     var feat = event.features[0];
    //  var   draID = feat.id;
        if (polygonsEvening.length != 0) {
            
            var index = polygonsEvening.findIndex(function(item) {
                    return item.id === deletedPolygonId;
                });
                if (index !== -1) {
                        polygonsEvening.splice(index, 1);
                         
                         console.log(`evening id DELETED: ${deletedPolygonId}`)
                    }else{
                        
                        console.log(`evening id doesn't exist: ${deletedPolygonId}`)
                    } 
                }

  console.log(polygonsEvening);
    }
   
  });

mapev.on('click', function(e) {
  if (!newDrawFeatureev) {
      var drawFeatureAtPointev = drawev.getFeatureIdsAt(e.point);
      //if another drawFeature is not found - reset drawFeatureIDev
      drawFeatureIDev = drawFeatureAtPointev.length ? drawFeatureAtPointev[0] : '';
  }

  newDrawFeatureev = false;

});
 
 // Define an array to store all markers
var markersev = [];

// Variable to store the selected marker
var selectedMarkerev = null;

// Define a function to create a new draggable marker and add it to the map
function addMarkerev(customValue) {
    const iddf = generateRandomId();
    if(customValue == "addRainev"){
          // Define the marker's icon using an SVG element
var svgMarkerev = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
svgMarkerev.setAttribute('viewBox', '0 0 24 24');
svgMarkerev.innerHTML = '<path d="M4.176 11.032a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm.229-7.005a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10H13a3 3 0 0 0 .405-5.973z"/>';
// Scale the SVG icon down
var iconSize = 100;
var scaleFactor = 0.5;
svgMarkerev.setAttribute('width', iconSize * scaleFactor);
svgMarkerev.setAttribute('height', iconSize * scaleFactor);
 // set the aria-label attribute
 svgMarkerev.setAttribute("aria-label", "Rain");
 svgMarkerev.setAttribute("id", iddf);
    
    }else if(customValue == "addWindev"){
 // Define the marker's icon using an SVG element
 var svgMarkerev = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkerev.setAttribute('viewBox', '0 0 24 24');
 svgMarkerev.innerHTML = '<path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>';

 // Scale the SVG icon down
 var iconSize = 100;
 var scaleFactor = 0.5;
 svgMarkerev.setAttribute('width', iconSize * scaleFactor);
 svgMarkerev.setAttribute('height', iconSize * scaleFactor);
  // set the aria-label attribute
  svgMarkerev.setAttribute("aria-label", "Wind");
  svgMarkerev.setAttribute("id", iddf);

    }
    else if(customValue == "addDustev"){
         // Define the marker's icon using an SVG element
 var svgMarkerev = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkerev.setAttribute('viewBox', '0 0 512 512');
 svgMarkerev.innerHTML = '<path d="m264.2 21.3a39.9 39.9 0 0 1 68.8 27.7c0 22-18 40-40 40h-284m139.2 123.7a39.9 39.9 0 0 0 68.8-27.7c0-22-18-40-40-40h-168" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="18"/><circle cx="96" cy="196" r="12"/><circle cx="180" cy="196" r="12"/><circle cx="264" cy="196" r="12"/><circle cx="222" cy="256" r="12"/><circle cx="306" cy="256" r="12"/><circle cx="390" cy="256" r="12"/><circle cx="172" cy="316" r="12"/><circle cx="256" cy="316" r="12"/><circle cx="340" cy="316" r="12"/><use height="234" transform="translate(86 139)" width="342" xlink:href="#a"/>';
  
 // Scale the SVG icon down
 var iconSize = 100;
 var scaleFactor = 0.5;
 svgMarkerev.setAttribute('width', iconSize * scaleFactor);
 svgMarkerev.setAttribute('height', iconSize * scaleFactor);
  // set the aria-label attribute
  svgMarkerev.setAttribute("aria-label", "Dust");
  svgMarkerev.setAttribute("id", iddf);
    }
    else if(customValue == "addHailev"){ 
         // Define the marker's icon using an SVG element
 var svgMarkerev = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkerev.setAttribute('viewBox', '0 0 24 24');
 svgMarkerev.innerHTML = '<path d="M3.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zM7.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm3.592 3.724a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm1.247-6.999a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10.5H13a3 3 0 0 0 .405-5.973z"/>';
 
 // Scale the SVG icon down
 var iconSize = 100;
 var scaleFactor = 0.5;
 svgMarkerev.setAttribute('width', iconSize * scaleFactor);
 svgMarkerev.setAttribute('height', iconSize * scaleFactor);
  // set the aria-label attribute
  svgMarkerev.setAttribute("aria-label", "Hail");
  svgMarkerev.setAttribute("id", iddf);
}
    else if(customValue == "addAev"){
  // Define the marker's icon using an SVG element
 var svgMarkerev = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkerev.setAttribute('viewBox', '0 0 384 512');
 svgMarkerev.innerHTML = '<path d="M221.5 51.7C216.6 39.8 204.9 32 192 32s-24.6 7.8-29.5 19.7l-120 288-40 96c-6.8 16.3 .9 35 17.2 41.8s35-.9 41.8-17.2L93.3 384H290.7l31.8 76.3c6.8 16.3 25.5 24 41.8 17.2s24-25.5 17.2-41.8l-40-96-120-288zM264 320H120l72-172.8L264 320z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkerev.setAttribute('width', iconSize * scaleFactor);
 svgMarkerev.setAttribute('height', iconSize * scaleFactor);
  // set the aria-label attribute
  svgMarkerev.setAttribute("aria-label", "A");
  svgMarkerev.setAttribute("id", iddf);
        
    }
    else if(customValue == "addBev"){
          // Define the marker's icon using an SVG element
 var svgMarkerev = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkerev.setAttribute('viewBox', '0 0 384 512');
 svgMarkerev.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H192c70.7 0 128-57.3 128-128c0-46.5-24.8-87.3-62-109.7c18.7-22.3 30-51 30-82.3c0-70.7-57.3-128-128-128H64zm96 192H64V96h96c35.3 0 64 28.7 64 64s-28.7 64-64 64zM64 288h96 32c35.3 0 64 28.7 64 64s-28.7 64-64 64H64V288z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkerev.setAttribute('width', iconSize * scaleFactor);
 svgMarkerev.setAttribute('height', iconSize * scaleFactor);
   // set the aria-label attribute
   svgMarkerev.setAttribute("aria-label", "B");
   svgMarkerev.setAttribute("id", iddf);
     
    }
    else if(customValue == "addCev"){  
                // Define the marker's icon using an SVG element
 var svgMarkerev = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkerev.setAttribute('viewBox', '0 0 384 512');
 svgMarkerev.innerHTML = '<path d="M329.1 142.9c-62.5-62.5-155.8-62.5-218.3 0s-62.5 163.8 0 226.3s155.8 62.5 218.3 0c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3c-87.5 87.5-221.3 87.5-308.8 0s-87.5-229.3 0-316.8s221.3-87.5 308.8 0c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkerev.setAttribute('width', iconSize * scaleFactor);
 svgMarkerev.setAttribute('height', iconSize * scaleFactor);
   // set the aria-label attribute
   svgMarkerev.setAttribute("aria-label", "C");
   svgMarkerev.setAttribute("id", iddf);
    }
    else if(customValue == "addDev"){  
    // Define the marker's icon using an SVG element
 var svgMarkerev = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkerev.setAttribute('viewBox', '0 0 384 512');
 svgMarkerev.innerHTML = '<path d="M0 96C0 60.7 28.7 32 64 32h96c123.7 0 224 100.3 224 224s-100.3 224-224 224H64c-35.3 0-64-28.7-64-64V96zm160 0H64V416h96c88.4 0 160-71.6 160-160s-71.6-160-160-160z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkerev.setAttribute('width', iconSize * scaleFactor);
 svgMarkerev.setAttribute('height', iconSize * scaleFactor);
   // set the aria-label attribute
   svgMarkerev.setAttribute("aria-label", "D");
   svgMarkerev.setAttribute("id", iddf);
}
    else if(customValue == "addEev"){  
            // Define the marker's icon using an SVG element
 var svgMarkerev = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkerev.setAttribute('viewBox', '0 0 384 512');
 svgMarkerev.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkerev.setAttribute('width', iconSize * scaleFactor);
 svgMarkerev.setAttribute('height', iconSize * scaleFactor);
   // set the aria-label attribute
   svgMarkerev.setAttribute("aria-label", "E");
   svgMarkerev.setAttribute("id", iddf);
}
    else if(customValue == "addFev"){
        // Define the marker's icon using an SVG element
 var svgMarkerev = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkerev.setAttribute('viewBox', '0 0 384 512');
 svgMarkerev.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 448c0 17.7 14.3 32 32 32s32-14.3 32-32V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkerev.setAttribute('width', iconSize * scaleFactor);
 svgMarkerev.setAttribute('height', iconSize * scaleFactor); 
   // set the aria-label attribute
   svgMarkerev.setAttribute("aria-label", "F");
   svgMarkerev.setAttribute("id", iddf);
    }
    else if(customValue == "addGev"){
         // Define the marker's icon using an SVG element
 var svgMarkerev = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkerev.setAttribute('viewBox', '0 0 384 512');
 svgMarkerev.innerHTML = '<path d="M224 96C135.6 96 64 167.6 64 256s71.6 160 160 160c77.4 0 142-55 156.8-128H256c-17.7 0-32-14.3-32-32s14.3-32 32-32H400c25.8 0 49.6 21.4 47.2 50.6C437.8 389.6 341.4 480 224 480C100.3 480 0 379.7 0 256S100.3 32 224 32c57.4 0 109.7 21.6 149.3 57c13.2 11.8 14.3 32 2.5 45.2s-32 14.3-45.2 2.5C302.3 111.4 265 96 224 96z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkerev.setAttribute('width', iconSize * scaleFactor);
 svgMarkerev.setAttribute('height', iconSize * scaleFactor); 
   // set the aria-label attribute
   svgMarkerev.setAttribute("aria-label", "G");
   svgMarkerev.setAttribute("id", iddf);
}
    else if(customValue == "addHev"){
         // Define the marker's icon using an SVG element
 var svgMarkerev = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkerev.setAttribute('viewBox', '0 0 384 512');
 svgMarkerev.innerHTML = '<path d="M320 256l0 192c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V192L64 192 64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-192 256 0z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkerev.setAttribute('width', iconSize * scaleFactor);
 svgMarkerev.setAttribute('height', iconSize * scaleFactor);
   // set the aria-label attribute
   svgMarkerev.setAttribute("aria-label", "H");
   svgMarkerev.setAttribute("id", iddf);
 }
    else if(customValue == "addIev"){
  // Define the marker's icon using an SVG element
 var svgMarkerev = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
 svgMarkerev.setAttribute('viewBox', '0 0 384 512');
 svgMarkerev.innerHTML = '<path d="M32 32C14.3 32 0 46.3 0 64S14.3 96 32 96h96V416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H192V96h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H160 32z"/>';
 
 // Scale the SVG icon down
 var iconSize = 50;
 var scaleFactor = 0.5;
 svgMarkerev.setAttribute('width', iconSize * scaleFactor);
 svgMarkerev.setAttribute('height', iconSize * scaleFactor);
   // set the aria-label attribute
   svgMarkerev.setAttribute("aria-label", "I");
   svgMarkerev.setAttribute("id", iddf);
        
    }
    


  // Create a new markerev with the customized icon
  var markerev = new mapboxgl.Marker({
    element: svgMarkerev,
    draggable: true,
  });

  // Add a dragend event listener to the markerev
  markerev.on('dragend', function() {
    // on drag remove the maker and insert the new marker
    var index = markersev.findIndex(function(item) {
        return item.id === markerev.getElement().id;
    });
  if (index !== -1) {
    markersev.splice(index, 1);
 // Add the new marker to the markers array
 markersev.push({'id': markerev.getElement().id, 'icontype': markerev.getElement().getAttribute("aria-label"), 'lnglat' : markerev.getLngLat()});
    }

  console.log(markersev);
  });

  // Set the markerev's initial position and add it to the map
  markerev.setLngLat([-1.6244,6.6918]).addTo(mapev);

  // Add a click event listener to each markerev
  markerev.getElement().addEventListener('click', function () {
    // Set the selectedMarkerev variable to the clicked marker
    selectedMarkerev = markerev;
  });

  // Add the new marker to the markers array
  markersev.push({'id': markerev.getElement().id, 'icontype': markerev.getElement().getAttribute("aria-label"), 'lnglat' : markerev.getLngLat()});
}

  
 
// Define a function to remove a marker on click
function removeMarkerev(markerev) {
    markerev.remove();
  // Remove the selected marker from the markersev array
  var index = markersev.findIndex(function(item) {
    return item.id === markerev.getElement().id;
});


  if (index !== -1) {
    markersev.splice(index, 1);
  }
  console.log(index);
  console.log(markersev);
  }
  
 
// Define a function to update the position of a marker
function updateMarkerPositionev(markerev, lngLat) {
    markerev.setLngLat(lngLat);
  }
  
  // Define a function to customize the appearance of a marker
  function customizeMarkerev(markerev, iconUrl) {
    var el = document.createElement('div');
    el.className = 'markerev';
    el.style.backgroundImage = 'url(' + iconUrl + ')';
    el.style.width = '32px';
    el.style.height = '32px';
    markerev.setElement(el);
  }

  // Add an event listener to the button to create a new marker
document.getElementById('button1ev').addEventListener('click', function() {
    
// Retrieve the value of the custom attribute
var customValue = this.getAttribute('typeofIcon');
// console.log(customValue); 
    addMarkerev(customValue);
    console.log('EVENING markers:', markersev);

  });
  
//  change  type of marker type:
var svgIconsev = document.querySelectorAll('.svgiconev');
var addiconev = document.querySelector("#button1ev");
svgIconsev.forEach(function(svgIconev) {
  svgIconev.addEventListener('click', function() {
    var id = this.id;
    var content = this.textContent.trim();
    addiconev.setAttribute('typeofIcon', id);
       addiconev.textContent = content;
    console.log('EVENING tID:', id);
    console.log('EVENING Content:', content);
  });
});


 
 // Add an event listener to the button to remove the selected marker
 document.getElementById('button2ev').addEventListener('click', function() {
    
    if (selectedMarkerev) {
      removeMarkerev(selectedMarkerev);
      selectedMarkerev = null;
    }
   console.log('EVENING markers', markersev);
  });


// ===============END OF EVENING MAP FOR ADDDAILYFORECAST PAGE=========================

// Initialize an empty array to store the grouped values
const morningValues = [];
const afternoonValues = [];
const eveningValues = [];
const masterContainer = [];
// =================table page next button for addnew daily forecast==========
var nextBtn2 = document.getElementById('nextBtn2ndpage');
nextBtn2.addEventListener('click', function(e) {
    const morningValues = [];
const afternoonValues = [];
const eveningValues = [];
  var activeNav = document.querySelector('#orders-table-tab .nav-link.active');
  var nextNav = activeNav.nextElementSibling;
// get the form details:
const datetableMorning = document.querySelector('#datetableMorning').value;
const itdtableMorning = document.querySelector('#itdtableMorning').value;
// const prestableMorning = document.querySelector('#prestableMorning').value;

const datetableAfternoon = document.querySelector('#datetableAfternoon').value;
const itdtableAfternoon = document.querySelector('#itdtableAfternoon').value;
// const prestableAfternoon = document.querySelector('#prestableAfternoon').value;


const datetableEvening = document.querySelector('#datetableEvening').value;
const itdtableEvening = document.querySelector('#itdtableEvening').value;
// const prestableEvening = document.querySelector('#prestableEvening').value;


// 

function validatetableForm() {
    // Get all required input and select elements
    let requiredElements = document.querySelectorAll('.required');
  
    // Loop through each required element
    for (let i = 0; i < requiredElements.length; i++) {
      let element = requiredElements[i];
  
      // Check if the element is an input or select
      if (element.tagName === 'INPUT' || element.tagName === 'SELECT') {
        // Check if the element has a value or selected option
        if (element.value === 'null' || element.value === '' ) {
             // If the element is empty, add the "required-error" class to highlight it
        element.classList.add('required-error');
          // If the element is empty, show an error message and prevent form submission
          alert('Error: You\'ve not filled all the fields, please do so to continue, Thank you!!');
          return false;
        }else{
            // If the element is not empty, remove the "required-error" class if it was previously added
        element.classList.remove('required-error');
        }
      }
    }
  
    // If all required inputs and selects have a value or selected option, allow form submission
    return true;
  }
  
 
// ==========================================morning table=============================================
 // Get all the TR elements with class name "morning"
const morningDivs = document.querySelectorAll("tr.morning");
// Loop through each div element
morningDivs.forEach(div => {
  // Get all the input and select elements inside the tr
  const inputElements = div.querySelectorAll("input");
  const selectElements = div.querySelectorAll("select");
  const districtElement = div.getAttribute("districtnam");
  // Initialize an empty array to store the values for this tr
  const divValues = [];
  
  // Extract the values of each input and select element
  inputElements.forEach(input => {
    const value = input.value;
    divValues.push(value);
  });
  
  selectElements.forEach(select => {
    const value = select.value;
    divValues.push(value);
  });
  
  // Push the array of values for this tr into the main array
  const divData = {
    districts: districtElement,
    values: divValues
  };
  morningValues.push(divData);
});

// ===========================afternoon table===================================
 // Get all the TR elements with class name "morning"
 const afternoonDivs = document.querySelectorAll("tr.afternoon");
 // Loop through each div element
 afternoonDivs.forEach(div => {
   // Get all the input and select elements inside the tr
   const inputElements = div.querySelectorAll("input");
   const selectElements = div.querySelectorAll("select");
   const districtElement = div.getAttribute("districtnam");
   // Initialize an empty array to store the values for this tr
   const divValues = [];
   
   // Extract the values of each input and select element
   inputElements.forEach(input => {
     const value = input.value;
     divValues.push(value);
   });
   
   selectElements.forEach(select => {
     const value = select.value;
     divValues.push(value);
   });
   
   // Push the array of values for this tr into the main array
   const divData = {
     districts: districtElement,
     values: divValues
   };
   afternoonValues.push(divData);
 });

// ===========================evening table===================================
 // Get all the TR elements with class name "morning"
 const eveningDivs = document.querySelectorAll("tr.evening");
 // Loop through each div element
 eveningDivs.forEach(div => {
   // Get all the input and select elements inside the tr
   const inputElements = div.querySelectorAll("input");
   const selectElements = div.querySelectorAll("select");
   const districtElement = div.getAttribute("districtnam");
   // Initialize an empty array to store the values for this tr
   const divValues = [];
   
   // Extract the values of each input and select element
   inputElements.forEach(input => {
     const value = input.value;
     divValues.push(value);
   });
   
   selectElements.forEach(select => {
     const value = select.value;
     divValues.push(value);
   });
   
   // Push the array of values for this tr into the main array
   const divData = {
     districts: districtElement,
     values: divValues
   };
   eveningValues.push(divData);
 });

var allfieldsfilled = validatetableForm();

if(allfieldsfilled == true){
 if (masterContainer.length === 0) {
// Print the grouped values for testing
masterContainer.push({
    'dateItdPressureValues' : [datetableMorning,itdtableMorning,datetableAfternoon, itdtableAfternoon, datetableEvening, itdtableEvening],
    'tableValues': {"morningValues": morningValues, "afternoonValues" : afternoonValues, 'eveningValues' : eveningValues},
    'mapdates' : '' ,
    'markers': '',
    'polygons': '' ,
    'summary' : '',
    'publishType' :'',
    'textareaweatherwarning':'',
     'warningtype' :'',
      'scheduledate':'',
});

 }else{
    // Define the key and value you want to replace
let keyToReplace = 'dateItdPressureValues'; 
let keyToReplace2 = 'tableValues'; 
// Check if the array has the specified key
let index = masterContainer.findIndex(obj => obj.hasOwnProperty(keyToReplace));
// Check if the array has the specified key
let index2 = masterContainer.findIndex(obj => obj.hasOwnProperty(keyToReplace2));
// If the key is found, replace the value
if (index !== -1) {
    masterContainer[index][keyToReplace] = [datetableMorning,itdtableMorning,datetableAfternoon, itdtableAfternoon, datetableEvening, itdtableEvening ];
  }
  
// If the key is found, replace the value
if (index2 !== -1) {
    masterContainer[index][keyToReplace2] = {"morningValues": morningValues, "afternoonValues" : afternoonValues, 'eveningValues' : eveningValues};
  }
}

console.log([datetableMorning,itdtableMorning,datetableAfternoon, itdtableAfternoon, datetableEvening, itdtableEvening]);
console.log({"morningValues": morningValues, "afternoonValues" : afternoonValues, 'eveningValues' : eveningValues});

console.log("master:", masterContainer)

  activeNav.classList.remove('active');
  nextNav.classList.add('active');
  nextNav.classList.remove('disabled');

  var activeTab = document.querySelector(activeNav.getAttribute('href'));
  var nextTab = document.querySelector(nextNav.getAttribute('href'));

  activeTab.classList.remove('show', 'active');
  nextTab.classList.add('show', 'active');

} 
});
 
  
// ==============-====================================mappage next button for addnew daily forecast===============
var nextBtn3 = document.getElementById('nextBtn3rdpage');
nextBtn3.addEventListener('click', function(e) {
    function validateMapdate() {
        // Get all required input and select elements
        let requiredElements = document.querySelectorAll('.requiredmapdate');
      
        // Loop through each required element
        for (let i = 0; i < requiredElements.length; i++) {
          let element = requiredElements[i];
      
          // Check if the element is an input or select
          if (element.tagName === 'INPUT' || element.tagName === 'SELECT') {
            // Check if the element has a value or selected option
            if (element.value === 'null' || element.value === '' ) {
                 // If the element is empty, add the "required-error" class to highlight it
            element.classList.add('required-error');
              // If the element is empty, show an error message and prevent form submission
              alert('Error: You\'ve not filled the date fields, please do so to continue, Thank you!!');
              return false;
            }else{
                // If the element is not empty, remove the "required-error" class if it was previously added
            element.classList.remove('required-error');
            }
          }
        }
      
        // If all required inputs and selects have a value or selected option, allow form submission
        return true;
      }
    

  var activeNav = document.querySelector('#orders-table-tab .nav-link.active');
  var nextNav = activeNav.nextElementSibling;
// morning date :
var morningdate = document.querySelector('#dateInput1').value;
// afternoon date :
var afternoondate = document.querySelector('#dateInput1af').value;

// evening date :
var eveningdate = document.querySelector('#dateInput1ev').value;
var validateMapdatec = validateMapdate();

if(validateMapdatec){
    // save to the master array
    if (masterContainer.length === 0) {
        // Print the grouped values for testing
        masterContainer.push({
            'mapdates' : {'morningdate':morningdate,'afternoondate':afternoondate,  'eveningdate':eveningdate},
            'markers':  {'markersmor': markers, 'markersaf': markersaf, 'markersev': markersev},
            'polygons': {'ploygonsmorning': polygonsMorning, 'ploygonsafternoon': polygonAfternoon, 'ploygonsevening':polygonsEvening }
        });
        
         }else{
            // Define the key and value you want to replace
        var keyToReplace = 'mapdates'; 
        var keyToReplace2 = 'markers'; 
        var keyToReplace3 = 'polygons'; 

        // Check if the array has the specified key
        var index = masterContainer.findIndex(obj => obj.hasOwnProperty(keyToReplace));
        // Check if the array has the specified key
        var index2 = masterContainer.findIndex(obj => obj.hasOwnProperty(keyToReplace2));

         // Check if the array has the specified key
         var index3 = masterContainer.findIndex(obj => obj.hasOwnProperty(keyToReplace3));
        // If the key is found, replace the value
        if (index !== -1) {
            masterContainer[index][keyToReplace] =  {'morningdate':morningdate,'afternoondate':afternoondate,  'eveningdate':eveningdate};
          }
          
        // If the key is found, replace the value
        if (index2 !== -1) {
            masterContainer[index][keyToReplace2] = {'markersmor': markers, 'markersaf': markersaf, 'markersev': markersev};
          }
 // If the key is found, replace the value
 if (index3 !== -1) {
    masterContainer[index][keyToReplace3] =  {'ploygonsmorning': polygonsMorning, 'ploygonsafternoon': polygonAfternoon, 'ploygonsevening':polygonsEvening };
  }

        }


    console.log([morningdate,afternoondate,eveningdate]);
console.log({'markersmor': markers, 'markersaf': markersaf, 'markersev':markersev});
console.log({'ploygonsmorning': polygonsMorning, 'ploygonsafternoon': polygonAfternoon, 'ploygonsevening':polygonsEvening });
console.log("masterMap:", masterContainer);

  activeNav.classList.remove('active');
  nextNav.classList.add('active');
  nextNav.classList.remove('disabled');

  var activeTab = document.querySelector(activeNav.getAttribute('href'));
  var nextTab = document.querySelector(nextNav.getAttribute('href'));

  activeTab.classList.remove('show', 'active');
  nextTab.classList.add('show', 'active');
}

});


// ==============================summary page next button for addnew daily forecast=============================
var nextBtn4 = document.getElementById('nextBtn4thpage');
nextBtn4.addEventListener('click', function(e) {
  var activeNav = document.querySelector('#orders-table-tab .nav-link.active');
  var nextNav = activeNav.nextElementSibling;

  function validatesummary() {
    // Get all required input and select elements
    let requiredElements = document.querySelectorAll('#floatingTextareaSummary');
  
    // Loop through each required element
    for (let i = 0; i < requiredElements.length; i++) {
      let element = requiredElements[i];
  
      // Check if the element is an input or select
      if (element.tagName === 'TEXTAREA' || element.tagName === 'SELECT') {
        // Check if the element has a value or selected option
        if (element.value === 'null' || element.value === '' ) {
             // If the element is empty, add the "required-error" class to highlight it
        element.classList.add('required-error');
          // If the element is empty, show an error message and prevent form submission
          alert('Error: You\'ve not filled the summary field, please do so to continue, Thank you!!');
          return false;
        }else{
            // If the element is not empty, remove the "required-error" class if it was previously added
        element.classList.remove('required-error');
        }
      }
    }
  
    // If all required inputs and selects have a value or selected option, allow form submission
    return true;
  }

var validatesummaryn= validatesummary();

  if(validatesummaryn){


  const summary = document.querySelector('#floatingTextareaSummary').value;

  // save to the master array
  if (masterContainer.length === 0) {
    // Print the grouped values for testing
    masterContainer.push({
        'summary' : summary, 
    });
    
     }else{
        // Define the key and value you want to replace
    var keyToReplace = 'summary'; 
    // Check if the array has the specified key
    var index = masterContainer.findIndex(obj => obj.hasOwnProperty(keyToReplace));
    
    if (index !== -1) {
        masterContainer[index][keyToReplace] =   summary;
      }   }

console.log(summary);
console.log("masterSummary:", masterContainer);
  activeNav.classList.remove('active');
  nextNav.classList.add('active');
  nextNav.classList.remove('disabled');

  var activeTab = document.querySelector(activeNav.getAttribute('href'));
  var nextTab = document.querySelector(nextNav.getAttribute('href'));

  activeTab.classList.remove('show', 'active');
  nextTab.classList.add('show', 'active'); 
 }
});

// ========================= final page ======================================================================


//  change  type of publish type type:
var publs = document.querySelectorAll('.publ');
var changepubType = document.querySelector("#buttonpublish");
publs.forEach(function(publ) {
    publ.addEventListener('click', function() {
    var id = this.id;
    var content = this.textContent.trim();
    changepubType.setAttribute('typeofSubmit', id);
    changepubType.textContent = content;


    // Get references to the  date field elements
var dateField = document.getElementById('date-field');
// dateField.style.display = 'none';
if(content == 'Draft-Forecast'){
// if (dateField.style.display === 'none') {
    dateField.style.display = 'block';
  
//  }
}else{
     dateField.style.display = 'none';
     
}
 

    console.log('ID:', id);
    console.log('Content:', content);
  });
});


var buttonpublish = document.getElementById('buttonpublish');
buttonpublish.addEventListener('click', function(e) {
// Retrieve the value of the custom attribute
const publishType = this.getAttribute('typeofSubmit');
const textareaweatherwarning = document.getElementById('textareaweatherwarning').value;
const warningtype = document.getElementById('warningtype').value;
const schdate = document.getElementById('schedule-date').value;

 // save to the master array
 if (masterContainer.length === 0) {
    // Print the grouped values for testing
    masterContainer.push({
        'publishType' : publishType, 
        'textareaweatherwarning': textareaweatherwarning,
        'warningtype' : warningtype,
        'scheduledate': schdate
    });
    
     }else{
        // Define the key and value you want to replace
    var keyToReplace = 'publishType'; 
    var keyToReplace2 = 'textareaweatherwarning'; 
    var keyToReplace3 = 'warningtype'; 
    var keyToReplace4 = 'scheduledate'; 


    // Check if the array has the specified key
    var index = masterContainer.findIndex(obj => obj.hasOwnProperty(keyToReplace));
     // Check if the array has the specified key
     var index2 = masterContainer.findIndex(obj => obj.hasOwnProperty(keyToReplace2));
      // Check if the array has the specified key
    var index3 = masterContainer.findIndex(obj => obj.hasOwnProperty(keyToReplace3));
     // Check if the array has the specified key
     var index4 = masterContainer.findIndex(obj => obj.hasOwnProperty(keyToReplace4));
    
    if (index !== -1) {
        masterContainer[index][keyToReplace] =  publishType;
      }   
      if (index !== -1) {
        masterContainer[index2][keyToReplace2] =   textareaweatherwarning;
      }   
      if (index !== -1) {
        masterContainer[index3][keyToReplace3] =   warningtype;
      }   
      if (index !== -1) {
        masterContainer[index4][keyToReplace4] =   schdate ;
      }   
    }



savetoDatabase(masterContainer);


});

// 
 function savetoDatabase(masterContainer){
    if(masterContainer){
    var pubBtn =  document.getElementById('buttonpublish');
    pubBtn.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>';


  var jsonData = JSON.stringify(masterContainer);
  const xhr = new XMLHttpRequest();
    xhr.open('post', 'addNewDailyForecastpost', true);
    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // assuming CSRF token is stored in a variable called csrfToken
    xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.send(jsonData);

    // xhr.send(JSON.stringify(data));
    xhr.onload = () => {
      if (xhr.readyState === 4 && xhr.status === 200) {
        pubBtn.textContent = 'Successful';
        const response = xhr.response;
         console.log(response);
        window.location.href = "/admin/dailyforecast";
        

      } else {
        console.error('Error:', xhr.status);
      }
    };
}else{
    console.log("no data available")
}
    console.log("MMMMMMMMMMMMMMMMMMMmaster:", masterContainer[0]);
}


 