<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Request MUA</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/form-submit-request.css') }}">
</head>
<body>

  <button class="back-button" onclick="window.history.back()">
    <i class="fas fa-arrow-left"></i>
  </button>

  <div class="container">
    <div class="header">
      <h1>SUBMIT REQUEST</h1>
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <p>Isi formulir ini untuk mengajukan permintaan bergabung sebagai Make-Up Artist (MUA) di platform kami.</p>
    </div>

    <form class="form" action="{{ route('post.pendaftaran') }}" method="POST" enctype="multipart/form-data" id="muaForm">
      @csrf

      @if($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="name" placeholder="Masukkan Nama Asli Anda Sesuai KTP" required>
      </div>

      <div class="form-group">
        <label for="category">Kategori</label>
        <select id="category" name="category" required>
          <option value="" disabled selected>Pilih Kategori MUA Anda</option>
          <option value="Pesta dan Acara">Pesta dan Acara</option>
          <option value="Pengantin">Pengantin</option>
          <option value="Editorial">Editorial</option>
          <option value="Artistik">Artistik</option>
        </select>
      </div>

      <div class="form-group">
        <label for="phone">No. Telepon</label>
        <input type="text" id="phone" name="phone" placeholder="Masukkan No. Telepon Aktif" required>
      </div>

      <div class="form-group">
        <label for="link_map">Link Gmaps</label>
        <input type="text" id="link_map" name="link_map" placeholder="Masukkan Link Gmaps" required>
      </div>

      <div class="form-group">
        <label for="city">Kota</label>
        <select id="city" name="city" required>
          <option value="" disabled selected>Pilih Kota Anda</option>
          <option value="Jambi">Jambi</option>
        </select>
      </div>

      <div class="form-group">
        <label for="deskripsi">Jelaskan Secara Singkat Pengalaman Anda</label>
        <textarea id="deskripsi" name="deskripsi" placeholder="Jelaskan secara singkat pengalaman Anda sebagai MUA dan keunggulan layanan Anda" required></textarea>
      </div>

      <div class="form-group">
        <label for="photos">Upload Foto:</label>
        <input type="file" name="photos[]" multiple accept="image/*">
        <div class="file-info">Format: JPG, PNG (Maks. 5MB per file)</div>
      </div>

      <div class="form-group">
        <label for="sertifikat">Sertifikat MUA (Portofolio)</label>
        <div class="upload">
          <input type="file" id="sertifikat" name="portfolio" accept="image/*,.pdf" required>
          <label for="sertifikat">
            <i class="fas fa-cloud-upload-alt"></i>
            <span>Unggah Sertifikat/Portofolio Anda</span>
          </label>
          <div class="file-info" id="fileInfo">Format: JPG, PNG, PDF (Maks. 5MB)</div>
        </div>
      </div>

      <button type="submit" class="submit-btn">
        <i class="fas fa-paper-plane"></i> SUBMIT PENDAFTARAN
      </button>
      
      <div class="form-footer">
        Data yang Anda berikan akan dijaga kerahasiaannya
      </div>
    </form>
  </div>

  <script>
    // File upload display
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
    
    // Form validation
    document.getElementById('muaForm').addEventListener('submit', function(e) {
      const inputs = this.querySelectorAll('input[required], textarea[required], select[required]');
      let isValid = true;
      
      inputs.forEach(input => {
        if (!input.value.trim()) {
          input.style.borderColor = 'red';
          isValid = false;
        } else {
          input.style.borderColor = '';
        }
      });
      
      if (!isValid) {
        e.preventDefault();
        alert('Harap lengkapi semua field yang wajib diisi!');
      }
    });
  </script>
</body>
</html>