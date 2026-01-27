@extends('layouts.auth')

@section('content')
<div class="flex min-h-screen bg-gray-100">

    @include('layouts.navbar')

    <!-- Main Content -->
    <div class="flex-1 flex justify-center items-start py-10">

        <div class="max-w-3xl w-full space-y-8">

            {{-- ================= Page Title ================= --}}
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold text-gray-800">
                    Banner List
                </h2>

                <div class="flex gap-3">
                    <!-- Add Banner Button -->
                    <a href="{{ route('admin.banner.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow text-sm font-medium flex items-center gap-1">
                        + Add Banner
                    </a>

                    <!-- Back Button -->
                    <a href="{{ url()->previous() }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg shadow text-sm font-medium">
                        ← Back
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div id="error-alert"
                     class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <strong>Error!</strong> {{ session('error') }}
                </div>
            @endif

            {{-- ================= Banner List ================= --}}
            <div class="bg-white rounded-lg shadow overflow-hidden">

                @if($banners->count())
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Image</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Description</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Status</th>
                                    <th class="px-4 py-3 text-right font-semibold text-gray-600">Action</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @foreach($banners as $banner)
                                    <tr class="hover:bg-gray-50">
                                        {{-- Image --}}
                                        <td class="px-4 py-3">
                                            <img src="{{url('storage/banner/'.$banner->image)}}"
                                                 class="h-16 w-28 object-cover rounded border">
                                        </td>

                                        {{-- Description --}}
                                        <td class="px-4 py-3 text-gray-700">
                                            {{ $banner->description ?? '—' }}
                                        </td>

                                        {{-- Status --}}
                                        <td class="px-4 py-3">
                                            @if($banner->status)
                                                <span class="px-2 py-1 text-xs font-semibold rounded bg-green-100 text-green-700">
                                                    Active
                                                </span>
                                            @else
                                                <span class="px-2 py-1 text-xs font-semibold rounded bg-gray-200 text-gray-700">
                                                    Inactive
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Actions --}}
                                        <td class="px-4 py-3 text-right space-x-2">
                                            <a href="{{ route('admin.banner.edit', $banner->id) }}"
                                               class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-xs">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.banner.destroy', $banner->id) }}"
                                                  method="POST"
                                                  class="inline-block"
                                                  onsubmit="return confirm('Are you sure you want to delete this banner?')">
                                                @csrf
                                                <button type="submit"
                                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="p-4">
                        {{ $banners->links() }}
                    </div>
                @else
                    <div class="p-6 text-center text-gray-500">
                        No banners found.
                    </div>
                @endif
            </div>
          
        </div>

    </div>

</div>

@endsection
