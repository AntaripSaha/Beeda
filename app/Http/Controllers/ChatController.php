<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getChats()
    {
        $parent = 'seller';
        $page = 'chats';
        return view('store_owner.chat.chats', compact('page', 'parent'));
    }
}
