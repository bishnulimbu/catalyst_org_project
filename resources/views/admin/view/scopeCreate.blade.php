@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-xl font-bold mb-4">Add New Scope</h1>

        <form action="{{ route('scopes.store') }}" method="POST" class="bg-white shadow p-4 rounded">
            @csrf

            <div class="mb-3">
                <label class="block">Title</label>
                <input type="text" name="title" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-3">
                <label class="block">Link (optional)</label>
                <input type="text" name="link" class="w-full border p-2 rounded">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
@endsection
