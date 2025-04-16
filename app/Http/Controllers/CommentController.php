<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, User $user, Post $post){
        // Validar 
        $request->validate([
            'comment' => 'required|max:255'
        ]);

        // Almacenar resultado
        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comment' => $request->comment
        ]);

        // Imprimir mensaje
        return back()->with('message', 'Comment Added Successfully');
    }
}
