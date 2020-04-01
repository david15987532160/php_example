<?php

namespace App\Http\Controllers;

use App\Models\Conversation;

class ConversationsController extends Controller
{
    public function index()
    {
        return view('conversations.index', [
            'conversations' => Conversation::with('replies')->latest()->get(),
        ]);
    }

    public function show(Conversation $conversation)
    {
        return view('conversations.show', [
            'conversation' => $conversation,
        ]);
    }
}
