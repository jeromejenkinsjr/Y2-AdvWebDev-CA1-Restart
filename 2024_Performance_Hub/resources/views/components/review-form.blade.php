@props(['performanceId', 'action' => null, 'method' => 'POST', 'review' => null])

<form action="{{ $action ?? route('reviews.store', $performanceId) }}" method="POST">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <!-- Star Rating -->
    <div class="mb-4">
        <label for="rating" class="block text-sm text-gray-700">Rating</label>
        <select name="rating" id="rating" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
            <option value="" disabled {{ !$review ? 'selected' : '' }}>Select a rating</option>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" {{ $review && $review->rating == $i ? 'selected' : '' }}>
                    {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                </option>
            @endfor
        </select>
    </div>

    <!-- Review Content -->
    <div class="mb-4">
        <label for="content" class="block text-sm text-gray-700">Review</label>
        <textarea name="content" id="content" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            {{ $review ? $review->content : '' }}</textarea>
        @error('content')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit Button -->
    <x-primary-button>
        {{ $review ? 'Update Review' : 'Submit Review' }}
    </x-primary-button>
</form>
