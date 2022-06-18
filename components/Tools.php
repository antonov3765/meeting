<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php

class Tools
{
   public static function notify($message, $type){
        if($message){
            ?>
            <div class="justify-content-around row" style="margin-top: 5rem;">
                <div class="col-sm-8 col-md-8 col-lg-4">
                    <div class="alert alert-<?=$type?>" role="alert">
                        <?=$message?>
                    </div>
                </div>
            </div>
            <?php
        }
   }

   public static function addRow()
   {
       $data = [
           'date' => $_POST['date'],
           'time' => $_POST['time'],
           'title' => $_POST['title'],
           'address_lat' => $_POST['address_lat'],
           'address_lng' => $_POST['address_lng'],
           'country' => $_POST['country'],
       ];
       $mm = new MeetingModel();
       $mm->add($data);
       Tools::notify("All ok", 'success');
   }

    public static function editRow($id)
    {
        $data = [
            'date' => $_POST['date'],
            'time' => $_POST['time'],
            'title' => $_POST['title'],
            'address_lat' => $_POST['address_lat'],
            'address_lng' => $_POST['address_lng'],
            'country' => $_POST['country'],
        ];
        $mm = new MeetingModel();
        $mm->edit($id, $data);
        Tools::notify("All ok", 'success');
    }

   public static function checkFields(){
       $result =[
           'success'=>false,
           'error' =>[]
       ];
       $title=$_POST["title"];
       $date=$_POST['date'];
       $time=$_POST['time'];
       $address_lat=$_POST["address_lat"];
       $address_lng=$_POST["address_lng"];
       $country=$_POST["country"];
       $length_title=strlen($title);
       $length_date =strlen($date);
       if($length_title>255 || $length_title<2 ||  $length_date>10){
           $result['error'][]="Title or date too long/to tiny";
       }

       if(empty($date) || empty($country) || empty($time)){
           $result['error'][]="fields date, country, time are required";
       }

       if(!empty($address_lat) && !empty($address_lng)){
           $pattern=preg_match( '/^(\-|\+)?\d+(\.\d+)?$/', $address_lat);
           if($pattern<1){
               $result['error'][]="Incorrect address_lat";
           }
           $pattern=preg_match( '/^(\-|\+)?\d+(\.\d+)?$/', $address_lng);
           if($pattern<1){
               $result['error'][]="Incorrect address_lng";
           }
       }

       if(empty($address_lat) xor empty($address_lng)) {
           $result['error'][]="Please, clear or required all address coords";
       }

       if(!$result['error']){
           $result['success']= true;
       }
       return $result;
   }

   public static function Style() //те самые костыли
   {echo
   ("<style>
            #map {
                width:600px;
                height:500px;
            }
            #icon{
                class:d-inline-block align-top;
                margin-right: 1rem;
    
            }
            #icon:hover{
                filter: invert(50%);
            }
    </style>");
   }

   public static function Js() //те самые костыли
   {echo
       ("<script>

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

    if((fix_lat !==0 && fix_lng !==0) && (fix_lat !=='' && fix_lng !==''))
    {
         var myLatlng = new google.maps.LatLng(fix_lat, fix_lng);

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

         var myLatlng = new google.maps.LatLng(47.8, 35.1);

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

    </script>");
       echo ("<script async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBVwG9g_Jl68qfCEi5QaWsIJWA7CNjv_00&callback=initMap'></script>");
   }
}