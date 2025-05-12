<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Deskripsi</title>
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient( #EECFC0, #F6F6F6);
            background-attachment: fixed;
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
        
        .content-wrapper {
            display: flex;
            gap: 2rem;
            margin-top: 1rem;
        }
        
        .image-container {
            flex: 0 0 480px;
        }
        
        .description-container {
            flex: 1;
            padding-right: 1rem;
        }
        
        @media (max-width: 992px) {
            .content-wrapper {
                flex-direction: column;
            }
            
            .image-container {
                flex: 1;
                width: 100%;
                text-align: center;
            }
            
            .image-container img {
                max-width: 100%;
                height: auto;
            }
        }
    </style>
  </head>
  <body>
    <div class="container-fluid py-3 px-4"> <!-- Changed to container-fluid and added px-4 -->
        <header class="d-flex align-items-center justify-content-center position-relative py-3">
          <!-- Tombol kembali (diposisikan absolute di kiri) -->
           <a href="{{ route('list-mua') }}"
                class="btn btn-light rounded-circle btn-outline-dark position-absolute start-0 ms-3">
                <i class="bi bi-arrow-left"></i>
            </a>
          
          {{-- Grup tombol kanan --}}
          <div class="btn-group position-absolute end-0 me-3">
            <button type="button" 
                    class="btn btn-light rounded-circle btn-outline-dark"
                    style="width: 40px; height: 40px;">
              <i class="bi bi-heart-fill text-danger"></i>
            </button>
            <button type="button" 
                    class="btn btn-light rounded-circle btn-outline-dark"
                    style="width: 40px; height: 40px;">
              <i class="bi bi-whatsapp text-success"></i>
            </button>
            <button type="button" 
                    class="btn btn-light rounded-circle btn-outline-dark"
                    style="width: 40px; height: 40px;">
              <i class="bi bi-chat-left-text text-primary"></i>
            </button>
          </div>
        </header>

        <div class="content-wrapper">
            <div class="image-container">
                <img src="{{ asset('image/foto-cewek-1.jpg') }}" class="rounded img-fluid" alt="..." style="max-height: 640px; margin-left: 30px; margin-right: 5px;">

                <div class="d-flex justify-content-center mt-3 mb-3 ms-3">
                    <div class="d-flex flex-column align-items-center">
                        <button type="button" class="btn btn-light btn-outline-dark me-2 overflow-hidden" style="width: 79px; height: 79px; border-radius: 8px;">
                          <img src="{{ asset('image/foto-cewek-1.jpg') }}" alt="Preview" class="w-100 h-100 object-fit-cover">
                        </button>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <button type="button" class="btn btn-light btn-outline-dark me-2" style="width: 79px; height: 79px; background-color: #A87648;">
                        </button>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <button type="button" class="btn btn-light btn-outline-dark me-2" style="width: 79px; height: 79px; background-color: #A87648;">
                        </button>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <button type="button" class="btn btn-light btn-outline-dark me-2" style="width: 79px; height: 79px; background-color: #A87648;">
                        </button>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <button type="button" class="btn btn-light btn-outline-dark me-2" style="width: 79px; height: 79px; background-color: #A87648;">
                            <i class="bi bi-arrow-right-short fs-2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="description-container">
                <p class="mt-0 mb-3">Kategori Make up : Pesta dan Acara.</p>
                <p class="mb-3">MUA : Kak Lady Gaga</p>
                <p class="mb-3">Alamat : ####################No 
                    <br>Telp : 08+++
                    <br>Sosial Media : @###</p> 
                <h4 style="font-family: 'DM Serif Display', serif;font-weight: 400;font-style: normal; margin-bottom: 25px; margin-top: 25px;">Deskripsi</h4>
                <p>Makeup acara difokuskan untuk menciptakan tampilan yang lebih berani, elegan, dan tahan lama sesuai dengan jenis acara yang dihadiri.
                    Aku menyesuaikan teknik riasan berdasarkan tema acara, outfit, dan karakter wajahmu, memastikan hasil yang harmonis dan memukau. 
                    Setiap detail seperti complexion, riasan mata, hingga pewarnaan bibir aku rancang untuk tetap nyaman dipakai berjam-jam dan tetap terlihat segar di bawah cahaya lampu atau kamera. 
                    Aku menggunakan produk makeup berkualitas tinggi dengan teknik penguncian agar riasan tidak mudah luntur, sehingga kamu tetap percaya diri sepanjang acara.
                <br><br>
                Aku menerima pemesanan makeup acara dengan jadwal sebagai berikut:</p>
                <ul>
                    <li>Senin – Jumat : Pukul 08.00 – 20.00 WIB</li>
                    <li>Sabtu & Minggu : Pukul 07.00 – 22.00 WIB</li>
                </ul>
                <p>Pemesanan minimal H-2 sebelum acara untuk memastikan ketersediaan jadwal dan konsultasi gaya riasan yang diinginkan. 
                    Untuk acara khusus atau kebutuhan di luar jam operasional, silakan hubungi lebih awal untuk penyesuaian jadwal.
                    <br><br>                
                    Kalau mau, aku juga bisa buatin tambahan seperti:</p>
                <ul>
                    <li>Format booking</li>
                    <li>Biaya DP</li>
                    <li>Syarat dan ketentuan keci</li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>