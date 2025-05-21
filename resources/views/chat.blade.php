<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Chat</title>
  <style>
        body {
      margin: 0;
      font-family: inter;
      background-color: #D9D9D9;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .chat-container {
      width: 1250px;
      height: 630px;
      border-radius: 10px;
      background: linear-gradient(to bottom, #f0cfc3, #f8f1ee);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: relative;
      padding: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .chat-header {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      padding: 10px 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: rgba(255, 255, 255, 0.7);
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      z-index: 10;
    }

    .recipient-info {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-left: 40px;
    }

    .recipient-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #fff;
    }

    .recipient-name {
      font-weight: bold;
      color: #5a3921;
    }

    .recipient-status {
      font-size: 0.8rem;
      color: #777;
    }

    .back-button {
      background-color: white;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      text-align: center;
      line-height: 30px;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .top-icons {
      display: flex;
      gap: 10px;
    }

    .top-icons img {
      width: 30px;
      height: 30px;
      cursor: pointer;
    }

    .messages {
      flex-grow: 1;
      margin-top: 60px;
      display: flex;
      flex-direction: column;
      gap: 10px;
      overflow-y: auto;
      padding: 10px;
    }

    .message {
      max-width: 60%;
      padding: 10px 15px;
      border-radius: 20px;
      display: inline-block;
      word-wrap: break-word;
    }

    .user {
      align-self: flex-end;
      background-color: #fceeea;
      border-bottom-right-radius: 5px;
    }

    .bot {
      align-self: flex-start;
      background-color: white;
      border-bottom-left-radius: 5px;
    }

    .input-area {
      display: flex;
      margin-top: 10px;
      padding: 10px;
      background: rgba(255,255,255,0.7);
      border-radius: 30px;
    }

    .input-box {
      flex-grow: 1;
      padding: 10px 15px;
      border-radius: 20px;
      border: none;
      background-color: #f4cec0;
      outline: none;
    }

    .send-btn {
      background-color: #a36235;
      border: none;
      padding: 10px;
      margin-left: 10px;
      border-radius: 50%;
      color: white;
      cursor: pointer;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .time-stamp {
      font-size: 0.7rem;
      color: #777;
      margin-top: 5px;
      text-align: right;
    }

    @media (max-width: 768px) {
      .chat-container {
        width: 100%;
        height: 100vh;
        border-radius: 0;
      }
      
      .message {
        max-width: 80%;
      }
    }
  </style>
</head>
<body>

 
  <div class="chat-container">
    <div class="chat-header">
      <div class="back-button">&larr;</div>
      <div class="recipient-info">
        <img src="{{ asset($receiver->profile_photo ?? 'images/default-avatar.png') }}" alt="Profile" class="recipient-avatar" />
      </div>
      <div class="top-icons">
        <button type="button" class="btn btn-light rounded-circle btn-outline-dark" style="width: 40px; height: 40px;">
          <i class="bi bi-heart-fill text-danger"></i>
        </button>
        <button type="button" class="btn btn-light rounded-circle btn-outline-dark" style="width: 40px; height: 40px;">
          <i class="bi bi-whatsapp text-success"></i>
        </button>
      </div>
    </div>

    <div class="messages" id="messages-container">
      @foreach ($messages as $msg)
        <div class="{{ $msg->sender_id == auth()->id() ? 'user' : 'bot' }} message">
          {{ $msg->message }}
          <div class="time-stamp">
            {{ $msg->created_at->format('H:i') }}
          </div>
        </div>
      @endforeach
    </div>

    <form action="{{ route('send-message') }}" method="POST" class="input-area">
      @csrf
      <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
      <input type="text" name="message" class="input-box" placeholder="Tulis pesan..." required />
      <button type="submit" class="send-btn">&#9658;</button>
    </form>
  </div>

</body>
</html>