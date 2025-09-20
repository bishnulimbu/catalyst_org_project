@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Objective</h1>

        {{-- Flash message --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('objectives.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Hero Section --}}
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
                    {{-- Academic Cap Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0v7m0-7l-9-5m9 5l9-5" />
                    </svg>
                    Hero Section
                </h2>

                <label class="block">
                    <span class="text-gray-700">Heading</span>
                    <input type="text" name="hero_heading" value="{{ old('hero_heading', $hero->heading) }}"
                        class="mt-1 block w-full border-gray-300 rounded p-2">
                </label>

                <label class="block mt-3">
                    <span class="text-gray-700">Subheading</span>
                    <input type="text" name="hero_subheading" value="{{ old('hero_subheading', $hero->subheading) }}"
                        class="mt-1 block w-full border-gray-300 rounded p-2">
                </label>

                <label class="block mt-3">
                    <span class="text-gray-700">Background Image</span>
                    <input type="file" name="hero_background" class="mt-1 block w-full border-gray-300 rounded p-2">
                </label>
            </div>

            {{-- About Section --}}
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
                    {{-- Information Circle Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 20.25c4.556 0 8.25-3.694 8.25-8.25S16.556 3.75 12 3.75 3.75 7.444 3.75 12s3.694 8.25 8.25 8.25z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25h.008v.008H12V8.25zm0 3v5.25" />
                    </svg>
                    About Section
                </h2>

                <label class="block">
                    <span class="text-gray-700">About Title</span>
                    <input type="text" name="about_title" value="{{ old('about_title', $about->title) }}"
                        class="mt-1 block w-full border-gray-300 rounded p-2">
                </label>

                <label class="block mt-3">
                    <span class="text-gray-700">Description</span>
                    <textarea name="about_description" rows="4" class="mt-1 block w-full border-gray-300 rounded p-2">{{ old('about_description', $about->description) }}</textarea>
                </label>
            </div>

            {{-- CTA Section --}}
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
                    {{-- Lightning Bolt Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Call To Action
                </h2>

                <label class="block">
                    <span class="text-gray-700">Button Text</span>
                    <input type="text" name="cta_text" value="{{ old('cta_text', $cta->text) }}"
                        class="mt-1 block w-full border-gray-300 rounded p-2">
                </label>

                <label class="block mt-3">
                    <span class="text-gray-700">Button Link</span>
                    <input type="text" name="cta_link" value="{{ old('cta_link', $cta->link) }}"
                        class="mt-1 block w-full border-gray-300 rounded p-2">
                </label>
            </div>

            {{-- Submit --}}
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition">
                Save Changes
            </button>
        </form>
    </div>
@endsection
