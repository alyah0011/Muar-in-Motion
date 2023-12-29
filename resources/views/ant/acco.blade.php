<style>

    .flex-container {
        display: flex;
        margin-top: 20px;
        align-items: flex-start; /* Align items vertically at the start */
    }
        
    .container{
        position: relative;
        width: 22%;
        height: 424px;
        overflow: hidden; /* Hide overflowing content (for rounded corners) */
        margin-left: 30px;
        margin-top: 30px;

    }

    .rectangle, .image-placeholder {
        width: 100%;
        border-radius: 20px; /* Rounded corners for both rectangle and image */

    }

    .rectangle {
        height: 424px;
        background: rgba(36, 39, 41, 0.15);
        position: absolute;
        z-index: 0;
    }

    .image-placeholder {
        
        background-color: grey;
        opacity: 100%;
        border-radius: 20px 20px 0 0; 
        height: 121px;
        background-size: cover; /* Cover the entire container with the image */
        background-position: center; /* Center the image within the container */
        position: absolute;
        overflow: hidden;
    }

    .image-placeholder img {
        width: 100%;
        height: 100%;
        border-radius: 20px 20px 0 0; 
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .rectangle:hover .image-placeholder img,
    .rectangle .image-placeholder:hover img {
        transform: scale(1.2); /* Zoom in by 20% on hover */
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -ms-transform: scale(1.2);
        -o-transform: scale(1.2);
    }

    .attraction-title, .attraction-desc{
            
        position: relative;
        z-index: 2;
        padding-left: 27px; 
    }

    .attraction-title {
        position: absolute;
        font-family: 'Quicksand', sans-serif;
        font-weight: 550;
        font-size: 20px;
        color: #1310A3; /* Adjust the color as needed */
        margin-top: 141px;
    }

    .attraction-title a {
        text-decoration: none; /* Remove underline by default */
        color: #1310A3; /* Adjust the color as needed */
        transition: text-decoration 0.3s ease; /* Add smooth transition effect */
    }

    .attraction-title a:hover {
        text-decoration: underline; /* Add underline on hover */
    }

    .attraction-desc {
        position: relative;
        padding-left: 27px;
        padding-right: 27px;
        max-width: 100%; /* Set a maximum width for the container */
        overflow-wrap: break-word; /* Wrap long words onto the next line */
        margin-top: 20px;
    }

    .attraction-price-range {
        z-index: 3;
        padding-left: 27px;
        color: black; /* Set the color for the price range */
        margin-top: 171px; /* Adjust the margin as needed */
        font-weight: bold;
    }


    @media only screen and (max-width: 768px) {
        .flex-container {
            flex-direction: column;
        }

        .container {
            width: 100%;
            margin-left: 0;
            margin-top: 20px;
        }
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accommodations') }}
        </h2>

        <br>
        
        <p>Explore Muar's unique accommodation </p>
    </x-slot>

    <div style="background-image: url('/build/assets/eventsbg.png'); background-repeat: repeat; min-height: 100vh;">
        <div class="flex-container">
                
            @php $count = 1; @endphp

            @foreach($accommodations as $accommodation)
                <div class="container">
                    <div class="rectangle"> <!--filter -->
                        <div class="image-placeholder">
                            @if($accommodation->acco_img)
                            <img src="{{ url('/storage/' . $accommodation->acco_img) }}" alt="Accomodation Image">
                            @endif
                        </div>

                        <div class="attraction-title">
                            <a href="{{ route('accommodation.show', $accommodation->acco_id) }}">{{ $accommodation->acco_name }}</a>
                        </div>

                        <div class="attraction-price-range">
                            From RM {{ $accommodation->acco_price_range ?? 'Not available' }}
                        </div>

                        <div class="attraction-desc">
                            <p>{{ $accommodation->acco_sdesc }}</p>
                        </div>
                    </div>
                </div>

                @if($count % 4 == 0)
                        </div><div class="flex-container">
                @endif

                @php $count++; @endphp

            @endforeach
        </div>
    </div>
                


</x-app-layout>