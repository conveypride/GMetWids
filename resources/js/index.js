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


//======================= AMCHART / MAP PAGE CODE:=============================
// Create root
var map = am4core.create("chartdiv", am4maps.MapChart);


// set the map's geodata to Ghana
map.geodata = am4geodata_ghanaLow;

// set the map's projection to a Mercator projection
map.projection = new am4maps.projections.Mercator();

// set the center and zoom level of the map to Ghana
map.homeGeoPoint = { longitude: -1.024941, latitude: 7.946527 };
map.homeZoomLevel = 1;

// create a map polygon series
var polygonSeries = map.series.push(new am4maps.MapPolygonSeries());
polygonSeries.useGeodata = true;

// set the polygon color and tooltip text
var polygonTemplate = polygonSeries.mapPolygons.template;
polygonTemplate.fill = am4core.color("#74B266");
polygonTemplate.tooltipText = "{name}: {value}";
	  
// set the series' data and value field
polygonSeries.data = [{
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
polygonSeries.dataFields.value = "value";
polygonSeries.dataFields.id = "id";
// create a heat legend
// var heatLegend = new am4maps.HeatLegend();
// heatLegend.minColor = am4core.color("#FFFFFF");
// heatLegend.maxColor = am4core.color("#FF0000");
// heatLegend.series = polygonSeries;
// heatLegend.width = am4core.percent(100);
// heatLegend.height = am4core.percent(10);
// heatLegend.align = "center";
// heatLegend.valign = "bottom";
// heatLegend.orientation="vertical",

polygonTemplate.events.on("hit", function(event) {
  // do something when a polygon is clicked
});

polygonTemplate.events.on("over", function(event) {
  // do something when the mouse hovers over a polygon
});

polygonTemplate.events.on("out", function(event) {
  // do something when the mouse leaves a polygon
});
// add the heat legend to the map
// map.legend = heatLegend;