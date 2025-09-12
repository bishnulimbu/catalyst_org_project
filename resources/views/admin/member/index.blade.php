<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Manage Members</h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('admin.member.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Add Member</a>

        <table class="mt-6 w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2">Profile</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Position</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td class="px-4 py-2">
                            @if ($member->profile_picture)
                                <img src="{{ asset('storage/'.$member->profile_picture) }}" class="w-12 h-12 rounded-full">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $member->name }}</td>
                        <td class="px-4 py-2">{{ $member->position }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.member.edit', $member) }}" class="text-blue-600">Edit</a> |
                            <form action="{{ route('admin.member.destroy', $member) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this member?')" class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>