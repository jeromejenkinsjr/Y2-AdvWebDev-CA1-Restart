@props(['title', 'piece', 'composer', 'musician', 'event', 'description', 'image'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $title }}</h4>
    <img src="{{ asset('images/performances/' . $image) }}" alt="{{ $title }}" class="w-full h-auto mt-4">
    <p class="text-gray-600 mt-2"><strong>Piece:</strong> {{ $piece }}</p>
    <p class="text-gray-600"><strong>Composer:</strong> {{ $composer }}</p>
    <p class="text-gray-600"><strong>Musician:</strong> {{ $musician }}</p>
    <p class="text-gray-600"><strong>Event:</strong> {{ $event }}</p>
    <p class="text-gray-800 mt-4">{{ $description }}</p>
</div>
