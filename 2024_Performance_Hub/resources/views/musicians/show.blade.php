<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $musician->name }} - Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white text-gray-900">
                    <!-- Musician Details -->
                    <h3 class="font-semibold text-lg mb-4">Musician Details</h3>

                    <!-- Musician Image -->
                    @if($musician->image)
                        <div class="mb-6">
                            <img src="{{ asset($musician->image) }}" alt="{{ $musician->name }}" class="w-48 h-48 object-cover rounded-lg shadow-md">
                        </div>
                    @endif

                    <!-- Musician Genre and Description -->
                    <p><strong>Genre:</strong> {{ $musician->genre ?? 'Not specified' }}</p>
                    <div class="mt-4">
                        <strong>Description:</strong>
                        <p class="mt-2">{{ $musician->description ?? 'No description available.' }}</p>
                    </div>

                    <!-- Performances List -->
                    <div class="mt-8">
                        <h4 class="font-bold text-lg mb-4">Performances by {{ $musician->name }}:</h4>

                        @forelse ($musician->performances as $performance)
                            <div class="border-t mt-4 pt-4">
                                <h5 class="font-semibold">{{ $performance->title }}</h5>
                                <p><strong>Piece:</strong> {{ $performance->piece }}</p>
                                <p><strong>Composer:</strong> {{ $performance->composer }}</p>
                                <p><strong>Event:</strong> {{ $performance->event }}</p>
                                <a href="{{ route('performances.show', $performance->id) }}" class="text-blue-600 hover:underline">
                                    View Performance Details
                                </a>
                            </div>
                        @empty
                            <p class="mt-4">No performances found for this musician.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
