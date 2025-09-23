@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">{{ $detail ? 'Edit Contact Details' : 'Add Contact Details' }}</h1>
        <form action="{{ $detail ? route('contact.update', $detail) : route('contact.store') }}" method="POST">
            @csrf
            @if ($detail)
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="website" class="block text-sm font-medium">Website</label>
                <input type="text" name="website" id="website" value="{{ old('website', $detail?->website) }}"
                    class="mt-1 p-2 border rounded w-full">
                @error('website')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $detail?->email) }}"
                    class="mt-1 p-2 border rounded w-full">
                @error('email')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Phone Numbers</label>
                <div id="phone-fields">
                    @if ($detail && $detail->phones)
                        @foreach ($detail->phones as $index => $phone)
                            <div class="flex items-center mb-2">
                                <input type="text" name="phones[]" value="{{ old("phones.$index", $phone) }}"
                                    class="mt-1 p-2 border rounded w-full">
                                @if ($loop->first)
                                    <button type="button" id="add-phone"
                                        class="ml-2 bg-green-600 text-white px-2 py-1 rounded">Add</button>
                                @else
                                    <button type="button"
                                        class="ml-2 bg-red-600 text-white px-2 py-1 rounded remove-phone">Remove</button>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="flex items-center mb-2">
                            <input type="text" name="phones[]" value="{{ old('phones.0') }}"
                                class="mt-1 p-2 border rounded w-full">
                            <button type="button" id="add-phone"
                                class="ml-2 bg-green-600 text-white px-2 py-1 rounded">Add</button>
                        </div>
                    @endif
                </div>
                @error('phones.*')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium">Address</label>
                <input type="text" name="address" id="address" value="{{ old('address', $detail?->address) }}"
                    class="mt-1 p-2 border rounded w-full">
                @error('address')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                {{ $detail ? 'Update Details' : 'Save Details' }}
            </button>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const phoneFields = document.getElementById('phone-fields');
                const addPhoneButton = document.getElementById('add-phone');

                addPhoneButton.addEventListener('click', function() {
                    const newPhoneDiv = document.createElement('div');
                    newPhoneDiv.className = 'flex items-center mb-2';
                    newPhoneDiv.innerHTML = `
                    <input type="text" name="phones[]" class="mt-1 p-2 border rounded w-full">
                    <button type="button" class="ml-2 bg-red-600 text-white px-2 py-1 rounded remove-phone">Remove</button>
                `;
                    phoneFields.appendChild(newPhoneDiv);

                    // Add remove functionality to new button
                    newPhoneDiv.querySelector('.remove-phone').addEventListener('click', function() {
                        newPhoneDiv.remove();
                    });
                });

                // Add remove functionality to existing remove buttons
                phoneFields.querySelectorAll('.remove-phone').forEach(button => {
                    button.addEventListener('click', function() {
                        this.parentElement.remove();
                    });
                });
            });
        </script>
    </div>




@endsection
