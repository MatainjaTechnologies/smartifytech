@extends('layouts.auth')

@section('content')
<div class="flex min-h-screen bg-gray-100">

    @include('layouts.navbar')

    <!-- Main Content -->
    <div class="flex-1 flex justify-center items-start py-10">

        @if(auth()->user()->role === 'superadmin')
            <div class="max-w-3xl w-full space-y-10">

                {{-- ================= Upload Block ================= --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">
                        Upload Price List PDF
                    </h3>

                    @if (session('success'))
                        <div id="success-alert"
                             class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            <strong>Success!</strong> {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="border-2 border-dashed border-gray-300 rounded-md p-6 text-center">
                            <label class="cursor-pointer text-indigo-600 font-medium">
                                Upload PDF
                                <input id="price_list" name="price_list" type="file" class="hidden">
                            </label>
                            <p class="text-xs text-gray-500 mt-2">PDF up to 10MB</p>
                            <p id="file-name" class="text-xs text-gray-600 mt-2">
                                No file selected
                            </p>
                        </div>

                        <button type="submit" class="mt-4 w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded">Upload</button>
                    </form>
                </div>

                {{-- ================= Table Block ================= --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">
                        Uploaded Price Lists
                    </h3>

                    @if(isset($priceLists) && $priceLists->count())
                        <div class="overflow-x-auto border rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">File</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                        <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">View</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($priceLists as $index => $price)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                                            <td class="px-4 py-2">{{ $price->file_name }}</td>
                                            <td class="px-4 py-2">
                                                {{ $price->created_at->format('d M Y') }}
                                            </td>
                                            <td class="px-4 py-2 text-center">
                                                <a href="{{ asset('storage/pricelists/'.$price->file_name) }}" target="_blank" title="View PDF" class="text-indigo-600 hover:text-indigo-800">
                                                    <i class="fa fa-eye text-lg"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500">No price lists uploaded yet.</p>
                    @endif
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

{{-- Scripts --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const fileInput = document.getElementById('price_list');
    const fileName = document.getElementById('file-name');

    if (fileInput) {
        fileInput.addEventListener('change', function () {
            fileName.textContent = this.files[0]?.name || 'No file selected';
        });
    }

    const alert = document.getElementById('success-alert');
    if (alert) {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 10000);
    }
});
</script>
@endsection
