<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css"> 

    <title>Edit Profil</title>

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
            flex-wrap: wrap;
        }

        .profile-info {
            width: 50%;
            padding-right: 50px;
            order: 1;
        }

        .profile-image-container {
            width: 50%;
            text-align: right;
            position: relative;
            order: 2;
        }

        .profile-image {
            width: 400px;
            height: 400px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #EECFC0;
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

        .btn-edit-profile {
            position: absolute;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #A87648;
            color: white;
            border: 2px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .btn-edit-profile:hover {
            background-color: #8a5d38;
            transform: scale(1.1);
        }

        .btn-submit {
            background-color: #A87648;
            color: white;
            border-radius: 10px;
        }

        .btn-submit:hover {
            background-color: #8a5d38;
        }

        @media (max-width: 992px) {
            .profile-container {
                flex-direction: column;
                align-items: center;
            }

            .profile-image-container {
                width: 100%;
                text-align: center;
                order: 0;
            }

            .profile-image {
                margin-top: 30px;
                width: 220px;
                height: 220px;
            }

            .btn-edit-profile {
                bottom: 20px;
                right: calc(50% - 25px);
            }

            .profile-info {
                width: 100%;
                padding: 20px;
                text-align: center;
                order: 1;
            }
        }
    </style>
</head>

<body>
    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Profile Edit Container -->
    <div class="profile-container">
        <!-- Form Edit Info User -->
        <div class="profile-info mt-5">
            <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Nama Lengkap -->
                <div class="mb-4">
                    <h5 class="info-label">USER NAME</h5>
                    <input type="text" name="name" class="form-control info-value" value="{{ old('name', $user->name) }}" required>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <h5 class="info-label">E-MAIL</h5>
                    <input type="email" name="email" class="form-control info-value" value="{{ old('email', $user->email) }}" required>
                </div>

                <!-- Foto Profil -->
                <div class="mb-4">
                    <h5 class="info-label">FOTO PROFIL</h5>
                    <input type="file" name="foto_profil" class="form-control" accept="image/*">
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <h5 class="info-label">DESKRIPSI</h5>
                    <textarea name="deskripsi" class="form-control info-value" rows="3">{{ old('deskripsi', $user->deskripsi) }}</textarea>
                </div>

                <!-- Tombol Submit -->
                <div class="mt-4">
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-submit">Simpan Perubahan</button>
                </div>
            </form>
        </div>

        <!-- Profile Image Preview -->
        <div class="profile-image-container">
            <div style="position: relative; display: inline-block;">
                <img src="{{ Storage::url($user->foto_profil ?? 'images/default-profile.jpg') }}"
                     class="profile-image" alt="Profile Picture">

                <!-- Tombol Edit Profil -->
                <a href="{{ route('update') }}" class="btn-edit-profile" title="Edit Profil">
                    <i class="bi bi-pencil-fill"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Navbar Bawah --}}
    <x-navbar></x-navbar>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>