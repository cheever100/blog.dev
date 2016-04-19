<!doctype html>
<html>

<head>
	<title>Weather Map Exercise</title>
	<link rel="stylesheet" href="/css/weather_map_style.css">	
</head>

<body>   
<h1><img src="/img/Twc_logo_resized.svg.png" width="150" height="100"></h1>
<h2><img id=cityView src="/img/San_Antonio_Spurs.png" width="150" height="100"></h2>


	<table class="table table-striped">	
		<thead>
			<tr>
				<th class = 'labelCenter'>Day</th>
				<th class = 'labelCenter'>Clouds</th>
				<th class = 'labelCenter'>Humidity</th>
				<th class = 'labelCenter'>Wind (mph)</th>
				<th class = 'labelCenter'>Pressure</th>
				<th class = 'labelCenter'>Max Temp</th>
				<th class = 'labelCenter'>Min Temp</th>
			</tr>
		</thead>
		<tbody id="data-table-body"></tbody>
	</table>
   	
	<button id="sanAntonio"><h3>San Antonio</h3></button>
	<button id="paris"><h3>Paris</h3></button>
	<button id="tehran"><h3>Tehran</h3></button>
	
	<div id="map-canvas"></div>

	

	<script src="/js/jquery.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCf40LLO7rd2hFPkAQkt1yg9MBeLWL6qLI">
    </script>
    <script type="text/javascript">

		function sanAntonioRequest(){
			$.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
			    APPID: "194a44e33b12f3ecee3454e47fce58f1",
			    q:     "San Antonio, TX",
			    units: "imperial",
			    cnt: 3
			}).done(function(data) {
				addWeatherData(data.list);
				$("#cityView").attr("src","/img/San_Antonio_Spurs.png");
			    address="sanAntonio";
				cityMap();
			    console.log(data);
			}).fail(function(data) {
				console.log(data);
				console.log('this failed');
			});
		}
		
		function parisRequest(){
			$.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
			    APPID: "194a44e33b12f3ecee3454e47fce58f1",
			    lat: "48.8567",
			    lon: "2.3508",
			    units: "imperial",
			    cnt: 3
			}).done(function(data) {
				addWeatherData(data.list);
			    $("#cityView").attr("src","/img/Paris.jpeg");
				address="paris,france";
				cityMap();
			    console.log(data);
			}).fail(function(data) {
				console.log(data);
				console.log('this failed');
			});
		}
		
		function tehranRequest(){
			$.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
			    APPID: "194a44e33b12f3ecee3454e47fce58f1",
			    lat: "35.6967329",
			    lon: "51.2097323",
			    units: "imperial",
			    cnt: 3
			}).done(function(data) {
				addWeatherData(data.list);
			    $("#cityView").attr("src","/img/tehran_logo.png");
			    address="tehran";
				cityMap();
			    console.log(data);
			}).fail(function(data) {
				console.log(data);
				console.log('this failed');
			});
		}
		
		function addWeatherData(list){	
			$('#data-table-body').html("");
				list.forEach(function(forecast, index) {
				console.log(forecast);
				var contentString = "";						 
				contentString += "<tr>";
				contentString += "<td class = 'labelCenter'>" + (index+1) + "</td>";		
				contentString += "<td  class = 'labelCenter'class = 'labelCenter'>" + forecast.weather[0].description + "</td>";
				contentString += "<td class = 'labelCenter'>" + forecast.humidity + "&#x00025;</td>";
               	contentString += "<td class = 'labelCenter'>" + parseInt(forecast.speed) + "</td>";
		        contentString += "<td class = 'labelCenter'>" + forecast.pressure + "</td>";
		        contentString += "<td class = 'labelCenter'>" + parseInt(forecast.temp.max) + "&#8457;</td>";
		    	contentString += "<td class = 'labelCenter'>" + parseInt(forecast.temp.min) + "&#8457;</td>";
		        contentString += "</tr>";
		        $('#data-table-body').append(contentString);
		        });
		}
			        
       	function cityMap() {
			addressLookerUpper.geocode({ "address": address }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    console.log(results);                    
                    var cityMarker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        draggable: true
                    });
                    
                    cityMarker.addListener('dragend', function() {
                        infowindow.open(map, cityMarker);
                    });                  
                } else {
                    alert("Geocoding was not successful - STATUS: " + status);
                }
            });
        	}
        
        	var mapOptions = {
		        zoom: 10,
		        center: {
		        lat:  29.4284595,
		        lng: -98.492433
		    	},
		    	mapTypeId: google.maps.MapTypeId.TERRAIN
		    };
		    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
		    var address = "San Antonio";
		    var addressLookerUpper = new google.maps.Geocoder();

            sanAntonioRequest();
            
            cityMap();

			$('#paris').click (function(e) {  
				e.preventDefault();
				parisRequest();        	
            });

			$('#sanAntonio').click (function(e) {  
               e.preventDefault();
				sanAntonioRequest();        
            });

            $('#tehran').click (function(e) {
            	e.preventDefault();
            	tehranRequest();
            });

	</script>

</body>
</html>