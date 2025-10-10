<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now - Appointment</title>
    {{-- Midtrans Script & API Client Key dari Midtrans --}}
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7ff 0%, #e1e2ff 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        /* CSS yang Anda berikan */
        .mensagens-container {
            box-sizing: border-box;
            width: 602px;
            height: 778px;
            background: #FDFDFF;
            border: 1px solid #E1E2FF;
            border-radius: 20px;
            padding: 30px;
            font-family: Arial, sans-serif;
            color: #333;
        }

        /* Styling tambahan untuk elemen-elemen */
        h1 {
            font-size: 28px;
            margin-bottom: 25px;
            color: #2c3e50;
        }

        .appointment-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .appointment-info p {
            margin: 8px 0;
        }

        .appointment-name {
            font-weight: bold;
            font-size: 18px;
        }

        .appointment-date {
            color: #666;
        }

        hr {
            border: none;
            border-top: 1px solid #E1E2FF;
            margin: 25px 0;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .payment-methods {
            margin-bottom: 25px;
        }

        .payment-option {
            display: flex;
            align-items: center;
            padding: 12px;
            border: 1px solid #E1E2FF;
            border-radius: 8px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .payment-option:hover {
            background-color: #f0f2ff;
        }

        .payment-icon {
            width: 40px;
            height: 40px;
            background-color: #E1E2FF;
            border-radius: 6px;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .payment-details {
            flex-grow: 1;
        }

        .payment-name {
            font-weight: bold;
        }

        .payment-type {
            color: #666;
            font-size: 14px;
        }

        h3 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .payment-summary {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .payment-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .payment-total {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            border-top: 1px solid #E1E2FF;
            padding-top: 10px;
            margin-top: 10px;
        }

        .pay-button {
            background-color: #4a6cf7;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 15px;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .pay-button:hover {
            background-color: #3a5ce5;
        }
    </style>
</head>
<body>
    <div class="mensagens-container">
        <h1>Book Now</h1>
        
        <div class="appointment-info">
            <p>Appointment</p>
            <p class="appointment-name">{{ $mua->name }}</p>
            <p class="appointment-date">Wednesday, 10 Jan 2024, 11:00</p>
        </div>
        
        <hr>
        
        <h2>Select Payment Method</h2>
        
        <div class="payment-methods">
            <div class="payment-option">
                <div class="payment-icon">vxA</div>
                <div class="payment-details">
                    <div class="payment-name">Credit Card</div>
                </div>
            </div>
            
            <div class="payment-option">
                <div class="payment-icon">mandiri</div>
                <div class="payment-details">
                    <div class="payment-name">Mandiri</div>
                </div>
            </div>
            
            <div class="payment-option">
                <div class="payment-icon">BCA</div>
                <div class="payment-details">
                    <div class="payment-name">BCA</div>
                </div>
            </div>
        </div>
        
        <h3>Total payment</h3>
        
        <div class="payment-summary">
            <div class="payment-item">
                <span>Consultation Fee</span>
                <span>Rp.{{ number_format($mua->packages->price ?? 0, 0, ',', '.') }}</span>
            </div>
            <div class="payment-item">
                <span>Admin</span>
                <span>Rp.{{ number_format($biayaAdmin ?? 0, 0, ',', '.') }}</span>
            </div>
            <div class="payment-total">
                <span>Total</span>
                <span>Rp.{{ number_format(($mua->packages->price ?? 0) + ($biayaAdmin ?? 0), 0, ',', '.') }}</span>
            </div>
        </div>
        
        <button class="pay-button" id="pay-button">Pay</button>
    </div>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
        fetch('/get-snap-token', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                package_id: {{ $mua->packages->id ?? 'null' }},
                mua_id: {{ $mua->id }},
                price: {{ $mua->packages->price ?? 0 }},
                biaya_admin: {{ $biayaAdmin ?? 0 }},
                total: {{ ($mua->packages->price ?? 0) + ($biayaAdmin ?? 0) }}

            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.snap_token) {
                snap.pay(data.snap_token);
            } else {
                alert('Gagal mendapatkan Snap Token: ' + (data.error || 'Unknown error'));
            }
        })
        .catch(err => {
            console.error('Fetch error:', err);
            alert('Terjadi kesalahan koneksi ke server.');
        });
        };
        </script>
</body>
</html>