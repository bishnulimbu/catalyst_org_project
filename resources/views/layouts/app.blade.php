<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="font-sans antialiased bg-gray-100">


    <!-- Toast Notifications -->
    <div x-data="{ show: @js(session()->has('success')), message: @js(session('success')) }" x-show="show" x-transition x-init="if (show) setTimeout(() => show = false, 3000)"
        class="fixed bottom-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg" style="display: none;">
        <span x-text="message"></span>
    </div>

    {{-- Top Navbar --}}
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-200 fixed top-0 w-full z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                {{-- Left Side: Logo + Links --}}
                <div class="flex items-center">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-800" />
                        </a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-4">
                        <a href="{{ route('dashboard') }}"
                            class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-150">Dashboard</a>
                    </div>
                </div>

                {{-- Right Side: User Dropdown --}}
                <div class="flex items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="ml-2 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')"
                                class="hover:bg-blue-50 hover:text-blue-600 transition duration-150">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="hover:bg-blue-50 hover:text-blue-600 transition duration-150">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </nav>

    {{-- Sidebar + Main --}}
    <div class="flex pt-16 min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-lg fixed top-16 bottom-0 overflow-y-auto">
            <div class="p-6 text-lg font-semibold text-gray-800 border-b border-gray-200">Admin Panel</div>
            <nav class="mt-2">
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition duration-150 {{ Route::is('dashboard') ? 'bg-blue-50 text-blue-600' : '' }}">Dashboard</a>
                <a href="{{ route('admin.member.index') }}"
                    class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition duration-150 {{ Route::is('admin.member.index') ? 'bg-blue-50 text-blue-600' : '' }}">Add/Edit
                    Teams</a>
                <a href="#"
                    class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition duration-150">Admin</a>
                <a href="{{ route('profile.edit') }}"
                    class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition duration-150 {{ Route::is('profile.edit') ? 'bg-blue-50 text-blue-600' : '' }}">Profile</a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 ml-64">
            {{-- Page Heading --}}
            @if (isset($header))
                <header class="bg-white shadow-md">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            {{-- Page Content --}}
            <main class="p-6 sm:p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
