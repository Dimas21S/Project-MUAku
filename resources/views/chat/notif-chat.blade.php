<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>Notifikasi Chat</title>
</head>
<body class="bg-light">
    <div class="container py-4">
        @if($messages->isEmpty())
            <div class="alert alert-warning">
                Belum ada pesan yang diterima
            </div>
        @else
            @foreach($messages as $message)
                @if($message->sender)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <img src="{{ asset('image/foto-cewek-2.jpg') }}" 
                                     class="rounded-circle" 
                                     width="70" height="70">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-1">
                                    {{ $message->sender->name ?? 'Pengirim Tidak Dikenal' }}
                                </h5>
                                <p class="mb-1 text-muted">
                                    <small>
                                        {{ $message->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="mb-0">
                                    {{ Str::limit($message->message, 50) }}
                                </p>
                            </div>
                            <div class="ms-auto">
                                <a href="{{ route('chat.mua.to.user', ['user_id' => $message->sender->id ?? 0]) }}" 
                                   class="btn btn-sm btn-primary">
                                   <i class="bi bi-chat"></i> Balas
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>