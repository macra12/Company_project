<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
        ]);
        Comment::create($request->all());
        return redirect()->route('blog-details', $request->post_id)->with('success', 'Comment posted!');
    }
}
