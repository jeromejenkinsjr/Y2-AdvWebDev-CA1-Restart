@props(['name'])

@php
    $colors = ['bg-red-500', 'bg-blue-500', 'bg-green-500', 'bg-yellow-500', 'bg-purple-500', 'bg-pink-500', 'bg-orange-500'];
    $randomColor = $colors[array_rand($colors)];
@endphp

<span class="inline-block px-3 py-1 text-sm font-semibold text-white {{ $randomColor }} rounded-full">
    {{ $name }}
</span>
