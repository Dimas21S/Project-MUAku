<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MakeUpArtist;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    // Menangani Update pesan dari user ke MUA
    public function userToMua($mua_id)
    {
        $user = Auth::user();

        //Mencari id mua
        $mua = MakeUpArtist::findOrFail($mua_id);

        $messages = Message::where(function ($query) use ($user, $mua) {
            $query->where('sender_id', $user->id)
                ->where('sender_type', 'user')
                ->where('receiver_id', $mua->id)
                ->where('receiver_type', 'make_up_artist');
        })
            ->orWhere(function ($query) use ($user, $mua) {
                $query->where('sender_id', $mua->id)
                    ->where('sender_type', 'make_up_artist')
                    ->where('receiver_id', $user->id)
                    ->where('receiver_type', 'user');
            })
            ->orderBy('created_at', 'asc')
            ->get();

        // Tandai pesan sebagai dibaca
        Message::where('sender_id', $mua->id)
            ->where('sender_type', 'make_up_artist')
            ->where('receiver_id', $user->id)
            ->where('receiver_type', 'user')
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return view('chat.user-chat', compact('mua', 'messages'));
    }

    //Menangani pengiriman pesan dari user ke mua
    public function userSendToMua(Request $request, $mua_id)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        //Mencari id mua yang ingin dichat
        $mua = MakeUpArtist::findOrFail($mua_id);

        Message::create([
            'sender_id' => Auth::id(),
            'sender_type' => 'user',
            'receiver_id' => $mua->id,
            'receiver_type' => 'make_up_artist',
            'message' => $request->message,
            'is_read' => false,
        ]);

        return back()->with('success', 'Pesan terkirim!');
    }

    // Untuk MUA mengirim ke user
    public function muaToUser($user_id)
    {
        $mua = Auth::guard('makeup_artist')->user();
        $user = User::findOrFail($user_id);

        $messages = Message::where(function ($query) use ($user, $mua) {
            $query->where('sender_id', $user->id)
                ->where('sender_type', 'user')
                ->where('receiver_id', $mua->id)
                ->where('receiver_type', 'make_up_artist');
        })
            ->orWhere(function ($query) use ($user, $mua) {
                $query->where('sender_id', $mua->id)
                    ->where('sender_type', 'make_up_artist')
                    ->where('receiver_id', $user->id)
                    ->where('receiver_type', 'user');
            })
            ->orderBy('created_at', 'asc')
            ->get();

        // Tandai pesan sebagai dibaca
        Message::where('sender_id', $user->id)
            ->where('sender_type', 'user')
            ->where('receiver_id', $mua->id)
            ->where('receiver_type', 'make_up_artist')
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return view('chat.mua-chat', compact('user', 'messages'));
    }

    public function muaSendToUser(Request $request, $user_id)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $user = User::findOrFail($user_id);

        Message::create([
            'sender_id' => Auth::guard('makeup_artist')->id(),
            'sender_type' => 'make_up_artist',
            'receiver_id' => $user->id,
            'receiver_type' => 'user',
            'message' => $request->message,
            'is_read' => false,
        ]);

        return back()->with('success', 'Pesan terkirim!');
    }

    //Mengambil chat yang diterima oleh makeup artist
    public function receivedMessages()
    {
        $mua = Auth::guard('makeup_artist')->user();

        // Ambil pesan terbaru dari setiap pengirim
        $latestMessages = Message::where('receiver_id', $mua->id)
            ->where('receiver_type', 'make_up_artist')
            ->select('sender_id', 'sender_type', DB::raw('MAX(created_at) as latest_time'))
            ->groupBy('sender_id', 'sender_type')
            ->orderBy('latest_time', 'desc')
            ->get();

        // Ambil detail lengkap dari pesan-pesan terbaru tersebut
        $messages = collect();
        foreach ($latestMessages as $latest) {
            $message = Message::where('receiver_id', $mua->id)
                ->where('receiver_type', 'make_up_artist')
                ->where('sender_id', $latest->sender_id)
                ->where('sender_type', $latest->sender_type)
                ->where('created_at', $latest->latest_time)
                ->first();

            if ($message) {
                $messages->push($message);
            }
        }

        return view('chat.notif-chat', compact('messages'));
    }

    public function showChatPage()
    {
        // Ambil semua MUA yang diterima
        $muas = MakeUpArtist::where('status', 'accepted')->get();

        // Jika ada parameter MUA ID, tampilkan pesan dengan MUA tersebut
        $selectedMuaId = request('mua_id');

        if ($selectedMuaId) {
            $selectedMua = MakeUpArtist::findOrFail($selectedMuaId);

            // Ambil pesan antara user yang login dan MUA yang dipilih
            $messages = Message::where(function ($query) use ($selectedMuaId) {
                $query->where('sender_id', auth()->id())
                    ->where('sender_type', 'user')
                    ->where('receiver_id', $selectedMuaId)
                    ->where('receiver_type', 'make_up_artist');
            })
                ->orWhere(function ($query) use ($selectedMuaId) {
                    $query->where('sender_id', $selectedMuaId)
                        ->where('sender_type', 'make_up_artist')
                        ->where('receiver_id', auth()->id())
                        ->where('receiver_type', 'user');
                })
                ->orderBy('created_at', 'asc')
                ->get();

            // Tandai pesan sebagai dibaca
            Message::where('sender_id', $selectedMuaId)
                ->where('sender_type', 'make_up_artist')
                ->where('receiver_id', auth()->id())
                ->where('is_read', false)
                ->update(['is_read' => true]);
        } else {
            $selectedMua = null;
            $messages = collect();
        }

        return view('chat.halaman-chat', [
            'muas' => $muas,
            'selectedMua' => $selectedMua,
            'messages' => $messages
        ]);
    }
}
