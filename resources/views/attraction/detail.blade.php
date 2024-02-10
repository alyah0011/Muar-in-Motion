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

    .banner-title {
        position: absolute;
        width: 75%;
        top: 50%;
        transform: translate(20%, -50%);
        color: #FFF;
        font-family: 'Quicksand', sans-serif;
        font-size: 90px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        z-index: 1;
    }

    .banner-desc {
        position: absolute;
        width: 80%;
        top: 70%;
        transform: translate(20%, 120%);
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

    .header {
        display: flex;
        align-items: center; /* Align title and button vertically */
    }

    .title {
        color: #0D0E10;
        font-family: 'Quicksand', sans-serif;
        font-size: 3vw;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        width: 40%;
    }

    .ldesc {
        margin-top: 20px;
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

    .revform{
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
        font-size: 1.4vw;
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
   
    /* Add or modify this block in your existing styles */
    .bookmark-btn {
        font-size: 60px; /* Adjust the size as needed */
        line-height: 1; /* Ensures the heart is vertically centered */
        margin-top: 5px; /* Adjust the top margin as needed */
        margin-left: 35%;
    }

    /* Existing styles for hover effect, you can adjust as needed */
    .btt button:hover {
        border-radius: 5px;
        background-color: #67e084; /* Change this to the desired hover color */
    }

    #map {
        height: 40%;
        width: 80%;
        margin: 0 auto; /* Center the map */
        transform: none;
    }

    .attraction-rating {
        display: flex;
        letter-spacing: -0.48px;
        margin-top: 10%;
        margin-left: 5%;
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

    .star-rating {
    display: inline-block;
    }

    .star-rating input[type="radio"] {
        display: none;
    }

    .star-rating label {
        font-size: 25px;
        color: #aaa;
        float: right;
    }

    .star-rating input[type="radio"] + label:before {
        content: "\2605";
        margin-right: 5px;
    }

    .star-rating input[type="radio"]:checked + label:before {
        color: #f8ce0b;
    }

    .star-rating input[type="radio"]:checked ~ label:before {
        color: #f8ce0b;
    }

    .star-icon {
        width: 20px;
        height: 20px;
        display: inline-block; /* Display the stars horizontally */
    }


    @media only screen and (max-width: 768px) {
        .banner-title {
            font-size: 5vw; /* Adjust the font size for smaller screens */
        }

        .banner-desc {
            font-size: 3vw; /* Adjust the font size for smaller screens */
        }

        .square {
            width: 80%; /* Make the square take full width on smaller screens */
            margin-left: 0; /* Remove left margin on smaller screens */

        }

        .square p {
            font-size: 3vw; /* Adjust the font size for smaller screens */
        }

        .ldesc {
            font-size: 3vw; /* Adjust the font size for smaller screens */
            width: 100%; /* Make the description take full width on smaller screens */
        }

        .flex-container {
            flex-direction: column; /* Stack items vertically on smaller screens */
            align-items: center;
        }

        .title,
        .ldesc {
            width: 80%; /* Make the title and description take full width */
            margin-top: 20px; /* Add some spacing between the square and title/description */
        }

        .title {
            font-size: 6vw; /* Adjust the font size for smaller screens */
        }

        .ldesc {
            font-size: 3vw; /* Adjust the font size for smaller screens */
        }

        .submission h3,
        .reviews h3,
        .btt button {
            font-size: 4vw; /* Adjust the font size for smaller screens */
        }

        .revform {
            width: 90%; /* Make the review form take full width on smaller screens */
            transform: translateX(0); /* Reset the horizontal translation on smaller screens */
        }
    }

</style>

<x-app-layout>
    <div class="banner">
        @if($attraction->att_img)
            <div class="overlay"></div>
            <img src="{{ url('/storage/' . $attraction->att_img) }}" alt="Attraction Image">
        @endif

        <h2 class="banner-title">
            {{ $attraction->att_name }}
        </h2>

        <p class="banner-desc">
            {{ $attraction->att_sdesc }}
        </p>
    </div>

    <div
        style="background-image: url('/build/assets/eventsbg.png'); background-repeat: repeat; min-height: 100vh;">

        <br><br>

        <ul class="breadcrumb">
            <li><a href="{{ route('attraction') }}" style="color: blue; text-decoration: underline;">Attraction</a></li>
            <li><a href="{{ route('attractions.by.category', ['category' => $attraction->att_cat]) }}" style="color: blue; text-decoration: underline;">Category</a></li>
            <li>Detail</li>
        </ul>

        <br>
        
        <div class="flex-container">
            <div class="square">
                <p><strong>Attraction details</strong></p>
                <hr>
                <div class="attraction-rating">
                    <img src="/build/assets/icons/star.svg" alt="Icon Description" style="width: 20px; height: 20px;">
                    {{ $attraction->average_rating }}
                </div>
                <p>Category: {{ $attraction->att_cat }}</p>
                <p>Contact Details: {{ $attraction->att_contact }}</p>
                <p>Address: {{ $attraction->att_address }}</p>

            </div>
            <div class="content">
                <div class="header">
                    <h2 class="title">
                        {{ $attraction->att_name }}
                    </h2>
                    <button class="bookmark-btn" 
                            data-attraction-id="{{ $attraction->att_id }}" 
                            data-user-id="{{ auth()->id() }}"
                            data-is-favourite="{{ $attraction->bookmarks->where('user_id', auth()->id())->first()?->is_favourite ?? 0 }}">
                        @if($attraction->bookmarks->where('user_id', auth()->id())->first()?->is_favourite)
                            &#x2665; <!-- Filled heart -->
                        @else
                            &#x2661; <!-- Empty heart -->
                        @endif
                    </button>
                </div>
                <p class="ldesc"> {{ $attraction->att_ldesc }} </p>
            </div>
        </div>

        <br>

        <div id="map"></div>

        <br>

        <div class="submission">
            <h3>Leave a Review</h3>

            <form class="revform" action="{{ route('reviews.store', $attraction->att_id) }}" method="post">
                @csrf
                
                    <label for="rating">Rating:</label>
                    <br>
                    <div class="star-rating">
                        <input type="radio" id="star5" name="rev_rating" value="5"><label for="star5"></label>
                        <input type="radio" id="star4" name="rev_rating" value="4"><label for="star4"></label>
                        <input type="radio" id="star3" name="rev_rating" value="3"><label for="star3"></label>
                        <input type="radio" id="star2" name="rev_rating" value="2"><label for="star2"></label>
                        <input type="radio" id="star1" name="rev_rating" value="1"><label for="star1"></label>
                    </div>
                    <br>

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
            @foreach($attraction->reviews as $review)
                <div class="review">
                    <div class="container">
                    <img src="{{ $review->user->profile_photo_url }}" alt="{{ $review->user->name }}" class="rounded-full h-10 w-10 object-cover">


                        <p><strong>{{ $review->user->name }}</strong> </p>

                        <div class="time">
                            <p>{{ $review->created_at->format('F j, Y H:i A') }}</p>
                        </div>

                    </div>
                    <div class="result">

                        <div class="stars">
                            @for ($i = 1; $i <= $review->rev_rating; $i++)
                                <img src="/build/assets/icons/star.svg" alt="Star" class="star-icon">
                            @endfor
                        </div>

                        <p>{{ $review->rev_comment }}</p>
                    </div>


                </div>
                <hr>
            @endforeach
        </div>
    </div>  

    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const bookmarkBtn = document.querySelector('.bookmark-btn');
            const isFavourite = parseInt(bookmarkBtn.getAttribute('data-is-favourite'));

            bookmarkBtn.addEventListener('click', function () {
                const attractionId = this.getAttribute('data-attraction-id');

                fetch("{{ route('bookmarks.bookmark') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ attraction_id: attractionId }),
                })
                .then(response => {
                    if (response.redirected) {
                        // Redirect to the login page
                        window.location.href = response.url;
                    } else if (!response.ok) {
                        // Handle other errors or show an alert
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.bookmarked) {
                        bookmarkBtn.innerHTML = '&#x2665;'; // Filled heart
                        bookmarkBtn.setAttribute('data-is-favourite', '1');
                    } else {
                        bookmarkBtn.innerHTML = '&#x2661;'; // Empty heart
                        bookmarkBtn.setAttribute('data-is-favourite', '0');
                    }
                })
                // .catch(error => {
                //     console.error('Error:', error);
                //     alert('An error occurred. Check the console for more details.');
                // });
            });

            // Set initial state of the button based on is_favourite value
            if (isFavourite) {
                bookmarkBtn.innerHTML = '&#x2665;'; // Filled heart
            } else {
                bookmarkBtn.innerHTML = '&#x2661;'; // Empty heart
            }
        });

    </script>


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        
        document.addEventListener('DOMContentLoaded', (event) => {
            let attractionLat = {{ $attraction->att_lat }};
            let attractionLongi = {{ $attraction->att_longi }};

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

