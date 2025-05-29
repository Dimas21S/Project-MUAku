<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />

    <title>Chat dengan MUA</title>
    <style>
        .chat-container {
            height: 80vh;
            overflow: hidden;
        }
        .mua-list-container {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .mua-list {
            flex-grow: 1;
            overflow-y: auto;
        }
        .chat-messages {
            height: calc(65vh - 60px);
            overflow-y: auto;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
        }
        .message-card {
            max-width: 70%;
            margin-bottom: 15px;
        }
        .sent-message {
            margin-left: auto;
            background-color: #d1e7dd;
        }
        .received-message {
            margin-right: auto;
            background-color: #f8f9fa;
        }
        .mua-list-item {
            transition: background-color 0.3s ease;
        }
        .mua-list-item:hover {
            background-color: #f8f9fa;
        }
        .mua-list-item.active {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <section>
        <div class="container py-5 chat-container">
            <div class="row h-100">
                <!-- Daftar MUA -->
                <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0 h-100">
                    <h5 class="font-weight-bold mb-3 text-center text-lg-start">Makeup Artist</h5>
                    <div class="card h-100">
                        <div class="card-body p-0 mua-list-container">
                            <ul class="list-unstyled mb-0 mua-list">

                                {{-- Menampilkan daftar mua yang berstatus 'accepted' --}}
                                @foreach ($muas as $mua)
                                <li class="p-2 border-bottom mua-list-item {{ $selectedMua && $selectedMua->id == $mua->id ? 'active' : '' }}">
                                    <a href="{{ route('chat.page', ['mua_id' => $mua->id]) }}" class="d-flex justify-content-between text-decoration-none text-dark">
                                        <div class="d-flex flex-row">
                                            <img src="{{ $mua->profile_photo ?? asset('images/default-avatar.png') }}" 
                                                 class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" 
                                                 width="60" height="60">
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0">{{ $mua->name }}</p>
                                                <p class="small text-muted">Klik untuk mulai chat</p>
                                            </div>
                                        </div>
                                        @if($mua->unread_count > 0)
                                        <span class="badge bg-danger rounded-pill">{{ $mua->unread_count }}</span>
                                        @endif
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Area Chat -->
                <div class="col-md-6 col-lg-7 col-xl-8 h-100">
                    @if($selectedMua)
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center">
                            <img src="{{ $selectedMua->profile_photo ?? asset('images/default-avatar.png') }}" 
                                 class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h5 class="mb-0">{{ $selectedMua->name }}</h5>
                                <small class="text-muted">
                                    <span class="badge bg-success">Online</span>
                                </small>
                            </div>
                        </div>
                        
                        <div class="card-body p-0 d-flex flex-column" style="height: calc(100% - 120px);">
                            <div class="chat-messages flex-grow-1">
                                @forelse ($messages as $message)
                                <div class="d-flex mb-3 {{ $message->sender_type == 'user' ? 'justify-content-end' : 'justify-content-start' }}">
                                    @if ($message->sender_type != 'user')
                                    <img src="{{ $selectedMua->profile_photo ?? asset('images/default-avatar.png') }}" 
                                         class="rounded-circle me-2 align-self-start" 
                                         width="40" height="40">
                                    @endif
                                    
                                    <div class="message-card card {{ $message->sender_type == 'user' ? 'sent-message' : 'received-message' }}">
                                        <div class="card-header bg-transparent p-2">
                                            <strong>{{ $message->sender_type == 'user' ? 'Anda' : $selectedMua->name }}</strong>
                                            <small class="text-muted float-end">{{ $message->created_at->format('H:i') }}</small>
                                        </div>
                                        <div class="card-body p-2">
                                            <p class="mb-0">{{ $message->message }}</p>
                                        </div>
                                    </div>
                                    
                                    @if ($message->sender_type == 'user')
                                    <img src="{{ auth()->user()->profile_photo_url ?? asset('images/default-avatar.png') }}" 
                                         class="rounded-circle ms-2 align-self-start" 
                                         width="40" height="40">
                                    @endif
                                </div>
                                @empty
                                <div class="text-center text-muted mt-5">
                                    Tidak ada pesan. Mulai percakapan dengan {{ $selectedMua->name }}!
                                </div>
                                @endforelse
                            </div>
                            
                            <div class="card-footer">
                                <form action="{{ route('chat.user.send.mua', $selectedMua->id) }}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <textarea name="message" class="form-control" rows="2" placeholder="Ketik pesan..." required></textarea>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-paper-plane"></i> Kirim
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card h-100">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <i class="fas fa-comments fa-4x text-muted mb-3"></i>
                                <h5>Pilih MUA untuk memulai percakapan</h5>
                                <p class="text-muted">Klik salah satu MUA di daftar sebelah kiri</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    
    <script>
        // Auto scroll ke bawah
        document.addEventListener('DOMContentLoaded', function() {
            const chatMessages = document.querySelector('.chat-messages');
            if (chatMessages) {
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
            
            // Focus pada input pesan
            const messageInput = document.querySelector('textarea[name="message"]');
            if (messageInput) {
                messageInput.focus();
            }
        });
    </script>
</body>
</html>