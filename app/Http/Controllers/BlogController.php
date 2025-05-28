<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $query = Post::query()->with(['author', 'category'])->published();

        if ($search = request('search')) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
        }

        if ($category = request('category')) {
            $query->whereHas('category', function($q) use ($category) {
                $q->where('slug', $category);
            });
        }

        if ($tag = request('tag')) {
            $query->whereHas('tags', function($q) use ($tag) {
                $q->where('slug', $tag);
            });
        }

        switch (request('sort', 'latest')) {
            case 'oldest':
                $query->oldest('published_at');
                break;
            case 'popular':
                $query->orderBy('views_count', 'desc');
                break;
            default:
                $query->latest('published_at');
        }

        $posts = $query->paginate(6);
        $categories = Category::withCount('posts')->get();
        $popularTags = Tag::withCount('posts')->orderBy('posts_count', 'desc')->limit(10)->get();

        return view('pages.blog', compact('posts', 'categories', 'popularTags'));
    }

    public function show($slug)
    {
        $post = Post::with(['author', 'category', 'tags', 'comments'])
                    ->where('slug', $slug)
                    ->firstOrFail();

        $post->increment('views_count');

        $recentPosts = Post::published()
                          ->where('id', '!=', $post->id)
                          ->latest('published_at')
                          ->limit(5)
                          ->get();

        $relatedPosts = Post::published()
                           ->where('category_id', $post->category_id)
                           ->where('id', '!=', $post->id)
                           ->inRandomOrder()
                           ->limit(2)
                           ->get();

        $categories = Category::withCount('posts')->get();
        $popularTags = Tag::withCount('posts')->orderBy('posts_count', 'desc')->limit(10)->get();

        return view('pages.blog-details', compact('post', 'recentPosts', 'relatedPosts', 'categories', 'popularTags'));
    }

    public function comment(Request $request, $slug)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();

        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id,
            'content' => $request->content,
        ]);

        $post->increment('comments_count');

        return redirect()->route('blog-details', $post->slug)->with('success', 'Comment posted successfully!');
    }
}
