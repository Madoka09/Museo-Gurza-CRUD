function initMap() {
    var uluru = {lat: 24.025591, lng: -104.672314};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16.5,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }
