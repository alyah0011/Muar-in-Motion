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
        .content {
            white-space: nowrap;
            max-width: 400px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .btn-primary {
            background-color: #007bff !important; /* Set your desired background color */
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
            {{ __('Admin Transportation') }} 
        </h2>

        <br>
        
        <p>Edit information on Transportation here</p>
    </x-slot>

    <div>
        
        <select id="pageSelection" onchange="navigateToPage()">
            <option value="{{ route('admin.homepage.index') }}" {{ Request::route()->getName() == 'admin.homepage.index' ? 'selected' : '' }}>Homepage</option>
            <option value="{{ route('admin.attraction.index') }}" {{ Request::route()->getName() == 'admin.attraction.index' ? 'selected' : '' }}>Attraction</option>
            <option value="{{ route('admin.accommodation.index') }}" {{ Request::route()->getName() == 'admin.accommodation.index' ? 'selected' : '' }}>Accommodation</option>
            <option value="{{ route('admin.transportation.index') }}" {{ Request::route()->getName() == 'admin.transportation.index' ? 'selected' : '' }}>Transportation</option>
            <option value="{{ route('admin.event.index') }}" {{ Request::route()->getName() == 'admin.event.index' ? 'selected' : '' }}>Event</option>
            <option value="{{ route('admin.forum.index') }}" {{ Request::route()->getName() == 'admin.forum.index' ? 'selected' : '' }}>Forum</option>
        </select>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <button class="btn btn-success" data-toggle="modal" data-target="#addTransportationModal">Add Transportation</button>
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
                                        Website
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
                                @foreach($transportations as $transportation)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $transportation->trans_id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $transportation->trans_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $transportation->trans_img }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $transportation->trans_type }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap content">
                                            {{ $transportation->trans_sdesc }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap content">
                                            {{ $transportation->trans_ldesc }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $transportation->trans_website }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $transportation->created_at }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $transportation->updated_at }}
                                        </td>
                                        <td>
                                            <a href="#" class="text-blue-500" data-toggle="modal" data-target="#editAccommodationModal{{ $transportation->trans_id }}">Edit</a>
                                            <form action="{{ route('admin.transportation.destroy', $transportation->trans_id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Edit Accommodation Modal -->
                                    <div class="modal fade" id="editAccommodationModal{{ $transportation->trans_id }}" tabindex="-1" role="dialog" aria-labelledby="editAccommodationModalLabel{{ $transportation->trans_id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editAccommodationModalLabel{{ $transportation->trans_id }}">Edit transportation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Your edit form goes here -->
                                                    <form action="{{ route('admin.transportation.update', ['id' => $transportation->trans_id]) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                       
                                                        <div class="form-group">
                                                            <label for="trans_name">Accommodation Name</label>
                                                            <input type="text" class="form-control" id="trans_name" name="trans_name" value="{{ $transportation->trans_name }}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="trans_img">Accommodation Image</label>
                                                            <input type="file" class="form-control-file" id="trans_img" name="trans_img">
                                                            <img src="{{ asset('storage/transportation/' . $transportation->trans_img) }}" alt="Accommodation Image" class="mt-2" style="max-width: 200px;">
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label for="trans_type">Accommodation Type</label>
                                                            <input type="text" class="form-control" id="trans_type" name="trans_type" value="{{ $transportation->trans_type }}">
                                                        </div>

                                                        <!-- Short Description -->
                                                        <div class="form-group">
                                                            <label for="trans_sdesc">Short Description</label>
                                                            <input type="text" class="form-control" id="trans_sdesc" name="trans_sdesc" value="{{ $transportation->trans_sdesc }}">
                                                        </div>

                                                        <!-- Long Description -->
                                                        <div class="form-group">
                                                            <label for="trans_ldesc">Long Description</label>
                                                            <textarea class="form-control" id="trans_ldesc" name="trans_ldesc">{{ $transportation->trans_ldesc }}</textarea>
                                                        </div>

                                                        <!-- Website -->
                                                        <div class="form-group">
                                                            <label for="trans_website">Website</label>
                                                            <input type="text" class="form-control" id="trans_website" name="trans_website" value="{{ $transportation->trans_website }}">
                                                        </div>                    
                                                        <button type="submit" class="btn btn-primary">Update transportation</button>
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

     <!-- Add transportation Modal -->
     <div class="modal fade" id="addTransportationModal" tabindex="-1" role="dialog" aria-labelledby="addTransportationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTransportationModalLabel">Add Transportation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Your add form goes here -->
                    <form action="{{ route('admin.transportation.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- transportation Name -->
                        <div class="form-group">
                            <label for="trans_name">Transportation Name</label>
                            <input type="text" class="form-control" id="trans_name" name="trans_name" required>
                        </div>

                        <!-- transportation Image -->
                        <div class="form-group">
                            <label for="trans_img">Transportation Image</label>
                            <input type="file" class="form-control-file" id="trans_img" name="trans_img">
                        </div>

                        <!-- transportation Category -->
                        <div class="form-group">
                            <label for="trans_type">Transportation Type</label>
                            <input type="text" class="form-control" id="trans_type" name="trans_type">
                        </div>

                        <!-- Short Description -->
                        <div class="form-group">
                            <label for="trans_sdesc">Short Description</label>
                            <input type="text" class="form-control" id="trans_sdesc" name="trans_sdesc">
                        </div>

                        <!-- Long Description -->
                        <div class="form-group">
                            <label for="trans_ldesc">Long Description</label>
                            <textarea class="form-control" id="trans_ldesc" name="trans_ldesc"></textarea>
                        </div>

                        <!-- Website -->
                        <div class="form-group">
                            <label for="trans_website">Website</label>
                            <input type="text" class="form-control" id="trans_website" name="trans_website">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Transportation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    



</x-app-layout>