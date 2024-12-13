@props(['tag'])

<a href="{{ route('tags.show', $tag->id) }}" 
   class="inline-block px-3 py-1 text-sm font-semibold text-white {{ $tag->color }} rounded-full hover:opacity-80 transition">
    {{ $tag->name }}
</a>