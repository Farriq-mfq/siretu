@extends('templates.auth')
@section('content')
    {{-- <a href="https://demo.themesberg.com/windster/"
        class="text-2xl font-semibold flex justify-center items-center mb-8 lg:mb-10">
        <img src="https://demo.themesberg.com/windster/images/logo.svg" class="h-10 mr-4" alt="Windster Logo">
        <span class="self-center text-2xl font-bold whitespace-nowrap">Windster</span>
    </a> --}}

    <div class="bg-white shadow rounded-lg md:mt-0 w-full sm:max-w-screen-sm xl:p-0">
        <div class="px-7 py-8 space-y-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
                Masuk
            </h2>

            @if (Session::has('unauthorized'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">Pesan : </span> {{ Session::get('unauthorized') }}.
                </div>
            @endif
            <form class="mt-8 space-y-6" method="POST" action="{{ route('login.action') }}">
                @csrf
                <div>
                    <label for="email" class="text-sm font-medium text-gray-900 block mb-2">
                        Username
                    </label>
                    <input type="text" name="username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5   @error('username') border-red-500 @enderror"
                        placeholder="masukan username" value="{{ old('username', '') }}">
                    @error('username')
                        <p class="text-red-400 text-sm">Username harus di isi</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="text-sm font-medium text-gray-900 block mb-2">
                        Password
                    </label>
                    <input type="password" name="password" value="{{ old('password', '') }}" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5
                        @error('password') border-red-500 @enderror">
                    @error('username')
                        <p class="text-red-400 text-sm">Password harus di isi</p>
                    @enderror
                </div>
                {{-- <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" aria-describedby="remember" name="remember" type="checkbox"
                            class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-blue-200 h-4 w-4 rounded"
                            required="">
                    </div>
                    <div class="text-sm ml-3">
                        <label for="remember" class="font-medium text-gray-900">Remember me</label>
                    </div>
                    <a href="#" class="text-sm text-teal-500 hover:underline ml-auto">Lost Password?</a>
                </div> --}}
                <button type="submit"
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-base px-5 py-3 w-full sm:w-auto text-center">
                    Masuk
                </button>
            </form>
        </div>
    </div>
@endsection
