var timeOut;
function goUp() {
    var top = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
    if(top > 0) {
        window.scrollBy(0,-100);
        timeOut = setTimeout('goUp()',20);
    } else clearTimeout(timeOut);
}

function updateCoordinates(lat, lng) {
    document.getElementById('address_lat').value = lat;
    document.getElementById('address_lng').value = lng;
}


function initMap()
{
    let fix_lat = document.getElementById('address_lat').value;
    let fix_lng = document.getElementById('address_lng').value;
    var marker;

    if((fix_lat !==0 && fix_lng !==0) && (fix_lat !=="" && fix_lng !==""))
    {
        myLatlng = new google.maps.LatLng(fix_lat, fix_lng);

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: myLatlng
        });

        marker = new google.maps.Marker({
            map: map,
            position: myLatlng,
            draggable: true
        });

    } else {

        myLatlng = new google.maps.LatLng(47.8, 35.1);

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: myLatlng
        });
        marker = new google.maps.Marker({
            map: map,
            draggable: true
        });

        map.addListener('click', function(e) {
            marker.setPosition(e.latLng);
            updateCoordinates(e.latLng.lat(), e.latLng.lng())
        });

    marker.addListener('dragend', function(e) {
        var position = marker.getPosition();
        updateCoordinates(position.lat(), position.lng())
    });

    map.addListener('', function(fixCoords) {});
    }
}

function fixCoords(){
    let fix_lat = document.getElementById('address_lat').value;
    let fix_lng = document.getElementById('address_lng').value;


    var myLatlng2 = new google.maps.LatLng(fix_lat, fix_lng);
    var mapOptions = {
        zoom: 12,
        center: myLatlng2
    }
    var map2 = new google.maps.Map(document.getElementById('map'), mapOptions);

    var marker2 = new google.maps.Marker({
        position: myLatlng2,
    });

    marker2.setMap(map2);
}

window.onload =initMap();
