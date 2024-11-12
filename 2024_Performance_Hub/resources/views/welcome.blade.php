<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.23/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

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
            font-family: 'Bebas Neue', serif;
            color: white;
            font-size: 4rem;
            margin-bottom: 0;
            margin-top: 0;
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
        .hover-effect {
    transition: fill 0.3s ease-in-out, stroke 0.3s ease-in-out; /* Smooth transition for fill and stroke */
}

.hover-effect:hover {
    fill: #d4af37; /* Change fill to gold */
    stroke: #d4af37; /* Change stroke to gold */
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
    <svg class="hover-effect" fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 433.43 433.43" xml:space="preserve" stroke="#ffffff" width="50" height="50">
    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
    <g id="SVGRepo_iconCarrier"> 
        <g> 
            <path d="M165.156,176.583c-16.007,20.073-24.81,40.457-26.128,60.599c-1.475,22.705,5.003,44.281,19.273,64.099 c15.118,21.119,34.22,32.572,56.759,34.047c7.574,0.497,14.7,0.288,21.276-0.597c1.35,7.649,2.709,15.252,3.971,22.781 c1.567,10.176,2.124,19.008,1.644,26.241c-0.661,9.998-3.779,18.178-9.294,24.321c-5.963,6.628-13.396,9.533-22.826,8.92 c-4.105-0.269-7.722-1.326-10.904-3.201c3.745-0.862,7.145-2.469,10.119-4.785c5.761-4.469,8.989-10.965,9.521-19.28 c0.503-7.999-1.529-14.995-6.067-20.778c-4.827-6.332-11.389-9.818-19.5-10.355c-8.283-0.545-15.797,2.806-21.957,9.807 c-5.474,6.199-8.54,13.493-9.061,21.68c-0.797,12.227,3.847,22.67,13.85,31.026c8.771,7.321,19.272,11.421,31.22,12.202 c6.792,0.445,13.354-0.337,19.466-2.328c5.021-1.635,9.842-4.12,14.366-7.37c10.94-7.878,16.88-18.182,17.692-30.656 c0.63-9.506,0.148-20.767-1.454-33.603l-4.464-28.918c11.425-3.814,21.007-10.707,28.473-20.462 c7.926-10.303,12.391-22.47,13.296-36.167c1.103-16.823-2.913-32.079-11.962-45.34c-9.918-14.543-23.52-22.478-40.406-23.582 c-1.948-0.126-3.988-0.112-6.12,0.046l-4.744-35.516c13.168-11.257,23.832-25.409,31.723-42.092 c7.798-16.574,12.383-34.514,13.608-53.305c0.718-11.046-0.797-24.754-4.508-40.761c-5.086-21.718-12.335-32.586-22.201-33.238 c-3.49-0.218-7.33,1.557-12.015,5.677c-11.377,10.285-19.656,22.728-24.609,36.96c-3.833,10.87-6.368,25.403-7.548,43.208 c-0.579,8.869,0.826,23.942,4.328,46.059C189.015,150.517,173.957,165.542,165.156,176.583z M263.455,274.041 c0,11.63-5.743,31.162-13.754,35.931l-8.264-62.556C253.949,249.816,263.455,260.833,263.455,274.041z M222.484,104.798 c0.739-11.339,3.589-23.646,8.478-36.562c6.196-16.16,12.071-21.043,15.895-22.293c1.05-0.336,2.079-0.471,3.157-0.399 c5.001,0.331,9.982,2.447,9.125,15.659c-0.722,11.197-5.17,23.064-13.188,35.281c-6.452,9.851-13.95,18.074-22.31,24.501 C222.471,116.385,222.072,110.961,222.484,104.798z M216.199,181.34l3.266,26.908c-9.077,3.75-16.99,9.682-23.568,17.665 c-7.578,9.289-11.79,19.532-12.499,30.429c-0.735,11.305,1.797,21.664,7.514,30.741c2.974,4.837,7.063,9.137,11.76,12.643 c7.7,5.727,16.575,5.294,17.985,2.177c1.429-3.106-3.845-7.991-7.993-14.515c-2.36-3.688-3.506-8.123-3.506-13.337 c0-11.073,6.672-20.578,16.186-24.802l8.909,69.388c-4.745,0.982-10.055,1.295-15.824,0.922 c-14.815-0.974-28.044-7.069-39.347-18.153c-11.806-11.51-17.1-24.197-16.149-38.78 C164.754,235.014,182.669,207.692,216.199,181.34z"></path> 
        </g> 
    </g>
</svg>
    <h1 class="bebas-neue-regular">
        <span class="block">Pinnacle</span></h1>
        <h1 class="bebas-neue-regular">   <span class="block">Performance</span></h1>

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
