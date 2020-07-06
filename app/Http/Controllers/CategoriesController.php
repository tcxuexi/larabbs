<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Topic $topic, Request $request, Category $category)
    {
        $topics = $topic->withOrder($request->order)->where('category_id', $category->id)->with('user', 'category')->paginate(20);

        return view('topics.index', compact('category', 'topics'));
    }
}
