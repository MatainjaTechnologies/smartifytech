@extends('layouts.auth')

@section('content')
<div class="flex min-h-screen bg-gray-100">

    @include('layouts.navbar')

    <!-- Main Content -->
    <div class="flex-1 flex justify-center items-start py-10">

        @if(auth()->user()->role === 'superadmin')
            <div class="max-w-3xl w-full space-y-10">

                {{-- ================= Page Header ================= --}}
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Banner Add
                    </h2>

                    <a href="{{ url()->previous() }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg shadow text-sm font-medium">
                        ← Back
                    </a>
                </div>

                {{-- ================= Banner Block ================= --}}
                <div class="bg-white rounded-lg shadow-md p-6">

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.banner.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="space-y-5">

                            {{-- Banner Image --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Banner Image <span class="text-red-500">*</span>
                                </label>

                                <input type="file"
                                       name="image"
                                       accept="image/*"
                                       onchange="previewBannerImage(event)"
                                       class="w-full bg-gray-100 border border-gray-300 text-gray-900 rounded-md shadow-sm
                                              focus:bg-white focus:border-indigo-600 focus:ring-2 focus:ring-indigo-600
                                              @error('image') border-red-600 ring-1 ring-red-500 @enderror">

                                <p class="text-xs text-gray-500 mt-1">
                                    Recommended size: 1950 × 700 px
                                </p>

                                {{-- Image Preview --}}
                                <div id="imagePreviewWrapper" class="mt-4 hidden">
                                    <p class="text-sm font-medium text-gray-600 mb-1">Preview:</p>
                                    <img id="imagePreview"
                                         class="w-full max-h-64 object-cover rounded-lg border shadow">
                                </div>

                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- Description --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Description
                                </label>

                                <textarea name="description" rows="4"
                                          placeholder="Enter banner description..."
                                          class="w-full bg-gray-100 border border-gray-300 text-gray-900 rounded-md shadow-sm
                                                 focus:bg-white focus:border-indigo-600 focus:ring-2 focus:ring-indigo-600
                                                 @error('description') border-red-600 ring-1 ring-red-500 @enderror">{{ old('description') }}</textarea>

                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div class="flex items-center gap-3">
                                <label for="status" class="flex items-center cursor-pointer">
                                    <!-- Switch -->
                                    <div class="relative">
                                        <input type="checkbox" name="status" id="status" value="1" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-300 rounded-full peer-focus:ring-2 peer-focus:ring-indigo-500 peer-checked:bg-indigo-600 transition-colors"></div>
                                        <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow-md transform peer-checked:translate-x-5 transition-transform"></div>
                                    </div>
                                    <!-- Label -->
                                    <span class="ml-3 text-sm font-medium text-gray-700">Active / Inactive</span>
                                </label>
                            </div>


                            {{-- Submit --}}
                            <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg font-medium shadow">
                                Save Banner
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


@endsection

<script>
    function previewBannerImage(event) {
        const input = event.target;
        const previewWrapper = document.getElementById('imagePreviewWrapper');
        const previewImage = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewWrapper.classList.remove('hidden');
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            previewWrapper.classList.add('hidden');
            previewImage.src = '';
        }
    }
</script>

