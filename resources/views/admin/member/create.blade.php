@extends('layouts.app') {{-- use your main layout --}}

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-6">Add New Member</h2>

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.member.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name"
                   value="{{ old('name') }}"
                   class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-indigo-200">
        </div>

        {{-- Role --}}
        <div>
            <label for="role" class="block text-sm font-medium text-gray-700">Position</label>
            <input type="text" name="role" id="role"
                   value="{{ old('role') }}"
                   class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-indigo-200">
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email"
                   value="{{ old('email') }}"
                   class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-indigo-200">
        </div>
        {{-- Profile Picture --}}
        <div>
            <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
            <input type="file" name="profile_picture" id="profile_picture"
                   class="mt-1 block w-full text-sm text-gray-500">
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                Save Member
            </button>
        </div>
    </form>
</div>
@endsection