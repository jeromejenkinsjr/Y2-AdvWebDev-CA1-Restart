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
                    <div class="mb-4">
    <a href="{{ route('performances.create') }}" class="btn btn-primary">
        Add New Performance
    </a>
</div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($performances as $performance)
                        <a href="{{ route('performances.show', $performance) }}">    
                        <x-performance-card
                                :title="$performance->title"
                                :event="$performance->event"
                                :image="$performance->image"
                            />
</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
