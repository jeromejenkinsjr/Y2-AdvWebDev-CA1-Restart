<div class="min-h-screen bg-red-100 flex flex-col justify-center items-center text-center">
    <h1 class="text-4xl font-bold text-red-700 mb-4">Merry Christmas Anne, but this Page Was Not Found</h1>
    <p class="text-lg text-gray-700 mb-4">
        We're sorry, but the performance you are looking for does not exist.
    </p>
    <p class="text-lg text-gray-700 mb-4">
        You will be redirected to the performances index in 
        <span id="countdown" class="font-bold text-red-700">5</span> seconds.
    </p>
    <p class="text-lg">
        If you are not redirected, 
        <a href="{{ route('performances.index') }}" class="text-blue-500 hover:underline">
            click here
        </a>.
    </p>
</div>

<script>
    // Countdown logic
    let countdown = 5;
    const countdownElement = document.getElementById("countdown");

    const timer = setInterval(function() {
        countdown--;
        countdownElement.innerText = countdown;

        if (countdown <= 0) {
            clearInterval(timer); // Stop the timer when it reaches 0
            window.location.href = "{{ route('performances.index') }}"; // Redirect to the performances index
        }
    }, 1000); // Update every 1 second
</script>
