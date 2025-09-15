@extends('layouts.app')
@section('content')
    <div class="max-w-5xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid md:grid-cols-3 gap-6">
            <div class="p-4 bg-white shadow rounded">
                <h2 class="font-semibold mb-2">Hero Section</h2>
                <p>{{ Str::limit($hero->title ?? 'Not set', 40) }}</p>
                <a href="{{ route('hero.edit') }}" class="text-orange-500">Edit</a>
            </div>

            {{-- <div class="p-4 bg-white shadow rounded">
                <h2 class="font-semibold mb-2">About Section</h2>
                <p>{{ Str::limit($about->content ?? 'Not set', 40) }}</p>
                <a href="{{ route('about.edit') }}" class="text-orange-500">Edit</a>
            </div> --}}

            <div class="p-4 bg-white shadow rounded">
                <h2 class="font-semibold mb-2">Objectives</h2>

                @if ($objectives->count())
                    <ul class="space-y-2">
                        @foreach ($objectives as $objective)
                            <li class="flex justify-between items-center border-b pb-2">
                                <span>{{ Str::limit($objective->content, 40) }}</span>
                                <a href="{{ route('objectives.edit', $objective->id) }}" class="text-orange-500">Edit</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No objectives set yet.</p>
                @endif

                <div class="mt-3">
                    <a href="{{ route('objectives.create') }}" class="text-green-600">+ Add Objective</a>
                </div>
            </div>
        </div>
    </div>
@endsection
