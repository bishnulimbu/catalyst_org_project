@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow rounded-xl p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">➕ Add New Objective</h2>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                <ul class="list-disc list-inside space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('objectives.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Objective Text --}}
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Objective</label>
                <textarea id="content" name="content" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                    placeholder="Enter the objective here..." required>{{ old('content') }}</textarea>
            </div>

            {{-- Logo Selector --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-3">Select a Logo</label>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                    @php
                        $logos = [
                            'target' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />',
                            'growth' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18" />',
                            'teamwork' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87" />',
                            'innovation' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m0 14v1m8-8h1M4 12H3m15.364 6.364l.707.707M6.343 6.343l-.707-.707" />',
                            'education' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />',
                            'health' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21C12 21 4 13 4 8a4 4 0 018 0 4 4 0 018 0c0 5-8 13-8 13z" />',
                            'sustainability' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />',
                            'leadership' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.908c.969 0 1.371 1.24.588 1.81l-3.97 2.886a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.538 1.118l-3.97-2.886a1 1 0 00-1.176 0l-3.97 2.886c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.364-1.118l-3.97-2.886c-.783-.57-.38-1.81.588-1.81h4.908a1 1 0 00.95-.69l1.518-4.674z" />',
                            'technology' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17a4.25 4.25 0 118.5 0v1.25a2.75 2.75 0 01-2.75 2.75H12.5a2.75 2.75 0 01-2.75-2.75V17z" />',
                            'finance' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V4m0 16v-4" />',
                        ];
                    @endphp

                    @foreach ($logos as $name => $path)
                        <label
                            class="cursor-pointer border-2 rounded-xl p-4 flex flex-col items-center justify-center text-center transition hover:border-green-400 hover:bg-green-50 peer-checked:border-green-500 peer-checked:bg-green-100">
                            <input type="radio" name="logo" value="{{ $name }}" class="hidden peer"
                                @checked(old('logo', $objective->logo ?? 'target') === $name)>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-10 h-10 mb-2 text-gray-500 peer-checked:text-green-600 transition">
                                {!! $path !!}
                            </svg>

                            <span class="text-sm font-medium text-gray-700 capitalize">{{ $name }}</span>
                            <span class="hidden peer-checked:block mt-1 text-xs font-semibold text-green-600">✔
                                Selected</span>
                        </label>
                    @endforeach
                </div>
                <p class="text-sm text-gray-500 mt-2">If you don’t select, a default logo will be used.</p>
            </div>

            {{-- Actions --}}
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('objectives.index') }}"
                    class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium transition">
                    Cancel
                </a>
                <button type="submit"
                    class="px-5 py-2.5 rounded-lg bg-green-600 hover:bg-green-700 text-white font-semibold shadow transition">
                    Add Objective
                </button>
            </div>
        </form>
    </div>
@endsection
