<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profil</title>

    <!-- Bootstrap & Icon CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">

    <style>
      body {
        background: linear-gradient(to bottom, #E6DBD9, #6B4D34);
        background-attachment: fixed;
        min-height: 100vh;
        padding: 20px;
      }

      .profile-container {
        max-width: 1000px;
        margin: 30px auto;
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        overflow: hidden;
      }

      .profile-header {
        background-color: #A87648;
        color: white;
        padding: 20px;
        text-align: center;
      }

      .profile-content {
        display: flex;
        flex-wrap: wrap;
        padding: 30px;
      }

      .profile-image-container {
        flex: 0 0 300px;
        text-align: center;
        position: relative;
        padding: 20px;
      }

      .profile-image {
        width: 250px;
        height: 250px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #EECFC0;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
      }

      .btn-edit-image {
        position: absolute;
        bottom: 40px;
        right: 40px;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background-color: #A87648;
        color: white;
        border: 2px solid white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .btn-edit-image:hover {
        background-color: #8a5d38;
        transform: scale(1.1);
      }

      .profile-info {
        flex: 1;
        min-width: 300px;
        padding: 20px;
      }

      .form-label {
        font-weight: 500;
        color: #6c757d;
        margin-bottom: 8px;
      }

      .form-control {
        border-radius: 8px;
        padding: 10px 15px;
        margin-bottom: 20px;
        border: 1px solid #ced4da;
      }

      .form-control:focus {
        border-color: #A87648;
        box-shadow: 0 0 0 0.25rem rgba(168, 118, 72, 0.25);
      }

      .btn-submit {
        background-color: #A87648;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
      }

      .btn-submit:hover {
        background-color: #8a5d38;
        transform: translateY(-2px);
      }

      .btn-cancel {
        border: 1px solid #ced4da;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
      }

      .file-upload {
        display: none;
      }

      .image-preview {
        max-width: 100%;
        max-height: 200px;
        display: none;
        margin-top: 15px;
        border-radius: 8px;
      }

      @media (max-width: 768px) {
        .profile-content {
          flex-direction: column;
        }
        
        .profile-image-container {
          flex: 0 0 auto;
        }
        
        .btn-edit-image {
          right: calc(50% - 22px);
          bottom: 30px;
        }
      }
    </style>
</head>
<body>

<div class="profile-container">
    <div class="profile-header">
        <h2>Edit Profil</h2>
    </div>
    
    <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        
        <div class="profile-content">
            <!-- Kolom Foto Profil - Kiri -->
            <div class="profile-image-container">
                <div class="mb-3">
                    @if ($user->foto_profil)
                        <img src="{{ Storage::url($user->foto_profil) }}" class="profile-image" id="current-profile-image" alt="Profile Picture">
                    @else
                        <img src="{{ asset('image/Profile-Foto.jpg') }}" class="profile-image" id="current-profile-image" alt="Default Profile Picture">
                    @endif
                    
                    <button type="button" class="btn-edit-image" onclick="document.getElementById('foto_profil').click()">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <input type="file" id="foto_profil" name="foto_profil" class="file-upload" accept="image/*">
                </div>
                <img id="image-preview" class="image-preview" alt="Preview Gambar">
                <p class="text-muted mt-2">Foto profil saat ini</p>
            </div>
            
            <!-- Kolom Biodata - Kanan -->
            <div class="profile-info">
                <div class="mb-3">
                    <label for="name" class="form-label">NAMA PENGGUNA</label>
                    <input type="text" id="name" name="name" class="form-control" 
                           value="{{ old('name', $user->name) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">ALAMAT EMAIL</label>
                    <input type="email" id="email" name="email" class="form-control"
                           value="{{ old('email', $user->email) }}" required>
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label">PASSWORD BARU</label>
                    <input type="password" id="password" name="password" class="form-control"
                           placeholder="Kosongkan jika tidak ingin mengubah">
                </div>
                
                <div class="d-flex gap-3 mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-cancel flex-grow-1 text-dark">Batal</a>
                    <button type="submit" class="btn btn-submit flex-grow-1">
                        <i class="bi bi-save-fill me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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
                    currentProfileImage.src = event.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>