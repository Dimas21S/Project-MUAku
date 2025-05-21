<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="min-h-screen flex items-center justify-center p-6">
    <div class="paper-container">
        <div class="back-paper"></div>
        
        <div class="front-paper">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">Register</h1>
            
            <form class="flex-grow" action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="input-field">
                    <input type="text" id="username" name="username" autocomplete="off" placeholder="" value="" required>
                    <label for="username">Username</label>
                    <div class="input-highlight"></div>
                </div>

                <div class="input-field">
                    <input type="text" id="email" name="email" autocomplete="off" placeholder="" value="" required>
                    <label for="email">Email</label>
                    <div class="input-highlight"></div>
                </div>
                
                <div class="input-field">
                    <input type="password" id="password" name="password" autocomplete="off" placeholder="" value="" required>
                    <label for="password">Password</label>
                    <div class="input-highlight"></div>
                </div>
                
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="mr-2">
                        <label for="remember" class="text-sm text-gray-600">Ingat saya</label>
                    </div>
                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500">Lupa password?</a>
                </div>
                
                <button type="submit" class="login-btn w-full">Daftar</button>
            </form>
        </div>
    </div>
</body>
</html>