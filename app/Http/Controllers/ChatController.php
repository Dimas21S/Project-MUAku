<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\MakeUpArtist;

class ChatController extends Controller
{
    //
    public function chatPage($id)
    {
        $receiver = User::findOrFail($id);

        // Ambil semua pesan antara user login dan receiver
        $messages = Message::where(function ($query) use ($id) {
            $query->where('sender_id', Auth::id())
                ->where('receiver_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('sender_id', $id)
                ->where('receiver_id', Auth::id());
        })->orderBy('created_at')->get();

        return view('chat', compact('messages', 'receiver'));
    }

    // Fungsi untuk mengirim pesan
    // Fungsi ini akan dipanggil ketika user mengirim pesan
    public function sendMessage(Request $request)
    {

        $request->validate([
            'receiver_id' => 'required|integer',
            'message' => 'required|string|max:1000',
        ]);

        // Melakukan pengecekan siapa yang sedang login (user atau makeup artist)
        if (auth()->guard('web')->check()) {
            $senderId = auth()->guard('web')->id();
            $request->merge(['receiver_type' => 'makeup_artist']);
        } elseif (auth()->guard('makeup_artist')->check()) {
            $senderId = auth()->guard('makeup_artist')->id();
            $request->merge(['receiver_type' => 'user']);
        } else {
            return redirect()->back()->with('error', 'Anda harus login terlebih dahulu');
        }

        // Menyimpan pesan ke dalam database
        Message::create([
            'sender_id' => $senderId,
            'sender_type' => auth()->guard('web')->check() ? 'user' : 'makeup_artist',
            'receiver_id' => $request->receiver_id,
            'receiver_type' => $request->receiver_type,
            'message' => strip_tags(trim($request->message)),
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }

    public function chatHistory(Request $request, $receiverId)
    {
        if (auth()->guard('web')->check()) {
            $authId = auth()->guard('web')->id();
        } elseif (auth()->guard('makeup_artist')->check()) {
            $authId = auth()->guard('makeup_artist')->id();
        } else {
            return redirect()->back()->with('error', 'Anda harus login');
        }

        $messages = Message::where(function ($q) use ($authId, $receiverId) {
            $q->where('sender_id', $authId)->where('receiver_id', $receiverId);
        })->orWhere(function ($q) use ($authId, $receiverId) {
            $q->where('sender_id', $receiverId)->where('receiver_id', $authId);
        })->orderBy('created_at')->get();

        return view('chat.index', compact('messages', 'receiverId'));
    }

    public function deleteMessage(Request $request, $id)
    {
        // Find the message by ID
        $message = Message::find($id);

        if ($message) {
            // Delete the message
            $message->delete();

            return response()->json(['status' => 'success', 'message' => 'Message deleted successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Message not found'], 404);
        }
    }

    public function markAsRead(Request $request, $id)
    {
        // Find the message by ID
        $message = Message::find($id);

        if ($message) {
            // Mark the message as read
            $message->is_read = true;
            $message->save();

            return response()->json(['status' => 'success', 'message' => 'Message marked as read']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Message not found'], 404);
        }
    }
}
