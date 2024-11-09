<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>

        <!-- Suggested Performances Section -->
        @if($suggestedPerformances->isNotEmpty())
                <div class="mt-8 bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-4">Suggested Performances for You</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($suggestedPerformances as $performance)
                                <div class="border rounded-lg shadow-md p-4 bg-white hover:shadow-lg transition duration-300">
                                    <h3 class="font-bold text-lg">{{ $performance->title }}</h3>
                                    <p class="text-gray-600"><strong>Composer:</strong> {{ $performance->composer }}</p>
                                    <a href="{{ route('performances.show', $performance->id) }}" class="text-blue-600 hover:underline">View Details</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="mt-8 bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-700">
                        No suggestions available at the moment. Start viewing performances to get suggestions here!
                    </div>
                </div>
            @endif
        </div>

    </div>
</x-app-layout>
