<style>
    /* Add or modify this block in your existing styles */

    .flex-container {
        display: flex;
        flex-direction: column; /* Align items vertically */
        justify-content: center; /* Center items vertically */
        gap: 20px; /* Adjust the gap between items */
        margin-top: 20px;
        margin-left: 9%;
    }

    .bookmark-item {
        display: flex;
        align-items: center;
        gap: 20px; /* Adjust the gap between image and details */
    }

    .rounded-image {
        width: 20%; /* Adjust the image width as needed */
        height: 200px; /* Adjust the image height as needed */
        object-fit: cover; /* Ensure the image covers the container */
        border-radius: 10px; /* Add rounded corners */
    }

    .attraction-details {
        flex-grow: 1; /* Allow details to take remaining width */
    }

    .attraction-desc {
        width: 80%;
    }

    .bookmark-separator {
        width: 100%; /* Full width separator */
        margin: 10px 0; /* Adjust margin as needed */
    }

    /* Add media query for larger screens */
    @media (min-width: 768px) {
        .rounded-image {
            max-width: 300px; /* Increase maximum width for larger screens */
        }
    }


</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Bookmark') }}
        </h2>
        <br>
        <p>See your saved attractions listed here</p>
    </x-slot>

    <div style="background-image: url('/build/assets/eventsbg.png'); background-repeat: repeat; min-height: 100vh;">
        <div class="flex-container">
            @foreach($bookmarks as $bookmark)
                <div class="container">
                    <!-- Display your bookmark details here based on $bookmark -->
                    <div class="bookmark-item">
                        <img src="{{ url('/storage/' . $bookmark->attraction->att_img) }}" alt="Attraction Image" class="rounded-image">

                        <div class="attraction-details">
                            <div class="attraction-title">
                                <a href="{{ route('attraction.detail', $bookmark->att_id) }}"><strong>{{ $bookmark->attraction->att_name }}</strong></a>
                            </div>

                            <div class="attraction-desc">
                                <p>{{ $bookmark->attraction->att_sdesc }}</p>
                            </div>

                        </div>
                    </div>

                    <!-- Separator line between bookmarks -->
                    <hr class="bookmark-separator">
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
