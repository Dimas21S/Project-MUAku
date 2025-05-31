<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>Notifikasi Chat</title>
    <style>
        body {
            background: linear-gradient(#EECFC0, #F6F6F6);
            background-attachment: fixed;
            min-height: 100vh;
            padding-top: 20px;
        }
        .container {
            max-width: 1400px;
        }
        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-2px);
        }
        .card-body {
            padding: 15px 20px;
        }
        .message-count-badge {
            font-size: 0.7rem;
            margin-left: 5px;
        }
        .sender-avatar {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
        .sender-name {
            font-weight: 600;
            margin-bottom: 3px;
        }
        .message-preview {
            color: #6c757d;
            font-size: 0.9rem;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .time-ago {
            font-size: 0.8rem;
            color: #adb5bd;
        }
        .empty-state {
            text-align: center;
            padding: 40px 20px;
        }
        .empty-state i {
            font-size: 3rem;
            color: #ffc107;
            margin-bottom: 15px;
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        .header-icon {
            position: relative;
            margin-right: 10px;
        }
        .badge-notification {
            font-size: 0.6rem;
            padding: 3px 6px;
            top: -5px;
            right: -5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-icon">
                <i class="bi bi-chat-dots-fill fs-3 text-primary"></i>
                @if($totalMessages > 0)
                    <span class="position-absolute badge badge-notification bg-danger">
                        {{ $totalMessages }}
                    </span>
                @endif
            </div>
            <h4 class="m-0">Pesan Masuk</h4>
        </div>

        @if($messages->isEmpty())
            <div class="card empty-state">
                <div class="card-body">
                    <i class="bi bi-envelope-open"></i>
                    <h5 class="text-muted">Belum ada pesan yang diterima</h5>
                    <p class="text-muted">Anda akan melihat notifikasi di sini ketika ada pesan masuk</p>
                </div>
            </div>
        @else
            <div class="message-list">
                @foreach($messages as $message)
                    @if($message->sender && isset($messageCounts[$message->sender_id]) && $messageCounts[$message->sender_id] > 0)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{ asset('image/foto-cewek-2.jpg') }}" 
                                         class="sender-avatar rounded-circle" 
                                         alt="Foto Profil">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h6 class="sender-name mb-0">
                                            {{ $message->sender->name ?? 'Pengirim Tidak Dikenal' }}
                                            @if($messageCounts[$message->sender_id] > 0)
                                                <span class="badge bg-danger message-count-badge">
                                                    {{ $messageCounts[$message->sender_id] }}
                                                </span>
                                            @endif
                                        </h6>
                                        <span class="time-ago">
                                            {{ $message->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <p class="message-preview mb-0">
                                        {{ Str::limit($message->message, 60) }}
                                    </p>
                                </div>
                                <div class="flex-shrink-0 ms-3">
                                    <a href="{{ route('chat.mua.to.user', ['user_id' => $message->sender->id ?? 0]) }}" 
                                       class="btn btn-sm btn-outline-primary">
                                       <i class="bi bi-reply"></i> Balas
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>