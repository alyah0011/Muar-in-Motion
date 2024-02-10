<style>
        .square {
            position: absolute;
            margin-left: 46px;
            margin-top: 0px;
            padding: 20px;
            width: 20%;
            height: auto;
            background-color: #1310A2;
            color: white;
            text-align: left;
            font-size: 16px;
            font-weight: 400;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .checkbox-container {
            margin-top: 10px;
        }

        .checkbox-container input[type="checkbox"] {
            margin-right: 10px;
        }

        .separator {
            width: 100%;
            height: 1px;
            background-color: white;
            margin: 20px 0;
        }
        
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            margin-left: 23%;
        }
        
        .container {
            position: relative;
            flex: 0 0 28%;
            width: 20%;
            height: 424px;
            overflow: hidden; /* Hide overflowing content (for rounded corners) */
            margin-left: 40px;
            margin-bottom: 20px;
            
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

        .product-title, .product-type, .product-description, .product-price{
            
            padding-left: 27px; 
            z-index: 2;
        }
        

        .product-title {
            font-family: 'Quicksand', sans-serif;
            font-weight: 550;
            font-size: 20px;
            color: #1310A3; /* Adjust the color as needed */
            margin-top: 138px;
        }

        .product-title a {
            text-decoration: none; /* Remove underline by default */
            color: #1310A3; /* Adjust the color as needed */
            transition: text-decoration 0.3s ease; /* Add smooth transition effect */
        }

        .product-title a:hover {
            text-decoration: underline; /* Add underline on hover */
        }

        .product-description {
            padding-left: 27px;
            padding-right: 27px;
            max-width: 100%; /* Set a maximum width for the container */
            overflow-wrap: break-word; /* Wrap long words onto the next line */
            margin-top: 5px;
        }

        @media only screen and (max-width: 768px) {
        /* Show filter container and hide filter dropdown on larger screens */
        .square {
            width: 80%;
            margin-left: 0;
            gap: 10px;
        }

        .flex-container {
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 80%;
            margin-left: 0;
            margin-bottom: 20px;
            
        }
    }


</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Local Products') }}
        </h2>

        <br>
        
        <p>Explore local products offered in Muar</p>
    </x-slot>

    <div style="background-image: url('/build/assets/eventsbg.png'); background-repeat: repeat; min-height: 100vh;">

        <br>
        
        <div class="square">
            
            Category
            <div class="separator"></div>
                <div class="checkbox-container">
                    <input type="checkbox" id="fashion">
                    <label for="fashion">Fashion</label><br>
                    <input type="checkbox" id="confectionary">
                    <label for="confectionary">Confectionary</label><br>
                    <input type="checkbox" id="handicraft">
                    <label for="handicraft">Handicraft</label><br>
                </div>
        </div>

        <div class="flex-container">  

        @foreach ($products as $product)
            @include('product.product-item', ['product' => $product])
        @endforeach

            
        </div>

    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.checkbox-container input[type="checkbox"]').on('change', function () {
            console.log('Checkbox changed');

            var selectedCategories = [];

            // Get selected checkboxes
            $('.checkbox-container input[type="checkbox"]:checked').each(function () {
                selectedCategories.push($(this).attr('id'));
            });

            console.log('Selected categories:', selectedCategories); // Log selected categories

            // Make an AJAX request to fetch products based on selected categories
            $.ajax({
                url: "{{ route('products.filter') }}", // Update the route name
                type: "GET",
                data: { categories: selectedCategories }, // Send selected categories
                success: function (data) {
                    console.log('AJAX Response:', data);
                    // Update the content with the fetched products
                    updateProducts(data.html);
                }
            });
        });

        function updateProducts(html) {
            // Replace the content of the .flex-container with the fetched HTML
            $('.flex-container').html(html);
        }
    });

</script>





</x-app-layout>
