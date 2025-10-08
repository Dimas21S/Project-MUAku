<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Booking - Makeup Artist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
             background: linear-gradient(#DFDBDC, #E6DBD9, #E4CFCE, #D3CEE5);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .payment-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 1rem auto;
            max-width: 800px;
        }
        .payment-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        .payment-body {
            padding: 1.5rem;
        }
        .artist-info {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 1.25rem;
            margin-bottom: 1.5rem;
            border-left: 5px solid #667eea;
        }
        .price-details {
            background: #fff;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 1.25rem;
        }
        .price-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #e9ecef;
        }
        .price-item:last-child {
            border-bottom: none;
        }
        .total-price {
            background: #667eea;
            color: white;
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1rem;
            font-weight: bold;
            font-size: 1.1rem;
        }
        .payment-methods {
            margin-top: 2rem;
        }
        .payment-method {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .payment-method:hover {
            border-color: #667eea;
            background: #f8f9ff;
        }
        .payment-method.selected {
            border-color: #667eea;
            background: #f0f4ff;
        }
        .btn-pay {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: bold;
            width: 100%;
            margin-top: 2rem;
            transition: all 0.3s ease;
        }
        .btn-pay:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        .countdown {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .countdown-timer {
            font-size: 1.5rem;
            font-weight: bold;
            color: #e74c3c;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .payment-header {
                padding: 1rem;
            }
            .payment-header h1 {
                font-size: 1.5rem;
            }
            .payment-body {
                padding: 1rem;
            }
            .artist-info {
                padding: 1rem;
            }
            .price-details {
                padding: 1rem;
            }
            .artist-info .col-md-2 {
                margin-bottom: 1rem;
            }
            .artist-info img {
                width: 60px !important;
                height: 60px !important;
            }
            .countdown-timer {
                font-size: 1.25rem;
            }
            .btn-pay {
                padding: 0.875rem 1.5rem;
                font-size: 1rem;
            }
            .total-price {
                font-size: 1rem;
                padding: 0.875rem;
            }
        }

        @media (max-width: 576px) {
            .container.py-5 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;
            }
            .payment-container {
                margin: 0.5rem auto;
                border-radius: 15px;
            }
            .payment-header {
                padding: 0.875rem;
            }
            .payment-header h1 {
                font-size: 1.25rem;
            }
            .payment-body {
                padding: 0.875rem;
            }
            .artist-info {
                padding: 0.875rem;
                margin-bottom: 1rem;
            }
            .price-details {
                padding: 0.875rem;
            }
            .price-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.25rem;
            }
            .payment-method {
                padding: 0.875rem;
            }
            .countdown-timer {
                font-size: 1.1rem;
            }
            .alert-info ul {
                padding-left: 1rem;
            }
            .alert-info li {
                font-size: 0.9rem;
                margin-bottom: 0.25rem;
            }
        }

        @media (max-width: 400px) {
            .payment-header h1 {
                font-size: 1.1rem;
            }
            .artist-info h4 {
                font-size: 1.1rem;
            }
            .price-details h5, .payment-methods h5 {
                font-size: 1.1rem;
            }
            .btn-pay {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="payment-container">
            <!-- Header -->
            <div class="payment-header">
                <h1><i class="bi bi-credit-card"></i> Pembayaran Booking</h1>
                <p class="mb-0">Selesaikan pembayaran Anda dalam</p>
                <div class="countdown-timer" id="countdown">59:59</div>
            </div>

            <!-- Body -->
            <div class="payment-body">
                <!-- Informasi Artist -->
                <div class="artist-info">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center mb-3 mb-md-0">
                            <img src="{{ $mua->foto_profil ? Storage::url($artist->foto_profil) : asset('image/Profile-Foto.jpg') }}" 
                                 alt="{{ $mua->name }}" 
                                 class="rounded-circle" 
                                 style="width: 80px; height: 80px; object-fit: cover;">
                        </div>
                        <div class="col-md-10">
                            <h4 class="mb-1">{{ $mua->name }}</h4>
                            <p class="text-muted mb-1">
                                <i class="bi bi-geo-alt"></i> {{ $mua->address->kota }}, {{ $mua->address->kelurahan }}
                            </p>
                            <p class="text-muted mb-0">
                                <i class="bi bi-tags"></i> {{ $mua->category }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Rincian Biaya -->
                <div class="price-details">
                    <h5 class="mb-3">Rincian Biaya</h5>
                    
                    <div class="price-item">
                        <span>Paket {{ $package->name ?? 'Wedding Package' }}</span>
                        <span>Rp {{ number_format($package->price ?? 1500000, 0, ',', '.') }}</span>
                    </div>
                    
                    <div class="price-item">
                        <span>Biaya Admin</span>
                        <span>Rp {{ number_format($admin_fee ?? 2500, 0, ',', '.') }}</span>
                    </div>
                    
                    <div class="total-price">
                        <div class="d-flex justify-content-between">
                            <span>Total Pembayaran:</span>
                            <span>Rp {{ number_format($total_amount ?? 1560000, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Metode Pembayaran -->
                <div class="payment-methods">
                    <h5 class="mb-3">Pilih Metode Pembayaran</h5>
                    
                    <div class="payment-method" onclick="selectPayment(this)">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" value="bca">
                            <label class="form-check-label">
                                <i class="bi bi-bank"></i> Transfer Bank BCA
                            </label>
                        </div>
                        <small class="text-muted">Virtual Account: 1234567890</small>
                    </div>
                    
                    <div class="payment-method" onclick="selectPayment(this)">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" value="bni">
                            <label class="form-check-label">
                                <i class="bi bi-bank"></i> Transfer Bank BNI
                            </label>
                        </div>
                        <small class="text-muted">Virtual Account: 0987654321</small>
                    </div>
                    
                    <div class="payment-method" onclick="selectPayment(this)">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" value="gopay">
                            <label class="form-check-label">
                                <i class="bi bi-phone"></i> GOPAY
                            </label>
                        </div>
                        <small class="text-muted">QR Code akan ditampilkan</small>
                    </div>
                    
                    <div class="payment-method" onclick="selectPayment(this)">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" value="ovo">
                            <label class="form-check-label">
                                <i class="bi bi-lightning"></i> OVO
                            </label>
                        </div>
                        <small class="text-muted">Transfer ke nomor 08123456789</small>
                    </div>
                </div>

                <!-- Tombol Bayar -->
                <form action="" method="POST">
                    @csrf
                    {{-- <input type="hidden" name="booking_id" value="{{ $booking->id ?? '' }}">
                    <input type="hidden" name="artist_id" value="{{ $artist->id }}"> --}}
                    <input type="hidden" name="payment_method" id="paymentMethod">
                    <input type="hidden" name="amount" value="{{ $total_amount ?? 1560000 }}">
                    
                    <button type="submit" class="btn btn-pay" id="payButton" disabled>
                        <i class="bi bi-lock-fill"></i> Bayar Sekarang
                    </button>
                </form>

                <!-- Informasi Penting -->
                <div class="alert alert-info mt-3">
                    <h6><i class="bi bi-info-circle"></i> Informasi Penting:</h6>
                    <ul class="mb-0">
                        <li>Pembayaran harus diselesaikan dalam waktu 1 jam</li>
                        <li>Booking akan otomatis dibatalkan jika pembayaran tidak dilakukan</li>
                        <li>Biaya admin tidak dapat dikembalikan</li>
                        <li>Konfirmasi pembayaran akan dikirim via email dan WhatsApp</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Countdown timer
        function startCountdown() {
            let timeLeft = 59 * 60; // 59 menit dalam detik
            const countdownElement = document.getElementById('countdown');

            const timer = setInterval(() => {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                
                countdownElement.textContent = 
                    `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    countdownElement.textContent = 'Waktu Habis!';
                    countdownElement.style.color = '#e74c3c';
                }
                
                timeLeft--;
            }, 1000);
        }

        // Pilih metode pembayaran
        function selectPayment(element) {
            // Hapus selected dari semua metode
            document.querySelectorAll('.payment-method').forEach(method => {
                method.classList.remove('selected');
            });
            
            // Tambah selected ke metode yang dipilih
            element.classList.add('selected');
            
            // Aktifkan radio button
            const radio = element.querySelector('input[type="radio"]');
            radio.checked = true;
            
            // Set nilai payment method
            document.getElementById('paymentMethod').value = radio.value;
            
            // Aktifkan tombol bayar
            document.getElementById('payButton').disabled = false;
        }

        // Start countdown ketika halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            startCountdown();
        });
    </script>
</body>
</html>