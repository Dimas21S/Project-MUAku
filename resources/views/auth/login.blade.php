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

            @if($errors->any())
                <div class="mb-4 p-3 bg-red-100 border-l-4 border-red-500 text-red-700">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!-- Tampilkan pesan sukses registrasi -->
            @if(session('message'))
                <div class="mb-4 p-3 bg-green-100 border-l-4 border-green-500 text-green-700">
                    {{ session('message') }}
                </div>
            @endif
            
            <form class="flex-grow" action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="input-field">
                    <input type="text" id="username" name="name" autocomplete="off" placeholder="" required>
                    <label for="username">Username</label>
                    <div class="input-highlight"></div>
                    @error('name')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="input-field">
                    <input type="password" id="password" name="password" autocomplete="off" placeholder="" required>
                    <label for="password">Password</label>
                    <div class="input-highlight"></div>
                    @error('password')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
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
                <a href="{{ route('register') }}" class="text-indigo-600 font-medium">Daftar disini</a>
            </div>
        </div>
    </div>
</body>
</html>