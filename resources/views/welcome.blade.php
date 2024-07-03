<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h3 class="text-2xl font-bold mb-6 text-center">Hello there</h3>
        <p class="text-gray-600 mb-8 text-center">Enter your name to get personalized weather information.</p>
        
        <form method="POST" action="/hello">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Your Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                
                <div class="flex justify-center">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

       
  