// side bar
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
// let searchBtn = document.querySelector(".bi-search");
const menu = document.querySelector('#mennu');
const sidebarmenu = document.querySelector('.sidebar');

function isSmallOrMediumScreen() {
    return window.matchMedia('(max-width: 768px)').matches;
}

const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

closeBtn.addEventListener("click", () => {
    if (isSmallOrMediumScreen()) {
        sidebar.classList.toggle("show");
        //   menuBtnChange();
        //   sidebarmenu.classList.toggle('show');
        // sidebar.style.display = 'none'
    } else {
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
    }

});


// on load click whether user selected a district from the daily forecast page or the cities page
// Assuming the URL is "https://example.com/page?param1=value1&param2=value2"
document.addEventListener("DOMContentLoaded", function () {

    // Get the query string from the URL
    const queryString = window.location.search;

    // Create a new URLSearchParams object from the query string
    const params = new URLSearchParams(queryString);

    // Get the value of a specific parameter
    const paramValue = params.get("click"); // "value1"
    // const paramValue2 = params.get("param2"); // "value2"
    if (paramValue === 'daily') {
        // weather-btn
        // Get the button element by its ID
        const button = document.getElementById("weather-btn");

        // Trigger the button click
        button.click();
        //     showContent(this);
    } else if (paramValue === 'cities') {
        // weather-btn
        // Get the button element by its ID
        const button = document.getElementById("cities-btn");

        // Trigger the button click
        button.click();
        //     showContent(this);
    } else if (paramValue === 'inland') {
        // weather-btn
        // Get the button element by its ID
        const button = document.getElementById("inlandMarine-btn");
        const inlandbutton = document.getElementById("nav-inland-tab");
        // Trigger the button click
        button.click();
        inlandbutton.click();
        //     showContent(this);
    } else {
        function showWeatherContent() {
            const weatherBtn = document.getElementById("home-btn");
            weatherBtn.click();
        }
        showWeatherContent();

    }


});


// searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
//   sidebar.classList.toggle("open");
//   menuBtnChange(); //calling the function(optional)
// });





// following are the code to change sidebar button(optional)
function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bi-list", "bi-x-circle"); //replacing the iocns class
    } else {
        closeBtn.classList.replace("bi-x-circle", "bi-list"); //replacing the iocns class
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
    btn.addEventListener("click", function () {
        showContent(this);
    });
});

// on load
// function showWeatherContent() {
//   const weatherBtn = document.getElementById("home-btn");
//   weatherBtn.click();
// }
// document.addEventListener("DOMContentLoaded", showWeatherContent);




menu.addEventListener('click', () => {
    sidebarmenu.classList.toggle('show');
});

//5 days spatial  rainfall content carousel
let items = document.querySelectorAll('.carousel .carousel-item1')

items.forEach((el) => {
    const minPerSlide = 4
    let next = el.nextElementSibling
    for (var i = 1; i < minPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
            next = items[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})

//5 days spatial  rainfall content carousel
let items2 = document.querySelectorAll('.carousel .carousel-item2')

items2.forEach((el) => {
    const minPerSlide = 4
    let next = el.nextElementSibling
    for (var i = 1; i < minPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
            next = items2[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})

// select district in the daily-forecast tab
var dropdownItems = document.querySelectorAll('.dropdown-menu .districted');
dropdownItems.forEach(function (item) {
    item.addEventListener('click', function () {
        var selectedDistricted = this.textContent.trim();

        // Perform further actions based on the selected districted value

        var xhr = new XMLHttpRequest();
        var url = "/filter/" + selectedDistricted;
        xhr.open("GET", url, true);
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful
                    // Redirect the user to the city.details route
                    window.location.href = "/filter/" + selectedDistricted + "?click=daily";

                    // var response = xhr.responseText;
                    // console.log(response);
                    // Process the response as needed
                } else {
                    // Request failed
                    console.log("Error: " + xhr.status);
                }
            }
        };
        xhr.send();
        console.log(selectedDistricted);



    });
});



// select district in the inland-forecast tab
var dropdownItems = document.querySelectorAll('.dropdown-menu .inlanddistricted');
dropdownItems.forEach(function (item) {
    item.addEventListener('click', function () {
        var selectedDistricted = this.textContent.trim();

        // Perform further actions based on the selected districted value

        var xhr = new XMLHttpRequest();
        var url = "/filter/" + selectedDistricted;
        xhr.open("GET", url, true);
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful
                    // Redirect the user to the city.details route
                    window.location.href = "/filter/" + selectedDistricted + "?click=inland";

                    // var response = xhr.responseText;
                    // console.log(response);
                    // Process the response as needed
                } else {
                    // Request failed
                    console.log("Error: " + xhr.status);
                }
            }
        };
        xhr.send();
        console.log(selectedDistricted);



    });
});




