<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

</head>
<style>
    img{
        width: 100%;
        height: auto;
        max-height: 680px; /* Adjust the maximum height as per your design */
        
    }

    .banner {
        position: relative;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Adjust the alpha value for opacity */
    }

    .banner-title{
        position: absolute;
        width: 80%;
        top: 50%; 
        transform: translate(20%, -50%);
        color: #FFF;
        font-family: 'Quicksand', sans-serif;
        font-size: 6vw;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        z-index: 1;
    }

    .banner-desc{
        position: absolute;
        width: 80%;
        top: 70%; 
        transform: translate(20%, -90%);
        color: #FFF;
        font-family: 'Quicksand', sans-serif;
        font-size: 2vw;
        font-style: normal;
        font-weight: 300;
        line-height: normal;
        letter-spacing: -1.2px;

    }

    .flex-container {
            display: flex;
            width: 100%;
            margin-top: 20px;
            align-items: flex-start; /* Align items vertically at the start */
        }

    .square {
        display: flex;
        flex-direction: column;
        width: 25%;
        height: auto;
        align-items: flex-start;
        gap: 9px;
        flex-shrink: 0;
        background: rgba(13, 14, 16, 0.09);
        backdrop-filter: blur(10.5px);
        margin-left: 10%;
        padding: 20px;
        border-radius: 20px;
    }

    .square p {
        color: black;
        text-align: left;
        font-family: 'Quicksand', sans-serif;
        /* font-size: 1.4vw; */
        line-height: normal;
        letter-spacing: -0.48px;
        margin-top: 10%;
        margin-left: 5%;
    }

    .square hr {
        width: 100%;
        border-color: black; /* Set the color of the horizontal rule */
        border-width: 0.7px; /* Set the width of the border */
    }

    .separator{
        width: 100%;
        height: 1px;
        background: #FFF;
    }

    .content{
        margin-left: 30px;
    }
    .title{
        color: #0D0E10;
        font-family: 'Quicksand', sans-serif;
        font-size: 3vw;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    .ldesc{
        width: 90%;
        color: #000;
        font-family: 'Quicksand', sans-serif;
        /* font-size: 1.7vw; */
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        letter-spacing: -0.96px;
    }

    #map {
        height: 40%;
        width: 80%;
        margin: 0 auto; /* Center the map */
        transform: none;
    }

    .breadcrumb {
        list-style: none;
        padding: 0;
        margin: 10px 0;
        margin-left: 10%;
        font-size: 20px;
    }

    .breadcrumb li {
        display: inline;
        margin-right: 5px;
    }

    .breadcrumb li::after {
        content: "\\";
        margin-left: 5px;
    }

</style>

<x-app-layout>

    <div class="banner">
        
        @if($event->eve_img)
            <div class="overlay"></div>
            <img src="{{ url('/storage/' . $event->eve_img) }}" alt="Event Image">
        @endif
        
        <h2 class="banner-title">
            {{ $event->eve_name }}
        </h2>

        <p class="banner-desc">
            {{ $event->eve_sdesc }}
        </p>

    </div>
        
    <br><br>

    <ul class="breadcrumb">
        <li><a href="{{ route('events') }}" style="color: blue; text-decoration: underline;">Events</a></li>
        <li>Detail</li>
    </ul>

    <br>

    <div style="background-image: url('/build/assets/eventsbg.png'); background-repeat: repeat; min-height: 100vh;">

        <div class="flex-container">

            <div class="square">

                <p><strong>Event details</strong></p>

                <div class="separator"></div>

                <p>Date: {{ date('d F Y', strtotime($event->eve_date)) }}</p>

                <p>Time: {{ $event->eve_time }}</p>

                <p>Contact: {{ $event->eve_contact }}</p>

                <p>Address: {{ $event->eve_address }}</p>
                
            </div>

            <div class="content">

                <h2 class="title">
                    {{ $event->eve_name }}
                </h2>

                <br>

                <p class="ldesc"> {{ $event->eve_ldesc }} </p>

            </div>

        </div>

        <br>

        <div id="map"></div>

        <br>

    </div>

    <script>
        
        document.addEventListener('DOMContentLoaded', (event) => {
            let attractionLat = {{ $event->eve_lati }};
            let attractionLongi = {{ $event->eve_longi }};

            let mapOptions = {
                center: [attractionLat, attractionLongi],
                zoom: 10
            }

            let map = new L.map('map', mapOptions);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Add a marker to the map
            let marker = L.marker([attractionLat, attractionLongi]).addTo(map);

            // Add a click event listener to the marker
            marker.on('click', function() {
                // Open a new tab/window with the Google Maps link
                window.open(`https://www.google.com/maps/search/?api=1&query=${attractionLat},${attractionLongi}`);
            });

            // Example of updating the marker position when the attraction coordinates change
            // You can trigger this update when necessary, for instance, after an AJAX request.
            function updateMarkerPosition(newLat, newLongi) {
                marker.setLatLng([newLat, newLongi]);
            }
        });


    </script>
    
        

</x-app-layout>


