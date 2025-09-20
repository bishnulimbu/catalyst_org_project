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
        <div class="bg-white shadow rounded p-4 mb-6" x-data="{
            open: false,
            preview: '{{ $hero?->background_image ? asset('storage/' . $hero->background_image) : '' }}',
            showDeleteAlert: false
        }" @keydown.escape.window="open = false">
            <h2 class="text-xl font-semibold mb-3">Hero Section</h2>

            {{-- Delete Alert --}}
            <div x-show="showDeleteAlert" x-transition
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" style="display: none;">
                <span class="block sm:inline">Image deleted successfully!</span>
                <button @click="showDeleteAlert = false" class="float-right font-bold">&times;</button>
            </div>

            <form action="{{ $hero ? route('hero.update', $hero->id) : route('hero.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if ($hero)
                    @method('PUT')
                @endif

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

                    <div class="relative w-full h-40">
                        {{-- hidden input to send delete flag --}}
                        <input type="hidden" name="delete_image" id="delete_image" value="0">

                        {{-- Show image preview with click handler --}}
                        <template x-if="preview">
                            <div class="relative cursor-pointer w-full h-40" @click="open = true">
                                <img :src="preview" alt="Hero Background"
                                    class="w-full h-40 object-cover rounded border">

                                {{-- Hover overlay with "+" --}}
                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-25 opacity-0 group-hover:opacity-100 transition-opacity rounded">
                                    <span class="text-white text-3xl font-bold">+</span>
                                </div>
                            </div>
                        </template>

                        {{-- Show placeholder when no image --}}
                        <template x-if="!preview">
                            <div
                                class="w-full h-40 border-2 border-dashed border-gray-300 rounded flex items-center justify-center text-gray-500">
                                <span>No image selected</span>
                            </div>
                        </template>

                        {{-- ❌ Cross icon (only if preview exists) - separate from clickable area --}}
                        <template x-if="preview">
                            <button type="button"
                                @click="
                                    preview = '';
                                    document.getElementById('background_image').value = '';
                                    document.getElementById('delete_image').value = '1';
                                    showDeleteAlert = true;
                                    setTimeout(() => showDeleteAlert = false, 3000);
                                "
                                class="absolute top-2 right-2 text-white bg-red-600 hover:bg-red-700 rounded-full w-6 h-6 flex items-center justify-center shadow z-10"
                                title="Remove image">
                                &times;
                            </button>
                        </template>
                    </div>

                    {{-- Modal for enlarged preview --}}
                    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50"
                        x-transition style="display: none;" @click.self="open = false">
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
                    <input type="file" name="background_image" id="background_image" accept="image/*"
                        @change="
                            if($event.target.files[0]) {
                                preview = URL.createObjectURL($event.target.files[0]); 
                                document.getElementById('delete_image').value = '0';
                                showDeleteAlert = false;
                            }
                        "
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Save Hero
                </button>
            </form>
        </div>
    </div>
@endsection
