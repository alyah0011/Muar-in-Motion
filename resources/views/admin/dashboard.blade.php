<style>
    .button-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
        max-width: 60%; /* Adjust the maximum width as needed */
        margin: 0 auto;
    }

    .rounded-square {
        background: rgba(13, 14, 16, 0.09);
        backdrop-filter: blur(10.5px);
        border: none;
        color: white;
        padding: 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        color: black;
        margin: 10px;
        cursor: pointer;
        border-radius: 10px;
        width: calc(33.33% - 20px); /* Calculate the width with margins */
        height: width;
        box-sizing: border-box;
    }


    .icon {
        width: 50px; /* Adjust icon size as needed */
        height: 50px; /* Adjust icon size as needed */
        display: block;
        margin: 0 auto 10px; /* Adjust margin as needed */
        transition: transform 0.3s ease;
    }

    .rounded-square:hover img , .icon:hover {
        transform: scale(1.2); /* Adjust the scale factor as needed */
    }

    /* Add responsive styles if needed */
    @media (max-width: 767px) {
        .rounded-square {
            width: 100%; /* Adjust width as needed for smaller screens */
        }
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>

        <br>
        
        <p>Welcome to Admin Dashboard!</p>
    </x-slot>

    <div class="mt-4">
        <div class="mt-4 button-container">
            <!-- Buttons for different admin sections -->
            <a href="{{ route('admin.homepage.index') }}" class="btn btn-primary rounded-square">
                <img src="/build/assets/adminicons/home.png" alt="Homepage Icon" class="icon">
                Homepage
            </a>

            <a href="{{ route('admin.attraction.index') }}" class="btn btn-primary rounded-square">
                <img src="/build/assets/adminicons/attraction.png" alt="Attraction Icon" class="icon">
                Attraction
            </a>

            <a href="{{ route('admin.accommodation.index') }}" class="btn btn-primary rounded-square">
                <img src="/build/assets/adminicons/accom.png" alt="Accommodation Icon" class="icon">
                Accommodation
            </a>
        </div>

        <div class="mt-4 button-container">
            <a href="{{ route('admin.transportation.index') }}" class="btn btn-primary rounded-square">
                <img src="/build/assets/adminicons/trans.png" alt="Transportation Icon" class="icon">
                Transportation
            </a>

            <a href="{{ route('admin.event.index') }}" class="btn btn-primary rounded-square">
                <img src="/build/assets/adminicons/event.png" alt="Event Icon" class="icon">
                Event
            </a>

            <a href="{{ route('admin.forum.index') }}" class="btn btn-primary rounded-square">
                <img src="/build/assets/adminicons/forum.png" alt="Forum Icon" class="icon">
                Forum
            </a>  
        </div>  

        <div class="mt-4 button-container">
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary rounded-square">
                <img src="/build/assets/adminicons/product.png" alt="Product Icon" class="icon">
                Product
            </a> 
        </div>  

    </div>

</x-app-layout>
