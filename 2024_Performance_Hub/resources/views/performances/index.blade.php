<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Performances') }}
        </h2>
    </x-slot>

<x-alert-success>
 {{ session('success') }}
</x-alert-success>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Performances:</h3>

                    <!-- Search Form -->
                    <form action="{{ route('performances.index') }}" method="GET" class="mb-6">
                        <div class="flex items-center space-x-4 mb-4">
                            <input 
                                type="text" 
                                name="search" 
                                placeholder="Search performances..." 
                                value="{{ request('search') }}" 
                                class="w-full border-gray-300 rounded-md shadow-sm p-2"
                            />

                            <!-- Sort By Dropdown -->
                            <select name="sort" class="w-full sm:w-1/4 border-gray-300 rounded-md shadow-sm p-2">
                                <option value="">Sort By</option>
                                <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>
                                    Title (A - Z)
                                </option>
                                <option value="title_desc" {{ request('sort') == 'title_desc' ? 'selected' : '' }}>
                                    Title (Z - A)
                                </option>
                            </select>

                            <x-primary-button class="ml-2">
                                Apply
                            </x-primary-button>
                        </div>
                    </form>
                    
                    <div class="mb-4">
    <a href="{{ route('performances.create') }}" class="btn btn-primary">
        Add New Performance
    </a>
</div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($performances as $performance)
                        <x-performance-card
                                :title="$performance->title"
                                :event="$performance->event"
                                :image="$performance->image"
                                :performanceId="$performance->id"
                                />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
