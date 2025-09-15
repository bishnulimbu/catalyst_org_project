@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow rounded p-6">
    <h2 class="text-2xl font-semibold mb-4">Edit Objective</h2>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('objectives.update', $objective->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Objective</label>
            <textarea id="content" name="content" rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                required>{{ old('content', $objective->content) }}</textarea>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('objectives.index') }}"
               class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-700">Cancel</a>
            <button type="submit"
                class="px-4 py-2 rounded bg-orange-500 hover:bg-orange-600 text-white font-semibold">Update</button>
        </div>
    </form>
</div>
@endsection