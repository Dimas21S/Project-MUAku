<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="min-h-screen flex items-center justify-center p-6">
    <div class="paper-container">
        <!-- Lembar kertas kedua (belakang) yang miring ke kanan -->
        <div class="back-paper"></div>
        
        <!-- Lembar kertas utama (form login) -->
        <div class="front-paper">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">Login</h1>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>                
            @endif

            @if (session('status'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                    {{ session('status') }}
                </div>
            @endif

            <form class="flex-grow" action="{{ route('login-mua.post') }}" method="POST">
                @csrf
                <div class="input-field">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" autocomplete="off" required>
                    <div class="input-highlight"></div>
                </div>
                
                <div class="input-field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="off" required>
                    <div class="input-highlight"></div>
                </div>
                
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="mr-2">
                        <label for="remember" class="text-sm text-gray-600">Ingat saya</label>
                    </div>
                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500">Lupa password?</a>
                </div>
                
                <button type="submit" class="login-btn w-full">Masuk</button>
            </form>
            
            <div class="text-center text-sm text-gray-500 mt-4">
                Belum punya akun? 
                <a href="{{ route('register-mua') }}" class="text-indigo-600 font-medium">Daftar disini</a>
            </div>
        </div>
    </div>
</body>
</html>