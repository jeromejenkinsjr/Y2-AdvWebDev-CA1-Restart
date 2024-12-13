<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Performances Tagged: "{{ $tag->name }}"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($performances->isEmpty())
                        <p>No performances found for this tag.</p>
                    @else
                        <ul>
                            @foreach($performances as $performance)
                                <li class="mb-4">
                                    <h3 class="font-bold text-lg">
                                        <a href="{{ route('performances.show', $performance->id) }}" class="text-blue-500 hover:underline">
                                            {{ $performance->title }}
                                        </a>
                                    </h3>
                                    <p>{{ $performance->description }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
