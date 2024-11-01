@props(['title', 'piece', 'composer', 'musician', 'event', 'description', 'image'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $title }}</h4>
    <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-auto mt-4">
    <p class="text-gray-600"><strong>Event:</strong> {{ $event }}</p>
</div>
