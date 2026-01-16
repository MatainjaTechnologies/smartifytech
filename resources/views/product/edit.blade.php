@extends('layouts.auth')

@section('content')
    <div class="flex min-h-screen bg-gray-100">

        @include('layouts.navbar')

        <div class="flex-1 flex justify-center py-10">
            <div class="max-w-4xl w-full space-y-6">

                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Edit Price List
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

                <form action="{{ route('admin.product.update', $priceList->id) }}" method="POST">
                    @csrf

                    <table class="min-w-full border rounded">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2">Qty</th>
                                <th class="px-4 py-2">Model</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2 text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="product-rows">
                            @foreach($products as $index => $product)
                                <tr>
                                    <td class="px-4 py-2">
                                    <input type="number" name="items[{{ $index }}][quantity]"
                                           value="{{ $product->quantity }}"
                                           class="w-full border rounded px-2 py-1" required>
                                    </td>

                                    <td class="px-4 py-2">
                                    <input type="text" name="items[{{ $index }}][model]"
                                           value="{{ $product->model }}"
                                           class="w-full border rounded px-2 py-1" required>
                                    </td>

                                    <td class="px-4 py-2">
                                    <input type="number" step="0.01"
                                           name="items[{{ $index }}][price]"
                                           value="{{ $product->price }}"
                                           class="w-full border rounded px-2 py-1" required>
                                    </td>

                                    <td class="px-4 py-2 text-center">
                                    <button type="button" class="remove-row text-red-600">✕</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="flex justify-between mt-4">
                        <button type="button" id="add-row"
                                class="bg-green-600 text-white px-4 py-2 rounded">
                        + Add More
                        </button>

                        <button type="submit"
                                class="bg-indigo-600 text-white px-6 py-2 rounded">
                        Update
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

<script>
    document.getElementById('add-row').onclick = function () {
        let index = document.querySelectorAll('#product-rows tr').length;
        let row = `
                    <tr>
                    <td class="px-4 py-2"><input type="number" name="items[${index}][quantity]" class="w-full border px-2 py-1" required></td>
                    <td class="px-4 py-2"><input type="text" name="items[${index}][model]" class="w-full border px-2 py-1" required></td>
                    <td class="px-4 py-2"><input type="number" step="0.01" name="items[${index}][price]" class="w-full border px-2 py-1" required></td>
                    <td class="text-center"><button type="button" class="remove-row text-red-600">✕</button></td>
                    </tr>`;
        document.getElementById('product-rows').insertAdjacentHTML('beforeend', row);
    };

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });
</script>
@endsection
