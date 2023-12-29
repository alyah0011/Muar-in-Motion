<style>
       
       .flex-container{
            display: flex;
            margin-top: 20px;
       }
       .col-left{
            width:50%;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.06);;
            opacity: 100%;
            border-radius: 15px;
            margin-left: 10%; /* Updated margin for flexibility */
            z-index: 1;
       }

       .col-right{
            width:30%;
            height: inherit; /* Updated height using viewport height (vh) unit */
            padding: 20px;
            margin-left: 30px;
            background-color: rgba(0, 0, 0, 0.06);;
            opacity: 100%;
            border-radius: 15px;
            z-index: 1;
       }

       .form{
            width:95%;
            height: 50%;
            padding: 20px;
            padding-top: 10px;
            padding-bottom: 60px;
            background-color: rgba(0, 0, 0, 0.06);;
            opacity: 100%;
            border-radius: 15px;
            margin-left: 0px;
            margin-top: 5vh; /* Updated margin for flexibility */
            z-index: 1;
        }

       .icon-text {
            margin-left: 5px; /* Add space between the icon and text */
            margin-top: 0px;
            padding: 20px;
        }

        .icon-button {
            margin-right: 10px; /* Adjust the margin as needed to create space between the icon and the button */
        }

        .con {
            margin-top: 5vh; /* Updated margin for flexibility */
            margin-left: 2vw; /* Updated margin for flexibility */
        }

        .transparent-textarea {
            width: 100%; /* Set your desired width */
            height: 100%; /* Set your desired height */
            border-radius: 20px;
            padding: 30px 25px;
            background-color: rgba(255, 255, 255, 0); /* Set background color with alpha (0.5 for 50% transparency) */
            border: 0px solid #ccc; /* Add border for better visibility */
            resize: none; /* Prevent textarea resizing by user */
        }

        .btt{
            margin-left: 70%;
            margin-top: 10px;
            }

        .btt button{
            color: white;
            width: 80%;
            height: 37px;
            flex-shrink: 0;
            border-radius: 5px;
            background: #1310A2;
            transition: background-color 0.3s ease;
        
        }
        
        .btt button:hover {
            border-radius: 5px;
            background-color: #67e084;; /* Change this to the desired hover color */
        }


</style>
<x-app-layout>
    <div>
    <x-slot name="header">
        @auth
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Hi, {{ Auth::user()->name }}
            </h1>
        @endauth
        
        <br>

        <p> Welcome to your Profile page.</p>
    </x-slot>
</div>


    <div style="background-image: url('/build/assets/profilebg.png'); background-size: cover; background-position: center; height: 100vh;">
        <div class="flex-container"> 
            <div class="col-left"> 
                
                <!-- Current Profile Photo -->
                <div class="mt-2 flex items-center">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded-full h-15 w-15 object-cover">

                    <p class="ml-2 font-bold"><strong>{{ Auth::user()->name }}</strong></p>
                </div>
                
                <div style="display: flex; flex-wrap: wrap; margin-top: 20px; margin-left: 10px;">
                    <div style="flex: 1 1 50%;">
                        <p>Name: {{ Auth::user()->user_fname }}</p>
                        <p style= "margin-top: 20px;">Email: {{ Auth::user()->email }}</p>
                    </div>
                
                    <div style="flex: 1 1 50%;">
                        <p>Stay in: {{ Auth::user()->user_location }} </p>
                        <p style= "margin-top: 20px;">Phone No.: {{ Auth::user()->user_phoneno }}</p>
                    </div>
                </div>

                <div style="margin-left: 10px; margin-top: 20px;">
                    <p>Travel Preferences: </p>

                    <form method="POST" action="{{ route('user.updateTravelPreferences') }}">
                        @csrf <!-- CSRF token for security -->
                        <div class="form">
                            <textarea class="transparent-textarea" placeholder="Add notes..." id="notes" name="notes" rows="4" cols="50">{{ Auth::user()->user_travelpref }}</textarea>
                            <br>
                            <div class="btt">
                                <button type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="col-right"> 
                <div class="con">
                    <h2> Your Archive </h2>

                    <div class="bookmark" style= "display: flex; margin-top: 40px">
                        <a href="/bookmark" class="icon-button">
                            <img src="/build/assets/icons/heart.png" alt="Icon Description" style="width: 60px; height: 60px;">
                        </a>
                        <a href="/bookmark" class="icon-text">Bookmark</a>
                    </div>

                    <div class="list" style= "display: flex; margin-top: 40px">
                        <a href="/tdl" class="icon-button">
                            <img src="/build/assets/icons/list.png" alt="Icon Description" style="width: 60px; height: 60px;">
                        </a>
                        <a href="/tdl" class="icon-text">My Lists</a>
                    </div>        
                </div>   

            </div>
        </div>
    </div>

        
  



    <!-- Rest of your content goes here -->
</x-app-layout>
