mapboxgl.accessToken = 'pk.eyJ1IjoidGhlbzYiLCJhIjoiY2xmazRpa2VzMDdiZDN0czR5Z2tiMGxheCJ9.GMZxHYFG0rGU8R6133k1kg';
var map = new mapboxgl.Map({
  container: 'cafowarningmap', // container id
  style: 'mapbox://styles/mapbox/streets-v9', //hosted style id
  zoom: 6,
  center: [-0.3,7.915],
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
document.getElementById('inlandbutton1').addEventListener('click', function() {
// Retrieve the value of the custom attribute
const customValue = this.getAttribute('typeofIcon');

    addMarker(customValue);

  });
  
//  change  type of marker type:
var svgIcons = document.querySelectorAll('.svgicon');
var addicon = document.querySelector("#inlandbutton1");
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
 document.getElementById('inlandbutton2').addEventListener('click', function() {
    
    if (selectedMarker) {
      removeMarker(selectedMarker);
      selectedMarker = null;
    }
    console.log(markers);
  });



  // ==============-====================================mappage next button for addnew inland forecast===============
var nextBtn3 = document.getElementById('inlandnextBtn3rdpage');
nextBtn3.addEventListener('click', function(e) {
    // alert("ok")
    function inlandvalidateMapdate() {
        // Get all required input and select elements
        let requiredElements = document.querySelectorAll('.inlandrequiredmapdate');
      
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
var morningdate = document.querySelector('#inlanddateInput1').value;
// afternoon date :
var afternoondate = document.querySelector('#inlanddateInput1af').value;

var i24hoursurfacewind = document.querySelector('#i24hoursurfacewind').value;
var i24hourvisibility = document.querySelector('#i24hourvisibility').value;
var i24hourtemp = document.querySelector('#i24hourtemp').value;
var i48hoursurfacewind = document.querySelector('#i48hoursurfacewind').value;
var i48hourvisibility = document.querySelector('#i48hourvisibility').value;
var i48hourtemp = document.querySelector('#i48hourtemp').value;




// evening date :
var eveningdate = document.querySelector('#inlanddateInput1ev').value;
var inlandvalidateMapdatec = inlandvalidateMapdate();

if(inlandvalidateMapdatec){
    // save to the master array
    if (inlandmasterContainer.length === 0) {
        // Print the grouped values for testing
        inlandmasterContainer.push({
            'mapdates' : {'morningdate':morningdate,'afternoondate':afternoondate,  'eveningdate':eveningdate, 'i24hoursurfacewind': i24hoursurfacewind, 'i24hourvisibility':i24hourvisibility, 'i24hourtemp': i24hourtemp, 'i48hoursurfacewind' : i48hoursurfacewind, 'i48hourvisibility': i48hourvisibility, 'i48hourtemp' : i48hourtemp},
            'markers':  {'markersmor': markers, 'markersaf': markersaf, 'markersev': markersev},
            'polygons': {'ploygonsmorning': polygonsMorning, 'ploygonsafternoon': polygonAfternoon, 'ploygonsevening':polygonsEvening }
        });
        
         }else{
            // Define the key and value you want to replace
        var keyToReplace = 'mapdates'; 
        var keyToReplace2 = 'markers'; 
        var keyToReplace3 = 'polygons'; 

        // Check if the array has the specified key
        var index = inlandmasterContainer.findIndex(obj => obj.hasOwnProperty(keyToReplace));
        // Check if the array has the specified key
        var index2 = inlandmasterContainer.findIndex(obj => obj.hasOwnProperty(keyToReplace2));

         // Check if the array has the specified key
         var index3 = inlandmasterContainer.findIndex(obj => obj.hasOwnProperty(keyToReplace3));
        // If the key is found, replace the value
        if (index !== -1) {
            inlandmasterContainer[index][keyToReplace] =  {'morningdate':morningdate,'afternoondate':afternoondate,  'eveningdate':eveningdate,'i24hoursurfacewind': i24hoursurfacewind, 'i24hourvisibility':i24hourvisibility, 'i24hourtemp': i24hourtemp, 'i48hoursurfacewind' : i48hoursurfacewind, 'i48hourvisibility': i48hourvisibility, 'i48hourtemp' : i48hourtemp};
          }
          
        // If the key is found, replace the value
        if (index2 !== -1) {
            inlandmasterContainer[index][keyToReplace2] = {'markersmor': markers, 'markersaf': markersaf, 'markersev': markersev};
          }
 // If the key is found, replace the value
 if (index3 !== -1) {
    inlandmasterContainer[index][keyToReplace3] =  {'ploygonsmorning': polygonsMorning, 'ploygonsafternoon': polygonAfternoon, 'ploygonsevening':polygonsEvening };
  }

        }


    console.log([morningdate,afternoondate,eveningdate]);
console.log({'markersmor': markers, 'markersaf': markersaf, 'markersev':markersev});
console.log({'ploygonsmorning': polygonsMorning, 'ploygonsafternoon': polygonAfternoon, 'ploygonsevening':polygonsEvening });
console.log("masterMap:", inlandmasterContainer);

  activeNav.classList.remove('active');
  nextNav.classList.add('active');
  nextNav.classList.remove('disabled');

  var activeTab = document.querySelector(activeNav.getAttribute('href'));
  var nextTab = document.querySelector(nextNav.getAttribute('href'));

  activeTab.classList.remove('show', 'active');
  nextTab.classList.add('show', 'active');
}

});
