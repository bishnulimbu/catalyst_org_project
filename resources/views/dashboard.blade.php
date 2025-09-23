@extends('layouts.app')
@section('content')
    <div class="max-w-5xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                class="bg-green-100 text-green-700 p-3 rounded mb-4 transition-all duration-500">
                {{ session('success') }}
            </div>
        @endif
        <div class="grid md:grid-cols-3 gap-6">
            <div class="p-4 bg-white shadow rounded">
                <h2 class="font-semibold mb-2">Hero Section</h2>
                {{-- Title --}}
                <p class="text-gray-800 mb-2">
                    {{ Str::limit($hero->title ?? 'Not set', 40) }}
                </p>
                {{-- Subtitle (if any) --}}
                @if (!empty($hero->subtitles))
                    <p class="text-sm text-gray-600 mb-2">
                        {{ Str::limit($hero->subtitles, 60) }}
                    </p>
                @endif
                {{-- Background Image Preview --}}
                @if (!empty($hero->background_image))
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $hero->background_image) }}" alt="Hero Background"
                            class="w-full h-40 object-cover rounded">
                    </div>
                @else
                    <p class="text-gray-400 italic mb-2">No background image set</p>
                @endif
                {{-- Edit button --}}
                <a href="{{ route('hero.edit') }}"
                    class="inline-block px-3 py-1 bg-orange-500 text-white rounded hover:bg-orange-600">
                    Edit
                </a>
            </div>
            <div class="p-4 bg-white shadow rounded h-96 flex flex-col md:col-span-2">
                <h2 class="font-semibold mb-2 flex-shrink-0">Objectives</h2>
                <div class="flex-1 min-h-0">
                    @if ($objectives->count())
                        <div
                            class="h-full overflow-y-auto pr-2 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                            <ul class="space-y-2">
                                @foreach ($objectives as $objective)
                                    <li class="flex justify-between items-start border-b pb-2 last:border-b-0">
                                        <span class="flex-1 pr-2 text-sm leading-relaxed">{{ $objective->content }}</span>
                                        <div class="flex gap-2 flex-shrink-0">
                                            <a href="{{ route('objectives.edit', $objective->id) }}"
                                                class="text-black-500 hover:text-white-600 text-sm p-1" title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <button onclick="confirmDelete({{ $objective->id }})"
                                                class="text-red-500 hover:text-red-600 text-sm p-1" title="Delete">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        <form id="delete-form-{{ $objective->id }}"
                                            action="{{ route('objectives.destroy', $objective->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="h-full flex items-center justify-center">
                            <p class="text-gray-500">No objectives set yet.</p>
                        </div>
                    @endif
                </div>
                <div class="mt-3 pt-3 border-t flex-shrink-0">
                    <a href="{{ route('objectives.create') }}" class="text-green-600 hover:text-green-700">+ Add
                        Objective</a>
                </div>
            </div>
        </div>

        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold mb-6">Scopes of Catalyst Entrepreneur Society</h1>

            <a href="{{ route('scopes.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Scope</a>

            <div class="mt-6 bg-white shadow rounded p-4">
                @forelse ($scopes as $scope)
                    <div class="flex justify-between items-center border-b py-2">
                        <div>
                            <p class="font-semibold">{{ $scope->title }}</p>
                            @if ($scope->link)
                                <a href="{{ $scope->link }}" target="_blank"
                                    class="text-blue-500 underline">{{ $scope->link }}</a>
                            @endif
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('scopes.edit', $scope->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                            <form action="{{ route('scopes.destroy', $scope->id) }}" method="POST"
                                onsubmit="return confirm('Delete this scope?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>No scopes added yet.</p>
                @endforelse
            </div>
        </div>

        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold mb-6">CES Details</h1>

            @if ($detail)
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <div class="mb-3">
                            <span class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-1 rounded">
                                DAO Registration Number
                            </span>
                            <span class="ml-2">{{ $detail->dao_registration_number }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-1 rounded">
                                Established Date
                            </span>
                            <span class="ml-2">{{ $detail->established_date }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-1 rounded">
                                SWC Affiliation Number
                            </span>
                            <span class="ml-2">{{ $detail->swc_affiliation_number }}</span>
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <span class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-1 rounded">
                                PAN No.
                            </span>
                            <span class="ml-2">{{ $detail->pan_number }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-1 rounded">
                                Number of Founding Members
                            </span>
                            <span class="ml-2">{{ $detail->founding_members }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-1 rounded">
                                Total No. of Members
                            </span>
                            <span class="ml-2">{{ $detail->total_members }}</span>
                        </div>
                    </div>
                </div>

                <a href="{{ route('ces.edit', $detail) }}"
                    class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
                    Edit Details
                </a>
            @else
                <p>No CES details found.</p>
                {{-- <a href="{{ route('ces.create') }}" class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded">
                    Add CES Details
                </a> --}}
            @endif
        </div>


    </div>

    <style>
        /* Custom scrollbar styles for webkit browsers */
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
        }

        .scrollbar-thumb-gray-300::-webkit-scrollbar-thumb {
            background-color: #d1d5db;
            border-radius: 3px;
        }

        .scrollbar-thumb-gray-300::-webkit-scrollbar-thumb:hover {
            background-color: #9ca3af;
        }

        .scrollbar-track-gray-100::-webkit-scrollbar-track {
            background-color: #f3f4f6;
            border-radius: 3px;
        }
    </style>
    <script>
        function confirmDelete(objectiveId) {
            if (confirm('Are you sure you want to delete this objective? This action cannot be undone.')) {
                document.getElementById('delete-form-' + objectiveId).submit();
            }
        }
    </script>
@endsection
