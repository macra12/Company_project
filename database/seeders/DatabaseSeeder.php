<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create a user
        $user = User::create([
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'bio' => 'This is a test user.',
        ]);

        // Create a category
        $category = Category::create([
            'name' => 'Technology',
            'slug' => 'technology',
        ]);

        // Create a tag
        $tag = Tag::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);

        // Create a post
        $post = Post::create([
            'title' => 'Sample Blog Post',
            'slug' => 'sample-blog-post',
            'excerpt' => 'This is a sample blog post excerpt.',
            'content' => '<p>This is the content of the sample blog post.</p>',
            'author_id' => $user->id,
            'category_id' => $category->id,
            'published_at' => now(),
            'reading_time' => 5,
            'is_featured' => true,
        ]);

        // Attach tag to post
        $post->tags()->attach($tag->id);

        // Create a comment
        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => $user->id,
            'content' => 'This is a sample comment.',
        ]);

        // Create a reply
        Comment::create([
            'post_id' => $post->id,
            'user_id' => $user->id,
            'parent_id' => $comment->id,
            'content' => 'This is a sample reply.',
        ]);
    }
}
