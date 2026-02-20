<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>
<body class="font-sans antialiased
             bg-white text-gray-900
             dark:bg-gray-900 dark:text-gray-100
             transition-colors duration-300">

    <!-- Dark Mode Toggle Button -->
    <button
        id="dark-mode-toggle"
        class="fixed top-4 right-4 p-2 rounded-full
               bg-gray-200 dark:bg-gray-800
               text-gray-800 dark:text-gray-200
               shadow hover:shadow-md transition flex items-center justify-center"
    >
        <!-- Icon will be inserted via JS -->
        <span id="dark-mode-icon" class="w-6 h-6"></span>
    </button>

    @inertia

    <!-- JS for Dark Mode Toggle -->
    <script>
        const toggleBtn = document.getElementById('dark-mode-toggle');
        const icon = document.getElementById('dark-mode-icon');

        // Function to update icon
        function updateIcon() {
            if (document.documentElement.classList.contains('dark')) {
                // Moon icon
                icon.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 12.79A9 9 0 0111.21 3a7 7 0 109.79 9.79z"/>
                </svg>`;
            } else {
                // Sun icon
                icon.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 4.5a1 1 0 011 1v1.5a1 1 0 11-2 0V5.5a1 1 0 011-1zm0 12a1 1 0 011 1v1.5a1 1 0 11-2 0V17.5a1 1 0 011-1zm7.07-7.07a1 1 0 010 1.41l-1.06 1.06a1 1 0 11-1.41-1.41l1.06-1.06a1 1 0 011.41 0zm-12.14 0a1 1 0 010 1.41L5.87 11.9a1 1 0 11-1.41-1.41l1.06-1.06a1 1 0 011.41 0zM18 12a6 6 0 11-6-6 6 6 0 016 6z"/>
                </svg>`;
            }
        }

        // Load preference from localStorage on page load
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        updateIcon();

        // Toggle dark mode on click
        toggleBtn.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');

            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }

            updateIcon();
        });
    </script>

</body>
</html>