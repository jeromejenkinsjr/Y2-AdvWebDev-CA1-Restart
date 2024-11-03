@props(['title', 'piece', 'composer', 'musician', 'event', 'description', 'image', 'performanceId'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $title }}</h4>
    <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-auto mt-4">
    <p class="text-gray-600"><strong>Event:</strong> {{ $event }}</p>
    <!-- Action Links -->
    <div class="flex space-x-4 mt-4">
        <!-- View Details -->
        <a href="{{ route('performances.show', $performanceId) }}" class="text-blue-600 font-bold hover:underline">
            View Details
        </a>

        <!-- Edit Button -->
        <a href="{{ route('performances.edit', $performanceId) }}" class="btn btn-primary">
            Edit
        </a>

        <!-- Create Button -->
        <a href="{{ route('performances.create') }}" class="btn btn-secondary">
            Create New Performance
        </a>
    </div>
</div>
