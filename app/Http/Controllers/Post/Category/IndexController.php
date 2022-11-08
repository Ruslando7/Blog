<?php

namespace App\Http\Controllers\Post\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->paginate(3);
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.category.index', compact( 'tags', 'posts', 'categories', 'category'));
    }
}
