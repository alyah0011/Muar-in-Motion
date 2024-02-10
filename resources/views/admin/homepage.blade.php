<head>

    <!-- Add this in your HTML file, typically in the head section -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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
            {{ __('Admin Homepage') }}
        </h2>

        <br>
        
        <p>Edit information on homepage here</p>
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
                
                <div class="p-6 bg-gray-100 border-b border-gray-300">
                    <div class="table-responsive">
                        <table class="min-w-full divide-y divide-gray-200 " >
                            <thead class="bg-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Website Title
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Website Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Banner Image
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    History Image
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    History Description
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
                            @foreach($homepages as $homepage)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $homepage->homepage_id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $homepage->website_title }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $homepage->website_desc }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $homepage->banner_img }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $homepage->history_img }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $homepage->history_desc }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $homepage->created_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $homepage->updated_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="#" class="text-blue-500" data-toggle="modal" data-target="#editModal">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Homepage</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Your edit form goes here -->
                                    <form action="{{ route('admin.homepage.update', ['id' => $homepage->homepage_id, 'subdirectory' => 'homepage']) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        
                                        <!-- Include form fields for updating homepage data -->
                                        <div class="form-group">
                                            <label for="website_title">Website Title</label>
                                            <input type="text" class="form-control" id="website_title" name="website_title" value="{{ $homepage->website_title }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="website_desc">Website Description</label>
                                            <textarea class="form-control" id="website_desc" name="website_desc" required>{{ $homepage->website_desc }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="banner_img">Banner Image</label>
                                            <input type="file" class="form-control-file" id="banner_img" name="banner_img" required>
                                            <img src="{{ asset('storage/homepage' . $homepage->banner_img) }}" alt="Banner Image" class="mt-2" style="max-width: 200px;">
                                        </div>

                                        <div class="form-group">
                                            <label for="history_img">History Image</label>
                                            <input type="file" class="form-control-file" id="history_img" name="history_img" required>
                                            <img src="{{ asset('storage/homepage' . $homepage->history_img) }}" alt="History Image" class="mt-2" style="max-width: 200px;">
                                        </div>

                                        <div class="form-group">
                                            <label for="history_desc">History Description</label>
                                            <textarea class="form-control" id="history_desc" name="history_desc" required>{{ $homepage->history_desc }}</textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Homepage</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</x-app-layout>