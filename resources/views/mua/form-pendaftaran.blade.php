<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Request Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #1E2772;
      --secondary: #7575BB;
      --light-bg: #EEEEEE;
      --dark-text: #332318;
      --gray-text: #555555;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--secondary);
      min-height: 100vh;
      position: relative;
      padding-bottom: 67px;
    }
    
    .page-title {
      font-family: 'DM Serif Display', serif;
      font-size: 3.5rem;
      color: var(--dark-text);
      text-align: center;
      margin: 1rem 0 2rem;
    }
    
    .form-container {
      background: white;
      border-radius: 50px;
      box-shadow: 28px 0px 50px rgba(0, 0, 0, 0.17);
      padding: 2rem;
      margin-bottom: 2rem;
    }
    
    .form-title {
      color: rgba(51, 35, 24, 0.5);
      margin-bottom: 2rem;
      text-align: center;
    }
    
    .form-group {
      margin-bottom: 1.5rem;
    }
    
    .form-label {
      color: var(--gray-text);
      margin-bottom: 0.5rem;
    }
    
    .form-control {
      background-color: var(--light-bg);
      border: none;
      border-radius: 8px;
      padding: 12px 16px;
      height: 51px;
    }
    
    textarea.form-control {
      height: 155px;
      resize: none;
    }
    
    .category-options {
      display: flex;
      gap: 2rem;
      margin-top: 1rem;
    }
    
    .form-check-input {
      margin-right: 0.5rem;
    }
    
    .btn-submit {
      background-color: var(--primary);
      color: white;
      border: none;
      border-radius: 8px;
      padding: 12px 0;
      font-weight: 600;
      width: 100%;
      box-shadow: 0px 12px 24px rgba(1, 11, 253, 0.12);
      transition: all 0.3s ease;
    }
    
    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0px 15px 30px rgba(1, 11, 253, 0.2);
    }

      .success-modal .modal-content {
        border: 3px solid #000000;
        border-radius: 16px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
      }
      
      .success-icon {
        width: 111px;
        height: 111px;
        margin: 0 auto 20px;
        position: relative;
      }
      
      .icon-background {
        width: 100%;
        height: 100%;
        background: #79B33E;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      
      .icon-background::after {
        content: "✓";
        color: white;
        font-size: 50px;
        font-weight: bold;
      }
      
      .success-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 20px;
        text-align: center;
        color: #000000;
        margin-bottom: 10px;
      }
      
      .success-message {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 16px;
        text-align: center;
        color: #000000;
        margin-bottom: 20px;
      }
      
      .modal-footer {
        border-top: none;
        justify-content: center;
      }
    
    .footer {
      background: white;
      padding: 20px 0;
      text-align: center;
      position: absolute;
      bottom: 0;
      width: 100%;
    }
    
    @media (max-width: 992px) {
      .page-title {
        font-size: 2.5rem;
      }
      
      .category-options {
        flex-direction: column;
        gap: 1rem;
      }
      
      .form-container {
        border-radius: 30px;
      }
    }
    
    @media (max-width: 576px) {
      .page-title {
        font-size: 2rem;
      }
      
      .form-container {
        padding: 1.5rem;
        border-radius: 20px;
      }
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <h1 class="page-title">Submit Request</h1>
    
    <p class="form-title">Please fill out the form below</p>
    
    <div class="form-container">
      <form action="{{ route('post.pendaftaran') }}" method="POST" enctype="multipart/form-data" id="muaForm">
        @csrf
        <div class="row">
          <!-- Left Column -->
          <div class="col-lg-6">
            <div class="form-group">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name">
              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
              @error('phone')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="link_map" placeholder="Enter your link gmap location">
              @error('link_map')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          
          <!-- Right Column -->
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-label">Category</label>
              <div class="category-options">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="category" id="category1" value="Pesta dan Acara">
                  <label class="form-check-label" for="category1">Pesta dan Acara</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="category" id="category2" value="Pengantin">
                  <label class="form-check-label" for="category2">Pengantin</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="category" id="category3" value="Pengantin">
                  <label class="form-check-label" for="category3">Artistik</label>
                </div>
              </div>
              @error('category')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="description" class="form-label">Experience</label>
              <textarea class="form-control" id="description" name="deskripsi" placeholder="Describe your experience"></textarea>
              @error('deskripsi')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="sertifikat" class="form-label">Certificate</label>
              <div class="input-group">
                <input type="file" class="form-control" id="sertifikat" name="portfolio" placeholder="Upload certificate" accept=".jpg,.jpeg,.png,.pdf">
                <span class="input-group-text bg-dark text-white">
                  <i class="bi bi-upload"></i>
                </span>
                @error('portfolio')
                  <span class="text-danger">{{ $message }}</span>                  
                @enderror
              </div>
            </div>
          </div>
        </div>
        
        <div class="d-grid mt-4">
          <button type="submit" class="btn btn-submit">Submit Request</button>
        </div>
      </form>
    </div>
  </div>

  @if (session('status'))
    <x-modal-success :message="session('status')" />
  @endif
  
  <footer class="footer">
    <p class="footer-text m-0">© 2023 All Rights Reserved</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <script>
        document.getElementById('sertifikat').addEventListener('change', function(e) {
      const fileInfo = document.getElementById('fileInfo');
      if (this.files.length > 0) {
        const file = this.files[0];
        fileInfo.innerHTML = `File terpilih: ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
        fileInfo.style.color = '#4CAF50';
      } else {
        fileInfo.innerHTML = 'Format: JPG, PNG, PDF (Maks. 5MB)';
        fileInfo.style.color = '';
      }
    });
  </script>

      @if(session('status'))
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
      });
    </script>
    @endif
</body>
</html>