<!-- Sidebar -->
<div class="w-64 bg-white shadow-md relative">
    <div class="p-4">
        <h2 class="text-2xl font-bold text-gray-800">Admin Panel</h2>
    </div>

    <nav class="mt-4">
        @if(auth()->user()->role === 'superadmin')
            <a href="{{ route('admin.index') }}"
               class="block py-2 px-4 text-gray-700 hover:bg-gray-200">
                Price List Upload
            </a>
            <a href="{{ route('admin.change.password') }}"
               class="block py-2 px-4 text-gray-700 hover:bg-gray-200">
                Change Password
            </a>
        @endif
    </nav>

    <div class="absolute bottom-0 w-64 p-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Logout</button>
        </form>
    </div>
</div>