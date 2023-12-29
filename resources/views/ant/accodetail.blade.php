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
    img {
        width: 100%;
        height: auto;
        max-height: 680px;
    }

    .banner-title {
        position: absolute;
        width: 80%;
        top: 50%;
        transform: translate(20%, -50%);
        color: #FFF;
        font-family: 'Quicksand', sans-serif;
        font-size: 90px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .banner-desc {
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
        align-items: flex-start;
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

    .content {
        margin-left: 30px;
    }

    .title {
        color: #0D0E10;
        font-family: 'Quicksand', sans-serif;
        font-size: 3vw;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    .ldesc {
       
        width: 70%;
        color: #000;
        font-family: 'Quicksand', sans-serif;
        /* font-size: 1.7vw; */
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        letter-spacing: -0.96px;
    }

    .submission, .reviews{
        margin-left: 10%;
        margin-top: 20px;
        
    }

    .submission h3, .reviews h3{
        color: #0D0E10;
        font-family: 'Quicksand', sans-serif;
        font-size: 2vw;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    .submission form{
        margin-top: 20px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: left;
        width: 70%;
        height: 400px;
        flex-shrink: 0;
        border-radius: 20px;
        background: rgba(13, 14, 16, 0.09);
        backdrop-filter: blur(10.5px);
        transform: translateX(15%);
    }

    label{
        text-align: left;
    }

    input[type="number"], textarea{
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 20px;
        font-size: 1.4vwpx;
        align-items: center;
    }

    .btt{
        margin-top: 20px;
        text-align: right;
        color: white;
    }

    .btt button{
        width: 20%;
        height: 37px;
        flex-shrink: 0;
        transition: background-color 0.3s ease;
        background: #1310A2;
        border-radius: 5px;
    }
    
    .btt button:hover {
        border-radius: 5px;
        background-color: #67e084;; /* Change this to the desired hover color */
    }

    hr{
        width: 80%;
    }

    .reviews{
        width: 90%;
        gap: 20px;
    }

    .review{
        
        
    }

    .container{
        display: flex;
        align-items: center;
        gap: 10px; /* Adjust the gap between elements as needed */
        margin-top: 10px; /* Adjust the top margin as needed */
        padding: 20px;
        }

    .container p{
        margin-top: 10px;
    }

    .time {
        margin-left: auto;
        margin-right: 20%;
    }

    .result{
        margin-left: 20px;
        margin-bottom: 20px;
    }

    .attraction-rating {
        display: flex;
        letter-spacing: -0.48px;
        margin-top: 10%;
        margin-left: 5%;
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

    @media (max-width: 768px) {
        .banner-title {
            width: 100%;
            transform: translate(0, -50%);
            text-align: center;
            font-size: 5vw; /* Adjust the font size for smaller screens */
        }

        .banner-desc {
            width: 100%;
            transform: translate(0, -90%);
            text-align: center;
            font-size: 3vw; /* Adjust the font size for smaller screens */
        }

        .flex-container {
            flex-direction: column; /* Stack items vertically for smaller screens */
            align-items: center;
            gap: 20px;
        }

        .square {
            width: 80%; /* Full width for smaller screens */
            margin-left: 0;
            margin-right: 0;
            padding: 20px;
        }

        .square p {
            font-size: 3vw; /* Adjust the font size for smaller screens */
        }

        .content {
            margin-left: 0;
        }

        .title {
            font-size: 5vw; /* Adjust the font size for smaller screens */
            margin-left: 10%;
        }

        .ldesc {
            width: 80%;
            font-size: 3vw; /* Adjust the font size for smaller screens */
            margin-left: 10%;
        }

        .submission form {
            width: 90%;
            height: auto;
            padding: 20px;
            transform: translateX(0);
        }

        input[type="number"],
        textarea {
            font-size: 3vw; /* Adjust the font size for smaller screens */
        }

        .btt button {
            width: 40%; /* Adjust the button width for smaller screens */
        }

        hr {
            width: 100%;
        }

        .reviews {
            width: 100%;
            gap: 10px;
        }

        .review {
            /* Adjust styles as needed for smaller screens */
        }

        .review .container {
            flex-direction: column; /* Stack elements vertically for smaller screens */
            align-items: flex-start;
            margin-left: 0;
        }

        .container p {
            margin-top: 0; /* Remove top margin for paragraphs in container */
        }

        .time {
            margin-left: 0;
            margin-right: 0;
        }

        .result {
            margin-left: 0;
            margin-bottom: 20px;
        }

        .attraction-rating {
            margin-top: 0; /* Remove top margin for attraction rating */
            margin-left: 0;
        }
    }

</style>

<x-app-layout>
    <div class="banner">
        @if($accommodation->acco_img)
        <img src="{{ url('storage/' . $accommodation->acco_img) }}" alt="Accommodation Image">
        @endif

        <h2 class="banner-title">
            {{ $accommodation->acco_name }}
        </h2>

        <p class="banner-desc">
            {{ $accommodation->acco_sdesc }}
        </p>
    </div>

    <div style="background-image: url('/build/assets/eventsbg.png'); background-repeat: repeat; min-height: 100vh;">

        <br><br>

        <ul class="breadcrumb">
            <li><a href="{{ route('ant.main') }}" style="color: blue; text-decoration: underline;">Accommodation & Transportation</a></li>
            <li><a href="{{ route('accommodation.index') }}" style="color: blue; text-decoration: underline;">Accomodation</a></li>
            <li>Detail</li>
        </ul>

        <br>

        <div class="flex-container">
            <div class="square">
                <p><strong>Accommodation details</strong></p>
                <hr>
                <div class="attraction-rating">
                    <img src="/build/assets/icons/star.svg" alt="Icon Description" style="width: 20px; height: 20px;">
                    {{ $accommodation->acco_average_rating }}
                </div>
                <p>Types: {{ $accommodation->acco_types }}</p>
                <p>Website: {{ $accommodation->acco_website }}</p>
                <p>Contact No.: {{ $accommodation->acco_contact }}</p>
                <p>From RM {{ $accommodation->acco_price_range ?? 'Not available' }}</p>

            </div>
            <div class="content">
                <h2 class="title">
                    {{ $accommodation->acco_name }}
                </h2>
                <br>
                <p class="ldesc"> {{ $accommodation->acco_ldesc }} </p>
            </div>
        </div>

        <br>

        <div id="map"></div>

        <br>

        <div class="submission">
            <h3>Leave a Review</h3>

            <form action="{{ route('accoreviews.store', $accommodation->acco_id) }}" method="post">
                @csrf
                
                    <label for="rating">Rating:</label>
                    <br>
                    <input type="number" name="rev_rating" min="1" max="5" required><br>

                    <label for="comment">Comment:</label>
                    <br>
                    <textarea name="rev_comment" rows="4" cols="50" required></textarea><br>

                    <div class="btt">

                        <button type="submit">Submit</button>
                
                    </div>
                
            </form>

        </div>

        <div class="reviews">
            <h3>Reviews</h3>
            @foreach($accommodation->reviews as $accoreview)
                <div class="review">
                    <div class="container">
                    <img src="{{ $accoreview->user->profile_photo_url }}" alt="{{ $accoreview->user->name }}" class="rounded-full h-10 w-10 object-cover">


                        <p><strong>{{ $accoreview->user->name }}</strong> </p>

                        <div class="time">
                            <p>{{ $accoreview->created_at->format('F j, Y H:i A') }}</p>
                        </div>

                    </div>
                    <div class="result">
                    <p><strong>Rating:</strong> {{ $accoreview->rev_rating }}</p>
                    <p>{{ $accoreview->rev_comment }}</p>
                    </div>

                </div>
                <hr>
            @endforeach
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        
        document.addEventListener('DOMContentLoaded', (event) => {
            let attractionLat = {{ $accommodation->acco_lat }};
            let attractionLongi = {{ $accommodation->acco_longi }};

            let mapOptions = {
                center: [attractionLat, attractionLongi],
                zoom: 15
            }

            let map = new L.map('map', mapOptions);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 20,
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
