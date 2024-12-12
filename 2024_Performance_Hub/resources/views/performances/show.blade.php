<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{__('All Performances') }}
</h2>

</x-slot>
@if(session('success'))
<x-alert-success>
 {{ session('success') }}
</x-alert-success>
@endif
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
<div class="p-6 ☐ text-gray-900">
<h3 class="font-semibold text-lg mb-4">Performance Details</h3>
<x-performance-details
:title="$performance->title"
:piece="$performance->piece"
:composer="$performance->composer"
:event="$performance->event"
:description="$performance->description"
:image="$performance->image"
/>

<h3 class="font-semibold text-lg mb-4">Tags:</h3>
<div class="flex flex-wrap gap-2">
    @foreach($performance->tags as $tag)
    <x-tag :tag="$tag" />
    @endforeach
</div>

<!-- Musicians Section -->
<div class="mt-4">
    <h4 class="font-semibold text-md">Musicians:</h4>
        <ul>
            @foreach($performance->musicians as $musician)
                <li>{{ $musician->name }}</li>
            @endforeach
        </ul>
</div>

<!-- Review Form -->
@auth
                        <x-review-form :performanceId="$performance->id"/>
                    @else
                        <p class="mt-4 text-blue-600">
                            Please <a href="{{ route('login') }}" class="hover:underline">log in</a> to write a review.
                        </p>
                    @endauth

                    <!-- Reviews Section -->
                    <div class="mt-8">
    <h4 class="font-bold text-lg">Reviews:</h4>
    @forelse ($performance->reviews as $review)
        <div class="border-t mt-4 pt-4">
            <div class="flex items-center">
                <p class="font-semibold">{{ $review->user->name }}</p>
                <span class="ml-4 text-yellow-500">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating)
                            ★
                        @else
                            ☆
                        @endif
                    @endfor
                </span>
            </div>
            <p class="mt-2">{{ $review->content }}</p>
            <p class="text-xs text-gray-600">{{ $review->created_at->diffForHumans() }}</p>

            <div class="flex space-x-2 mt-2">
    <!-- Edit Button -->
    @if(auth()->user()->isAdmin() || auth()->id() === $review->user_id)
        <x-secondary-button type="button" onclick="window.location='{{ route('reviews.edit', $review->id) }}'">
            Edit
        </x-secondary-button>
    @endif

    <!-- Delete Button -->
    @if(auth()->user()->isAdmin() || auth()->id() === $review->user_id)
        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
            @csrf
            @method('DELETE')
            <x-danger-button type="submit">
                Delete
            </x-danger-button>
        </form>
    @endif
</div>

        </div>
    @empty
        <p class="mt-4">No reviews yet. Be the first to review this performance!</p>
    @endforelse
</div>

</div>
</div>
</div>
</div>
</x-app-layout>