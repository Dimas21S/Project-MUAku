<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User Profile</title>
    <style>
        body {
            background: linear-gradient(#EECFC0, #F6F6F6);
            background-attachment: fixed;
            background-size: cover;
            min-height: 100vh;
            padding: 20px;
        }
        
        .profile-container {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            max-width: 1200px;
            margin: 50px auto;
        }
        
        .profile-info {
            width: 50%;
            padding-right: 50px;
        }
        
        .profile-image-container {
            width: 50%;
            text-align: right;
        }
        
        .profile-image {
            width: 400px;
            height: 400px;
            object-fit: cover;
            border-radius: 50%;
        }
        
        .info-label {
            color: #6c757d;
            font-weight: 500;
            margin-bottom: 5px;
        }
        
        .info-value {
            font-size: 1.1rem;
            padding-bottom: 8px;
            border-bottom: 1px solid #212529;
            margin-bottom: 25px;
        }
        
        .email-link {
            color: inherit;
            text-decoration: none;
        }
        
        @media (max-width: 992px) {
            .profile-container {
                flex-direction: column;
            }
            .profile-info,
            .profile-image-container {
                width: 100%;
                text-align: center;
                padding-right: 0;
            }
            .profile-image {
                margin-top: 30px;
                width: 300px;
                height: 300px;
            }
        }
    </style>
  </head>
  <body>
    <div class="profile-container">
        <!-- Profile Info Section (Left) -->
        <div class="profile-info">
            <div class="mb-4">
                <h5 class="info-label">USER NAME</h5>
                <p class="info-value">{{$user->name}}</p>
            </div>
            
            <div class="mb-4">
                <h5 class="info-label">E-MAIL</h5>
                <p class="info-value">{{$user->email}}</p>
            </div>
            
            <div class="mb-4">
                <h5 class="info-label">PASSWORD</h5>
                <p class="info-value">********</p>
            </div>
            
            <div class="mb-4">
                <h5 class="info-label">DESKRIPSI</h5>
                <p class="info-value">
                    aku seorang pelaut yang suka beraktifitas menggunakan make up, 
                    di bawah terik matahari di lautan lepas samudra.
                </p>
            </div>
        </div>
        
        <!-- Profile Image Section (Right) -->
        <div class="profile-image-container">
            <img src="{{ asset('image/foto-cewek-5.jpg') }}" class="profile-image" alt="Profile Picture">
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>