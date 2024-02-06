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
            {{ __('Admin Event') }}
        </h2>

        <br>
        
        <p>Edit information on event here</p>
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
                <button class="btn btn-success" data-toggle="modal" data-target="#addEventModal">Add Event</button>
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
                                        Event Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Event Time
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
                                @foreach($events as $event)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $event->eve_id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $event->eve_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $event->eve_img }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $event->eve_cat }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap content">
                                            {{ $event->eve_sdesc }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap content">
                                            {{ $event->eve_ldesc }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $event->eve_date }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $event->eve_time }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $event->eve_contact }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $event->eve_lati }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $event->eve_longi }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $event->eve_address }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $event->created_at }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $event->updated_at }}
                                        </td>
                                        <td>
                                            <a href="#" class="text-blue-500" data-toggle="modal" data-target="#editEventModal{{ $event->eve_id }}">Edit</a>
                                            <form action="{{ route('admin.event.destroy', $event->eve_id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Edit Event Modal -->
                                    <div class="modal fade" id="editEventModal{{ $event->eve_id }}" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel{{ $event->eve_id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editEventModalLabel{{ $event->eve_id }}">Edit Event</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Your edit form goes here -->
                                                    <form action="{{ route('admin.event.update', ['id' => $event->eve_id]) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                       
                                                        <div class="form-group">
                                                            <label for="eve_name">Event Name</label>
                                                            <input type="text" class="form-control" id="eve_name" name="eve_name" value="{{ $event->eve_name }}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="eve_img">Event Image</label>
                                                            <input type="file" class="form-control-file" id="eve_img" name="eve_img">
                                                            <img src="{{ asset('storage/event/' . $event->eve_img) }}" alt="Event Image" class="mt-2" style="max-width: 200px;">
                                                        </div>

                                                        <!-- Category -->
                                                        <div class="form-group">
                                                            <label for="eve_cat">Short Description</label>
                                                            <input type="text" class="form-control" id="eve_cat" name="eve_cat" value="{{ $event->eve_cat }}">
                                                        </div>

                                                        <!-- Short Description -->
                                                        <div class="form-group">
                                                            <label for="eve_sdesc">Short Description</label>
                                                            <input type="text" class="form-control" id="eve_sdesc" name="eve_sdesc" value="{{ $event->eve_sdesc }}">
                                                        </div>

                                                        <!-- Long Description -->
                                                        <div class="form-group">
                                                            <label for="eve_ldesc">Long Description</label>
                                                            <textarea class="form-control" id="eve_ldesc" name="eve_ldesc">{{ $event->eve_ldesc }}</textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="eve_date">Event Date</label>
                                                            <input type="date" class="form-control" id="eve_date" name="eve_date" value="{{ $event->eve_date }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="eve_time">Event Time</label>
                                                            <input type="text" class="form-control" id="eve_time" name="eve_time" value="{{ $event->eve_time }}">
                                                        </div>

                                                        <!-- Contact -->
                                                        <div class="form-group">
                                                            <label for="eve_contact">Contact</label>
                                                            <input type="text" class="form-control" id="eve_contact" name="eve_contact" value="{{ $event->eve_contact }}">
                                                        </div>

                                                        <!-- Latitude -->
                                                        <div class="form-group">
                                                            <label for="eve_lati">Latitude</label>
                                                            <input type="text" class="form-control" id="eve_lati" name="eve_lati" value="{{ $event->eve_lati }}">
                                                        </div>

                                                        <!-- Longitude -->
                                                        <div class="form-group">
                                                            <label for="eve_longi">Longitude</label>
                                                            <input type="text" class="form-control" id="eve_longi" name="eve_longi" value="{{ $event->eve_longi }}">
                                                        </div>

                                                        <!-- Address -->
                                                        <div class="form-group">
                                                            <label for="eve_address">Address</label>
                                                            <input type="text" class="form-control" id="eve_address" name="eve_address" value="{{ $event->eve_address }}">
                                                        </div>
                                                                                    
                                                        <button type="submit" class="btn btn-primary">Update Event</button>
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

     <!-- Add Event Modal -->
     <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventModalLabel">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Your add form goes here -->
                    <form action="{{ route('admin.event.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Event Name -->
                        <div class="form-group">
                            <label for="eve_name">Event Name</label>
                            <input type="text" class="form-control" id="eve_name" name="eve_name" required>
                        </div>

                        <!-- Event Image -->
                        <div class="form-group">
                            <label for="eve_img">Event Image</label>
                            <input type="file" class="form-control-file" id="eve_img" name="eve_img">
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <label for="eve_cat">Category</label>
                            <input type="text" class="form-control" id="eve_cat" name="eve_cat">
                        </div>

                        <!-- Short Description -->
                        <div class="form-group">
                            <label for="eve_sdesc">Short Description</label>
                            <input type="text" class="form-control" id="eve_sdesc" name="eve_sdesc">
                        </div>

                        <!-- Long Description -->
                        <div class="form-group">
                            <label for="eve_ldesc">Long Description</label>
                            <textarea class="form-control" id="eve_ldesc" name="eve_ldesc"></textarea>
                        </div>

                        <!-- Event Date -->
                        <div class="form-group">
                            <label for="eve_date">Event Date</label>
                            <input type="date" class="form-control" id="eve_date" name="eve_date">
                        </div>

                        <!-- Event Time -->
                        <div class="form-group">
                            <label for="eve_time">Event Time</label>
                            <input type="text" class="form-control" id="eve_time" name="eve_time">
                        </div>

                        <!-- Contact -->
                        <div class="form-group">
                            <label for="eve_contact">Contact</label>
                            <input type="text" class="form-control" id="eve_contact" name="eve_contact">
                        </div>

                        <!-- Latitude -->
                        <div class="form-group">
                            <label for="eve_lati">Latitude</label>
                            <input type="text" class="form-control" id="eve_lati" name="eve_lati">
                        </div>

                        <!-- Longitude -->
                        <div class="form-group">
                            <label for="eve_longi">Longitude</label>
                            <input type="text" class="form-control" id="eve_longi" name="eve_longi">
                        </div>

                        <!-- Address -->
                         <div class="form-group">
                            <label for="eve_address">Address</label>
                            <input type="text" class="form-control" id="eve_address" name="eve_address">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    



</x-app-layout>