<?php

namespace App\Http\Controllers\Post\Tag;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $posts = $tag->posts()->paginate(3);
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.tag.index', compact( 'tags', 'posts', 'categories', 'tag'));
    }
}
