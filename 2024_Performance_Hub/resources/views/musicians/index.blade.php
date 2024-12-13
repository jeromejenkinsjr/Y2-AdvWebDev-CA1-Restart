<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Musicians') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('musicians.create') }}" class="btn btn-primary mb-4">Add New Musician</a>
                    <h3 class="font-semibold text-lg mb-4">Musicians List</h3>

                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="w-1/4 px-4 py-2">Name</th>
                                <th class="w-1/4 px-4 py-2">Genre</th>
                                <th class="w-1/4 px-4 py-2">Description</th>
                                <th class="w-1/4 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($musicians as $musician)
                                <tr>
                                    <td class="border px-4 py-2">
                                        <div class="flex items-center">
                                            @if($musician->image)
                                                <img src="{{ asset($musician->image) }}" alt="{{ $musician->name }}" class="w-10 h-10 object-cover rounded-full mr-4">
                                            @else
                                                <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 mr-4">
                                                    N/A
                                                </div>
                                            @endif
                                            {{ $musician->name }}
                                        </div>
                                    </td>
                                    <td class="border px-4 py-2">{{ $musician->genre ?? 'Not specified' }}</td>
                                    <td class="border px-4 py-2 truncate max-w-xs">
                                        {{ Str::limit($musician->description, 50, '...') }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('musicians.show', $musician->id) }}" class="btn btn-info">View</a>
                                        @if(auth()->user() && auth()->user()->role === 'admin') <!-- Check if user is admin -->
                                            <a href="{{ route('musicians.edit', $musician->id) }}" class="btn btn-secondary">Edit</a>
                                            <form action="{{ route('musicians.destroy', $musician->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this musician?');">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>Delete</x-danger-button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
