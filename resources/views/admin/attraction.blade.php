<head>
    <!-- Add this in your HTML file, typically in the head section -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
        function navigateToPage() {
            var selectedValue = document.getElementById('pageSelection').value;
            if (selectedValue) {
                window.location.href = selectedValue;
            }
        }
    </script>

    <style>
        .long-text-cell {
            word-wrap: break-word;
            max-width: 500px; /* Set a maximum width for better readability */
        }
        
        .btn-primary {
            background-color: #007bff !important; /* Set your desired background color */
        }

        .content {
            white-space: nowrap;
            max-width: 400px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        #pageSelection {
            margin-left: 3%;
            margin-top: 20px;
            width: 15%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
    </style>

</head>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Attraction') }}
        </h2>

        <br>
        
        <p>Edit information on attraction here</p>
    </x-slot>

    <div>
        
        <select id="pageSelection" onchange="navigateToPage()">
            <option value="{{ route('admin.homepage.index') }}" {{ Request::route()->getName() == 'admin.homepage.index' ? 'selected' : '' }}>Homepage</option>
            <option value="{{ route('admin.attraction.index') }}" {{ Request::route()->getName() == 'admin.attraction.index' ? 'selected' : '' }}>Attraction</option>
            <option value="{{ route('admin.accommodation.index') }}" {{ Request::route()->getName() == 'admin.accommodation.index' ? 'selected' : '' }}>Accommodation</option>
            <option value="{{ route('admin.transportation.index') }}" {{ Request::route()->getName() == 'admin.transportation.index' ? 'selected' : '' }}>Transportation</option>
            <option value="{{ route('admin.event.index') }}" {{ Request::route()->getName() == 'admin.event.index' ? 'selected' : '' }}>Event</option>
            <option value="{{ route('admin.forum.index') }}" {{ Request::route()->getName() == 'admin.forum.index' ? 'selected' : '' }}>Forum</option>
            <option value="{{ route('admin.product.index') }}" {{ Request::route()->getName() == 'admin.product.index' ? 'selected' : '' }}>Product</option>
        </select>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <button class="btn btn-success" data-toggle="modal" data-target="#addAttractionModal">Add Attraction</button>
                <div class="p-6 bg-gray-100 border-b border-gray-300">
                    <div class="table-responsive">
                        <table class="min-w-full divide-y divide-gray-200 " >
                            <thead class="bg-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Short Description
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Long Description
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Website
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contact
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Latitude
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Longitude
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Address
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Average Rating
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Created At
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Updated At
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($attractions as $attraction)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $attraction->att_id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $attraction->att_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $attraction->att_img }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $attraction->att_cat }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap long-text-cell content">
                                            {{ $attraction->att_sdesc }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap long-text-cell content">
                                            {{ $attraction->att_ldesc }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $attraction->att_website }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $attraction->att_contact }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $attraction->att_lat }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $attraction->att_longi }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $attraction->att_address }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $attraction->average_rating }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $attraction->created_at }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $attraction->updated_at }}
                                        </td>
                                        <td>
                                            <a href="#" class="text-blue-500" data-toggle="modal" data-target="#editAttractionModal{{ $attraction->att_id }}">Edit</a>
                                            <form action="{{ route('admin.attraction.destroy', $attraction->att_id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editAttractionModal{{ $attraction->att_id }}" tabindex="-1" role="dialog" aria-labelledby="editAttractionModalLabel{{ $attraction->att_id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editAttractionModalLabel{{ $attraction->att_id }}">Edit Attraction</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Your edit form goes here -->
                                                    <form action="{{ route('admin.attraction.update', ['id' => $attraction->att_id]) }}" method="post" maxlength="30" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                       
                                                        <div class="form-group">
                                                            <label for="att_name">Attraction Name</label>
                                                            <input type="text" class="form-control" id="att_name" name="att_name" value="{{ $attraction->att_name }}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="att_img">Attraction Image</label>
                                                            <input type="file" class="form-control-file" id="att_img" name="att_img">
                                                            <img src="{{ asset('storage/attraction/' . $attraction->att_img) }}" alt="Attraction Image" class="mt-2" style="max-width: 200px;">
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label for="att_cat">Attraction Category</label>
                                                            <select class="form-control" id="att_cat" name="att_cat">
                                                                <option value="" {{ $attraction->att_cat === '' ? 'selected' : '' }} disabled>Select an option</option>
                                                                <option value="Recreational" {{ $attraction->att_cat === 'Recreational' ? 'selected' : '' }}>Recreational</option>
                                                                <option value="Food and beverage" {{ $attraction->att_cat === 'Food and beverage' ? 'selected' : '' }}>Food and beverage</option>
                                                                <option value="Cultural" {{ $attraction->att_cat === 'Cultural' ? 'selected' : '' }}>Cultural</option>
                                                                <option value="Heritage" {{ $attraction->att_cat === 'Heritage' ? 'selected' : '' }}>Heritage</option>
                                                                <option value="Shopping" {{ $attraction->att_cat === 'Shopping' ? 'selected' : '' }}>Shopping</option>
                                                                <option value="Landmark" {{ $attraction->att_cat === 'Landmark' ? 'selected' : '' }}>Landmark</option>
                                                            </select>
                                                        </div>

                                                        <!-- Short Description -->
                                                        <div class="form-group">
                                                            <label for="att_sdesc">Short Description</label>
                                                            <input type="text" class="form-control" id="att_sdesc" name="att_sdesc" value="{{ $attraction->att_sdesc }}" maxlength="200">
                                                        </div>

                                                        <!-- Long Description -->
                                                        <div class="form-group">
                                                            <label for="att_ldesc">Long Description</label>
                                                            <textarea class="form-control" id="att_ldesc" name="att_ldesc" maxlength="1800">{{ $attraction->att_ldesc }}</textarea>
                                                        </div>

                                                        <!-- Website -->
                                                        <div class="form-group">
                                                            <label for="att_website">Website</label>
                                                            <input type="text" class="form-control" id="att_website" name="att_website" maxlength="100" value="{{ $attraction->att_website }}">
                                                        </div>

                                                        <!-- Contact -->
                                                        <div class="form-group">
                                                            <label for="att_contact">Contact</label>
                                                            <input type="text" class="form-control" id="att_contact" name="att_contact" maxlength="20" value="{{ $attraction->att_contact }}">
                                                        </div>

                                                        <!-- Latitude -->
                                                        <div class="form-group">
                                                            <label for="att_lat">Latitude</label>
                                                            <input type="text" class="form-control" id="att_lat" name="att_lat" value="{{ $attraction->att_lat }}">
                                                        </div>

                                                        <!-- Longitude -->
                                                        <div class="form-group">
                                                            <label for="att_longi">Longitude</label>
                                                            <input type="text" class="form-control" id="att_longi" name="att_longi" value="{{ $attraction->att_longi }}">
                                                        </div>

                                                        <!-- Longitude -->
                                                        <div class="form-group">
                                                            <label for="att_address">Address</label>
                                                            <input type="text" class="form-control" id="att_address" name="att_address" value="{{ $attraction->att_address }}">
                                                        </div>

                                                        <!-- Average Rating -->
                                                        <!-- <div class="form-group">
                                                            <label for="average_rating">Average Rating</label>
                                                            <input type="text" class="form-control" id="average_rating" name="average_rating" value="{{ $attraction->average_rating }}">
                                                        </div> -->
                                                                                    
                                                        <button type="submit" class="btn btn-primary">Update Attraction</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Add Attraction Modal -->
     <div class="modal fade" id="addAttractionModal" tabindex="-1" role="dialog" aria-labelledby="addAttractionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAttractionModalLabel">Add Attraction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Your add form goes here -->
                    <form action="{{ route('admin.attraction.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Attraction Name -->
                        <div class="form-group">
                            <label for="att_name">Attraction Name</label>
                            <input type="text" class="form-control" id="att_name" maxlength="30" name="att_name" required>
                        </div>

                        <!-- Attraction Image -->
                        <div class="form-group">
                            <label for="att_img">Attraction Image</label>
                            <input type="file" class="form-control-file" id="att_img" maxlength="255" name="att_img">
                        </div>

                        <!-- Attraction Category -->
                        <div class="form-group">
                            <label for="att_cat">Attraction Category</label>
                            <select class="form-control" id="att_cat" name="att_cat">
                                <option value="" {{ $attraction->att_cat === '' ? 'selected' : '' }} disabled>Select an option</option>
                                <option value="Recreational" {{ $attraction->att_cat === 'Recreational' ? 'selected' : '' }}>Recreational</option>
                                <option value="Food & beverage" {{ $attraction->att_cat === 'Food & Beverage' ? 'selected' : '' }}>Food & Beverage</option>
                                <option value="Cultural" {{ $attraction->att_cat === 'Cultural' ? 'selected' : '' }}>Cultural</option>
                                <option value="Heritage" {{ $attraction->att_cat === 'Heritage' ? 'selected' : '' }}>Heritage</option>
                                <option value="Shopping" {{ $attraction->att_cat === 'Shopping' ? 'selected' : '' }}>Shopping</option>
                                <option value="Landmark" {{ $attraction->att_cat === 'Landmark' ? 'selected' : '' }}>Landmark</option>
                            </select>
                        </div>



                        <!-- Short Description -->
                        <div class="form-group">
                            <label for="att_sdesc">Short Description</label>
                            <input type="text" class="form-control" id="att_sdesc" name="att_sdesc" maxlength="200">
                        </div>

                        <!-- Long Description -->
                        <div class="form-group">
                            <label for="att_ldesc">Long Description</label>
                            <textarea class="form-control" id="att_ldesc" name="att_ldesc" maxlength="1800"></textarea>
                        </div>

                        <!-- Website -->
                        <div class="form-group">
                            <label for="att_website">Website</label>
                            <input type="text" class="form-control" id="att_website" maxlength="100" name="att_website">
                        </div>

                        <!-- Contact -->
                        <div class="form-group">
                            <label for="att_contact">Contact</label>
                            <input type="text" class="form-control" id="att_contact" maxlength="20" name="att_contact">
                        </div>

                        <!-- Latitude -->
                        <div class="form-group">
                            <label for="att_lat">Latitude</label>
                            <input type="text" class="form-control" id="att_lat" name="att_lat">
                        </div>

                        <!-- Longitude -->
                        <div class="form-group">
                            <label for="att_longi">Longitude</label>
                            <input type="text" class="form-control" id="att_longi" name="att_longi">
                        </div>

                        <!-- Address -->
                        <div class="form-group">
                            <label for="att_address">Address</label>
                            <input type="text" class="form-control" id="att_address" name="att_address">
                        </div>

                        <!-- Average Rating -->
                        <!-- <div class="form-group">
                            <label for="average_rating">Average Rating</label>
                            <input type="text" class="form-control" id="average_rating" name="average_rating">
                        </div>-->
                        <button type="submit" class="btn btn-primary">Add Attraction</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>