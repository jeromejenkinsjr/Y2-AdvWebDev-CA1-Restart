<div style="min-height: 100vh; background: linear-gradient(to bottom, #fee2e2, #fecaca); display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; font-family: 'Arial', sans-serif; color: #4b5563;">
    <h1 style="font-size: 2.5rem; font-weight: bold; color: #b91c1c; margin-bottom: 1rem;">
        Merry Christmas Anne, but this Page Was Not Found
    </h1>
    <p style="font-size: 1.125rem; margin-bottom: 1rem;">
        We're sorry, but the page you are looking for does not exist.
    </p>
    <p style="font-size: 1.125rem; margin-bottom: 1rem;">
        You will be redirected to the performances index in 
        <span id="countdown" style="font-weight: bold; color: #b91c1c;">5</span> seconds.
    </p>
    <p style="font-size: 1.125rem;">
        If you are not redirected, 
        <a href="{{ route('performances.index') }}" style="color: #3b82f6; text-decoration: underline;">
            click here
        </a>.
    </p>
</div>

<script>
    // Countdown logic
    let countdown = 5;
    const countdownElement = document.getElementById("countdown");

    const timer = setInterval(function () {
        countdown--;
        countdownElement.innerText = countdown;

        if (countdown <= 0) {
            clearInterval(timer); // Stop the timer when it reaches 0
            window.location.href = "{{ route('performances.index') }}"; // Redirect to the performances index
        }
    }, 1000); // Update every 1 second
</script>
