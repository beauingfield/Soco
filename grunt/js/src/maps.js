function initialize() {
	var map_canvas2 = document.getElementById('map_canvas2');
	var map_options = {
		center: new google.maps.LatLng(28.542677, -81.368660),
		zoom: 15,
		draggable: true,
		scrollwheel: true,
		mapTypeControl: false,
		disableDoubleClickZoom: false,
		disableDefaultUI: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}


	var map2 = new google.maps.Map(map_canvas2, map_options);

	var iconBase = 'http://dev.socothorntonpark.com'; // Do not do duplicate declarations!

	var marker2 = new google.maps.Marker({
		map: map2,
		draggable:false,
		animation: google.maps.Animation.DROP,
		icon: iconBase + '/wp-content/themes/soco-site/_assets/img/Soco-map-marker.png',
		position: new google.maps.LatLng(28.542677, -81.368660)
	});

}
google.maps.event.addDomListener(window, 'load', initialize);