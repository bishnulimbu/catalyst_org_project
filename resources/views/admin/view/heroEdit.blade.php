@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Homepage</h1>

    {{-- Flash message --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Hero Editor --}}
    <div class="bg-white shadow rounded p-4 mb-6">
        <h2 class="text-xl font-semibold mb-3">Hero Section</h2>
        <form action="{{ route('hero.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="block text-gray-700">Title</label>
                <input type="text" name="title" value="{{ $hero->title ?? '' }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block text-gray-700">Subtitle</label>
                <input type="text" name="subtitles" value="{{ $hero->subtitles ?? '' }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block text-gray-700">Background Image URL</label>
                <input type="text" name="background_image" value="{{ $hero->background_image ?? '' }}" class="w-full border p-2 rounded">
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Save Hero</button>
        </form>
    </div>

    {{-- Objectives Editor --}}
    <div class="bg-white shadow rounded p-4 mb-6">
        <h2 class="text-xl font-semibold mb-3">Objectives</h2>
        <a href="{{ route('objectives.create') }}" class="bg-green-600 text-white px-3 py-1 rounded">+ Add Objective</a>

        <ul class="mt-4 space-y-2">
            @foreach($objectives as $objective)
                <li class="flex justify-between items-center border-b py-2">
                    <span>{{ $objective->title }}</span>
                    <div class="space-x-2">
                        <a href="{{ route('objectives.edit', $objective->id) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('objectives.destroy', $objective->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection