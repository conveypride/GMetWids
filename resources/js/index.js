// side bar
let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bi-search");
  const menu = document.querySelector('#mennu');
    const sidebarmenu = document.querySelector('.sidebar');

  function isSmallOrMediumScreen() {
    return window.matchMedia('(max-width: 768px)').matches;
  }
  


  closeBtn.addEventListener("click", ()=>{
if(isSmallOrMediumScreen()){
  sidebar.classList.toggle("show");
  //   menuBtnChange();
  //   sidebarmenu.classList.toggle('show');
  // sidebar.style.display = 'none'
}else{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
}

  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bi-list", "bi-x-circle");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bi-x-circle","bi-list");//replacing the iocns class
   }
  }


 


  // show or hide navbar tab content 
  function showContent(button) {
    // remove the "active" class from all buttons
    var buttons = document.getElementsByClassName('btnicons');
    for (var i = 0; i < buttons.length; i++) {
      buttons[i].classList.remove('active');
    }
  
    // add the "active" class to the clicked button
    button.classList.add('active');
  
    // hide all the content except the one that corresponds to the clicked button
    var contents = document.getElementsByClassName('content');
    for (var i = 0; i < contents.length; i++) {
      contents[i].style.display = 'none';
    }
    var target = button.getAttribute('data-target');
    document.getElementsByClassName(target)[0].style.display = 'block';
  }

  document.querySelectorAll(".btnicons").forEach((btn) => {
    btn.addEventListener("click", function() {
      showContent(this);
    });
  });

