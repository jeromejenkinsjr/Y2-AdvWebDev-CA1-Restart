<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.23/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            overflow: hidden;
            display: flex;
            width: 100%;
            font-family: 'Nunito', sans-serif;
        }
        #left-section {
            flex: 3;
            height: 100%;
        }
        #background-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        #side-container {
            flex: 1;
            height: 100%;
            background-color: #202124; /* Updated to anthracite grey */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #side-container h1 {
            color: white;
            font-size: 2rem; /* text-2xl equivalent */
            margin-bottom: 1rem;
        }

        .button {
            background-color: #4A5568; /* gray-600 */
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem; /* rounded-md */
            text-align: center;
            font-size: 1.125rem; /* text-lg */
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
            width: 80%;
        }

        .button:hover {
            background-color: #2D3748; /* gray-700 */
        }

        .button img {
            width: 1.5rem; /* Image size */
            height: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Left Section with Image -->
    <div id="left-section">
        <img id="background-image" src="images/logbg.jpeg" alt="Background Image">
    </div>

    <!-- Right Section with Anthracite Grey Background -->
    <div id="side-container">
        <h1>Pinnacle Performance</h1>

        <!-- Login / Dashboard Button -->
        @if (Route::has('login'))
            @auth
                <a href="/dashboard" class="button">Dashboard</a>
            @else
                <a href="/login" class="button">Login</a>
                <a href="/register" class="button">Sign Up</a>
            @endauth
        @endif

        <!-- Google Login Button (Static for Now) -->
        <div class="button">
            Sign in with
            <img src="data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 150 150' width='24' height='24' fill='%23FFFFFF'%3E%3Cpath d='M120 76.1c0-3.1-0.3-6.3-0.8-9.3H75.9v17.7h24.8c-1 5.7-4.3 10.7-9.2 13.9l14.8 11.5C115 101.8 120 90 120 76.1L120 76.1zM75.9 120.9c12.4 0 22.8-4.1 30.4-11.1L91.5 98.4c-4.1 2.8-9.4 4.4-15.6 4.4-12 0-22.1-8.1-25.8-18.9L34.9 95.6C42.7 111.1 58.5 120.9 75.9 120.9zM50.1 83.8c-1.9-5.7-1.9-11.9 0-17.6L34.9 54.4c-6.5 13-6.5 28.3 0 41.2L50.1 83.8zM75.9 47.3c6.5-0.1 12.9 2.4 17.6 6.9L106.6 41C98.3 33.2 87.3 29 75.9 29.1c-17.4 0-33.2 9.8-41 25.3l15.2 11.8C53.8 55.3 63.9 47.3 75.9 47.3z'%3E%3C/path%3E%3C/svg%3E" alt="Google Logo">
        </div>

        <!-- GitHub Login Button (Static for Now) -->
        <div class="button">
            Sign in with
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/91/Octicons-mark-github.svg" alt="GitHub Logo" style="filter: brightness(0) invert(1);">
        </div>

    </div>
</body>
</html>
