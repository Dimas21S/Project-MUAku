<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>Notifikasi Chat</title>
    <link rel="stylesheet" href="{{ asset('css/notif-chat.css') }}">
    <style>
        .message-preview {
            color: #6c757d;
            font-size: 0.9rem;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #E4CFCE;">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="{{ asset('image/MUAku-Icon-2.jpg.png') }}" style="width: 130px; height: 60px; object-fit:cover;"/></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto right-navbar">
              <li class="nav-item" style="margin-right: 100px"> 
                <a class="nav-link text-black" href="{{ route('index-mua') }}">Profil</a>
              </li>
              <li class="nav-item" style="margin-right: 100px">
                <a class="nav-link text-black" href="{{ route('notif-chat') }}">Chat</a>
              </li>
              <li class="nav-item" style="margin-right: 100px">
                <a class="nav-link text-black" href="#">Logout</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <div class="container">
        <div class="header">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <div class="header-icon">
                <i class="bi bi-chat-dots-fill fs-3 text-primary"></i>
                @if($totalMessages > 0)
                    <span class="position-absolute badge badge-notification bg-danger">
                        {{ $totalMessages }}
                    </span>
                @else
                    <span class="position-absolute badge badge-notification bg-secondary">
                        0
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