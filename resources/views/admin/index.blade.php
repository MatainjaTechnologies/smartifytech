@extends('layouts.auth')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-md">
        <div class="p-4">
            <h2 class="text-2xl font-bold text-gray-800">Admin Panel</h2>
        </div>
                <nav class="mt-4">
            @if(auth()->user()->role == 'superadmin')
            <a href="{{ route('admin.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">
                Price List Upload
            </a>
            @endif
            <!-- Add more menu items here if needed -->
        </nav>
        <div class="absolute bottom-0 w-64 p-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
        <div class="flex-1 flex justify-center items-center">
        @if(auth()->user()->role == 'superadmin')
        <div class="max-w-md w-full bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4">
                <h3 class="text-xl font-bold text-gray-800">Upload the new price list PDF.</h3>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.upload') }}" method="POST" enctype="multipart/form-data" class="mt-6">
                    @csrf
                    <div>
                        <label for="price_list" class="block text-sm font-medium text-gray-700">Price List PDF</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="price_list" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="price_list" name="price_list" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PDF up to 10MB</p>
                                <p class="text-xs text-gray-500 mt-2" id="file-name">No file selected</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @else
        <div class="text-center">
            <h3 class="text-2xl font-bold text-gray-800">Welcome</h3>
            <p class="text-gray-600 mt-2">You are logged in as a regular user.</p>
        </div>
        @endif
    </div>
</div>

<script>
    document.getElementById('price_list').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || 'No file selected';
        document.getElementById('file-name').textContent = fileName;
    });
</script>
@endsection
