<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MUAku - Connecting clients with professional makeup artists">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>MUAku - Find Professional Makeup Artists</title>

    <style>
      :root {
        --primary-color: #A87648;
        --secondary-color: #2D275E;
        --light-bg: #F2F0F4;
      }
      
      body {
        font-family: 'Red Hat Display', sans-serif;
        color: #333;
        overflow-x: hidden;
      }
      
      .navbar-brand {
        font-family: 'DM Serif Display', serif;
        font-weight: 400;
        color: var(--primary-color);
        font-size: 48px;
      }

      .nav-link {
        font-weight: 500;
        margin: 0 15px;
        font-size: 29px;
        color: #000000;
        transition: color 0.3s ease;
      }

      .nav-link:hover {
        color: var(--primary-color) !important;
      }

      .collection-heading {
        font-family: 'DM Serif Display', serif;
        font-weight: 400;
        font-size: 77px;
        line-height: 1.2;
        margin-bottom: 40px;
      }

      .new-coming {
        font-family: 'Red Hat Display', sans-serif;
        font-weight: 400;
        font-style: italic;
        font-size: 38px;
        margin-bottom: 10px;
        margin-top: 50px;
      }

      .btn-login {
        font-family: 'Red Hat Display', sans-serif;
        background-color: var(--primary-color);
        color: black;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 750;
        margin-top: 40px;
        border: none;
        transition: all 0.3s ease;
      }

      .btn-login:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
      }

      .btn-register {
        font-family: 'Red Hat Display', sans-serif;
        background-color: transparent;
        border: 2px solid var(--primary-color);
        color: black;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 750;
        margin-top: 40px;
        transition: all 0.3s ease;
      }

      .btn-register:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
      }

      .hero-bg {
        background-image: url("image/background-landing-page.jpg");
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 90vh;
        position: relative;
      }

      .overlay-content {
        position: absolute;
        top: 50%;
        left: 10%;
        transform: translateY(-50%);
        color: white;
      }

      .feature-card {
        background-color: var(--light-bg);
        border: 2px solid var(--primary-color);
        border-radius: 10px;
        height: 100%;
        transition: transform 0.3s ease;
      }
      
      .feature-card:hover {
        transform: translateY(-10px);
      }
      
      .feature-icon {
        height: 90px;
        object-fit: contain;
        margin-bottom: 20px;
      }
      
      .card-title {
        font-family: 'DM Serif Display', serif;
        color: var(--primary-color);
      }
      
      footer {
        background: linear-gradient(to bottom, var(--secondary-color), #5E51C4);
        color: white;
        padding: 60px 0 30px;
      }
      
      .footer-link {
        color: rgba(255,255,255,0.7);
        text-decoration: none;
        transition: color 0.3s ease;
      }
      
      .footer-link:hover {
        color: white;
      }
      
      .modal-content {
        background-color: #3323185C;
        border: 2px solid #ffffff;
        box-shadow: -10px 10px 1px rgba(0,0,0,0.3);
      }
      
      .modal-title {
        font-family: 'DM Serif Display', serif;
        color: white;
      }

      .why-choose-us {
            padding: 100px 0;
            background-color: var(--white);
        }
        
        .section-subtitle {
            font-family: 'Gilroy', sans-serif;
            font-weight: 700;
            font-size: 13px;
            line-height: 16px;
            letter-spacing: 1.625px;
            text-transform: uppercase;
            color: #F64B4B;
            text-align: center;
        }
        
        .section-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 40px;
            line-height: 48px;
            text-align: center;
            letter-spacing: -1.2px;
            color: #161C2D;
            margin: 20px 0 60px;
        }
        
        .benefit-card {
            margin-bottom: 40px;
        }
        
        .benefit-icon {
            width: 90px;
            height: 90px;
            background-color: rgba(70, 59, 240, 0.1);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .benefit-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 20px;
            line-height: 32px;
            letter-spacing: -0.5px;
            color: var(--dark-text);
        }
        
        .benefit-desc {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 15px;
            line-height: 32px;
            letter-spacing: -0.5px;
            color: var(--gray-text);
        }

           
        /* CTA Section */
        .cta-section {
            /* background: linear-gradient(90deg, #2D275E 16.83%, #5E51C4 68.75%); */
            padding: 50px 0;
            color: black;
        }
        
        .cta-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 32px;
            line-height: 32px;
            letter-spacing: -0.5px;
        }
        
        .cta-desc {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 15px;
            line-height: 32px;
            letter-spacing: -0.5px;
        }
        
        .cta-btn {
            background-color: #473BF0;
            border-radius: 8px;
            color: white;
            font-family: 'Gilroy', sans-serif;
            font-size: 17px;
            line-height: 32px;
            letter-spacing: -0.6px;
            padding: 10px 30px;
        }

                /* Gallery Section */
        .gallery-section {
        background: linear-gradient(to bottom, #ffffff 50%, var(--secondary-color));
      }
      
      .gallery-title {
          font-family: 'DM Serif Display', serif;
          font-size: 2.5rem;
          color: #7F6EBC;
      }
      
      .gallery-desc {
          font-family: 'Poppins', sans-serif;
          font-size: 1.1rem;
          color: #696969;
          line-height: 1.8;
      }
      
      .gallery-img-container {
          transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      
      .gallery-img-container:hover {
          transform: translateY(-5px);
          box-shadow: 0 15px 30px rgba(0,0,0,0.1);
      }

      .paper-plane-container {
          animation: float 3s ease-in-out infinite;
      }
      
      .paper-plane:hover {
          transform: rotate(15deg) scale(1.1);
      }
      
      @keyframes float {
          0%, 100% {
              transform: translateY(0);
          }
          50% {
              transform: translateY(-15px);
          }
      }
      
      /* Responsive adjustments */
      @media (max-width: 1440px) {
        .navbar-brand { font-size: 40px; }
        .nav-link { font-size: 24px; margin: 0 10px; }
        .collection-heading { font-size: 64px; }
        .new-coming { font-size: 32px; margin-top: 40px; }
        .btn-login, .btn-register { padding: 10px 25px; font-size: 16px; }
      }

      @media (max-width: 1199.98px) {
        .navbar-brand { font-size: 36px; }
        .nav-link { font-size: 20px; }
        .collection-heading { font-size: 56px; }
        .new-coming { font-size: 28px; }
      }

      @media (max-width: 992px) {
        .navbar-brand { font-size: 2rem; }
        .collection-heading { font-size: 3rem; }
        .nav-link { font-size: 1rem; padding: 0.5rem; }
        .overlay-content { left: 5%; }
      }

      @media (max-width: 768px) {
        .navbar-brand { font-size: 1.75rem; }
        .new-coming { font-size: 1.5rem; margin-top: 1.5rem; }
        .collection-heading { font-size: 2.5rem; }
        .btn-custom { margin-top: 1.5rem; padding: 0.6rem 1.5rem; }
        .hero-bg { height: 70vh; }
      }

      @media (max-width: 576px) {
        .collection-heading { font-size: 2rem; }
        .d-flex { flex-direction: column; gap: 0.75rem; }
        .btn-custom { width: 100%; }
      }
    </style>
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
      <div class="container">
        <a class="navbar-brand" href="#">MUAku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#gallery">Collection</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-bg" aria-label="MUAku Collection">
      <div class="overlay-content">
        <h1 class="new-coming" style="color: black;">New Coming</h1>
        <p class="collection-heading" style="color: black;">MUAku Collection</p>
        <div class="d-flex flex-wrap">
          <button type="button" class="btn btn-login me-3" data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</button>
          <button type="button" class="btn btn-register" data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up</button>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-5" aria-label="Features">
      <div class="container my-5 py-4">
        <div class="row justify-content-center g-4">
          <!-- Card 1: For Clients -->
          <div class="col-md-5">
            <div class="card h-100 feature-card">
              <div class="card-body d-flex flex-column justify-content-between text-center p-4">
                <div>
                  <h3 class="card-title">For Clients</h3>
                  <p class="card-text">
                    Find the perfect makeup artist for your special occasion. Browse portfolios and book directly.
                  </p>
                </div>
                <div class="mt-3">
                  <img src="image/Icon-Shower.png" alt="Client Icon" class="feature-icon" loading="lazy">
                </div>
              </div>
            </div>
          </div>

          <!-- Card 2: For MUAs -->
          <div class="col-md-5">
            <div class="card h-100 feature-card">
              <div class="card-body d-flex flex-column justify-content-between text-center p-4">
                <div>
                  <h3 class="card-title">For MUAs</h3>
                  <p class="card-text">
                    Showcase your talent, manage bookings, and grow your makeup artistry business.
                  </p>
                </div>
                <div class="mt-3">
                  <img src="image/Icon-makeup.png" alt="Makeup Artist Icon" class="feature-icon" loading="lazy">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Why-Choose-Us Section -->
    <section class="why-choose-us">
        <div class="container">
            <p class="section-subtitle">Why choose us</p>
            <h2 class="section-title">People choose us because we provide great service</h2>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="benefit-card d-flex">
                        <div class="benefit-icon me-4">
                            <img src="icon-business-contact.png" alt="Business contact icon">
                        </div>
                        <div>
                            <h4 class="benefit-title">Riasan Berkualitas, Hasil Memukau</h4>
                            <p class="benefit-desc">Hasil riasan yang memukau dari para makeup artist berbakat, memastikan setiap tampilan terlihat sempurna dan sesuai dengan karakter unikmu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="benefit-card d-flex">
                        <div class="benefit-icon me-4">
                            <img src="icon-layers.png" alt="Layers icon">
                        </div>
                        <div>
                            <h4 class="benefit-title">Inspirasi & Tren Kecantikan Terbaru</h4>
                            <p class="benefit-desc">Dapatkan update tentang teknik makeup, rekomendasi produk, serta tren kecantikan terkini agar selalu tampil percaya diri.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="benefit-card d-flex">
                        <div class="benefit-icon me-4">
                            <img src="icon-chat.png" alt="Chat icon">
                        </div>
                        <div>
                            <h4 class="benefit-title">Temukan & Pilih MUA Favoritmu dengan Mudah</h4>
                            <p class="benefit-desc">Hasil riasan yang memukau dari para makeup artist berbakat, memastikan setiap tampilan terlihat sempurna dan sesuai dengan karakter unikmu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="benefit-card d-flex">
                        <div class="benefit-icon me-4">
                            <img src="icon-timelapse.png" alt="Timelapse icon">
                        </div>
                        <div>
                            <h4 class="benefit-title">Tampilkan Keunikan Dirimu dengan Makeup</h4>
                            <p class="benefit-desc">Kami percaya bahwa setiap orang memiliki kecantikan yang khas. MUAku membantu menonjolkan gaya dan kepribadianmu melalui riasan yang sesuai denganmu!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="cta-title">About Us</h3>
                    <p class="cta-desc">MUAku mempertemukan kamu dengan MUA profesional untuk tampil maksimal di momen spesial. Kami juga jadi ruang bagi...</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <button class="cta-btn">Lihat Selengkapnya</button>
                </div>
            </div>
              <div class="paper-plane-container position-absolute" style="right: 15%">
                  <img src="{{ asset('image/Paper-Plane.png') }}" 
                      alt="Decorative paper plane"
                      class="paper-plane img-fluid"
                      style="width: 100px; height: 100px; object-fit: contain; transition: all 0.5s ease;">
              </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section py-5" id="gallery">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column - Content + Image -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="pe-lg-4">
                        <h3 class="gallery-title mb-3">The Art of Beauty</h3>
                        <p class="gallery-desc mb-4">Kami menghadirkan para makeup artist berbakat dengan hasil karya terbaik, mulai dari tampilan alami yang elegan hingga kreasi bold yang memukau.</p>
                        <div class="gallery-img-container position-relative overflow-hidden rounded-3 shadow">
                            <img src="{{ asset('image/Two-girls.jpg') }}" 
                                alt="Makeup artist working on client"
                                class="img-fluid w-100 h-auto"
                                style="object-fit: cover; height: 400px; width: 100%;">
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Image -->
                <div class="col-lg-6">
                    <div class="gallery-img-container position-relative overflow-hidden rounded-3 shadow">
                        <img src="{{ asset('image/Di-Makeup.jpg') }}" 
                            alt="Before and after makeup transformation"
                            class="img-fluid w-100 h-auto"
                            style="object-fit: cover; height: 250px; width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Modal -->
    <x-modal-auth id="loginModal" title="Login As" userRoute="{{ route('login') }}" muaRoute="{{ route('login-mua') }}" />

    <!-- Register Modal -->
    <x-modal-auth id="registerModal" title="Register As" userRoute="{{ route('register') }}" muaRoute="{{ route('register-mua') }}" />

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-4">
            <h3 class="h4" style="font-family: 'DM Serif Display', serif;">MUAku</h3>
            <p>Connecting clients with talented makeup artists for all occasions.</p>
          </div>
          <div class="col-lg-2 col-md-6 mb-4">
            <h4 class="h5">Quick Links</h4>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="#" class="footer-link">Home</a></li>
              <li class="mb-2"><a href="#" class="footer-link">Collection</a></li>
              <li class="mb-2"><a href="{{ route('about-us') }}" class="footer-link">About Us</a></li>
              <li class="mb-2"><a href="{{ route('contact') }}" class="footer-link">Contact</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <h4 class="h5">Legal</h4>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="#" class="footer-link">Terms of Service</a></li>
              <li class="mb-2"><a href="#" class="footer-link">Privacy Policy</a></li>
              <li class="mb-2"><a href="#" class="footer-link">Cookie Policy</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <h4 class="h5">Contact Us</h4>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="mailto:info@muaku.com" class="footer-link">info@muaku.com</a></li>
              <li class="mb-2"><a href="tel:+1234567890" class="footer-link">+1 (234) 567-890</a></li>
            </ul>
          </div>
        </div>
        <hr class="my-4 bg-light opacity-25">
        <div class="row">
          <div class="col-md-6 text-center text-md-start">
            <p class="small mb-0">&copy; 2023 MUAku. All rights reserved.</p>
          </div>
          <div class="col-md-6 text-center text-md-end">
            <ul class="list-inline mb-0">
              <li class="list-inline-item"><a href="#" class="footer-link"><i class="bi bi-facebook"></i></a></li>
              <li class="list-inline-item"><a href="#" class="footer-link"><i class="bi bi-instagram"></i></a></li>
              <li class="list-inline-item"><a href="#" class="footer-link"><i class="bi bi-twitter"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap Bundle JS (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  </body>
</html>