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

        .date-placeholder, .event-title, .event-desc{
            
            padding-left: 27px; 
            z-index: 2;
        }
        
        .date-placeholder {
            font-family: 'Quicksand', sans-serif;
            font-weight: 600; /* Semibold font weight */
            font-size: 12px;
            color: #00A4FF; /* Color code */
            margin-top: 138px;
        }

        .event-title {
            font-family: 'Quicksand', sans-serif;
            font-weight: 550;
            font-size: 20px;
            color: #1310A3; /* Adjust the color as needed */
            margin-top: 5px;
        }

        .event-title a {
            text-decoration: none; /* Remove underline by default */
            color: #1310A3; /* Adjust the color as needed */
            transition: text-decoration 0.3s ease; /* Add smooth transition effect */
        }

        .event-title a:hover {
            text-decoration: underline; /* Add underline on hover */
        }

        .event-desc {
            padding-left: 27px;
            padding-right: 27px;
            max-width: 100%; /* Set a maximum width for the container */
            overflow-wrap: break-word; /* Wrap long words onto the next line */
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
            {{ __('Events') }}
        </h2>

        <br>
        
        <p>Explore available events around the area</p>
    </x-slot>

    <div style="background-image: url('/build/assets/eventsbg.png'); background-repeat: repeat; min-height: 100vh;">

        <br>
        
        <div class="square">
            
            Filter by date
            <div class="separator"></div>
                <div class="checkbox-container">
                    <input type="checkbox" id="jan">
                    <label for="jan">January</label><br>
                    <input type="checkbox" id="feb">
                    <label for="feb">February</label><br>
                    <input type="checkbox" id="mar">
                    <label for="mar">March</label><br>
                    <input type="checkbox" id="apr">
                    <label for="apr">April</label><br>
                    <input type="checkbox" id="may">
                    <label for="may">May</label><br>
                    <input type="checkbox" id="jun">
                    <label for="jun">June</label><br>
                    <input type="checkbox" id="jul">
                    <label for="jul">July</label><br>
                    <input type="checkbox" id="aug">
                    <label for="aug">August</label><br>
                    <input type="checkbox" id="sep">
                    <label for="sep">September</label><br>
                    <input type="checkbox" id="oct">
                    <label for="oct">October</label><br>
                    <input type="checkbox" id="nov">
                    <label for="nov">November</label><br>
                    <input type="checkbox" id="dec">
                    <label for="dec">December</label><br>
                </div>
        </div>

        <div class="flex-container">  

            @foreach($events as $event)
                @include('event.event-item', ['event' => $event])
            @endforeach

            
        </div>

    </div>

<!-- Your HTML and CSS remain unchanged -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.checkbox-container input[type="checkbox"]').on('change', function () {
            console.log('Checkbox changed');

            var selectedDates = [];

            // Get selected checkboxes
            $('.checkbox-container input[type="checkbox"]:checked').each(function () {
                selectedDates.push($(this).attr('id'));
            });

            console.log('Selected dates:', selectedDates); // Log selected dates

            // Make an AJAX request to fetch events based on selected date ranges
            $.ajax({
                url: "{{ route('events.filter') }}",
                type: "GET",
                data: { dates: selectedDates },
                success: function (data) {
                    console.log('AJAX Response:', data);
                    // Update the content with the fetched events
                    updateEvents(data.html);
                }
            });
        });

        function updateEvents(html) {
            // Replace the content of the first .flex-container with the fetched HTML
            $('.flex-container:first').html(html);
        }


    });
</script>





</x-app-layout>
