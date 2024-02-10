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
            {{ __('Admin Product') }} 
        </h2>

        <br>
        
        <p>Edit information on Product here</p>
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
                <button class="btn btn-success" data-toggle="modal" data-target="#addaccomodationModal">Add Product</button>
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
                                        Types
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Short Description
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Long Description
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Price 
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
                                @foreach($localProducts as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->lp_id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->lp_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->lp_img }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->lp_type }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap long-text-cell content">
                                            {{ $product->lp_sdesc }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap long-text-cell content">
                                            {{ $product->lp_ldesc }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap long-text-cell content">
                                            {{ $product->lp_price }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->lp_website }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->lp_contact }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->lp_lat }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->lp_longi }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->lp_address }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->created_at }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $product->updated_at }}
                                        </td>
                                        <td>
                                            <a href="#" class="text-blue-500" data-toggle="modal" data-target="#editAccommodationModal{{ $product->lp_id }}">Edit</a>
                                            <form action="{{ route('admin.product.destroy', $product->lp_id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Edit Accommodation Modal -->
                                    <div class="modal fade" id="editAccommodationModal{{ $product->lp_id }}" tabindex="-1" role="dialog" aria-labelledby="editAccommodationModalLabel{{ $product->lp_id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editAccommodationModalLabel{{ $product->lp_id }}">Edit product</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Your edit form goes here -->
                                                    <form action="{{ route('admin.product.update', ['id' => $product->lp_id]) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                       
                                                        <div class="form-group">
                                                            <label for="lp_name">Product Name</label>
                                                            <input type="text" class="form-control" id="lp_name" name="lp_name" value="{{ $product->lp_name }}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="lp_img">Product Image</label>
                                                            <input type="file" class="form-control-file" id="lp_img" name="lp_img">
                                                            <img src="{{ asset('storage/product/' . $product->lp_img) }}" alt="Product Image" class="mt-2" style="max-width: 200px;">
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label for="lp_type">Product Type</label>
                                                            <input type="text" class="form-control" id="lp_type" name="lp_type" value="{{ $product->lp_type }}">
                                                        </div>

                                                        <!-- Short Description -->
                                                        <div class="form-group">
                                                            <label for="lp_sdesc">Short Description</label>
                                                            <input type="text" class="form-control" id="lp_sdesc" name="lp_sdesc"  value="{{ $product->lp_sdesc }}" maxlength="200">
                                                        </div>

                                                        <!-- Long Description -->
                                                        <div class="form-group">
                                                            <label for="lp_ldesc">Long Description</label>
                                                            <textarea class="form-control" id="lp_ldesc" name="lp_ldesc" maxlength="1800">{{ $product->lp_ldesc }}</textarea>
                                                        </div>

                                                        <!-- Price Range -->
                                                        <div class="form-group">
                                                            <label for="lp_price">Price</label>
                                                            <input type="text" class="form-control" id="lp_price" name="lp_price" value="{{ $product->lp_price }}" step="1">
                                                        </div>

                                                        <!-- Website -->
                                                        <div class="form-group">
                                                            <label for="lp_website">Website</label>
                                                            <input type="text" class="form-control" id="lp_website" name="lp_website" value="{{ $product->lp_website }}">
                                                        </div>

                                                        <!-- Contact -->
                                                        <div class="form-group">
                                                            <label for="lp_contact">Contact</label>
                                                            <input type="text" class="form-control" id="lp_contact" name="lp_contact" value="{{ $product->lp_contact }}">
                                                        </div>

                                                        <!-- Latitude -->
                                                        <div class="form-group">
                                                            <label for="lp_lat">Latitude</label>
                                                            <input type="text" class="form-control" id="lp_lat" name="lp_lat" value="{{ $product->lp_lat }}">
                                                        </div>

                                                        <!-- Longitude -->
                                                        <div class="form-group">
                                                            <label for="lp_longi">Longitude</label>
                                                            <input type="text" class="form-control" id="lp_longi" name="lp_longi" value="{{ $product->lp_longi }}">
                                                        </div>

                                                        <!-- Address -->
                                                        <div class="form-group">
                                                            <label for="lp_address">Address</label>
                                                            <input type="text" class="form-control" id="lp_address" name="lp_address" value="{{ $product->lp_address }}">
                                                        </div>

                                                        <!-- Average Rating
                                                        <div class="form-group">
                                                            <label for="lp_average_rating">Average Rating</label>
                                                            <input type="text" class="form-control" id="lp_average_rating" name="lp_average_rating" value="{{ $product->lp_average_rating }}">
                                                        </div> -->
                                                                                    
                                                        <button type="submit" class="btn btn-primary">Update product</button>
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

     <!-- Add product Modal -->
     <div class="modal fade" id="addAccomodationModal" tabindex="-1" role="dialog" aria-labelledby="addAccomodationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAccomodationModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Your add form goes here -->
                    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- product Name -->
                        <div class="form-group">
                            <label for="lp_name">Product Name</label>
                            <input type="text" class="form-control" id="lp_name" name="lp_name" required>
                        </div>

                        <!-- product Image -->
                        <div class="form-group">
                            <label for="lp_img">Product Image</label>
                            <input type="file" class="form-control-file" id="lp_img" name="lp_img">
                        </div>

                        <!-- product Category -->
                        <div class="form-group">
                            <label for="lp_type">Product Type</label>
                            <input type="text" class="form-control" id="lp_type" name="lp_type">
                        </div>

                        <!-- Short Description -->
                        <div class="form-group">
                            <label for="lp_sdesc">Short Description</label>
                            <input type="text" class="form-control" id="lp_sdesc" name="lp_sdesc" maxlength="200">
                        </div>

                        <!-- Long Description -->
                        <div class="form-group">
                            <label for="lp_ldesc">Long Description</label>
                            <textarea class="form-control" id="lp_ldesc" name="lp_ldesc" maxlength="1800"></textarea>
                        </div>

                        <!-- Price Range -->
                        <div class="form-group">
                            <label for="lp_price_range">Price</label>
                            <input type="text" class="form-control" id="lp_price_range" name="lp_price_range" step="1">
                        </div>

                        <!-- Website -->
                        <div class="form-group">
                            <label for="lp_website">Website</label>
                            <input type="text" class="form-control" id="lp_website" name="lp_website">
                        </div>

                        <!-- Contact -->
                        <div class="form-group">
                            <label for="lp_contact">Contact</label>
                            <input type="text" class="form-control" id="lp_contact" name="lp_contact">
                        </div>

                        <!-- Latitude -->
                        <div class="form-group">
                            <label for="lp_lat">Latitude</label>
                            <input type="text" class="form-control" id="lp_lat" name="lp_lat">
                        </div>

                        <!-- Longitude -->
                        <div class="form-group">
                            <label for="lp_longi">Longitude</label>
                            <input type="text" class="form-control" id="lp_longi" name="lp_longi">
                        </div>

                        <!-- Address -->
                        <div class="form-group">
                            <label for="lp_address">Address</label>
                            <input type="text" class="form-control" id="lp_address" name="lp_address">
                        </div>

                        <!-- Average Rating -->
                        <!-- <div class="form-group">
                            <label for="lp_average_rating">Average Rating</label>
                            <input type="text" class="form-control" id="lp_average_rating" name="lp_average_rating">
                        </div> -->
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    



</x-app-layout>