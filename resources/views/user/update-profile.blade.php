<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .profile-container {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            max-width: 1200px;
            margin: 50px auto;
            flex-wrap: wrap;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-info {
            width: 50%;
            padding-right: 30px;
            order: 1;
        }

        .profile-image-container {
            width: 50%;
            text-align: center;
            position: relative;
            order: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-image-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }

        .profile-image {
            width: 350px;
            height: 350px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #EECFC0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .profile-image:hover {
            transform: scale(1.02);
        }

        .info-label {
            color: #6c757d;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-control {
            font-size: 1.1rem;
            padding: 8px 12px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            margin-bottom: 25px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #A87648;
            box-shadow: 0 0 0 0.25rem rgba(168, 118, 72, 0.25);
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
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
            padding: 10px 25px;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #8a5d38;
            transform: translateY(-2px);
        }

        .btn-cancel {
            border-radius: 10px;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background-color: #f8f9fa;
        }

        .file-upload-label {
            display: block;
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px dashed #ced4da;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 25px;
        }

        .file-upload-label:hover {
            background-color: #e9ecef;
            border-color: #A87648;
        }

        .file-upload-text {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .preview-image {
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
            display: none;
            border-radius: 8px;
        }

        @media (max-width: 992px) {
            .profile-container {
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }

            .profile-info {
                width: 100%;
                padding-right: 0;
                order: 1;
            }

            .profile-image-container {
                width: 100%;
                order: 0;
                margin-bottom: 30px;
            }

            .profile-image {
                width: 250px;
                height: 250px;
            }

            .btn-edit-profile {
                bottom: 20px;
                right: calc(50% - 25px);
            }
        }

        @media (max-width: 576px) {
            .profile-container {
                padding: 15px;
                margin: 30px auto;
            }

            .profile-image {
                width: 200px;
                height: 200px;
            }

            .form-control {
                font-size: 1rem;
            }

            .btn-submit, .btn-cancel {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
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
        <div class="profile-info mt-3">
            <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label for="name" class="info-label">NAMA PENGGUNA</label>
                    <input type="text" id="name" name="name" class="form-control" 
                           value="{{ old('name', $user->name) }}" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="info-label">ALAMAT EMAIL</label>
                    <input type="email" id="email" name="email" class="form-control" 
                           value="{{ old('email', $user->email) }}" required>
                </div>

                <!-- Foto Profil -->
                <div class="mb-3">
                    <label for="foto_profil" class="info-label">FOTO PROFIL</label>
                    <label for="foto_profil" class="file-upload-label">
                        <i class="bi bi-cloud-arrow-up fs-4"></i>
                        <p class="file-upload-text">Klik untuk mengunggah foto baru</p>
                        <img id="image-preview" class="preview-image" alt="Preview Gambar">
                    </label>
                    <input type="file" id="foto_profil" name="foto_profil" class="d-none" accept="image/*">
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label for="deskripsi" class="info-label">DESKRIPSI PROFIL</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $user->deskripsi) }}</textarea>
                </div>

                <!-- Tombol Submit -->
                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="{{ url('/profil') }}" class="btn btn-cancel flex-grow-1">Batal</a>
                    <button type="submit" class="btn btn-submit flex-grow-1">
                        <i class="bi bi-save-fill me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Profile Image Preview -->
        <div class="profile-image-container">
            <div class="profile-image-wrapper">
                <img src="{{ $user->foto_profil ? Storage::url($user->foto_profil) : asset('image/Profile-Foto.jpg') }}"
                     class="profile-image" id="current-profile-image" alt="Foto Profil Saat Ini">
                

            </div>
            <p class="text-muted">Foto profil saat ini</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Image Preview Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image preview for new upload
            const fileInput = document.getElementById('foto_profil');
            const previewImage = document.getElementById('image-preview');
            const currentProfileImage = document.getElementById('current-profile-image');
            
            fileInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        previewImage.src = event.target.result;
                        previewImage.style.display = 'block';
                        
                        // Also update the current profile image preview
                        currentProfileImage.src = event.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Edit profile button triggers file input
            document.querySelector('.btn-edit-profile').addEventListener('click', function(e) {
                e.preventDefault();
                fileInput.click();
            });
        });
    </script>
</body>
</html>