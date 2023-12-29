<style>

    .flex-container {
        display: flex;
        flex-direction: column; /* Align items vertically */
        justify-content: center; /* Center items vertically */
        gap: 20px; /* Adjust the gap between items */
        margin-top: 20px;
        margin-left: 9%;
    }

    .item {
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

    .desc {
        flex-grow: 1; /* Allow details to take remaining width */
    }

    .desc p {
        width: 80%;
    }

    .separator {
        width: 100%; /* Full width separator */
        margin: 10px 0; /* Adjust margin as needed */
    }

    .blank {
        text-align: center;
        color: gray;
        font-family: Quicksand, sans-serif;
        font-size: 1.5vw;
        font-style: normal;
        font-weight: 200;
        line-height: normal;
        margin-top: 5%; /* Adjust the margin-top as needed */
    }

    .blank img {
        display: block;
        margin: 0 auto;
    }

    .blank p { 
        /* margin-left: 50px; */
        margin-top: 0px;
    }

    @media (min-width: 768px) {
        .rounded-image {
            max-width: 300px; /* Increase maximum width for larger screens */
        }
    }

</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Result') }}
        </h2>
        <br>
    </x-slot>

    @if (empty($results))
        <div class="blank">
            <img src="/build/assets/icons/sorry.jpg" alt="Sorry Icon" style="width: 350px; height: auto;">
            <p>There's nothing here...</p>
        </div>
    @else
        <div class="flex-container">

            @foreach ($results as $result)
                <!-- Check the type of the result to generate the appropriate link -->
                @if ($result->type === 'event')
                <div class="item">
                    <img src="{{ url('/storage/' . $result->eve_img) }}" alt="Event Image" class="rounded-image">
                    
                    <div class="desc">
                        <a href="{{ url('/events/' . $result->eve_id) }}"><strong>{{ $result->eve_name }}</strong></a>
                        <p>{{ $result->eve_sdesc }}</p>
                    </div>
                </div>    
                @elseif ($result->type === 'attraction')
                <div class="item">
                    <img src="{{ url('/storage/' . $result->att_img) }}" alt="Attraction Image" class="rounded-image">
                    
                    <div class="desc">
                        <a href="{{ url('/attractions/' . $result->att_id) }}"><strong>{{ $result->att_name }}</strong></a>
                        <p>{{ $result->att_sdesc }}</p>
                    </div>
                <div>
                @elseif ($result->type === 'accommodation')
                <div class="item">
                    <img src="{{ url('/storage/' . $result->acco_img) }}" alt="Accommodation Image" class="rounded-image">
                    
                    <div class="desc">
                        <a href="{{ url('/accommodation/' . $result->acco_id) }}"><strong>{{ $result->acco_name }}</strong></a>
                        <p>{{ $result->acco_sdesc }}</p>
                    </div>
                <div>
                @elseif ($result->type === 'transportation')
                    <!-- If trans_website is not empty, create a hyperlink with target="_blank" -->
                    @if (!empty($result->trans_website))
                    <div class="item">
                        <img src="{{ url('/storage/' . $result->trans_img) }}" alt="Transportation Image" class="rounded-image">
                        
                        <div class="desc">
                            <a href="{{ $result->trans_website }}" target="_blank"><strong>{{ $result->trans_name }}</strong></a>
                            <p>{{ $result->trans_sdesc }}</p>
                        </div>
                    <div>
                    @else
                    <div class="item">
                        <img src="{{ url('/storage/' . $result->trans_img) }}" alt="Transportation Image" class="rounded-image">
                        
                        <div class="desc">
                            <strong>{{ $result->trans_name }}</strong>
                            <p>{{ $result->trans_sdesc }}</p>
                        </div>
                    <div>
                    @endif
                @endif

                <hr class="separator">
                
            @endforeach

        </div>
    @endif

</x-app-layout>
