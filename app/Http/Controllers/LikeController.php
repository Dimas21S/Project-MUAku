<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\MakeUpArtist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //
    public function userLike()
    {
        $user = Auth::user();

        // Mengambil semua make up artist yang disukai oleh user
        $likedArtists = $user->likes()->with('makeUpArtist')->get()->pluck('makeUpArtist');

        return view('user.user-history', compact('likedArtists'));
    }

    public function toggleLike($artistId)
    {
        $user = Auth::user();
        $artist = MakeUpArtist::findOrFail($artistId);

        $existingLike = Like::where('user_id', $user->id)
            ->where('make_up_artist_id', $artist->id)
            ->first();

        if ($existingLike) {
            $existingLike->delete(); // Unlike
            $message = 'Like dihapus.';
        } else {
            Like::create([
                'user_id' => $user->id,
                'make_up_artist_id' => $artist->id,
            ]);
            $message = 'Berhasil menyukai.';
        }

        return redirect()->back()->with('success', $message);
    }

    public function likeCount($artistId)
    {
        $artist = MakeUpArtist::findOrFail($artistId);
        $likeCount = $artist->likes()->count();

        return response()->json(['like_count' => $likeCount]);
    }
}
