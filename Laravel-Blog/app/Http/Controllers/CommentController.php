<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment; 

class CommentController extends Controller
{
    public function storeComment(Request $request, $postId)
    {
        $requˇest->validate([
            'content' => 'required|string|max:255',
        ]);

        Comment::create([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index');
    }

    public function destroy(Comment $comment)
    {
        // Check if the current user is the owner of the comment
        if (auth()->id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }

        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
