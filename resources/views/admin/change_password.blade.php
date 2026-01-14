@extends('layouts.auth')

@section('content')
<div class="flex min-h-screen bg-gray-100">

    @include('layouts.navbar')

    <!-- Main Content -->
    <div class="flex-1 flex justify-center items-start py-10">

        @if(auth()->user()->role === 'superadmin')
            <div class="max-w-3xl w-full space-y-10">

                {{-- ================= Change Password Block ================= --}}
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">
                        Change Password
                    </h3>

                    @if (session('password_success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('password_success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.change.password.update') }}">
                        @csrf

                        <div class="space-y-4">
                            <!-- Current Password -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Current Password
                                </label>

                                <input type="password" name="current_password"
                                       class="w-full bg-gray-100 border border-gray-500 text-gray-900 rounded-md shadow-sm
                                              focus:bg-white focus:border-indigo-600 focus:ring-2 focus:ring-indigo-600
                                              @error('current_password') border-red-600 ring-1 ring-red-500 @enderror">

                                @error('current_password')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>


                            <!-- New Password -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    New Password
                                </label>

                                <input type="password" name="password"
                                       class="w-full bg-gray-100 border border-gray-500 text-gray-900 rounded-md shadow-sm
                                              focus:bg-white focus:border-indigo-600 focus:ring-2 focus:ring-indigo-600
                                              @error('password') border-red-600 ring-1 ring-red-500 @enderror">

                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>


                            <!-- Confirm Password -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Confirm New Password
                                </label>

                                <input type="password" name="password_confirmation"
                                       class="w-full bg-gray-100 border border-gray-500 text-gray-900 rounded-md shadow-sm
                                              focus:bg-white focus:border-indigo-600 focus:ring-2 focus:ring-indigo-600">
                            </div>


                        <button type="submit"
                                class="mt-6 w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded">
                            Update Password
                        </button>
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
