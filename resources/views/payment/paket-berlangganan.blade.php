<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    {{-- Midtrans Script & API Client Key dari Midtrans --}}
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    <title>Paket Langganan</title>
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(#DFDBDC, #E6DBD9, #E4CFCE, #D3CEE5);
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }

        li {
            margin-right: 1.5rem;
        }
        
        .card-body {
            min-height: 280px;
            display: flex;
            flex-direction: column;
        }
        
        .card-body button {
            margin-top: auto;
        }

        .pricing-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 100px;
        }

        .pricing-table {
            width: 821px;
            height: 405px;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(15.1667px);
            border-radius: 22.5333px;
            display: flex;
            justify-content: space-around;
            padding: 30px;
        }

        .header-text {
            position: relative;
            z-index: 1;
            margin-top: 2rem;
            margin-left: 60px;
            margin-bottom: 2rem;
        }

        .plan-title {
            font-weight: 500;
            font-size: 1.5rem;
            color: #231D4F;
        }

        .plan-description {
            font-size: 0.9rem;
            color: #848199;
        }

        .price {
            font-size: 2rem;
            font-weight: 700;
            color: #231D4F;
        }

        .price-period {
            font-size: 1rem;
            color: #848199;
        }
        
        .pricing-plan {
            width: 250px;
            height: 350px;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(15.1667px);
            border-radius: 20px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .pricing-plan:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            background: #8FB3F2;
        }
        
        .feature-list {
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
            width: 100%;
        }
        
        .feature-item {
            font-weight: 500;
            font-size: 12px;
            color: #848199;
            margin-bottom: 8.67px;
            display: flex;
            align-items: center;
        }
        
        .feature-icon {
            width: 17.33px;
            height: 17.33px;
            background: rgba(82, 67, 194, 0.15);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }
        
        .feature-icon::after {
            content: "";
            width: 8px;
            height: 8px;
            background: #BB6BD9;
            border-radius: 50%;
        }
        
        .choose-plan-btn {
            width: 180.06px;
            height: 39px;
            background: #231D4F;
            opacity: 0.5;
            border-radius: 20.8px;
            color: white;
            font-weight: 500;
            font-size: 13px;
            border: none;
            cursor: pointer;
        }

        .choose-plan-btn:hover {
            opacity: 1;
            transform: scale(1.05);
        }
        
        .main-title {
            font-weight: 400;
            font-size: 34.6667px;
            line-height: 52px;
            color: #231D4F;
            margin-bottom: 21.67px;
        }
        
        .subtitle {
            font-weight: 500;
            font-size: 15.6px;
            line-height: 23px;
            color: #848199;
        }

          .sun {
            font-size: 10rem;
            color: rgb(60, 98, 169); /* Warna kuning emas */
            text-shadow: 0 0 10px rgba(29, 21, 105, 0.7);
            position: fixed;
            z-index: 1000;
        }

        @media (max-width: 768px) {
            .pricing-table {
                flex-direction: column;
                height: auto;
                width: 100%;
                align-items: center;
            }
            
            .pricing-plan {
                margin-bottom: 20px;
            }
            
            .header-text {
                margin-left: 20px;
                margin-right: 20px;
                text-align: center;
            }
        }
    </style>
  </head>
  <body>
    <div class="container">
      <header class="d-flex align-items-center justify-content-center position-relative">
        <a href="{{ route('list-mua') }}"
           class="btn btn-light rounded-circle btn-outline-dark position-absolute start-0 ms-3">
            <i class="bi bi-arrow-left"></i>
        </a>
        
        {{-- Judul --}}
        <div class="text-center">
          <img src="{{ asset('image/MUAku-Icon-2.jpg.png') }}" style="width: 130px; height: 60px; object-fit:cover;"/>
        </div>

        <div class="sun text-center position-absolute end-0 me-3">
            <i class="bi bi-moon-stars-fill"></i>
        </div>

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show me-4" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
      </header>
      
      {{-- Daftar Paket --}}
      <div>
        <main>
          <div class="header-text text-center text-md-start">
            <h1 class="main-title">Content digital premium access</h1>
            <p class="subtitle">Whether your time-saving automation needs are large or small, <br> we're here to help you scale.</p>
          </div>
          
          <div class="pricing-container">
            <div class="pricing-table mb-5">
              {{-- Card Paket Dasar --}}
                  <div class="pricing-plan">
                    <div class="price">$Rp. 20.000</div>
                    <div class="price-period">/month</div>
                    <h3 class="plan-title">Paket Dasar</h3>
                    <p class="plan-description">Paket Dasar</p>

                    <button class="choose-plan-btn" id="pay-button-1">Choose plan</button>
                </div>
            </div>
              {{-- Card Paket Medium --}}
                  <div class="pricing-plan">
                    <div class="price">$Rp. 20.000</div>
                    <div class="price-period">/month</div>
                    <h3 class="plan-title">Paket Medium</h3>
                    <p class="plan-description">{{ $artist->description == 2 }}</p>

                    <button class="choose-plan-btn" id="pay-button-2">Choose plan</button>
                </div>
            </div>
              {{-- Card Paket High --}}
                  <div class="pricing-plan">
                    <div class="price">$Rp. 20.000</div>
                    <div class="price-period">/month</div>
                    <h3 class="plan-title">Paket High</h3>
                    <p class="plan-description">Paket High</p>

                    <button class="choose-plan-btn" id="pay-button-3">Choose plan</button>
                </div>
            </div>
          </div>
        </main>
      </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
      // Midtrans Snap API Client Key
      // Menangani tombol pembayaran
      document.getElementById('pay-button-1').onclick = function () {
          fetch('/get-snap-token', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
              },
              body: JSON.stringify({
                packageName: 'Paket Dasar',
                packageId: 1,
                amount: 20000
              })
          })
          .then(response => response.json())
          .then(data => {
              if (data.snap_token) {
                  snap.pay(data.snap_token);
              } else {
                  alert('Error getting Snap token');
              }
          });
      };

      document.getElementById('pay-button-2').onclick = function () {
          fetch('/get-snap-token', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
              },
              body: JSON.stringify({
                packageName: 'Paket Medium',
                packageId: 2,
                amount: 20000
              })
          })
          .then(response => response.json())
          .then(data => {
              if (data.snap_token) {
                  snap.pay(data.snap_token);
              } else {
                  alert('Error getting Snap token');
              }
          });
      };

      document.getElementById('pay-button-3').onclick = function () {
          fetch('/get-snap-token', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
              },
              body: JSON.stringify({
                packageName: 'Paket High',
                packageId: 3,
                amount: 20000
              })
          })
          .then(response => response.json())
          .then(data => {
              if (data.snap_token) {
                  snap.pay(data.snap_token);
              } else {
                  alert('Error getting Snap token');
              }
          });
      };
    </script>

  </body>
</html>