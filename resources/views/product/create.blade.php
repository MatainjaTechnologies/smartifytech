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
                    Add Products
                </h2>

                <a href="{{ url()->previous() }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg shadow text-sm font-medium">
                    ← Back
                </a>
    
            </div>

            @if (session('error'))
                <div id="error-alert"
                     class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <strong>Error!</strong> {{ session('error') }}
                </div>
            @endif

            {{-- ================= Form ================= --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <form action="{{ route('admin.product.store') }}" method="POST">
                    @csrf

                    {{-- Table --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200 rounded-lg">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Quantity</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Model Name</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Price</th>
                                    <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Action</th>
                                </tr>
                            </thead>
                            <tbody id="product-rows">
                                <tr>
                                    <td class="px-4 py-2">
                                        <input type="number" name="items[0][quantity]"
                                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-indigo-500"
                                               placeholder="Qty" required>
                                    </td>
                                    <td class="px-4 py-2">
                                        <input type="text" name="items[0][model]"
                                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-indigo-500"
                                               placeholder="Model Name" required>
                                    </td>
                                    <td class="px-4 py-2">
                                        <input type="number" step="0.01" name="items[0][price]"
                                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-indigo-500"
                                               placeholder="Price" required>
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <button type="button"
                                                class="remove-row text-red-600 hover:text-red-800 font-semibold hidden">
                                            ✕
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-between items-center mt-4">
                        <button type="button"
                                id="add-row"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
                            + Add More
                        </button>

                        <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg shadow">
                            Save
                        </button>
                    </div>

                </form>
            </div>

        </div>

    </div>

</div>

{{-- ================= Scripts ================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    let rowIndex = 1;
    const tableBody = document.getElementById('product-rows');
    const addRowBtn = document.getElementById('add-row');

    addRowBtn.addEventListener('click', function () {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="px-4 py-2">
                <input type="number" name="items[${rowIndex}][quantity]"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-indigo-500"
                       placeholder="Qty" required>
            </td>
            <td class="px-4 py-2">
                <input type="text" name="items[${rowIndex}][model]"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-indigo-500"
                       placeholder="Model Name" required>
            </td>
            <td class="px-4 py-2">
                <input type="number" step="0.01" name="items[${rowIndex}][price]"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-indigo-500"
                       placeholder="Price" required>
            </td>
            <td class="px-4 py-2 text-center">
                <button type="button"
                        class="remove-row text-red-600 hover:text-red-800 font-semibold">
                    ✕
                </button>
            </td>
        `;
        tableBody.appendChild(row);
        rowIndex++;
    });

    tableBody.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });
});
</script>
@endsection
