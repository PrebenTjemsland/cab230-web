
      function initMap() {
        var brisbane = {lat: -25.363, lng: 131.044};
		var map = new google.maps.Map(document.getElementById('map_1'),{
          zoom: 4,
          center: brisbane
        });
        var marker = new google.maps.Marker({
          position: brisbane,
          map: map
        });
      }