// JavaScript
document.getElementById("selectedDist").addEventListener("change", function () {
    var selectedOption = this.options[this.selectedIndex];
    var cityName = selectedOption.innerHTML;
    var citynull = selectedOption.value;
    // Redirect to a new page based on the selected city
    if (citynull != "null") {
        window.location.href = "/filter/" + cityName + "?click=cities";
    }
});



// marine forecast fish animation 

const canvas = document.querySelector("canvas"),
    ctx = canvas.getContext("2d"),
    wavelengthInput = document.querySelector("#wLength"),
    speedInput = document.querySelector("#speed"),
    numPInput = document.querySelector("#numP"),
    orbitRadiusInput = document.querySelector("#oRadius"),
    showPointsInput = document.querySelector("#showPoints"),
    fish = document.querySelector(".fish"),
    Tau = Math.PI * 2,
    PI180 = Math.PI / 180,
    Mcos = Math.cos,
    Msin = Math.sin;
// alert(document.querySelector("#numP1").value)
var h,
    w,
    midY,
    numP = Number(document.querySelector("#numP1").value),
    orbitRadius = Number(document.querySelector("#oRadius1").value),
    speed = Number(document.querySelector("#speed1").value),
    wavelength = Number(document.querySelector("#wlength1").value),
    centers = [],
    particles = [],
    showPoints = false;

const setParticles = () => {
    particles = [];
    let rotationStep = ((360 * wavelength) / numP) * PI180;
    for (let i = 0; i < numP; i++) {
        let p = {
            angle: rotationStep * i,
            vx: 0,
            vy: 0
        };
        particles.push(p);
    }
};
const setCenters = () => {
    centers = [];
    let step = (w + orbitRadius * 2) / (numP - 1.5);
    for (let i = 0; i < numP; i++) {
        centers.push(-orbitRadius + step * i);
    }
};
const handleResize = () => {
    //   const element = document.querySelector('.contme');
    // const width = element.offsetWidth;
    w = ctx.canvas.width = window.innerWidth;
    h = ctx.canvas.height = window.innerHeight;
    midY = h * 0.5;
    setCenters();
};
window.onresize = () => handleResize();
handleResize();

wavelengthInput.value = wavelength;
numPInput.value = numP;
speedInput.value = speed;
orbitRadiusInput.value = orbitRadius;
showPointsInput.checked = showPoints;

wavelengthInput.addEventListener("input", (e) => {
    wavelength = Number(e.target.value);
    setParticles();
    handleResize();
});
numPInput.addEventListener("input", (e) => {
    numP = Number(e.target.value);
    setParticles();
    handleResize();
});
orbitRadiusInput.addEventListener("input", (e) => {
    orbitRadius = Number(e.target.value);
    setCenters();
});
speedInput.addEventListener("input", (e) => {
    speed = e.target.value * -0.01;
});
showPointsInput.addEventListener("change", (e) => {
    showPoints = e.target.checked;
});

