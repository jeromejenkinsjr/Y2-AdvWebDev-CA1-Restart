@props(['performanceId'])

<form action="{{ route('reviews.store', $performanceId) }}" method="POST">
    @csrf

    <!-- Star Rating -->
    <div class="mb-4">
        <label for="rating" class="block text-sm text-gray-700">Rating</label>
        <select name="rating" id="rating" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
            <option value="" disabled selected>Select a rating</option>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
            @endfor
        </select>
    </div>

    <!-- Review Content -->
    <div class="mb-4">
        <label for="content" class="block text-sm text-gray-700">Review</label>
        <textarea name="content" id="content" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
        @error('content')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit Button -->
    <x-primary-button>
        Submit Review
    </x-primary-button>
</form>
