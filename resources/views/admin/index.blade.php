@extends('layouts.auth')

@section('content')
<div class="flex min-h-screen bg-gradient-to-br from-gray-100 via-gray-50 to-gray-100">

    @include('layouts.navbar')

    <!-- Main Content -->
    <div class="flex-1 flex justify-center items-start py-10">

        @if(auth()->user()->role === 'superadmin')

            <div class="max-w-7xl w-full space-y-8 px-4">

                {{-- ================= Header ================= --}}
                <div class="flex items-center justify-between bg-white rounded-xl shadow p-6">
                    <div>
                        <h2 class="text-3xl font-extrabold text-gray-800">
                            Product Price
                        </h2>
                        <p class="text-sm text-gray-500 mt-1">
                            Manage and upload your product pricing documents
                        </p>
                    </div>

                    {{-- Add Button --}}
                    <a href="{{ route('admin.product.add') }}"
                       class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl shadow-lg transition">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>

                {{-- Success Alert --}}
                @if (session('success'))
                    <div id="success-alert"
                         class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl shadow-sm">
                        <strong>Success:</strong> {{ session('success') }}
                    </div>
                @endif

                {{-- ================= Main Grid ================= --}}
                <div class="grid grid-cols-12 gap-8">

                    {{-- ================= Table Card ================= --}}
                    <div class="col-span-12 lg:col-span-9 bg-white rounded-2xl shadow-lg overflow-hidden">

                        <div class="px-6 py-4 border-b">
                            <h3 class="text-xl font-bold text-gray-800">
                                Uploaded Product Price Lists
                            </h3>
                        </div>

                        @if(isset($priceLists) && $priceLists->count())
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-sm">
                                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                                        <tr>
                                            <th class="px-6 py-4 text-left">#</th>
                                            <th class="px-6 py-4 text-left">File</th>
                                            <th class="px-6 py-4 text-left">Date</th>
                                            <th class="px-6 py-4 text-center">View</th>
                                            <th class="px-6 py-4 text-center">Copy</th>
                                            <th class="px-6 py-4 text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y">
                                        @foreach($priceLists as $index => $price)
                                            <tr class="hover:bg-indigo-50/40 transition">
                                                <td class="px-6 py-4 font-medium">{{ $index + 1 }}</td>
                                                <td class="px-6 py-4 font-semibold text-gray-800">
                                                    {{ $price->file_name }}
                                                </td>
                                                <td class="px-6 py-4 text-gray-600">
                                                    {{ $price->created_at->format('d M Y') }}
                                                </td>

                                                <td class="px-6 py-4 text-center">
                                                    <a href="{{ asset('storage/pricelists/'.$price->file_name) }}"
                                                       target="_blank"
                                                       class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-200 transition">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>

                                                <td class="px-6 py-4 text-center">
                                                    <button
                                                        onclick="copyToClipboard('{{ asset('storage/pricelists/'.$price->file_name) }}')"
                                                        class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-green-100 text-green-600 hover:bg-green-200 transition">
                                                        <i class="fa fa-copy"></i>
                                                    </button>
                                                </td>

                                                <td class="px-6 py-4 text-center flex justify-center gap-3">
                                                    @if($price->products_count > 0)
                                                        <a href="{{ route('admin.product.edit', $price->id) }}"
                                                           class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 transition">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    @endif

                                                    <a href="{{ route('admin.product.delete', $price->id) }}"
                                                       onclick="return confirm('Are you sure?')"
                                                       class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-red-100 text-red-600 hover:bg-red-200 transition">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="p-6 text-gray-500 text-center">
                                No price lists uploaded yet.
                            </div>
                        @endif
                    </div>

                    {{-- ================= Upload Card ================= --}}
                    <div class="col-span-12 lg:col-span-3 sticky top-8">
                        <div class="bg-white rounded-2xl shadow-lg p-6">

                            <h3 class="text-lg font-bold text-gray-800 mb-1">
                                Upload PDF
                            </h3>
                            <p class="text-xs text-gray-500 mb-4">
                                Upload latest price list document
                            </p>

                            @if ($errors->any())
                                <div class="bg-red-50 border border-red-200 text-red-600 px-3 py-2 rounded-lg mb-3 text-sm">
                                    <ul class="list-disc pl-4">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="border-2 border-dashed border-indigo-300 rounded-xl p-6 text-center bg-indigo-50/40">
                                    <label class="cursor-pointer text-indigo-700 font-semibold text-sm">
                                        Click to upload PDF
                                        <input id="price_list" name="price_list" type="file" class="hidden">
                                    </label>

                                    <p class="text-xs text-gray-500 mt-2">
                                        PDF up to 10MB
                                    </p>

                                    <p id="file-name" class="text-xs text-gray-700 mt-2 font-medium">
                                        No file selected
                                    </p>
                                </div>

                                <button type="submit"
                                        class="mt-4 w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 rounded-xl font-semibold shadow transition">
                                    Upload File
                                </button>
                            </form>
                        </div>
                    </div>

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

{{-- ================= Scripts ================= --}}
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
                alert.classList.add('opacity-0');
                setTimeout(() => alert.remove(), 500);
            }, 8000);
        }
    });

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            alert("Link copied:\n" + text);
        });
    }
</script>
@endsection
