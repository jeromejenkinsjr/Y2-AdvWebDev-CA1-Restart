<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Performances') }}
        </h2>
    </x-slot>

    <!-- Success Message -->
    @if(session('success'))
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Performances:</h3>

                    <!-- Search and Filter Form -->
                    <form action="{{ route('performances.index') }}" method="GET" class="mb-6">
                        <div class="flex flex-wrap gap-4">
                            <!-- Search Input -->
                            <input 
                                type="text" 
                                name="search" 
                                placeholder="Search performances..." 
                                value="{{ request('search') }}" 
                                class="flex-grow border-gray-300 rounded-md shadow-sm p-2"
                            />

                            <!-- Sort By Dropdown -->
                            <select name="sort" class="flex-grow border-gray-300 rounded-md shadow-sm p-2">
                                <option value="">Sort By</option>
                                <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>
                                    Title (A - Z)
                                </option>
                                <option value="title_desc" {{ request('sort') == 'title_desc' ? 'selected' : '' }}>
                                    Title (Z - A)
                                </option>
                            </select>

                            <!-- Tags Filter -->
                            <div class="flex flex-wrap gap-2">
                                @foreach($allTags as $tag)
                                    <label for="tag-{{ $tag->id }}" class="flex items-center cursor-pointer">
                                        <input
                                            type="checkbox"
                                            name="tags[]"
                                            id="tag-{{ $tag->id }}"
                                            value="{{ $tag->id }}"
                                            {{ in_array($tag->id, request('tags', [])) ? 'checked' : '' }}
                                            class="hidden peer"
                                        >
                                        <span class="inline-block px-3 py-1 text-sm font-semibold text-white {{ $tag->color }} rounded-full peer-checked:ring-2 peer-checked:ring-offset-2 peer-checked:ring-blue-500">
                                            {{ $tag->name }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>

                            <!-- Apply Button -->
                            <x-primary-button class="ml-2">
                                Apply
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Add New Performance Button -->
                    <div class="mb-4">
                        <a href="{{ route('performances.create') }}" class="btn btn-primary">
                            Add New Performance
                        </a>
                    </div>

                    <!-- Performances Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($performances as $performance)
                            <x-performance-card
                                :title="$performance->title"
                                :event="$performance->event"
                                :image="$performance->image"
                                :performanceId="$performance->id"
                            />
                        @empty
                            <p class="text-gray-500">No performances found matching your criteria.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
