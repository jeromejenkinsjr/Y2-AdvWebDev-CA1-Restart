<div class="container text-center">
    <h1>Merry Christmas Anne, but this Page Was Not Found</h1>
    <p>We're sorry, but the performance you are looking for does not exist.</p>
    <p>You will be redirected to the performances index in <span id="countdown">5</span> seconds.</p>
    <p>If you are not redirected, <a href="{{ route('performances.index') }}">click here</a>.</p>
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
