<style>

    .flex-container {
        display: flex;
        flex-direction: column; 
        justify-content: center; 
        gap: 20px; 
        margin-top: 20px;
        margin-left: 9%;
    }

    .bookmark-item {
        display: flex;
        align-items: center;
        gap: 20px; 
    }

    .rounded-image {
        width: 20%; 
        height: 200px; 
        object-fit: cover; 
        border-radius: 10px; 
    }

    .attraction-details {
        flex-grow: 1; 
    }

    .attraction-desc {
        width: 80%;
    }

    .bookmark-separator {
        width: 100%; 
        margin: 10px 0; 
    }

   
    @media (min-width: 768px) {
        .rounded-image {
            max-width: 300px; 
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

                    <hr class="bookmark-separator">
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
