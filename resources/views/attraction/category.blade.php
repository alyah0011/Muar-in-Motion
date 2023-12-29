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
        margin-top: 171px;
    }

    #categoryDropdown {
        margin-left: 3.5%;
        margin-top: 20px;
        width: 15%;
        padding: 8px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }


</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(ucfirst($category)) }}
        </h2>

        <br>
        
        <p>Explore Muar's diverse {{ $category }} attractions</p>
    </x-slot>

    <!-- Dropdown box for all categories -->
    <select id="categoryDropdown" onchange="navigateToCategory(this.value)">
        <option value="/category/recreational" {{ $category === 'recreational' ? 'selected' : '' }}>Recreational</option>
        <option value="/category/food and beverage" {{ $category === 'food and beverage' ? 'selected' : '' }}>Food and Beverage</option>
        <option value="/category/cultural" {{ $category === 'cultural' ? 'selected' : '' }}>Cultural</option>
        <option value="/category/heritage" {{ $category === 'heritage' ? 'selected' : '' }}>Heritage</option>
        <option value="/category/shopping" {{ $category === 'shopping' ? 'selected' : '' }}>Shopping</option>
        <option value="/category/landmark" {{ $category === 'landmark' ? 'selected' : '' }}>Landmark</option>
    </select>

    <div style="background-image: url('/build/assets/eventsbg.png'); background-repeat: repeat; min-height: 100vh;">
        <div class="flex-container">
                
            @php $count = 1; @endphp

            @foreach($attractions as $attraction)
                <div class="container">
                    <div class="rectangle"> <!--filter -->
                        <div class="image-placeholder">
                            @if($attraction->att_img)
                            <img src="{{ url('/storage/' . $attraction->att_img) }}" alt="Attraction Image">
                            @endif
                        </div>

                        <div class="attraction-title">
                            <a href="{{ route('attraction.detail', $attraction->att_id) }}">{{ $attraction->att_name }}</a>
                        </div>

                        <br>

                        <div class="attraction-desc">
                            <p>{{ $attraction->att_sdesc }}</p>
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

    <script>
        function navigateToCategory(selectedCategory) {
            // Redirect to the selected category
            window.location.href = selectedCategory;
        }
    </script>
                


</x-app-layout>