{{-- <!DOCTYPE html>
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

            @if(session('message'))
                <div class="mb-4 p-3 bg-green-100 border-l-4 border-green-500 text-green-700">
                    {{ session('message') }}
                </div>
            @endif
            
            <!-- Display validation errors -->
            @if($errors->any())
                <div class="mb-4 p-3 bg-red-100 border-l-4 border-red-500 text-red-700">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form class="flex-grow" action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="input-field">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" autocomplete="off" placeholder="" value="" required>
                    <div class="input-highlight"></div>
                    @error('username')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-field">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" autocomplete="off" placeholder="" value="" required>
                    <div class="input-highlight"></div>
                    @error('email')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="input-field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="off" placeholder="" value="" required>
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
                
                <button type="submit" class="login-btn w-full">Daftar</button>
            </form>
        </div>
    </div>
</body>
</html> --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User ~ Sign Up</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
      }
      .auth-container {
        min-height: 90vh;
      }
      .navbar-custom {
        position: absolute;
        top: 1rem;
        left: 2rem;
      }
      .form-section {
        padding: 2rem;
        max-width: 500px;
        margin: 30px auto;
      }
      .logo-container img {
        height: 25px;
        justify-content: flex-start !important;
        padding-left: 0 !important;
      }
      .input-field {
        margin-bottom: 1.5rem;
        position: relative;
      }
      .input-field label {
        display: block;
        font-weight: 500;
      }
      .input-field input {
        width: 100%;
        border: none;
        border-bottom: 2px solid #ced4da;
        padding: 0.5rem 0;
        background-color: transparent;
        transition: border-color 0.2s;
      }
      .input-field input:focus {
        outline: none;
        border-bottom: 2px solid #7c3aed;
        box-shadow: none;
      }
      .login-btn {
        background-color: #231D4F;
        color: white;
        padding: 0.75rem;
        border: none;
        border-radius:26px;
        font-weight: 500;
        cursor: pointer;
        width: 100%;
        font-size: 1rem;
        transition: background-color 0.2s;
        margin-top: 30px;
      }
      .register-link {
        color: #0C21C1;
        text-decoration: none;
        font-weight: 500;
      }
      .register-link:hover {
        color: #9b59b6; /* Slightly darker on hover */
      }
      
      .login-btn:hover {
        background-color: #403879;
      }
      
      .google-btn {
        background-color: white;
        color: #231D4F;
        padding: 0.6rem;
        border: 1px solid #ddd;
        border-radius:26px;
        font-weight: 500;
        cursor: pointer;
        width: 100%;
        font-size: 1rem;
        transition: background-color 0.2s;
        margin-top: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
      }
      
      .google-btn:hover {
        background-color: #f8f9fa;
      }
      
      .divider {
        display: flex;
        align-items: center;
        margin: 1.5rem 0;
        color: black;
      }
      
      .divider::before,
      .divider::after {
        content: "";
        flex: 1;
        border-bottom: 1px solid #e5e7eb;
      }
      
      .divider::before {
        margin-right: 1rem;
      }
      
      .divider::after {
        margin-left: 1rem;
      }
      
      .image-section {
        background: linear-gradient(#DFDBDC, #E6DBD9, #E4CFCE, #DCBFD3, #BBB4D6);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
        padding: 2rem;
        margin-left: auto;
        margin-right: 0;
        padding: 1.5rem;
        max-width: 600px;
      }
      .image-section img {
        max-width: 50%;
        height: auto;
        object-fit: cover;
      }
      .text-red-500 {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
        display: block;
      }
      @media (max-width: 991.98px) {
        .image-section {
          display: none;      
        }
        .form-section {
          padding: 1.5rem;
        }
      }
    </style>
  </head>
  <body>
    <div class="container-fluid auth-container">
      <div class="row g-0">
        <!-- Form Section -->
        <div class="col-lg-7 d-flex align-items-center">
          <div class="logo-container d-flex mb-4 navbar-custom">
            <img src="{{ asset('image/MUAku-Icon-2.jpg.png') }}" alt="MUAku Logo" style="width: 130px; height: 60px; object-fit:cover;">
          </div>
          <div class="form-section w-100">

            <h1 class="mb-4 text-center text-login">Sign Up</h1>
            <p class="mb-4">If you already have an account<br>You can <a href="{{ route('login') }}" class="register-link">Login here!</a></p>
            
            <form action="{{ route('register.post') }}" method="POST">
              @csrf

              <div class="input-field">
                <label for="username">Username</label>
                <input type="text" id="username" name="name" placeholder="Enter your Username" required autofocus>
                @error('name')
                  <span class="text-red-500">{{ $message }}</span>
                @enderror
              </div>

              <div class="input-field">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your Email" required autofocus>
                @error('email')
                  <span class="text-red-500">{{ $message }}</span>
                @enderror
              </div>

              <div class="input-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your Password" required>
                @error('password')
                  <span class="text-red-500">{{ $message }}</span>
                @enderror
              </div>

              <button type="submit" class="login-btn">Login</button>
              
              <div class="divider">Or continue with</div>
              
              <button type="button" class="google-btn">
                <i class="bi bi-google"></i> Google
              </button>
            </form>
          </div>
        </div>

        <!-- Image Section -->
        <div class="col-lg-5 image-section pt-3" style="margin-top: 10px !important; margin-bottom: 10px !important;">
          <img src="{{ asset('image/Purple-Icon.jpg') }}" alt="Decoration">
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>