@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-xl font-bold mb-4">Edit Scope</h1>

    <form action="{{ route('scopes.update', $scope->id) }}" method="POST" class="bg-white shadow p-4 rounded">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block">Title</label>
            <input type="text" name="title" value="{{ $scope->title }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-3">
            <label class="block">Link (optional)</label>
            <input type="url" name="link" value="{{ $scope->link }}" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection