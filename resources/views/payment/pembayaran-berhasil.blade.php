<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil</title>
    <style>
        body { 
            font-family: 'Segoe UI', Arial, sans-serif; 
            text-align: center; 
            padding: 20px; 
            background: #f5f5f5;
            line-height: 1.6;
            color: #333;
        }
        .container { 
            background: white; 
            max-width: 500px; 
            margin: 40px auto; 
            padding: 40px; 
            border-radius: 12px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); 
        }
        .success-icon { 
            color: #28a745; 
            font-size: 72px; 
            margin-bottom: 20px;
            line-height: 1;
        }
        h2 {
            color: #28a745;
            margin-bottom: 20px;
        }
        .user-name {
            font-weight: bold;
            color: #2c3e50;
        }
        .message {
            margin-bottom: 25px;
        }
        .btn { 
            background: #28a745; 
            color: white; 
            padding: 12px 24px; 
            text-decoration: none; 
            border-radius: 6px; 
            display: inline-block; 
            margin-top: 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background: #218838;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        @media (max-width: 576px) {
            .container {
                padding: 30px 20px;
                margin: 20px auto;
            }
            .success-icon {
                font-size: 60px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✓</div>
        <h2>Pembayaran Berhasil</h2>
        <p><span class="user-name">{{ $user->name }}</span>,</p>
        <p class="message">Terima kasih telah melakukan pembayaran. Kami telah menerima pembayaran Anda dan akun Anda sekarang sudah aktif.</p>
        <a href="/" class="btn">Kembali ke Beranda</a>
    </div>
</body>
</html>