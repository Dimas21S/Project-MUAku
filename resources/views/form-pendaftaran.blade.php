<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Request MUA</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'DM Serif Display', serif;
    }

    .container {
      width: 1265px;
      height: 800px;
      background-color: #fff;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .header {
      background: linear-gradient(to right, #eac1b1, #e4b8a3);
      padding: 24px;
      text-align: center;
    }

    .header h1 {
      margin: 0;
      font-size: 62.52px;
      font-weight: bold;
      color: #3a1d0d;
    }

    .header p {
      margin-top: 8px;
      color: #4d3d38;
      font-size: 14px;
    }

    .form {
      padding: 24px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 8px;
      color: #2e1c14;
    }

    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 12px;
      border-radius: 10px;
      border: none;
      background-color: #eac1b1;
      font-size: 14px;
      box-sizing: border-box;
    }

    textarea {
      resize: vertical;
      min-height: 100px;
    }

    .upload {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .upload input[type="file"] {
      display: none;
    }

    .upload label {
      background-color: #eac1b1;
      padding: 12px;
      border-radius: 10px;
      cursor: pointer;
      width: 100%;
    }

    .submit-btn {
      display: block;
      width: 40%; 
      padding: 14px;
      background-color: #3a1d0d;
      color: #fff;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      margin: 10px auto; 
    }

    .back-button {
      position: absolute;
      top: 20px;
      left: 20px;
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
    }

  </style>
</head>
<body>

  <button class="back-button">&#8592;</button>

  <div class="container">
    <div class="header">
      <h1>SUBMIT REQUEST</h1>
      <p>Isi formulir ini untuk mengajukan permintaan<br>
        bergabung sebagai Make-Up Artist (MUA) di platform kami.</p>
    </div>

    <form class="form">
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" placeholder="Masukkan Nama Asli Anda Sesuai KTP">
      </div>

      <div class="form-group">
        <label for="panggilan">Nama Panggilan MUA</label>
        <input type="text" id="panggilan" placeholder="Contoh : MakeUp BY">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Masukkan Email Aktif">
      </div>

      <div class="form-group">
        <label for="pengalaman">Jelaskan Secara Singkat Pengalaman Anda</label>
        <textarea id="pengalaman" placeholder="Jelaskan secara singkat pengalaman Anda sebagai MUA dan keunggulan layanan Anda"></textarea>
      </div>

      <div class="form-group">
        <label for="sertifikat">Sertifikat MUA</label>
        <div class="upload">
          <label for="sertifikat">📷 Masukkan sertifikat MUA</label>
          <input type="file" id="sertifikat">
        </div>
      </div>

      <button type="submit" class="submit-btn">SUBMIT</button>
    </form>
  </div>

</body>
</html>