<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<style>
    /* CSS Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .banner img {
        width: 100%;
        height: auto;
        max-height: 550px;
    }

    .banner-title {
        position: absolute;
        width: 100%;
        text-align: center;
        top: 27%;
        color: black;
        font-family: 'Quicksand', sans-serif;
        font-size: 5vw;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .banner-desc {
        position: absolute;
        width: 100%;
        top: 40%;
        text-align: center;
        color: black;
        font-family: 'Quicksand', sans-serif;
        font-size: 2vw;
        font-style: normal;
        font-weight: 300;
        line-height: normal;
        letter-spacing: -1.2px;
    }

    .container {
        position: absolute;
        width: 100%;
        top: 60%;
        display: inline-flex;
        gap: 5%;
        justify-content: center;
    }

    .c1,
    .c2,
    .c3 {
        width: 25%;
        display: flex;
        flex-direction: column;
        padding: 30px 25px;
        align-items: flex-start;
        gap: 9px;
        border-radius: 9px;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10.5px);
        transition: transform 0.3s ease;
    }

    .c1:hover,
    .c2:hover,
    .c3:hover {
        /* Set styles on hover */
        transform: scale(1.1); /* Scale up to 110% on hover */
    }

    .container a {
        border-bottom: 1px solid #00A4FF;
    }

    .intro img{
        max-width: 70%;
        height: auto;
        
    }

    .intro {
        align-items: center;
        justify-content: center;
        text-align: center; 
        height: 50%;
    }

    .desc1 {
        width: 50%;
    }

    .desc1 p{
        margin-top: 20px;
        font-size: 20px;
    }

    .history, .intro {
        display: flex;
        position: relative;
    }

    .history {
        margin-top: 90px;
    }

    .rectangle {
        width: 20%;
        height: 500px;
        flex-shrink: 0;
        background: #0B0967;
        margin-top: 70px;
    }

    .history img {
        position: absolute;
        width: auto;
        height: 350px;
        transform: translate(-15%, 10%);
    }

    .head {
        display: flex;
        align-items: center;
    }

    .deco img {
        width: 59px;
        height: 59px;
    }


    .desc {
        margin-left: 40%;
        margin-top: 5%;
        width: 50%;
    }

    .hist-title {
        color: #0D0E10;
        font-family: Quicksand, sans-serif;
        font-size: 3vw;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    .desc p {
        margin-top: 2%;
        color: #0D0E10;
        font-family: Quicksand, sans-serif;
        /* font-size: 25px; */
    }

    .att,
    .event,
    .ant {
        display: flex;
        flex-direction: column;
        padding: 50px;
        margin-top: 120px;
    }

    .att h2,
    .event h2,
    .ant h2 {
        color: #0D0E10;
        text-align: center;
        font-family: Quicksand, sans-serif;
        font-size: 3vw;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: 0px;
    }

    .homemap h2 {
        color: #0D0E10;
        font-family: Quicksand, sans-serif;
        font-size: 3vw;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: 0px;
        margin-left: 10%;
    }



    .att p,
    .event p,
    .ant p {
        color: #0D0E10;
        text-align: center;
        font-family: Quicksand, sans-serif;
        font-size: 1.5vw;
        width: 40%;
        margin-top: 2%;
        margin-left: 30%;
    }

    .carousel-container {
        position: relative;
    }

    .prev,
    .next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 24px;
        /* Adjust the font size as needed */
        cursor: pointer;
    }

    .prev {
        left: 10px;
    }

    .next {
        right: 10px;
    }

    .carousel {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 80%;
        height: 424px;
        overflow: hidden;
        margin: 0 auto;
        /* Center horizontally */
        margin-top: 40px;
    }

    .carousel-item {
        flex: 0 0 30%;
        height: 100%;
        position: relative;
        border-radius: 20px;
        overflow: hidden;
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .carousel-item:hover img {
        transform: scale(1.2);
        /* Zoom in by 20% on hover */
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -ms-transform: scale(1.2);
        -o-transform: scale(1.2);
    }

    .attraction-details {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    .categories {
        display: flex;
        /* Use flexbox */
        justify-content: center;
        /* Center items horizontally */
        gap: 150px;
        /* Add some space between items */
        margin-top: 20px;
        /* Add margin to the top for spacing */
    }

    .categories .cat {
        display: flex;
        flex-direction: column;
        text-align: center;
        align-items: center;
        /* Center items vertically */
    }

    .categories .cat:hover .icon img {
        transform: scale(1.2); /* Adjust the scale factor as needed */
        transition: transform 0.3s ease; /* Add a smooth transition effect */
    }

    .fadeIn {
        opacity: 1;
        transition: opacity 0.5s ease-in-out;
    }

    .fadeOut {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    #greeting-container {
      text-align: center;
      padding: 40px;
      margin-top: 50px;
    }

    #greeting {
        white-space: normal;
        font-size: 25px;
        /* font-weight: bold; */
        color: #808080;
        outline: 2px solid transparent;
        outline-offset: 2px;
        text-underline-offset: 3px;
    }

    .attraction-rating {
        display: flex;
    }

    .date-placeholder {
        font-family: 'Quicksand', sans-serif;
        font-weight: 600; /* Semibold font weight */
        font-size: 12px;
        color: #00A4FF; /* Color code */
        
    }

    .map-container {
        height: 400px;
        width: 80%;
        margin: 0 auto; /* Center the map */
        position: relative; /* Make it a positioning context for absolute positioning */
    }

    .attraction-pin {
        width: 30px;
        height: 30px;
        background-color: red; /* Change color as needed */
        border-radius: 50%;
        cursor: pointer;
        transition: transform 0.3s;
        z-index: 0; /* Set a lower z-index than the preview */
    }

    .attraction-preview {
        display: none;
        position: absolute;
        width: 275px;
        height: auto;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        font-size: 14px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        padding: 10px;
        z-index: 1000; /* Set a higher z-index than the pin */
    }

    .attraction-preview img{
        height: 200px;
        width: 100%;
    }

    .c-flex {
        display: flex;
        justify-content: space-between;
    }

    .attraction-btn {
        width: 12%;
        padding: 10px;
        background: rgba(19, 16, 163, 0.00);
        border: 2px solid #000;
        border-radius: 30px;
        text-decoration: none;
        color: #000; /* Adjust text color */
        font-weight: bold;
        transition: background-color 0.3s;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 40px;
        margin-left: 85%;
    }


    .attraction-btn:hover {
        background-color: rgba(19, 16, 163, 0.2); /* Adjust hover background color */
    }


    /* Adjust banner title and description font size for smaller screens */
    @media (max-width: 768px) {
        .banner-title {
            font-size: 8vw;
            top: 20%;
        }

        .banner-desc {
            font-size: 4vw;
            top: 35%;
        }

        /* Hide c1, c2, and c3 on smaller screens (phones) */
        .c1,
        .c2,
        .c3 {
            display: none;
        }

        .container {
            flex-direction: column;
            margin-top: 20px;
        }

        
    }

    /* Adjust font sizes for history section on smaller screens */
    @media (max-width: 768px) {
        .hist-title {
            font-size: 5vw;
        }

        .hist-desc {
            font-size: 3vw;
        }
    }

    /* Adjust font sizes for description section on smaller screens */
    @media (max-width: 768px) {
        .desc h2 {
            font-size: 8vw;
        }

        .desc p {
            font-size: 4vw;
        }
    }

    /* Adjust font sizes for attraction and ant sections on smaller screens */
    @media (max-width: 768px) {
        .att h2,
        .ant h2 {
            font-size: 8vw;
        }

        .att p,
        .ant p {
            font-size: 4vw;
            width: 80%;
            margin-left: 10%;
        }
    }

    /* Adjust font size for category labels on smaller screens */
    @media (max-width: 768px) {
        .categories .cat p {
            font-size: 3vw;
        }
    }

    /* Adjust carousel height for smaller screens */
    @media (max-width: 768px) {
        .carousel {
            height: 300px;
        }
    }

</style>

<x-app-layout>
    <div class="banner">
        @if($homepage->banner_img)
            <img src="{{ url('/storage/' . $homepage->banner_img) }}" alt="Banner Image">
        @endif

        <h2 class="banner-title">
            {{ $homepage->website_title }}
        </h2>

        <p class="banner-desc">
            {{ $homepage->website_desc }}
        </p>

        <div class="container">

            <div class="c1" onclick="window.location.href='{{ route('attraction') }}';">
                <strong>Attraction</strong>

                <p>Explore abundant of places you can visit in Muar</p>

                <a href="{{ route('attraction') }}"> See more</a>
            </div>

            <div class="c2" onclick="window.location.href='{{ route('ant.main') }}';">
                <strong>Accomodation & Transportation</strong>

                <p>Explore abundant of places you can visit in Muar</p>

                <a href="{{ route('ant.main') }}"> See more</a>
            </div>

            <div class="c3" onclick="window.location.href='{{ route('events') }}';">
                <strong>Event</strong>

                <p>Explore abundant of places you can visit in Muar</p>

                <a href="{{ route('events') }}"> See more</a>
            </div>

        </div>
    </div>

    <div style="background-image: url('/build/assets/eventsbg.png'); background-repeat: repeat; min-height: 100vh;">

        <!-- <div class="introduction">
            <div id="greeting-container">
                    <span id="greeting" class="fadeIn">Hello</span>
                </div>

                <div class="intro">

                    <img src="{{ url('/build/assets/welcome.png') }}" alt="Welcome Image">

                    <div class="desc1">
                        <div class="hist-title">Welcome Aboard Traveller!</div>

                        <p>Are you ready for a Muar-velous adventures?</p>
                    </div>
                </div>
        </div> -->
    
        <div class="history">

            
            @if($homepage->history_img)
                <img src="{{ url('/storage/' . $homepage->history_img) }}" alt="History Image">
            @endif

            
            <div class="desc">

                <div class="head">
                    <!-- <div class="deco">
                        <img src="{{ url('/build/assets/icons/flower.png') }}" alt="Flower">
                    </div> -->
                    <div class="title-container">
                        <div class="hist-title">History of Muar</div>
                    </div>
                </div>

                <br>

                <p class="hist-desc">
                    {{ $homepage->history_desc }}
                </p>
            </div>


        </div>

        <br><br><br><br><br><br>

        <div class="homemap">
            <h2>
                {{ __('Recommended Attractions') }}
            </h2>

            <div id="map" class="map-container"></div>
        </div>
        

        <div class="att">

            <h2>
                {{ __('Attractions') }}
            </h2>

            <p>Below are our featured attraction. Explore more by categories in The Attraction page.</p>

            <div class="carousel-container">
                <div class="carousel">

                    <div class="prev" onclick="prevAttractionSlide()">&#10094;</div>
                    
                        @forelse($topAttractions as $attraction)
                            <div class="carousel-item">
                                
                                <img src="{{ asset('/storage/' . $attraction->att_img) }}" alt="{{ $attraction->att_name }}">
                                <div class="attraction-details">
                                    <a href="{{ route('attraction.detail', $attraction->att_id) }}">{{ $attraction->att_name }}</a>
                                    <div class="c-flex">
                                        <div class="attraction-rating">
                                            <img src="/build/assets/icons/star.svg" alt="Icon Description" style="width: 20px; height: 20px;">
                                            {{ $attraction->average_rating }}
                                        </div>
            
                                        <div class="attraction-review" style="color: orange;">{{ $attraction->reviews_count }} Reviews</div>
                                    </div>
                                </div>
                                
                            </div>
                        @empty
                            <p>No top attractions found.</p>
                        @endforelse
                    
                </div>  
                
                <div class="next" onclick="nextAttractionSlide()">&#10095;</div>

                <a href="{{ route('attraction') }}" class="attraction-btn">
                    <span>Explore More</span>
                </a>
            </div>

        </div>

        <div class="ant">
            <h2>
                    {{ __('Accommodation & Transportation') }}
            </h2>

            <p>Explore options for accommodation and transportation in Muar.</p>

            <br>

            <div class="categories">

                <a href="/accommodation" class="cat">
                    <div class="icon"><img src="/build/assets/icons/accomm.png" alt="Accommodation Icon" style="width: 200px; height: auto;"></div>
                    <span>Accommodation</span>
                </a>

                <a href="/transportation" class="cat">
                    <div class="icon"><img src="/build/assets/icons/transpo.png" alt=" Transportation Icon" style="width: 200px; height: auto;"></div>
                    <span>Transportation</span>
                </a>

            </div>
        

        </div>

        <div class="event">

            <h2>
                {{ __('Event') }}
            </h2>

            <p>See upcoming events available in the area.</p>

            <div class="carousel-container">
                <div class="carousel">

                    <div class="prev" onclick="prevEventSlide()">&#10094;</div>
                    
                    @forelse($upcomingevents as $event)
                        <div class="carousel-item">
                            
                            <img src="{{ asset('/storage/' . $event->eve_img) }}" alt="{{ $event->eve_name }}">
                            <div class="attraction-details">
                                <a href="{{ route('event.child', $event->eve_id) }}">{{ $event->eve_name }}</a>
                                <div class="date-placeholder">{{ date('d F Y', strtotime($event->eve_date)) }}</div>
                            </div>
                            
                        </div>
                    @empty
                        <p>No Event found.</p>
                    @endforelse
                    
                    
                </div>  
                
                <div class="next" onclick="nextEventSlide()">&#10095;</div>

                <a href="{{ route('events') }}" class="attraction-btn">
                    <span>Explore More</span>
                </a>

            </div>

        </div>
       
    </div>

    <script>
        let attractionIndex = 0;
        let eventIndex = 0;

        const attractionCarousel = document.querySelector('.att .carousel');
        const eventCarousel = document.querySelector('.event .carousel');

        const attractionItems = document.querySelectorAll('.att .carousel-item');
        const eventItems = document.querySelectorAll('.event .carousel-item');

        const attractionTotalItems = attractionItems.length;
        const eventTotalItems = eventItems.length;

        function showAttractionSlides() {
            attractionItems.forEach(item => {
                const itemIndex = Array.from(attractionItems).indexOf(item);
                const isVisible = itemIndex >= attractionIndex && itemIndex < attractionIndex + 3;

                item.style.display = isVisible ? 'flex' : 'none';
            });
        }

        function showEventSlides() {
            eventItems.forEach(item => {
                const itemIndex = Array.from(eventItems).indexOf(item);
                const isVisible = itemIndex >= eventIndex && itemIndex < eventIndex + 3;

                item.style.display = isVisible ? 'flex' : 'none';
            });
        }

        function nextAttractionSlide() {
            if (attractionIndex + 3 < attractionTotalItems) {
                attractionIndex += 1;
            } else {
                attractionIndex = 0;
            }

            showAttractionSlides();
        }

        function prevAttractionSlide() {
            if (attractionIndex - 3 >= 0) {
                attractionIndex -= 1;
            } else {
                attractionIndex = attractionTotalItems - 3;
            }

            showAttractionSlides();
        }

        function nextEventSlide() {
            if (eventIndex + 3 < eventTotalItems) {
                eventIndex += 1;
            } else {
                eventIndex = 0;
            }

            showEventSlides();
        }

        function prevEventSlide() {
            if (eventIndex - 3 >= 0) {
                eventIndex -= 1;
            } else {
                eventIndex = eventTotalItems - 3;
            }

            showEventSlides();
        }

        // Initial calls to show the first set of items
        showAttractionSlides();
        showEventSlides();
    </script>


    
    <!-- <script>
        var greetings = [
            "Hello",
            "你好",
            "नमस्ते",
            "السلام عليكم",
        ];

        var index = 0;
        var greetingElement = document.getElementById("greeting");

        function changeGreeting() {
            // Toggle between fade-in and fade-out classes
            greetingElement.classList.toggle("fadeIn");
            greetingElement.classList.toggle("fadeOut");

            setTimeout(function () {
                // Update the greeting text
                greetingElement.textContent = greetings[index];

                // Toggle between fade-in and fade-out classes again
                greetingElement.classList.toggle("fadeIn");
                greetingElement.classList.toggle("fadeOut");
            }, 500); // Adjust the delay to match your transition duration

            // Increment the index for the next greeting
            index = (index + 1) % greetings.length;
        }

        setInterval(changeGreeting, 2000);
    </script> -->

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
      $(document).ready(function () {
            var attractionsData = @json($topAttractions); // Convert the PHP array to a JavaScript array

            // Initialize the map with the center coordinates
            var map = L.map('map', {
                center: [attractionsData[0].att_lat, attractionsData[0].att_longi],
                zoom: 13,
                maxZoom: 13, // Set maxZoom and minZoom to the same value to fix the zoom level
                minZoom: 13,
                zoomControl: false // Disable zoom control
            });

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            for (var i = 0; i < attractionsData.length; i++) {
                var attraction = attractionsData[i];

                console.log('Reviews count for ' + attraction.att_name + ': ' + attraction.reviews_count);
                console.log('Attraction object:', attraction);

                // Create a pin marker
                var marker = L.marker([attraction.att_lat, attraction.att_longi]).addTo(map);

                // Create a unique preview for each attraction
                var preview = $('<div class="attraction-preview"></div>');

                // Add the image to the preview
                $('<img>').attr({
                    src: '/storage/' + attraction.att_img,
                    alt: attraction.att_name,
                    width: '100%'
                }).appendTo(preview);

                // Add the name underneath the image
                $('<p>').text(attraction.att_name).appendTo(preview);

                // Add the rating information underneath the name
                var ratingContainer = $('<div class="attraction-rating"></div>');
                $('<img>').attr({
                    src: '/build/assets/icons/star.svg',
                    alt: 'Icon Description',
                    style: 'width: 20px; height: 20px;'
                }).appendTo(ratingContainer);
                $('<span>').text(attraction.average_rating).appendTo(ratingContainer);
                ratingContainer.appendTo(preview);

                // Add the review count
                var reviewContainer = $('<div class="attraction-review" style="color: orange;"></div>');
                reviewContainer.text(attraction.reviews_count + ' Reviews');
                reviewContainer.appendTo(preview);

                // Append the preview to the map container
                $('.map-container').append(preview);

                // Set up events for hover and click using a function with parameters
                setupMarkerEvents(marker, preview, attraction.att_id);
            }


            function setupMarkerEvents(marker, currentPreview, attId) {
                marker.on('mouseover', function (e) {
                    // Show the preview
                    currentPreview.show();

                    // Get the pixel coordinates of the marker and adjust the position of the preview
                    var markerPos = map.latLngToContainerPoint(marker.getLatLng());
                    currentPreview.css({
                        top:  0 + 'px',
                        left: 0  + 'px'
                    });
                });

                marker.on('mouseout', function () {
                    // Hide the preview
                    currentPreview.hide();
                });

                marker.on('click', function () {
                    // Redirect to the attraction page when the marker is clicked
                    window.location.href = '/attractions/' + attId;
                });
            }
        });



    </script>






</x-app-layout>


