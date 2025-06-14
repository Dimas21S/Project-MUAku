<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Package Management | MUAku</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Poppins:wght@400;500;600&family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
      :root {
        --primary: #847D9C;
        --secondary: #8FAAF8;
        --danger: #AA2424;
        --text-dark: #322E2E;
        --text-light: #F2EDE9;
        --brand: #916D58;
      }
      
      body {
        min-height: 100vh;
        background: linear-gradient(180deg, #DFDBDC 9.5%, #E6DBD9 28.07%, #E4CFCE 73.83%, #D3CEE5 97.19%);
        font-family: 'Poppins', sans-serif;
        color: var(--text-dark);
      }
      
      /* Header Styles */
      .navbar {
        background: #FFFFFF;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        padding: 0.75rem 2rem;
      }
      
      .brand {
        font-family: 'DM Serif Display', serif;
        color: var(--brand);
        font-size: 1.6rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
      }
      
      .brand-logo {
        width: 50px;
        height: auto;
      }
      
      .nav-link {
        font-family: 'Inter', sans-serif;
        font-size: 1.1rem;
        color: var(--text-dark);
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
      }
      
      .logout-link {
        font-weight: 700;
      }
      
      /* Main Content */
      .main-container {
        padding: 2rem 1.5rem;
        max-width: 1400px;
        margin: 0 auto;
      }
      
      .page-title {
        font-family: 'DM Serif Display', serif;
        color: var(--primary);
        margin-bottom: 2rem;
        text-align: center;
        font-size: 2.25rem;
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
        position: relative;
      }
      
      .package-detail {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
        font-size: 1.1rem;
      }
      
      .detail-label {
        font-weight: 600;
        min-width: 120px;
        color: var(--primary);
      }
      
      .edit-btn {
        background: var(--secondary);
        color: #000;
        border: none;
        border-radius: 8px;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        position: absolute;
        right: 1.5rem;
        top: 1.5rem;
      }
      
      .edit-btn:hover {
        background: #7A9AF5;
        transform: scale(1.05);
      }
      
      /* Footer */
      .footer {
        background: #FFFFFF;
        padding: 1.5rem;
        text-align: center;
        font-family: 'Inter', sans-serif;
      }

          .icon-container {
      width: 80px;
      height: 80px;
      background-color: #e63946;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .exclamation-icon {
      color: white;
      font-size: 40px;
      font-weight: bold;
    }
      
      /* Responsive Adjustments */
      @media (max-width: 992px) {
        .nav-link {
          padding: 0.5rem 0.75rem;
          font-size: 1rem;
        }
      }
      
      @media (max-width: 768px) {
        .navbar {
          padding: 0.75rem 1rem;
        }
        
        .brand {
          font-size: 1.4rem;
        }
        
        .package-body {
          padding: 1.5rem 1rem;
        }
        
        .edit-btn {
          position: static;
          margin-top: 1rem;
          width: 100%;
          justify-content: center;
        }
        
        .package-detail {
          flex-direction: column;
          align-items: flex-start;
          gap: 0.25rem;
        }
      }
    </style>
  </head>
  <body>
    <!-- Navigation -->
    <x-navbar/>

    @if(session('status'))
      <x-modal-success :message="session('status')"/>
    @endif

    <!-- Main Content -->
    <div class="main-container">
      <h1 class="page-title">Package Management</h1>
      
      <!-- Basic Package -->
      @foreach ($packages as $package)
      <div class="package-card">
        <div class="package-header">{{ $package->package_type }}</div>
        <div class="package-body">
          <div class="package-detail">
            <span class="detail-label">Natural:</span>
          </div>
          <div class="package-detail">
            <span class="detail-label">Price:</span>
            <span>${{ $package->price }}</span>
          </div>
          <div class="package-detail">
            <span class="detail-label">Duration:</span>
          </div>
          <div class="package-detail">
            <span class="detail-label">Description:</span>
            <span>{{ $package->description }}</span>
          </div>
            <a href="{{ route('form-edit', $package->id) }}" class="btn btn-outline-secondary">
              <i class="bi bi-pencil-fill"></i> Edit
            </a>
        </div>
      </div>
      @endforeach
    </div>

    <x-modal-logout/>

    <!-- Footer -->
    <x-footer/>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function confirmLogout(event) {
        event.preventDefault();
        if (confirm('Apakah Anda yakin ingin logout?')) {
            document.getElementById('logout-form').submit();
        }
    }
    </script>
  </body>
</html>