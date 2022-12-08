<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getFriends()
    {
        $friends = User::all();
        return view('friends-list', compact('friends'));
    }

    public function chatFriend(User $user)
    {
        return view('chat', compact('user'));
    }
}
