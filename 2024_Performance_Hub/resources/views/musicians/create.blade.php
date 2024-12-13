<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Musician') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('musicians.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                required>
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Genre -->
                        <div class="mb-4">
                            <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                            <input 
                                type="text" 
                                name="genre" 
                                id="genre" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('genre')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea 
                                name="description" 
                                id="description" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                rows="4"></textarea>
                            @error('description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Musician Image</label>
                            <input 
                                type="file" 
                                name="image" 
                                id="image" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('image')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <x-primary-button type="submit">Add Musician</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
