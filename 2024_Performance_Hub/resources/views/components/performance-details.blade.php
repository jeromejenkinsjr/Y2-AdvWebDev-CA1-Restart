@props(['title', 'piece', 'composer', 'musician', 'event', 'description', 'image'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">
    <!-- Performance Title -->
    <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{ $title }}</h1>

    <!-- Performance Image -->
    <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
        <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full max-w-xs h-auto object-cover">
    </div>

    <!-- Piece Name -->
    <h2 class="text-gray-500 text-sm italic mb-2" style="font-size: 1rem;"><strong>Piece:</strong> {{ $piece }}</h2>

    <!-- Composer -->
    <h2 class="text-gray-500 text-sm italic mb-2" style="font-size: 1rem;"><strong>Composer:</strong> {{ $composer }}</h2>

    <!-- Event -->
    <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;"><strong>Event:</strong> {{ $event }}</h2>

    <!-- Description Section -->
    <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 2rem;">Description</h3>
    <p class="text-gray-700 leading-relaxed">{{ $description }}</p>
</div>
