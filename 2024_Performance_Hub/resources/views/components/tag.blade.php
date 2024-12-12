@props(['tag'])

<span class="inline-block px-3 py-1 text-sm font-semibold text-white {{ $tag->color }} rounded-full">
    {{ $tag->name }}
</span>