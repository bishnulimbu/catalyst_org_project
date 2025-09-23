@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Edit CES Details</h1>

    <form action="{{ route('ces.update', $cesDetail) }}" method="POST" class="bg-white shadow p-4 rounded">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block">DAO Registration Number</label>
            <input type="text" name="dao_registration_number" value="{{ old('dao_registration_number', $cesDetail->dao_registration_number) }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block">Established Date</label>
            <input type="text" name="established_date" value="{{ old('established_date', $cesDetail->established_date) }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block">SWC Affiliation Number</label>
            <input type="text" name="swc_affiliation_number" value="{{ old('swc_affiliation_number', $cesDetail->swc_affiliation_number) }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block">PAN No.</label>
            <input type="text" name="pan_number" value="{{ old('pan_number', $cesDetail->pan_number) }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block">Number of Founding Members</label>
            <input type="number" name="founding_members" value="{{ old('founding_members', $cesDetail->founding_members) }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block">Total No. of Members</label>
            <input type="number" name="total_members" value="{{ old('total_members', $cesDetail->total_members) }}" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection