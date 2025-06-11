<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Chat dengan {{ $user->name }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #ffffff;
    }
    
    .chat-container {
      width: 100%;
      height: 100%;
      border-radius: 0;
      background: #ffffff;
      display: flex;
      flex-direction: column;
      position: relative;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      overflow: hidden;
    }

    .chat-header {
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: rgba(255, 255, 255, 0.9);
      border-bottom: 1px solid #e0e0e0;
      z-index: 10;
    }

    .recipient-info {
      display: flex;
      align-items: center;
      gap: 15px;
      flex-grow: 1;
      margin-left: 20px;
    }

    .recipient-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .recipient-name {
      font-weight: bold;
      color: #5a3921;
      margin-bottom: 0;
    }

    .recipient-status {
      font-size: 0.8rem;
      color: #777;
    }

    .back-button {
      background-color: white;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      border: none;
    }

    .action-buttons {
      display: flex;
      gap: 10px;
    }

    .chat-messages {
      flex-grow: 1;
      padding: 20px;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 15px;
      background-color: rgba(255,255,255,0.5);
    }

    .message-container {
      max-width: 70%;
      display: flex;
      flex-direction: column;
    }

    .message-sent {
      align-self: flex-end;
      align-items: flex-end;
    }

    .message-received {
      align-self: flex-start;
      align-items: flex-start;
    }

    .message-bubble {
      padding: 12px 16px;
      border-radius: 18px;
      word-wrap: break-word;
      line-height: 1.4;
      box-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }

    .sent-bubble {
      background-color: #7879F1;
      border-bottom-right-radius: 5px;
      color: #ffffff;
    }

.received-bubble {
  background-color: #ffffff;
  border: 2px solid #A5A6F6;
  border-radius: 15px 15px 15px 5px; /* Sudut bawah kiri lebih tajam */
  padding: 10px 15px;
  color: #5D5FEF;
  margin-bottom: 10px;
}

    .message-time {
      font-size: 0.75rem;
      color: #777;
      margin-top: 4px;
    }

    .message-status {
      margin-left: 5px;
    }

    .chat-input-area {
      padding: 15px 20px;
      background: rgba(255,255,255,0.9);
      border-top: 1px solid #e0e0e0;
    }

    .chat-form {
      display: flex;
      gap: 10px;
    }

    .message-input {
      flex-grow: 1;
      padding: 12px 20px;
      border-radius: 25px;
      border: none;
      background-color: #f4cec0;
      outline: none;
      font-size: 0.9rem;
    }

    .send-button {
      background-color: #a36235;
      border: none;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .send-button:hover {
      background-color: #8a512b;
    }

    /* Custom scrollbar */
    .chat-messages::-webkit-scrollbar {
      width: 6px;
    }

    .chat-messages::-webkit-scrollbar-track {
      background: rgba(0,0,0,0.05);
    }

    .chat-messages::-webkit-scrollbar-thumb {
      background: rgba(0,0,0,0.1);
      border-radius: 3px;
    }
  </style>
</head>
<body>
  <div class="chat-container">

    <div class="chat-header">
      <button class="back-button" onclick="window.location.href='{{ route('notif-chat') }}'">
        <i class="bi bi-arrow-left"></i>
      </button>
      
      <div class="recipient-info">
        <img src="{{ asset($receiver->profile_photo ?? 'image/Profile-Foto.jpg') }}" alt="Profile" class="recipient-avatar" />
        <div>
          <div class="recipient-name">{{ $user->name }}</div>
          <div class="recipient-status">Online</div>
        </div>
      </div>
    </div>

    <div class="chat-messages" id="chatMessages">
      @foreach($messages as $message)
        <div class="message-container {{ $message->sender_type === 'make_up_artist' ? 'message-sent' : 'message-received' }}">
          <div class="message-bubble {{ $message->sender_type === 'make_up_artist' ? 'sent-bubble' : 'received-bubble' }}">
            {{ $message->message }}
          </div>
          @if($message->sender_type === 'make_up_artist')
              <span class="message-status">
                @if(!$message->is_read)
                  <i class="bi bi-check"></i>
                @else
                  <i class="bi bi-check-all text-primary"></i>
                @endif
              </span>
            @endif
          <div class="message-time">
            {{ $message->created_at->format('H:i') }}
          </div>
        </div>
      @endforeach
    </div>

    <div class="chat-input-area">
      <form method="POST" action="{{ route('chat.mua.send.user', $user->id) }}" class="chat-form">
        @csrf
        <input type="text" name="message" class="message-input" placeholder="Ketik pesan..." required>
        <button type="submit" class="send-button">
          <i class="bi bi-send-fill"></i>
        </button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Auto scroll to bottom
    document.addEventListener('DOMContentLoaded', function() {
      const chatContainer = document.getElementById('chatMessages');
      chatContainer.scrollTop = chatContainer.scrollHeight;
      
      // Focus on input field
      document.querySelector('.message-input').focus();
    });
  </script>
</body>
</html>