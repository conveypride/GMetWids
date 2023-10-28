mapboxgl.accessToken = 'pk.eyJ1IjoidGhlbzYiLCJhIjoiY2xmazRpa2VzMDdiZDN0czR5Z2tiMGxheCJ9.GMZxHYFG0rGU8R6133k1kg';
var marinemapview = new mapboxgl.Map({
    container: 'marinemapview',
    style: 'mapbox://styles/mapbox/streets-v9', //hosted style id
    zoom: 6,
    center: [-1.33, 4.6918],
    preserveDrawingBuffer:true
});


window.onload = function () {


 // ================================MARINE FORECAST MAP=============================
    // Your code here
    var marineElement = document.getElementById('marinepolygonElement');
    var marinepolygondata = JSON.parse(marineElement.getAttribute('data-polygon'));
    var marinemarkerdata = JSON.parse(marineElement.getAttribute('data-marker'));
    // Loop through the array and retrieve the 'polygon' key for each object
    // Get a reference to the image element by its ID
var imageElement = document.getElementById("icons");
    const marinepolygonns = [];
    if (marinepolygondata != 'null' && marinepolygondata) {
        marinepolygondata.forEach(obj => {
            marinepolygonns.push({
                'type': 'Feature',
                'geometry': {
                    'type': 'Polygon',
                    'coordinates': JSON.parse(obj.polygon),
                },
                'properties': {
                    'fill-color': obj.color
                }
            });
        });
    }


    marinemapview.on('load', function () {
  
    marinemapview.addSource('polygons', {
        'type': 'geojson',
        'data': {
            'type': 'FeatureCollection',
            'features': marinepolygonns

        }
    });
    if (marinepolygondata != 'null' && marinepolygondata) {
        marinepolygondata.forEach(obj => {
            marinemapview.addLayer({
                'id': obj.polygonId,
                'type': 'fill',
                'source': 'polygons',
                'paint': {
                    'fill-color': ['get', 'fill-color'],
                    'fill-opacity': 0.5
                },
                'filter': ['==', '$type', 'Polygon']
            });
        });
    };

    if (marinemarkerdata != 'null' && marinemarkerdata) {
        marinemarkerdata.forEach(obj => {
            
var svgMarker = new Image();


var customValue = obj.icontype;
if(customValue == "Rain"){
var src = imageElement.getAttribute("rain");
svgMarker.src = src;

  // Define the marker's icon using an SVG element
// var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgMarker.setAttribute('viewBox', '0 0 24 24');
// svgMarker.innerHTML = '<path d="M4.176 11.032a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm.229-7.005a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10H13a3 3 0 0 0 .405-5.973z"/>';
// Scale the SVG icon down
var iconSize = 60;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor);

}else if(customValue == "Wind"){
  var src = imageElement.getAttribute("wind");
svgMarker.src = src;
// Define the marker's icon using an SVG element
// var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgMarker.setAttribute('viewBox', '0 0 24 24');
// svgMarker.innerHTML = '<path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>';

// Scale the SVG icon down
var iconSize = 50;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor);

}
else if(customValue == "Dust"){
 // Define the marker's icon using an SVG element
 var src = imageElement.getAttribute("dust");
svgMarker.src = src;
// var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgMarker.setAttribute('viewBox', '0 0 512 512');
// svgMarker.innerHTML = '<path d="m264.2 21.3a39.9 39.9 0 0 1 68.8 27.7c0 22-18 40-40 40h-284m139.2 123.7a39.9 39.9 0 0 0 68.8-27.7c0-22-18-40-40-40h-168" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="18"/><circle cx="96" cy="196" r="12"/><circle cx="180" cy="196" r="12"/><circle cx="264" cy="196" r="12"/><circle cx="222" cy="256" r="12"/><circle cx="306" cy="256" r="12"/><circle cx="390" cy="256" r="12"/><circle cx="172" cy="316" r="12"/><circle cx="256" cy="316" r="12"/><circle cx="340" cy="316" r="12"/><use height="234" transform="translate(86 139)" width="342" xlink:href="#a"/>';

// Scale the SVG icon down
var iconSize = 80;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor);
}
else if(customValue == "Hail"){ 
 // Define the marker's icon using an SVG element
 var src = imageElement.getAttribute("hail");
 svgMarker.src = src;

// var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgMarker.setAttribute('viewBox', '0 0 24 24');
// svgMarker.innerHTML = '<path d="M3.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zM7.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm3.592 3.724a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm1.247-6.999a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10.5H13a3 3 0 0 0 .405-5.973z"/>';

// Scale the SVG icon down
var iconSize = 60;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor);
}
else if(customValue == "A"){
// Define the marker's icon using an SVG element
var src = imageElement.getAttribute("A");
svgMarker.src = src;
// var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgMarker.setAttribute('viewBox', '0 0 384 512');
// svgMarker.innerHTML = '<path d="M221.5 51.7C216.6 39.8 204.9 32 192 32s-24.6 7.8-29.5 19.7l-120 288-40 96c-6.8 16.3 .9 35 17.2 41.8s35-.9 41.8-17.2L93.3 384H290.7l31.8 76.3c6.8 16.3 25.5 24 41.8 17.2s24-25.5 17.2-41.8l-40-96-120-288zM264 320H120l72-172.8L264 320z"/>';

// Scale the SVG icon down
var iconSize = 40;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor);

}
else if(customValue == "B"){
  // Define the marker's icon using an SVG element
   var src = imageElement.getAttribute("B");
svgMarker.src = src;
// var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgMarker.setAttribute('viewBox', '0 0 384 512');
// svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H192c70.7 0 128-57.3 128-128c0-46.5-24.8-87.3-62-109.7c18.7-22.3 30-51 30-82.3c0-60.7-57.3-128-128-128H64zm96 192H64V96h96c35.3 0 64 28.7 64 64s-28.7 64-64 64zM64 288h96 32c35.3 0 64 28.7 64 64s-28.7 64-64 64H64V288z"/>';

// Scale the SVG icon down
var iconSize = 40;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor);

}
else if(customValue == "C"){  
        // Define the marker's icon using an SVG element
        var src = imageElement.getAttribute("C");
        svgMarker.src = src;
// var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgMarker.setAttribute('viewBox', '0 0 384 512');
// svgMarker.innerHTML = '<path d="M329.1 142.9c-62.5-62.5-155.8-62.5-218.3 0s-62.5 163.8 0 226.3s155.8 62.5 218.3 0c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3c-87.5 87.5-221.3 87.5-308.8 0s-87.5-229.3 0-316.8s221.3-87.5 308.8 0c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0z"/>';

// Scale the SVG icon down
var iconSize = 40;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor);
}
else if(customValue == "D"){  
// Define the marker's icon using an SVG element
var src = imageElement.getAttribute("D");
svgMarker.src = src;
// var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgMarker.setAttribute('viewBox', '0 0 384 512');
// svgMarker.innerHTML = '<path d="M0 96C0 60.7 28.7 32 64 32h96c123.7 0 224 100.3 224 224s-100.3 224-224 224H64c-35.3 0-64-28.7-64-64V96zm160 0H64V416h96c88.4 0 160-71.6 160-160s-71.6-160-160-160z"/>';

// Scale the SVG icon down
var iconSize = 40;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor);
}
else if(customValue == "E"){  
    // Define the marker's icon using an SVG element
     var src = imageElement.getAttribute("E");
svgMarker.src = src;
// var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgMarker.setAttribute('viewBox', '0 0 384 512');
// svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';

// Scale the SVG icon down
var iconSize = 60;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor);
}
else if(customValue == "F"){
// Define the marker's icon using an SVG element
var src = imageElement.getAttribute("F");
svgMarker.src = src;
// var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgMarker.setAttribute('viewBox', '0 0 384 512');
// svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 448c0 17.7 14.3 32 32 32s32-14.3 32-32V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';

// Scale the SVG icon down
var iconSize = 60;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor); 
}
else if(customValue == "G"){
 // Define the marker's icon using an SVG element
 var src = imageElement.getAttribute("G");
 svgMarker.src = src;
// var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgMarker.setAttribute('viewBox', '0 0 384 512');
// svgMarker.innerHTML = '<path d="M224 96C135.6 96 64 167.6 64 256s71.6 160 160 160c77.4 0 142-55 156.8-128H256c-17.7 0-32-14.3-32-32s14.3-32 32-32H400c25.8 0 49.6 21.4 47.2 50.6C437.8 389.6 341.4 480 224 480C100.3 480 0 379.7 0 256S100.3 32 224 32c57.4 0 109.7 21.6 149.3 57c13.2 11.8 14.3 32 2.5 45.2s-32 14.3-45.2 2.5C302.3 111.4 265 96 224 96z"/>';

// Scale the SVG icon down
var iconSize = 50;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor); 
}
else if(customValue == "H"){
 // Define the marker's icon using an SVG element
 var src = imageElement.getAttribute("H");
 svgMarker.src = src;
// var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgMarker.setAttribute('viewBox', '0 0 384 512');
// svgMarker.innerHTML = '<path d="M320 256l0 192c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V192L64 192 64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-192 256 0z"/>';

// Scale the SVG icon down
var iconSize = 60;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor);
}
else if(customValue == "I"){
// Define the marker's icon using an SVG element
var src = imageElement.getAttribute("I");
svgMarker.src = src;
// var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
// svgMarker.setAttribute('viewBox', '0 0 384 512');
// svgMarker.innerHTML = '<path d="M32 32C14.3 32 0 46.3 0 64S14.3 96 32 96h96V416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H192V96h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H160 32z"/>';

// Scale the SVG icon down
var iconSize = 60;
var scaleFactor = 0.5;
svgMarker.setAttribute('width', iconSize * scaleFactor);
svgMarker.setAttribute('height', iconSize * scaleFactor);
}else{
  alert(customValue);
}



    
//   new mapboxgl.Marker(svgMarker)
//   .setLngLat([obj.markerslnglat.lng, obj.markerslnglat.lat])
//   .addTo(mapM);
  // marker.getElement().style.backgroundImage = 'url(https://img.favpng.com/24/21/9/food-icon-thanksgiving-fill-icon-food-icon-png-favpng-3mbb5g1Ubhi7EHPpjELypuBpn.jpg)';
  // marker.getElement().style.backgroundSize = '100%';
  // marker.getElement().style.width = '50px';
  // marker.getElement().style.height = '50px';
  


            new mapboxgl.Marker(svgMarker)
                .setLngLat([obj.markerslnglat.lng, obj.markerslnglat.lat])
                .addTo(marinemapview);
            // marker.getElement().style.backgroundImage = 'url(https://img.favpng.com/24/21/9/food-icon-thanksgiving-fill-icon-food-icon-png-favpng-3mbb5g1Ubhi7EHPpjELypuBpn.jpg)';
            // marker.getElement().style.backgroundSize = '100%';
            // marker.getElement().style.width = '50px';
            // marker.getElement().style.height = '50px';


        });

    }

    
});



}