@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">{{ $detail ? 'Edit CES Details' : 'Add CES Details' }}</h1>
        <form action="{{ $detail ? route('ces.update', $detail) : route('ces.store') }}" method="POST">
            @csrf
            @if ($detail)
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="dao_registration_number" class="block text-sm font-medium">DAO Registration Number</label>
                <input type="text" name="dao_registration_number" id="dao_registration_number"
                    value="{{ old('dao_registration_number', $detail?->dao_registration_number) }}"
                    class="mt-1 p-2 border rounded w-full" required>
                @error('dao_registration_number')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="established_date" class="block text-sm font-medium">Established Date</label>
                <input type="date" name="established_date" id="established_date"
                    value="{{ old('established_date', $detail?->established_date) }}" class="mt-1 p-2 border rounded w-full"
                    required>
                @error('established_date')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="swc_affiliation_number" class="block text-sm font-medium">SWC Affiliation Number</label>
                <input type="text" name="swc_affiliation_number" id="swc_affiliation_number"
                    value="{{ old('swc_affiliation_number', $detail?->swc_affiliation_number) }}"
                    class="mt-1 p-2 border rounded w-full">
                @error('swc_affiliation_number')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="pan_number" class="block text-sm font-medium">PAN No.</label>
                <input type="text" name="pan_number" id="pan_number"
                    value="{{ old('pan_number', $detail?->pan_number) }}" class="mt-1 p-2 border rounded w-full">
                @error('pan_number')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="founding_members" class="block text-sm font-medium">Number of Founding Members</label>
                <input type="number" name="founding_members" id="founding_members"
                    value="{{ old('founding_members', $detail?->founding_members) }}"
                    class="mt-1 p-2 border rounded w-full" required>
                @error('founding_members')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="total_members" class="block text-sm font-medium">Total No. of Members</label>
                <input type="number" name="total_members" id="total_members"
                    value="{{ old('total_members', $detail?->total_members) }}" class="mt-1 p-2 border rounded w-full"
                    required>
                @error('total_members')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                {{ $detail ? 'Update Details' : 'Save Details' }}
            </button>
        </form>
    </div>
@endsection
