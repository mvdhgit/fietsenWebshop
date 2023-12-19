<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Webshop</title>
    <!-- Include your CSS and JavaScript files here -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Include any additional CSS or JavaScript libraries here -->
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('products.index') }}">Products</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>
    
    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Your footer content here -->
    </footer>

    <!-- Include any JavaScript scripts here -->
</body>
</html>