const drawWave = (offsetY) => {
    ctx.fillStyle = "hsla(190 , 100%, 50%, .5)";
    ctx.beginPath();
    ctx.moveTo(0, h);
    particles.forEach((p, i) => {
        p.angle += speed;
        p.vx = orbitRadius * Mcos(p.angle);
        p.vy = orbitRadius * Msin(p.angle);
        ctx.lineTo(p.vx + centers[i], p.vy + offsetY);
    });
    ctx.lineTo(w, h);
    ctx.lineTo(0, h);
    ctx.fill();
};

const drawDots = (offsetY) => {
    let midP = Math.round(particles.length * 0.5);
    particles.forEach((p, i) => {
        ctx.fillStyle =
            i === midP ? "hsla(0 , 100%, 50%, 1)" : "hsla(0 , 100%, 100%, 1)";
        ctx.beginPath();
        ctx.arc(p.vx + centers[i], p.vy + offsetY, 3, 0, Tau);
        ctx.fill();
    });
};

const animate = () => {
    canvas.width = w;

    drawWave(midY);

    if (showPoints) {
        drawDots(midY);
    }

    fish.style.bottom = `${50 + particles[1].vx}px`;

    requestAnimationFrame(animate);
};

setParticles();
animate();





// ==============================cafo map=================================
mapboxgl.accessToken = 'pk.eyJ1IjoidGhlbzYiLCJhIjoiY2xmazRpa2VzMDdiZDN0czR5Z2tiMGxheCJ9.GMZxHYFG0rGU8R6133k1kg';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v9', //hosted style id
    zoom: 4.5,
    center: [-1.6244, 6.6918],
});

// ==============================inland map=================================
mapboxgl.accessToken = 'pk.eyJ1IjoidGhlbzYiLCJhIjoiY2xmazRpa2VzMDdiZDN0czR5Z2tiMGxheCJ9.GMZxHYFG0rGU8R6133k1kg';
var inlandmap = new mapboxgl.Map({
    container: 'inlandmap',
    style: 'mapbox://styles/mapbox/streets-v9', //hosted style id
    zoom: 6.0,
    center: [-0.90565850665, 7.6463002725],
});

// ==============================inland map=================================
mapboxgl.accessToken = 'pk.eyJ1IjoidGhlbzYiLCJhIjoiY2xmazRpa2VzMDdiZDN0czR5Z2tiMGxheCJ9.GMZxHYFG0rGU8R6133k1kg';
var marinemap = new mapboxgl.Map({
    container: 'marinemap',
    style: 'mapbox://styles/mapbox/streets-v9', //hosted style id
    zoom: 5.5,
    center: [-1.3244, 3.6918],
});


