@props(['action', 'method', 'performance' => null])
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Performance Title -->
    <div class="mb-4">
        <label for="title" class="block text-sm text-gray-700">Title</label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $performance->title ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('title')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Piece -->
    <div class="mb-4">
        <label for="piece" class="block text-sm text-gray-700">Piece</label>
        <input
            type="text"
            name="piece"
            id="piece"
            value="{{ old('piece', $performance->piece ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('piece')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

     <!-- Duration -->
<div class="mb-4">
    <label for="duration" class="block text-sm text-gray-700">Duration</label>
    <input
        type="time"
        name="duration"
        id="duration"
        value="{{ old('duration', $performance->duration ?? '') }}"
        required
        step="1"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
    />
    @error('duration')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>


    <!-- Composer -->
    <div class="mb-4">
        <label for="composer" class="block text-sm text-gray-700">Composer</label>
        <input
            type="text"
            name="composer"
            id="composer"
            value="{{ old('composer', $performance->composer ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('composer')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Musician -->
    <div class="mb-4">
        <label for="musician" class="block text-sm text-gray-700">Musician</label>
        <input
            type="text"
            name="musician"
            id="musician"
            value="{{ old('musician', $performance->musician ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('musician')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Event -->
    <div class="mb-4">
        <label for="event" class="block text-sm text-gray-700">Event</label>
        <input
            type="text"
            name="event"
            id="event"
            value="{{ old('event', $performance->event ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('event')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description -->
    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <textarea
            name="description"
            id="description"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        >{{ old('description', $performance->description ?? '') }}</textarea>
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Performance Image -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Performance Image</label>
        <input
            type="file"
            name="image"
            id="image"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Display Existing Image if Available -->
    @isset($performance->image)
        <div class="mb-4">
            <img src="{{ asset($performance->image) }}" alt="Performance image" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <!-- Submit Button -->
    <div class="flex items-center space-x-4 mt-4">
        <x-primary-button>
            {{ isset($performance) ? 'Update Performance' : 'Add Performance' }}
        </x-primary-button>

        <!-- Cancel Button / When it's clicked it runs the function confirmCancel -->
        <x-danger-button type="button" onclick="confirmCancel()">
        Cancel
    </x-danger-button>
    </div>
</form>

<!-- Confirmation Dialog Script -->
<!-- If the confirmation comes back as true (the window pop-up on the browser) it will run the code below which directs the user to the performances index page. -->
<script>
    function confirmCancel() {
        if (confirm('Are you sure you\'d like to cancel? All progress will be lost.')) {
            window.location.href = "{{ route('performances.index') }}";
        }
    }
</script>