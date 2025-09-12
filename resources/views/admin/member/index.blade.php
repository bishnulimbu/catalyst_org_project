@extends('layouts.app')
@section('content')
    <div x-data="{ open: false, member: {} }">

        <!-- Member Info Modal -->
        <div x-show="open" x-transition class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
                <button @click="open = false"
                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>

                <div class="text-center">
                    <template x-if="member.profile_picture">
                        <img :src="'/storage/' + member.profile_picture" class="w-24 h-24 rounded-full mx-auto mb-4"
                            alt="Profile Picture">
                    </template>
                    <h2 class="text-xl font-semibold mb-2" x-text="member.name || 'N/A'"></h2>
                    <p class="text-gray-700" x-text="member.role || 'N/A'"></p>
                    <p class="text-gray-500 mt-2" x-text="member.email || 'N/A'"></p>
                </div>
            </div>
        </div>

        <!-- Members Table -->
        <div class="p-6 bg-gray-100 min-h-screen">
            <div class="max-w-7xl mx-auto">
                <a href="{{ route('admin.member.create') }}"
                    class="inline-block mb-6 px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-200">
                    Add Member
                </a>

                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="px-6 py-4 text-left font-semibold">Profile</th>
                                <th class="px-6 py-4 text-left font-semibold">Name</th>
                                <th class="px-6 py-4 text-left font-semibold">Role</th>
                                <th class="px-6 py-4 text-center font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($members as $member)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        @if ($member->profile_picture)
                                            <img src="{{ asset('storage/' . $member->profile_picture) }}"
                                                class="w-12 h-12 rounded-full object-cover border-2 border-gray-200"
                                                alt="{{ $member->name }}'s profile picture">
                                        @else
                                            <div
                                                class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                                                <span class="text-gray-500 text-sm">No Image</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-gray-800">{{ $member->name }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $member->role }}</td>
                                    <td class="px-6 py-4 flex justify-center space-x-6">
                                        <a href="{{ route('admin.member.edit', $member) }}"
                                            class="text-blue-600 hover:text-blue-800 font-medium transition duration-150">
                                            Edit
                                        </a>

                                        <!-- View Button -->
                                        <button @click="member = {{ $member->toJson() }}; open = true"
                                            class="text-blue-600 hover:underline">
                                            View
                                        </button>

                                        <form action="{{ route('admin.member.destroy', $member) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this member?')"
                                                class="text-red-600 hover:text-red-800 font-medium transition duration-150">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                        No members found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
