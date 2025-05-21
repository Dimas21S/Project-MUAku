<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Request MUA</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    :root {
      --primary: #D4A373;
      --primary-dark: #A37A5B;
      --secondary: #FAEDCD;
      --dark: #3A1D0D;
      --light: #FEFAE0;
      --text: #2E1C14;
      --text-light: #4D3D38;
    }
    
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--light);
      color: var(--text);
      line-height: 1.6;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    
    .back-button {
      position: fixed;
      top: 30px;
      left: 30px;
      background-color: var(--primary);
      color: white;
      border: none;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      font-size: 18px;
      cursor: pointer;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
      z-index: 100;
    }
    
    .back-button:hover {
      background-color: var(--primary-dark);
      transform: translateX(-3px);
    }
    
    .container {
      width: 100%;
      max-width: 800px;
      background-color: #fff;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }
    
    .container:hover {
      transform: translateY(-5px);
    }
    
    .header {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      padding: 30px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    
    .header::after {
      content: "";
      position: absolute;
      bottom: -50px;
      right: -50px;
      width: 150px;
      height: 150px;
      background-color: rgba(255,255,255,0.1);
      border-radius: 50%;
    }
    
    .header::before {
      content: "";
      position: absolute;
      top: -30px;
      left: -30px;
      width: 100px;
      height: 100px;
      background-color: rgba(255,255,255,0.1);
      border-radius: 50%;
    }
    
    .header h1 {
      margin: 0;
      font-size: 2.5rem;
      font-weight: 700;
      color: white;
      font-family: 'Playfair Display', serif;
      position: relative;
      z-index: 1;
    }
    
    .header p {
      margin-top: 10px;
      color: rgba(255,255,255,0.9);
      font-size: 1rem;
      position: relative;
      z-index: 1;
    }
    
    .form {
      padding: 30px;
    }
    
    .form-group {
      margin-bottom: 25px;
      position: relative;
    }
    
    label {
      font-weight: 500;
      display: block;
      margin-bottom: 8px;
      color: var(--dark);
      font-size: 0.95rem;
    }
    
    input[type="text"],
    input[type="email"],
    textarea,
    select {
      width: 100%;
      padding: 15px;
      border-radius: 10px;
      border: 2px solid #e0e0e0;
      background-color: white;
      font-size: 1rem;
      transition: all 0.3s ease;
      font-family: 'Poppins', sans-serif;
      appearance: none;
      -webkit-appearance: none;
      background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right 15px center;
      background-size: 1em;
    }
    
    input[type="text"]:focus,
    input[type="email"]:focus,
    textarea:focus,
    select:focus {
      border-color: var(--primary);
      outline: none;
      box-shadow: 0 0 0 3px rgba(212, 163, 115, 0.2);
    }
    
    textarea {
      resize: vertical;
      min-height: 120px;
      background-image: none;
    }
    
    .upload {
      position: relative;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    
    .upload input[type="file"] {
      position: absolute;
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .upload label {
      background-color: var(--secondary);
      padding: 15px;
      border-radius: 10px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      transition: all 0.3s ease;
      border: 2px dashed var(--primary);
    }
    
    .upload label:hover {
      background-color: rgba(212, 163, 115, 0.1);
    }
    
    .file-info {
      font-size: 0.85rem;
      color: var(--text-light);
      margin-top: 5px;
    }
    
    .submit-btn {
      display: block;
      width: 60%;
      padding: 16px;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      margin: 30px auto 10px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    .submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }
    
    .submit-btn:active {
      transform: translateY(0);
    }
    
    .form-footer {
      text-align: center;
      margin-top: 20px;
      font-size: 0.85rem;
      color: var(--text-light);
    }
    
    @media (max-width: 768px) {
      .container {
        width: 95%;
      }
      
      .header h1 {
        font-size: 2rem;
      }
      
      .submit-btn {
        width: 80%;
      }
      
      .back-button {
        top: 15px;
        left: 15px;
      }
    }
  </style>
</head>
<body>

  <button class="back-button" onclick="window.history.back()">
    <i class="fas fa-arrow-left"></i>
  </button>

  <div class="container">
    <div class="header">
      <h1>SUBMIT REQUEST</h1>
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
          <option value="MakeUp BY">MakeUp BY</option>
          <option value="Bridal Makeup">Bridal Makeup</option>
          <option value="Editorial Makeup">Editorial Makeup</option>
          <option value="Character Makeup">Character Makeup</option>
          <option value="Special Effects Makeup">Special Effects Makeup</option>
          <option value="Fashion Makeup">Fashion Makeup</option>
          <option value="Beauty Makeup">Beauty Makeup</option>
        </select>
      </div>

      <div class="form-group">
        <label for="phone">No. Telepon</label>
        <input type="text" id="phone" name="phone" placeholder="Masukkan No. Telepon Aktif" required>
      </div>

      <div class="form-group">
        <label for="address">Alamat</label>
        <select id="address" name="address" required>
          <option value="" disabled selected>Pilih Provinsi Anda</option>
          <option value="DKI Jakarta">DKI Jakarta</option>
          <option value="Jawa Barat">Jawa Barat</option>
          <option value="Jawa Tengah">Jawa Tengah</option>
          <option value="Jawa Timur">Jawa Timur</option>
          <option value="Banten">Banten</option>
          <option value="DI Yogyakarta">DI Yogyakarta</option>
          <option value="Bali">Bali</option>
          <option value="Sumatera Utara">Sumatera Utara</option>
          <option value="Sumatera Barat">Sumatera Barat</option>
          <option value="Riau">Riau</option>
          <option value="Kepulauan Riau">Kepulauan Riau</option>
          <option value="Jambi">Jambi</option>
          <option value="Sumatera Selatan">Sumatera Selatan</option>
          <option value="Bangka Belitung">Bangka Belitung</option>
          <option value="Bengkulu">Bengkulu</option>
          <option value="Lampung">Lampung</option>
          <option value="Kalimantan Barat">Kalimantan Barat</option>
          <option value="Kalimantan Tengah">Kalimantan Tengah</option>
          <option value="Kalimantan Selatan">Kalimantan Selatan</option>
          <option value="Kalimantan Timur">Kalimantan Timur</option>
          <option value="Kalimantan Utara">Kalimantan Utara</option>
          <option value="Sulawesi Utara">Sulawesi Utara</option>
          <option value="Sulawesi Tengah">Sulawesi Tengah</option>
          <option value="Sulawesi Selatan">Sulawesi Selatan</option>
          <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
          <option value="Gorontalo">Gorontalo</option>
          <option value="Sulawesi Barat">Sulawesi Barat</option>
          <option value="Maluku">Maluku</option>
          <option value="Maluku Utara">Maluku Utara</option>
          <option value="Papua Barat">Papua Barat</option>
          <option value="Papua">Papua</option>
          <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
          <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
          <option value="Aceh">Aceh</option>
        </select>
      </div>

      <div class="form-group">
        <label for="pengalaman">Jelaskan Secara Singkat Pengalaman Anda</label>
        <textarea id="pengalaman" name="deskripsi" placeholder="Jelaskan secara singkat pengalaman Anda sebagai MUA dan keunggulan layanan Anda" required></textarea>
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