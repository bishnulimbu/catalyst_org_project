@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Homepage</h1>

        {{-- Flash message --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Hero Editor --}}
        <div class="bg-white shadow rounded p-4 mb-6" x-data="{ open: false, preview: '{{ $hero->background_image ? asset('storage/' . $hero->background_image) : '' }}' }">
            <h2 class="text-xl font-semibold mb-3">Hero Section</h2>
            <form action="{{ route('hero.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="mb-3">
                    <label class="block text-gray-700">Title</label>
                    <input type="text" name="title" value="{{ $hero->title ?? '' }}" class="w-full border p-2 rounded">
                </div>

                {{-- Subtitle --}}
                <div class="mb-3">
                    <label class="block text-gray-700">Subtitle</label>
                    <input type="text" name="subtitles" value="{{ $hero->subtitles ?? '' }}"
                        class="w-full border p-2 rounded">
                </div>

                {{-- Image Preview --}}
                <div class="mb-3 relative group">
                    <p class="text-sm text-gray-600 mb-1">Background Image Preview:</p>

                    <div class="relative cursor-pointer w-full h-40" @click="open = true">
                        <template x-if="preview">
                            <img :src="preview" alt="Hero Background"
                                class="w-full h-40 object-cover rounded border">
                        </template>
                        <div
                            class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-25 opacity-0 group-hover:opacity-100 transition-opacity rounded">
                            <span class="text-white text-3xl font-bold">+</span>
                        </div>
                    </div>

                    {{-- Modal --}}
                    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50"
                        x-transition style="display: none;">
                        <div class="relative">
                            <button type="button" @click="open = false"
                                class="absolute top-2 right-2 text-white text-3xl font-bold">&times;</button>
                            <img :src="preview" alt="Hero Background" class="max-h-[80vh] rounded shadow-lg">
                        </div>
                    </div>
                </div>

                {{-- File input --}}
                <div class="mb-3">
                    <label for="background_image" class="block text-sm font-medium text-gray-700">
                        Change Background Image
                    </label>
                    <input type="file" name="background_image" id="background_image"
                        @change="preview = URL.createObjectURL($event.target.files[0])"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Save Hero
                </button>
            </form>
        </div>
    </div>
@endsection

