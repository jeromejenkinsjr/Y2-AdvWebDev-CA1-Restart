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
                                <th class="w-1/4 px-4 py-2">Instrument</th>
                                <th class="w-1/4 px-4 py-2">Genre</th>
                                <th class="w-1/4 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($musicians as $musician)
                                <tr>
                                    <td class="border px-4 py-2">{{ $musician->name }}</td>
                                    <td class="border px-4 py-2">{{ $musician->instrument }}</td>
                                    <td class="border px-4 py-2">{{ $musician->genre }}</td>
                                    <td class="border px-4 py-2">
                                    <a href="{{ route('musicians.show', $musician->id) }}" class="btn btn-info">View Details</a>
                                        <a href="{{ route('musicians.edit', $musician->id) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('musicians.destroy', $musician->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this musician?');">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>Delete</x-danger-button>
                                        </form>
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
