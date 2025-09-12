@extends('layouts.app')

@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Edit Member</h2>

    <!-- Edit Form -->
    <form action="{{ route('admin.member.update', $member) }}" method="POST" enctype="multipart/form-data" 
          class="bg-white shadow-md rounded-lg p-6 space-y-6">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500"
                   required>
            @error('name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Role -->
        <div>
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <input type="text" name="role" id="role" value="{{ old('role', $member->role) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500"
                   required>
            @error('role')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="text" name="email" id="email" value="{{ old('role', $member->email) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500"
                   required>
            @error('email')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Profile Picture -->
        <div>
            <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
            <input type="file" name="profile_picture" id="profile_picture"
                   class="mt-1 block w-full text-sm text-gray-600 border border-gray-300 rounded-md cursor-pointer focus:outline-none">
            
            <!-- Show current picture -->
            @if ($member->profile_picture)
                <div class="mt-3">
                    <p class="text-sm text-gray-600 mb-1">Current:</p>
                    <img src="{{ asset('storage/'.$member->profile_picture) }}" 
                         alt="Profile Picture" 
                         class="w-20 h-20 rounded-full object-cover border">
                </div>
            @endif

            @error('profile_picture')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Buttons -->
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.member.index') }}" 
               class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md">
               Cancel
            </a>
            <button type="submit" 
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow">
                Update
            </button>
        </div>
    </form>
</div>
@endsection