// on load
  function showWeatherContent() {
    const weatherBtn = document.getElementById("home-btn");
    weatherBtn.click();
  }
  document.addEventListener("DOMContentLoaded", showWeatherContent);




    menu.addEventListener('click', () => {
      sidebarmenu.classList.toggle('show');
    });

    // home content carousel
    let items = document.querySelectorAll('.carousel .carousel-item1')

		items.forEach((el) => {
			const minPerSlide = 4
			let next = el.nextElementSibling
			for (var i=1; i<minPerSlide; i++) {
				if (!next) {
            // wrap carousel by using first child
            next = items[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})
// home page , weather dessimenation system form
var products = {};
let ghdistricts = [
 'Navrongo', 
 'Wa',
 'Temale', 
 'Yendi',
  'Bole',
  'Kete-Krachi',
  'Wenchi',
  'Sunyani',
  'Kumasi',
  'Abetifi',
  'Ho',
  'Sefwi-Bekwai',
  'Akatsi',
  'Akuse',
  'Koforidua',
  'Akim-Oda',
  'Ada',
  'Tema',
  'Accra',
  'Saltpond',
  'Takoradi',
  'Axim'
].sort();
const selectElement = document.getElementById("validationCustom03");
products['24Hrs & 5-Days-Forecast'] = ghdistricts;
 
products['Seasonal Forecast'] = ghdistricts;
products['Marine Forecast'] = ghdistricts;
 

function ChangedistrictList() {
    var districtList = document.getElementById("validationCustom03");
    var actList = document.getElementById("validationCustom04");
    var seldistrict = districtList.options[districtList.selectedIndex].value;
    while (actList.options.length) {
        actList.remove(0);
    }
    var districts = products[seldistrict];
    if (districts) {
        var i;
        for (i = 0; i < districts.length; i++) {
            var district = new Option(districts[i], i);
            actList.options.add(district);
        }
    }
} 

selectElement.addEventListener("change", function() {
  ChangedistrictList()
});


//======================= leaflet / MAP PAGE CODE:=============================
 
// set the series' data and value field
var data = [{
  "id": "GH-CP",
  "name": "Central",
  "value": 100
}, {
  "id": "GH-EP",
  "name": "Eastern",
  "value": 540
}
, {
  "id": "GH-AF",
  "name": "Ahafo",
  "value": 700
}, {
  "id": "GH-AH",
  "name": "Ashanti",
  "value": 200
}, {
  "id": "GH-BO",
  "name": "Bono",
  "value": 100
}, {
  "id": "GH-BE",
  "name": "Bono East",
  "value": 850
}, {
  "id": "GH-AA",
  "name": "Greater Accra",
  "value": 210
}, {
  "id": "GH-NE",
  "name": "North East",
  "value": 950
}, {
  "id": "GH-NP",
  "name": "Northern",
  "value": 850
}, {
  "id": "GH-OT",
  "name": "Oti",
  "value": 750
}, {
  "id": "GH-SV",
  "name": "Savannah",
  "value": 650
}, {
  "id": "GH-UE",
  "name": "Upper East",
  "value": 550
}, {
  "id": "GH-UW",
  "name": "Upper West",
  "value": 450
}, {
  "id": "GH-TV",
  "name": "Volta",
  "value": 350
}, {
  "id": "GH-WP",
  "name": "Western",
  "value": 250
}, {
  "id": "GH-WN",
  "name": "Western North",
  "value": 150
}

];

 
// const map = new mapboxgl.Map({
// container: 'mapp', // container ID
// // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
// style: 'mapbox://styles/mapbox/streets-v12', // style URL
// center: [-1.6244,6.6918], // starting position [lng, lat]
// zoom: 9 // starting zoom
// });
 
// const colorPicker = document.getElementById('color-picker');
// let selectedColor = colorPicker.value;
// colorPicker.addEventListener('input', () => {
//   selectedColor = colorPicker.value;
// });


// const draw = new MapboxDraw({
//   displayControlsDefault: false,
//   controls: {
//     polygon: true,
//     trash: true
//   },
//   styles:[
//     // default themes provided by MB Draw
//     // default themes provided by MB Draw
//     // default themes provided by MB Draw
//     // default themes provided by MB Draw
//     {
//       id: "gl-draw-polygon-fill-inactive",
//       type: "fill",
//       filter: [
//         "all",
//         ["==", "active", "false"],
//         ["==", "$type", "Polygon"],
//         ["!=", "mode", "static"]
//       ],
//       paint: {
//         "fill-color": "#3bb2d0",
//         "fill-outline-color": "#3bb2d0",
//         "fill-opacity": 0.1
//       }
//     },
//     {
//       id: "gl-draw-polygon-fill-active",
//       type: "fill",
//       filter: ["all", ["==", "active", "true"], ["==", "$type", "Polygon"]],
//       paint: {
//         "fill-color": "#fbb03b",
//         "fill-outline-color": "#fbb03b",
//         "fill-opacity": 0.1
//       }
//     },
//     {
//       id: "gl-draw-polygon-midpoint",
//       type: "circle",
//       filter: ["all", ["==", "$type", "Point"], ["==", "meta", "midpoint"]],
//       paint: {
//         "circle-radius": 3,
//         "circle-color": "#fbb03b"
//       }
//     },
//     {
//       id: "gl-draw-polygon-stroke-inactive",
//       type: "line",
//       filter: [
//         "all",
//         ["==", "active", "false"],
//         ["==", "$type", "Polygon"],
//         ["!=", "mode", "static"]
//       ],
//       layout: {
//         "line-cap": "round",
//         "line-join": "round"
//       },
//       paint: {
//         "line-color": "#3bb2d0",
//         "line-width": 2
//       }
//     },
//     {
//       id: "gl-draw-polygon-stroke-active",
//       type: "line",
//       filter: ["all", ["==", "active", "true"], ["==", "$type", "Polygon"]],
//       layout: {
//         "line-cap": "round",
//         "line-join": "round"
//       },
//       paint: {
//         "line-color": "#fbb03b",
//         "line-dasharray": [0.2, 2],
//         "line-width": 2
//       }
//     },
//     {
//       id: "gl-draw-line-inactive",
//       type: "line",
//       filter: [
//         "all",
//         ["==", "active", "false"],
//         ["==", "$type", "LineString"],
//         ["!=", "mode", "static"]
//       ],
//       layout: {
//         "line-cap": "round",
//         "line-join": "round"
//       },
//       paint: {
//         "line-color": "#3bb2d0",
//         "line-width": 2
//       }
//     },
//     {
//       id: "gl-draw-line-active",
//       type: "line",
//       filter: ["all", ["==", "$type", "LineString"], ["==", "active", "true"]],
//       layout: {
//         "line-cap": "round",
//         "line-join": "round"
//       },
//       paint: {
//         "line-color": "#fbb03b",
//         "line-dasharray": [0.2, 2],
//         "line-width": 2
//       }
//     },
//     {
//       id: "gl-draw-polygon-and-line-vertex-stroke-inactive",
//       type: "circle",
//       filter: [
//         "all",
//         ["==", "meta", "vertex"],
//         ["==", "$type", "Point"],
//         ["!=", "mode", "static"]
//       ],
//       paint: {
//         "circle-radius": 5,
//         "circle-color": "#fff"
//       }
//     },
//     {
//       id: "gl-draw-polygon-and-line-vertex-inactive",
//       type: "circle",
//       filter: [
//         "all",
//         ["==", "meta", "vertex"],
//         ["==", "$type", "Point"],
//         ["!=", "mode", "static"]
//       ],
//       paint: {
//         "circle-radius": 3,
//         "circle-color": "#fbb03b"
//       }
//     },
//     {
//       id: "gl-draw-point-point-stroke-inactive",
//       type: "circle",
//       filter: [
//         "all",
//         ["==", "active", "false"],
//         ["==", "$type", "Point"],
//         ["==", "meta", "feature"],
//         ["!=", "mode", "static"]
//       ],
//       paint: {
//         "circle-radius": 5,
//         "circle-opacity": 1,
//         "circle-color": "#fff"
//       }
//     },
//     {
//       id: "gl-draw-point-inactive",
//       type: "circle",
//       filter: [
//         "all",
//         ["==", "active", "false"],
//         ["==", "$type", "Point"],
//         ["==", "meta", "feature"],
//         ["!=", "mode", "static"]
//       ],
//       paint: {
//         "circle-radius": 3,
//         "circle-color": "#3bb2d0"
//       }
//     },
//     {
//       id: "gl-draw-point-stroke-active",
//       type: "circle",
//       filter: [
//         "all",
//         ["==", "$type", "Point"],
//         ["==", "active", "true"],
//         ["!=", "meta", "midpoint"]
//       ],
//       paint: {
//         "circle-radius": 7,
//         "circle-color": "#fff"
//       }
//     },
//     {
//       id: "gl-draw-point-active",
//       type: "circle",
//       filter: [
//         "all",
//         ["==", "$type", "Point"],
//         ["!=", "meta", "midpoint"],
//         ["==", "active", "true"]
//       ],
//       paint: {
//         "circle-radius": 5,
//         "circle-color": "#fbb03b"
//       }
//     },
//     {
//       id: "gl-draw-polygon-fill-static",
//       type: "fill",
//       filter: ["all", ["==", "mode", "static"], ["==", "$type", "Polygon"]],
//       paint: {
//         "fill-color": "#404040",
//         "fill-outline-color": "#404040",
//         "fill-opacity": 0.1
//       }
//     },
//     {
//       id: "gl-draw-polygon-stroke-static",
//       type: "line",
//       filter: ["all", ["==", "mode", "static"], ["==", "$type", "Polygon"]],
//       layout: {
//         "line-cap": "round",
//         "line-join": "round"
//       },
//       paint: {
//         "line-color": "#404040",
//         "line-width": 2
//       }
//     },
//     {
//       id: "gl-draw-line-static",
//       type: "line",
//       filter: ["all", ["==", "mode", "static"], ["==", "$type", "LineString"]],
//       layout: {
//         "line-cap": "round",
//         "line-join": "round"
//       },
//       paint: {
//         "line-color": "#404040",
//         "line-width": 2
//       }
//     },
//     {
//       id: "gl-draw-point-static",
//       type: "circle",
//       filter: ["all", ["==", "mode", "static"], ["==", "$type", "Point"]],
//       paint: {
//         "circle-radius": 5,
//         "circle-color": "#404040"
//       }
//     },
  
//     // end default themes provided by MB Draw
//     // end default themes provided by MB Draw
//     // end default themes provided by MB Draw
//     // end default themes provided by MB Draw
  
//     // new styles for toggling colors
//     // new styles for toggling colors
//     // new styles for toggling colors
//     // new styles for toggling colors
  
//     {
//       id: "gl-draw-polygon-color-picker",
//       type: "fill",
//       filter: ["all", ["==", "$type", "Polygon"], ["has", "user_portColor"]],
//       paint: {
//         "fill-color": ["get", "user_portColor"],
//         "fill-outline-color": ["get", "user_portColor"],
//         "fill-opacity": 0.5
//       }
//     },
//     {
//       id: "gl-draw-line-color-picker",
//       type: "line",
//       filter: ["all", ["==", "$type", "LineString"], ["has", "user_portColor"]],
//       paint: {
//         "line-color": ["get", "user_portColor"],
//         "line-width": 2
//       }
//     },
//     {
//       id: "gl-draw-point-color-picker",
//       type: "circle",
//       filter: ["all", ["==", "$type", "Point"], ["has", "user_portColor"]],
//       paint: {
//         "circle-radius": 3,
//         "circle-color": ["get", "user_portColor"]
//       }
//     }
//   ]
   
// });



// map.addControl(draw,'top-left');
 
// map.on('draw.create', updateArea);
// map.on('draw.delete', updateArea);
// map.on('draw.update', updateArea);
 
// function updateArea(e) {
//   const data = draw.getAll();
//   const answer = document.getElementById('calculated-area');
//   if (data.features.length > 0) {
//     let totalArea = 0;
//     data.features.forEach(feature => {
//       const area = turf.area(feature);
//       totalArea += area;
//       // Set the fill color of the polygon to the selected color
//       feature.properties.fill = selectedColor;
//       // Set the feature state of the polygon to "selected" when it is created
//       if (e.type === 'draw.create') {
//         map.setFeatureState(
//           { source: 'draw', id: feature.id },
//           { selected: true }
//         );
//       }
//     });
//     const roundedArea = Math.round(totalArea * 100) / 100;
//     answer.innerHTML = `<p><strong>\\${roundedArea}</strong></p><p>square meters</p>`;
//   } else {
//     answer.innerHTML = '';
//     if (e.type !== 'draw.delete') {
//       alert('Click the map to draw a polygon.');
//     }
//   }
//   // Update the map with the modified polygons
//   map.getSource('draw').setData(data);
// }


// map.on('load', () => {
//   map.addSource('draw', {
//     type: 'geojson',
//     data: {
//       type: 'FeatureCollection',
//       features: [],
//     },
//   });
//   map.addLayer({
//     id: 'draw-polygon-fill',
//     type: 'fill',
//     source: 'draw',
//     paint: {
//       'fill-color': ['get', 'fill'],
//       'fill-opacity': 0.5,
//     },
//   });
//   map.addLayer({
//     id: 'selected-polygon-fill',
//     type: 'fill',
//     source: 'draw',
//     paint: {
//       'fill-color': [
//         'case',
//         ['boolean', ['feature-state', 'selected'], false],
//         selectedColor,
//         ['get', 'fill']
//       ],
//       'fill-opacity': 0.5,
//     },

//     id: 'draw-polygon-stroke',
//     type: 'line',
//     source: 'draw',
//     paint: {
//       'line-color': '#3bb2d0',
//       'line-width': 2,
//     },
//     layout: {
//       'line-cap': 'round',
//       'line-join': 'round',
//     },
//     filter: ['in', '$type', 'Polygon'],
//   });
// });

// map.on('click', 'draw-polygon-fill', function(e) {
//   const clickedPolygonId = e.features[0].id;
//   const selected = map.getFeatureState(
//     { source: 'draw', id: clickedPolygonId },
//     'selected'
//   );
//   if (selected) {
//     map.setFeatureState(
//       { source: 'draw', id: clickedPolygonId },
//       { selected: false }
//     );
//   } else {
//     map.setFeatureState(
//       { source: 'draw', id: clickedPolygonId },
//       { selected: true }
//     );
//   }
// });

// mapboxgl.accessToken = 'pk.eyJ1IjoidGhlbzYiLCJhIjoiY2xmazRpa2VzMDdiZDN0czR5Z2tiMGxheCJ9.GMZxHYFG0rGU8R6133k1kg';
// const map = new mapboxgl.Map({
// container: 'mapp', // container ID
// // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
// style: 'mapbox://styles/mapbox/light-v11', // style URL
// center: [-68.137343, 45.137451], // starting position
// zoom: 5 // starting zoom
// });
 
// map.on('load', () => {
// // Add a data source containing GeoJSON data.
// map.addSource('maine', {
// 'type': 'geojson',
// 'data': {
// 'type': 'Feature',
// 'geometry': {
// 'type': 'Polygon',
// // These coordinates outline Maine.
// 'coordinates': [
// [
// [-67.13734, 45.13745],
// [-66.96466, 44.8097],
// [-68.03252, 44.3252],
// [-69.06, 43.98],
// [-70.11617, 43.68405],
// [-70.64573, 43.09008],
// [-70.75102, 43.08003],
// [-70.79761, 43.21973],
// [-70.98176, 43.36789],
// [-70.94416, 43.46633],
// [-71.08482, 45.30524],
// [-70.66002, 45.46022],
// [-70.30495, 45.91479],
// [-70.00014, 46.69317],
// [-69.23708, 47.44777],
// [-68.90478, 47.18479],
// [-68.2343, 47.35462],
// [-67.79035, 47.06624],
// [-67.79141, 45.70258],
// [-67.13734, 45.13745]
// ]
// ]
// }
// }
// });
 
// // Add a new layer to visualize the polygon.
// map.addLayer({
// 'id': 'maine',
// 'type': 'fill',
// 'source': 'maine', // reference the data source
// 'layout': {},
// 'paint': {
// 'fill-color': '#0080ff', // blue color fill
// 'fill-opacity': 0.5
// }
// });
// // Add a black outline around the polygon.
// map.addLayer({
// 'id': 'outline',
// 'type': 'line',
// 'source': 'maine',
// 'layout': {},
// 'paint': {
// 'line-color': '#000',
// 'line-width': 3
// }
// });
// });
 
// let map = L.map("mapp").setView([5.6037, 0.0236], 13);
// L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
//   attribution:
//     '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
// }).addTo(map);

// map.on("click", function(e) {
//   console.log("map click");
//   console.log(e);
// });
// map.on("touchstart", function(e) {
//   console.log("map touchstart");
//   console.log(e);
// });

// let editableLayers = new L.FeatureGroup();

// editableLayers.on("click", function(e) {
//   console.log("editableLayers click");
//   console.log(e);
// });
// editableLayers.on("touchstart", function(e) {
//   console.log("editableLayers touchstart");
//   console.log(e);
// });

// map.addLayer(editableLayers);

// let drawControl = new L.Control.Draw({
//   position: "topright",
//   draw: {
//     polyline: false,
//     polygon: {
//       allowIntersection: false,
//       drawError: {
//         color: "#e1e100",
//         message: "<strong>Oh snap!<strong> you can't draw that!"
//       },
//       shapeOptions: {
//         color: "#bada55",
//         clickable: true
//       }
//     },
//     circle: false,
//     circlemarker: false,
//     rectangle: {
//       shapeOptions: {
//         clickable: true
//       }
//     },
//     marker: false
//   },
//   edit: {
//     featureGroup: editableLayers,
//     remove: true
//   }
// });

// map.addControl(drawControl);

// map.on(L.Draw.Event.CREATED, function(e) {
//   let layer = e.layer;
//   editableLayers.addLayer(layer);
//   layer.on("click", function(e) {
//     console.log("layer click");
//     console.log(e);
//   });
//   layer.on("touchstart", function(e) {
//     console.log("layer touchstart");
//     console.log(e);
//   });
//   editableLayers.on("click", function(e) {
//     console.log("editableLayers2 click");
//     console.log(e);
//   });
//   editableLayers.on("touchstart", function(e) {
//     console.log("editableLayers2 touchstart");
//     console.log(e);
//   });
// });
// 


// create a map polygon series
// var map = L.map('mapp').setView([5.6037, 0.0236], 13);

// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//   attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
//     '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
//     'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
//   maxZoom: 18,
// }).addTo(map);
// var drawnItems = new L.FeatureGroup();
// map.addLayer(drawnItems);

// var drawControl = new L.Control.Draw({
//   edit: {
//     featureGroup: drawnItems
//   },
//   draw: {
//     polygon: true,
//     polyline: true,
//     rectangle: true,
//     circle: true,
//     marker: true,
//   },
// });
// map.addControl(drawControl);
// // handle the draw created event to set the style of the drawn shape
// map.on('draw:created', function (event) {
//   var layer = event.layer;
//   layer.setStyle({ fillColor: '#3388ff', fillOpacity: 0.5, color: '#3388ff', weight: 2 });
//   drawnItems.addLayer(layer);
// });

 // center of the map
// var center = [5.6037, 0.0236];

// const map = L.map('map').setView([5.6037, 0.0236], 13);

// const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//   maxZoom: 19,
//   attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
// }).addTo(map);

// const marker = L.marker([51.5, -0.09]).addTo(map)
//   .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

// const circle = L.circle([51.508, -0.11], {
//   color: 'red',
//   fillColor: '#f03',
//   fillOpacity: 0.5,
//   radius: 500
// }).addTo(map).bindPopup('I am a circle.');

// const polygon = L.polygon([
//   [5.6037, 0.0216],
//   [5.6137, 0.0266],
//   [5.6027, 0.0246]
// ]).addTo(map).bindPopup('I am a polygon.');


// const popup = L.popup()
//   .setLatLng([5.6037, 0.0236])
//   .setContent('I am a standalone popup.')
//   .openOn(map);

// function onMapClick(e) {
//   popup
//     .setLatLng(e.latlng)
//     .setContent(`You clicked the map at ${e.latlng.toString()}`)
//     .openOn(map);
// }

// map.addEventListener('click', onMapClick);
// // Create the map
// var map = L.map('map').setView(center, 6);

// // Set up the OSM layer
// L.tileLayer(
//   'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     maxZoom: 18
//   }).addTo(map);

// // add a marker in the given location
// L.marker(center).addTo(map);

// // Initialise the FeatureGroup to store editable layers
// var editableLayers = new L.FeatureGroup();
// map.addLayer(editableLayers);

// // define custom marker
// var MyCustomMarker = L.Icon.extend({
//   options: {
//     shadowUrl: null,
//     iconAnchor: new L.Point(12, 12),
//     iconSize: new L.Point(24, 24),
//     iconUrl: 'https://upload.wikimedia.org/wikipedia/commons/6/6b/Information_icon4_orange.svg'
//   }
// });

// var drawPluginOptions = {
//   position: 'topright',
//   draw: {
//     polyline: {
//       shapeOptions: {
//         color: '#f357a1',
//         weight: 10
//       }
//     },
//     polygon: {
//       allowIntersection: false, // Restricts shapes to simple polygons
//       drawError: {
//         color: '#e1e100', // Color the shape will turn when intersects
//         message: '<strong>Polygon draw does not allow intersections!<strong> (allowIntersection: false)' // Message that will show when intersect
//       },
//       shapeOptions: {
//         color: '#bada55'
//       }
//     },
//     circle: false, // Turns off this drawing tool
//     rectangle: {
//       shapeOptions: {
//         clickable: false
//       }
//     },
//     marker: {
//       icon: new MyCustomMarker()
//     }
//   },
//   edit: {
//     featureGroup: editableLayers, //REQUIRED!!
//     remove: false
//   }
// };




