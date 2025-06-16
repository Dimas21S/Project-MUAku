<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <title>Edit Paket</title>
    <style>
      :root {
        --primary: #847D9C;
        --secondary: #8FAAF8;
        --text-light: #F2EDE9;
        --text-dark: #322E2E;
      }
      
      body {
        background-color: #f8f9fa;
        font-family: 'Inter', sans-serif;
      }
      
      .container {
        max-width: 800px;
        margin-top: 2rem;
      }
      
      h2 {
        font-family: 'DM Serif Display', serif;
        color: var(--primary);
        margin-bottom: 2rem;
        text-align: center;
      }
      
      /* Package Cards */
      .package-card {
        background: #FFFFFF;
        border-radius: 16px;
        overflow: hidden;
        margin-bottom: 2rem;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      
      .package-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
      }
      
      .package-header {
        background: var(--primary);
        color: var(--text-light);
        padding: 1rem;
        font-family: 'DM Serif Display', serif;
        font-size: 1.5rem;
        text-align: center;
      }
      
      .package-body {
        padding: 1.5rem;
      }
      
      .package-detail {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
      }
      
      .detail-label {
        min-width: 120px;
        font-weight: 500;
        color: var(--primary);
      }
      
      .form-control {
        flex-grow: 1;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        border: 1px solid #ced4da;
      }
      
      .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
        padding: 0.5rem 2rem;
        border-radius: 8px;
        font-weight: 500;
      }
      
      .btn-primary:hover {
        background-color: #6a637a;
        border-color: #6a637a;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <h2>Edit Paket</h2>

        <form action="{{ route('update-package', $package->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="package-card">
              <div class="package-header">{{ $package->package_type }}</div>
              <div class="package-body">
                <div class="package-detail">
                  <span class="detail-label">Harga:</span>
                  <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $package->price }}" required>
                  </div>
                </div>
                <div class="package-detail">
                  <span class="detail-label">Deskripsi:</span>
                  <textarea class="form-control" id="description" name="description" rows="4" required>{{ $package->description }}</textarea>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
              <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>