window.onload = function () {
    // cafo  forecadst map 
    // Your code here
    var element = document.getElementById('polygonElement');
    var polygondata = JSON.parse(element.getAttribute('data-polygon'));
    var markerdata = JSON.parse(element.getAttribute('data-marker'));
    // Loop through the array and retrieve the 'polygon' key for each object
    const polygonns = [];
    if (polygondata != 'null' && polygondata) {
        polygondata.forEach(obj => {
            polygonns.push({
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
    // console.log(polygonns);
    // Now you can access the data variable in your JavaScript code
    console.log(markerdata);

    map.on('load', function () {

        map.addSource('polygons', {
            'type': 'geojson',
            'data': {
                'type': 'FeatureCollection',
                'features': polygonns

            }
        });
        if (polygondata != 'null' && polygondata) {
            polygondata.forEach(obj => {
                map.addLayer({
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

        if (markerdata != 'null' && markerdata) {
            markerdata.forEach(obj => {
                var svgMarker;

                var customValue = obj.icontype;
                if (customValue == "Rain") {
                    // Define the marker's icon using an SVG element
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 24 24');
                    svgMarker.innerHTML = '<path d="M4.176 11.032a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm.229-7.005a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10H13a3 3 0 0 0 .405-5.973z"/>';
                    // Scale the SVG icon down
                    var iconSize = 100;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);

                } else if (customValue == "Wind") {
                    // Define the marker's icon using an SVG element
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 24 24');
                    svgMarker.innerHTML = '<path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>';

                    // Scale the SVG icon down
                    var iconSize = 100;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);

                } else if (customValue == "Dust") {
                    // Define the marker's icon using an SVG element
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 512 512');
                    svgMarker.innerHTML = '<path d="m264.2 21.3a39.9 39.9 0 0 1 68.8 27.7c0 22-18 40-40 40h-284m139.2 123.7a39.9 39.9 0 0 0 68.8-27.7c0-22-18-40-40-40h-168" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="18"/><circle cx="96" cy="196" r="12"/><circle cx="180" cy="196" r="12"/><circle cx="264" cy="196" r="12"/><circle cx="222" cy="256" r="12"/><circle cx="306" cy="256" r="12"/><circle cx="390" cy="256" r="12"/><circle cx="172" cy="316" r="12"/><circle cx="256" cy="316" r="12"/><circle cx="340" cy="316" r="12"/><use height="234" transform="translate(86 139)" width="342" xlink:href="#a"/>';

                    // Scale the SVG icon down
                    var iconSize = 100;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "Hail") {
                    // Define the marker's icon using an SVG element
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 24 24');
                    svgMarker.innerHTML = '<path d="M3.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zM7.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm3.592 3.724a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm1.247-6.999a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10.5H13a3 3 0 0 0 .405-5.973z"/>';

                    // Scale the SVG icon down
                    var iconSize = 100;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "A") {
                    // Define the marker's icon using an SVG element
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M221.5 51.7C216.6 39.8 204.9 32 192 32s-24.6 7.8-29.5 19.7l-120 288-40 96c-6.8 16.3 .9 35 17.2 41.8s35-.9 41.8-17.2L93.3 384H290.7l31.8 76.3c6.8 16.3 25.5 24 41.8 17.2s24-25.5 17.2-41.8l-40-96-120-288zM264 320H120l72-172.8L264 320z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);

                } else if (customValue == "B") {
                    // Define the marker's icon using an SVG element
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H192c70.7 0 128-57.3 128-128c0-46.5-24.8-87.3-62-109.7c18.7-22.3 30-51 30-82.3c0-70.7-57.3-128-128-128H64zm96 192H64V96h96c35.3 0 64 28.7 64 64s-28.7 64-64 64zM64 288h96 32c35.3 0 64 28.7 64 64s-28.7 64-64 64H64V288z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);

                } else if (customValue == "C") {
                    // Define the marker's icon using an SVG element
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M329.1 142.9c-62.5-62.5-155.8-62.5-218.3 0s-62.5 163.8 0 226.3s155.8 62.5 218.3 0c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3c-87.5 87.5-221.3 87.5-308.8 0s-87.5-229.3 0-316.8s221.3-87.5 308.8 0c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "D") {
                    // Define the marker's icon using an SVG element
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M0 96C0 60.7 28.7 32 64 32h96c123.7 0 224 100.3 224 224s-100.3 224-224 224H64c-35.3 0-64-28.7-64-64V96zm160 0H64V416h96c88.4 0 160-71.6 160-160s-71.6-160-160-160z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "E") {
                    // Define the marker's icon using an SVG element
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "F") {
                    // Define the marker's icon using an SVG element
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 448c0 17.7 14.3 32 32 32s32-14.3 32-32V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "G") {
                    // Define the marker's icon using an SVG element
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M224 96C135.6 96 64 167.6 64 256s71.6 160 160 160c77.4 0 142-55 156.8-128H256c-17.7 0-32-14.3-32-32s14.3-32 32-32H400c25.8 0 49.6 21.4 47.2 50.6C437.8 389.6 341.4 480 224 480C100.3 480 0 379.7 0 256S100.3 32 224 32c57.4 0 109.7 21.6 149.3 57c13.2 11.8 14.3 32 2.5 45.2s-32 14.3-45.2 2.5C302.3 111.4 265 96 224 96z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "H") {
                    // Define the marker's icon using an SVG element
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M320 256l0 192c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V192L64 192 64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-192 256 0z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "I") {
                    // Define the marker's icon using an SVG element
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M32 32C14.3 32 0 46.3 0 64S14.3 96 32 96h96V416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H192V96h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H160 32z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else {
                    alert(customValue);
                }




                new mapboxgl.Marker({
                        'element': svgMarker,
                        'anchor': 'bottom'
                    })
                    .setLngLat([obj.markerslnglat.lng, obj.markerslnglat.lat])
                    .addTo(map);
                // marker.getElement().style.backgroundImage = 'url(https://img.favpng.com/24/21/9/food-icon-thanksgiving-fill-icon-food-icon-png-favpng-3mbb5g1Ubhi7EHPpjELypuBpn.jpg)';
                // marker.getElement().style.backgroundSize = '100%';
                // marker.getElement().style.width = '50px';
                // marker.getElement().style.height = '50px';


            });
        }
    });

    // ================================INLAND FORECAST MAP=============================
    // Your code here
    var inlandelement = document.getElementById('inlandpolygonElement');
    var inlandpolygondata = JSON.parse(inlandelement.getAttribute('data-polygon'));
    var inlandmarkerdata = JSON.parse(inlandelement.getAttribute('data-marker'));
    // Loop through the array and retrieve the 'polygon' key for each object
    const inlandpolygonns = [];
    if (inlandpolygondata != 'null' && inlandpolygondata) {
        inlandpolygondata.forEach(obj => {
            inlandpolygonns.push({
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
    // console.log(inlandpolygonns);
    // Now you can access the data variable in your JavaScript code
    console.log(inlandmarkerdata);
    inlandmap.resize();
    inlandmap.on('render', function(){inlandmap.resize();});
    inlandmap.on('load', function () {
        inlandmap.resize();
        inlandmap.addSource('polygons', {
            'type': 'geojson',
            'data': {
                'type': 'FeatureCollection',
                'features': inlandpolygonns

            }
        });
        if (inlandpolygondata != 'null' && inlandpolygondata) {
            inlandpolygondata.forEach(obj => {
                inlandmap.addLayer({
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

        if (inlandmarkerdata != 'null' && inlandmarkerdata) {
            inlandmarkerdata.forEach(obj => {
                var svgMarker;

                var customValue = obj.icontype;
                if (customValue == "Rain") {
                    // Define the marker's icon using an SVG inlandelement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 24 24');
                    svgMarker.innerHTML = '<path d="M4.176 11.032a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm.229-7.005a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10H13a3 3 0 0 0 .405-5.973z"/>';
                    // Scale the SVG icon down
                    var iconSize = 100;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);

                } else if (customValue == "Wind") {
                    // Define the marker's icon using an SVG inlandelement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 24 24');
                    svgMarker.innerHTML = '<path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>';

                    // Scale the SVG icon down
                    var iconSize = 100;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);

                } else if (customValue == "Dust") {
                    // Define the marker's icon using an SVG inlandelement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 512 512');
                    svgMarker.innerHTML = '<path d="m264.2 21.3a39.9 39.9 0 0 1 68.8 27.7c0 22-18 40-40 40h-284m139.2 123.7a39.9 39.9 0 0 0 68.8-27.7c0-22-18-40-40-40h-168" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="18"/><circle cx="96" cy="196" r="12"/><circle cx="180" cy="196" r="12"/><circle cx="264" cy="196" r="12"/><circle cx="222" cy="256" r="12"/><circle cx="306" cy="256" r="12"/><circle cx="390" cy="256" r="12"/><circle cx="172" cy="316" r="12"/><circle cx="256" cy="316" r="12"/><circle cx="340" cy="316" r="12"/><use height="234" transform="translate(86 139)" width="342" xlink:href="#a"/>';

                    // Scale the SVG icon down
                    var iconSize = 100;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "Hail") {
                    // Define the marker's icon using an SVG inlandelement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 24 24');
                    svgMarker.innerHTML = '<path d="M3.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zM7.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm3.592 3.724a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm1.247-6.999a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10.5H13a3 3 0 0 0 .405-5.973z"/>';

                    // Scale the SVG icon down
                    var iconSize = 100;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "A") {
                    // Define the marker's icon using an SVG inlandelement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M221.5 51.7C216.6 39.8 204.9 32 192 32s-24.6 7.8-29.5 19.7l-120 288-40 96c-6.8 16.3 .9 35 17.2 41.8s35-.9 41.8-17.2L93.3 384H290.7l31.8 76.3c6.8 16.3 25.5 24 41.8 17.2s24-25.5 17.2-41.8l-40-96-120-288zM264 320H120l72-172.8L264 320z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);

                } else if (customValue == "B") {
                    // Define the marker's icon using an SVG inlandelement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H192c70.7 0 128-57.3 128-128c0-46.5-24.8-87.3-62-109.7c18.7-22.3 30-51 30-82.3c0-70.7-57.3-128-128-128H64zm96 192H64V96h96c35.3 0 64 28.7 64 64s-28.7 64-64 64zM64 288h96 32c35.3 0 64 28.7 64 64s-28.7 64-64 64H64V288z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);

                } else if (customValue == "C") {
                    // Define the marker's icon using an SVG inlandelement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M329.1 142.9c-62.5-62.5-155.8-62.5-218.3 0s-62.5 163.8 0 226.3s155.8 62.5 218.3 0c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3c-87.5 87.5-221.3 87.5-308.8 0s-87.5-229.3 0-316.8s221.3-87.5 308.8 0c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "D") {
                    // Define the marker's icon using an SVG inlandelement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M0 96C0 60.7 28.7 32 64 32h96c123.7 0 224 100.3 224 224s-100.3 224-224 224H64c-35.3 0-64-28.7-64-64V96zm160 0H64V416h96c88.4 0 160-71.6 160-160s-71.6-160-160-160z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "E") {
                    // Define the marker's icon using an SVG inlandelement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "F") {
                    // Define the marker's icon using an SVG inlandelement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 448c0 17.7 14.3 32 32 32s32-14.3 32-32V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "G") {
                    // Define the marker's icon using an SVG inlandelement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M224 96C135.6 96 64 167.6 64 256s71.6 160 160 160c77.4 0 142-55 156.8-128H256c-17.7 0-32-14.3-32-32s14.3-32 32-32H400c25.8 0 49.6 21.4 47.2 50.6C437.8 389.6 341.4 480 224 480C100.3 480 0 379.7 0 256S100.3 32 224 32c57.4 0 109.7 21.6 149.3 57c13.2 11.8 14.3 32 2.5 45.2s-32 14.3-45.2 2.5C302.3 111.4 265 96 224 96z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "H") {
                    // Define the marker's icon using an SVG inlandelement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M320 256l0 192c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V192L64 192 64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-192 256 0z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "I") {
                    // Define the marker's icon using an SVG inlandelement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M32 32C14.3 32 0 46.3 0 64S14.3 96 32 96h96V416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H192V96h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H160 32z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else {
                    alert(customValue);
                }




                new mapboxgl.Marker({
                        'element': svgMarker,
                        'anchor': 'bottom'
                    })
                    .setLngLat([obj.markerslnglat.lng, obj.markerslnglat.lat])
                    .addTo(inlandmap);
                // marker.getElement().style.backgroundImage = 'url(https://img.favpng.com/24/21/9/food-icon-thanksgiving-fill-icon-food-icon-png-favpng-3mbb5g1Ubhi7EHPpjELypuBpn.jpg)';
                // marker.getElement().style.backgroundSize = '100%';
                // marker.getElement().style.width = '50px';
                // marker.getElement().style.height = '50px';


            });

        }


    });
    //  =====================END OF INLANDFORECAST MAP ================================





    // ================================MARINE FORECAST MAP=============================
    // Your code here
    var marineElement = document.getElementById('marinepolygonElement');
    var marinepolygondata = JSON.parse(marineElement.getAttribute('data-polygon'));
    var marinemarkerdata = JSON.parse(marineElement.getAttribute('data-marker'));
    // Loop through the array and retrieve the 'polygon' key for each object
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
    // console.log(marinepolygonns);
    // Now you can access the data variable in your JavaScript code
    console.log(marinemarkerdata);
    marinemap.resize();
    marinemap.on('render', function(){marinemap.resize();});
    marinemap.on('load', function () {
        marinemap.resize();
        marinemap.addSource('polygons', {
            'type': 'geojson',
            'data': {
                'type': 'FeatureCollection',
                'features': marinepolygonns

            }
        });
        if (marinepolygondata != 'null' && marinepolygondata) {
            marinepolygondata.forEach(obj => {
                marinemap.addLayer({
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
                var svgMarker;

                var customValue = obj.icontype;
                if (customValue == "Rain") {
                    // Define the marker's icon using an SVG marineElement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 24 24');
                    svgMarker.innerHTML = '<path d="M4.176 11.032a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm.229-7.005a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10H13a3 3 0 0 0 .405-5.973z"/>';
                    // Scale the SVG icon down
                    var iconSize = 100;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);

                } else if (customValue == "Wind") {
                    // Define the marker's icon using an SVG marineElement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 24 24');
                    svgMarker.innerHTML = '<path d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z"/>';

                    // Scale the SVG icon down
                    var iconSize = 100;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);

                } else if (customValue == "Dust") {
                    // Define the marker's icon using an SVG marineElement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 512 512');
                    svgMarker.innerHTML = '<path d="m264.2 21.3a39.9 39.9 0 0 1 68.8 27.7c0 22-18 40-40 40h-284m139.2 123.7a39.9 39.9 0 0 0 68.8-27.7c0-22-18-40-40-40h-168" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="18"/><circle cx="96" cy="196" r="12"/><circle cx="180" cy="196" r="12"/><circle cx="264" cy="196" r="12"/><circle cx="222" cy="256" r="12"/><circle cx="306" cy="256" r="12"/><circle cx="390" cy="256" r="12"/><circle cx="172" cy="316" r="12"/><circle cx="256" cy="316" r="12"/><circle cx="340" cy="316" r="12"/><use height="234" transform="translate(86 139)" width="342" xlink:href="#a"/>';

                    // Scale the SVG icon down
                    var iconSize = 100;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "Hail") {
                    // Define the marker's icon using an SVG marineElement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 24 24');
                    svgMarker.innerHTML = '<path d="M3.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zM7.75 15.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm3.592 3.724a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm.408-3.724a.5.5 0 0 1 .316.632l-.5 1.5a.5.5 0 1 1-.948-.316l.5-1.5a.5.5 0 0 1 .632-.316zm1.247-6.999a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10.5H13a3 3 0 0 0 .405-5.973z"/>';

                    // Scale the SVG icon down
                    var iconSize = 100;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "A") {
                    // Define the marker's icon using an SVG marineElement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M221.5 51.7C216.6 39.8 204.9 32 192 32s-24.6 7.8-29.5 19.7l-120 288-40 96c-6.8 16.3 .9 35 17.2 41.8s35-.9 41.8-17.2L93.3 384H290.7l31.8 76.3c6.8 16.3 25.5 24 41.8 17.2s24-25.5 17.2-41.8l-40-96-120-288zM264 320H120l72-172.8L264 320z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);

                } else if (customValue == "B") {
                    // Define the marker's icon using an SVG marineElement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H192c70.7 0 128-57.3 128-128c0-46.5-24.8-87.3-62-109.7c18.7-22.3 30-51 30-82.3c0-70.7-57.3-128-128-128H64zm96 192H64V96h96c35.3 0 64 28.7 64 64s-28.7 64-64 64zM64 288h96 32c35.3 0 64 28.7 64 64s-28.7 64-64 64H64V288z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);

                } else if (customValue == "C") {
                    // Define the marker's icon using an SVG marineElement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M329.1 142.9c-62.5-62.5-155.8-62.5-218.3 0s-62.5 163.8 0 226.3s155.8 62.5 218.3 0c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3c-87.5 87.5-221.3 87.5-308.8 0s-87.5-229.3 0-316.8s221.3-87.5 308.8 0c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "D") {
                    // Define the marker's icon using an SVG marineElement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M0 96C0 60.7 28.7 32 64 32h96c123.7 0 224 100.3 224 224s-100.3 224-224 224H64c-35.3 0-64-28.7-64-64V96zm160 0H64V416h96c88.4 0 160-71.6 160-160s-71.6-160-160-160z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "E") {
                    // Define the marker's icon using an SVG marineElement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 416c0 35.3 28.7 64 64 64H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "F") {
                    // Define the marker's icon using an SVG marineElement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M64 32C28.7 32 0 60.7 0 96V256 448c0 17.7 14.3 32 32 32s32-14.3 32-32V288H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V96H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H64z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "G") {
                    // Define the marker's icon using an SVG marineElement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M224 96C135.6 96 64 167.6 64 256s71.6 160 160 160c77.4 0 142-55 156.8-128H256c-17.7 0-32-14.3-32-32s14.3-32 32-32H400c25.8 0 49.6 21.4 47.2 50.6C437.8 389.6 341.4 480 224 480C100.3 480 0 379.7 0 256S100.3 32 224 32c57.4 0 109.7 21.6 149.3 57c13.2 11.8 14.3 32 2.5 45.2s-32 14.3-45.2 2.5C302.3 111.4 265 96 224 96z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "H") {
                    // Define the marker's icon using an SVG marineElement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M320 256l0 192c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V192L64 192 64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-192 256 0z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else if (customValue == "I") {
                    // Define the marker's icon using an SVG marineElement
                    var svgMarker = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svgMarker.setAttribute('viewBox', '0 0 384 512');
                    svgMarker.innerHTML = '<path d="M32 32C14.3 32 0 46.3 0 64S14.3 96 32 96h96V416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H288c17.7 0 32-14.3 32-32s-14.3-32-32-32H192V96h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H160 32z"/>';

                    // Scale the SVG icon down
                    var iconSize = 50;
                    var scaleFactor = 0.5;
                    svgMarker.setAttribute('width', iconSize * scaleFactor);
                    svgMarker.setAttribute('height', iconSize * scaleFactor);
                } else {
                    alert(customValue);
                }




                new mapboxgl.Marker({
                        'element': svgMarker,
                        'anchor': 'bottom'
                    })
                    .setLngLat([obj.markerslnglat.lng, obj.markerslnglat.lat])
                    .addTo(marinemap);
                // marker.getElement().style.backgroundImage = 'url(https://img.favpng.com/24/21/9/food-icon-thanksgiving-fill-icon-food-icon-png-favpng-3mbb5g1Ubhi7EHPpjELypuBpn.jpg)';
                // marker.getElement().style.backgroundSize = '100%';
                // marker.getElement().style.width = '50px';
                // marker.getElement().style.height = '50px';


            });

        }

        
    });
    
  //  marineElement.addEventListener('shown.bs.modal', function() {
  // marinemap.resize();
  //   });
    

    //  =====================END OF MARINE-FORECAST MAP ================================


    //  seasonal forecast


    var elements = document.getElementsByClassName('downloadreport');

    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', function () {
            var filename = this.getAttribute('downloadreport'); // Assuming each element has a data attribute 'data-filename' with the file name
            this.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>';

            var filePath = '/storage/seasonalForecastPDF/' + filename; // Change the file extension according to your requirements
            console.log(filePath);
            downloadFile(filePath);

            this.textContent = "Download Completed";
        });

    }



    // Function to download the file
    function downloadFile(filePath) {
        // Create an anchor element
        var link = document.createElement('a');

        // Set the href attribute to the file path
        link.href = filePath;

        // Set the download attribute to specify the filename
        link.download = filePath.substr(filePath.lastIndexOf('/') + 1);

        // Simulate a click on the anchor element
        link.click();
    }




}