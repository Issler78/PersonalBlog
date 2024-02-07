<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function __construct(
        protected Post $model
    ){}

    public function index()
    {
        $posts = $this->model->all();

        return view('IsslerBlog.IsslerBlog-index', compact('posts'));
    }

    public function create()
    {
        return view('IsslerBlog.IsslerBlog-publish');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'category' => Rule::in('F', 'B', 'M', 'G'),
            'body' => 'required|min:3'
        ]);

        $this->model->create([
            'title' => $request->title,
            'category' => $request->category,
            'body' => $request->body
        ]);

        return route('IsslerBlog.index');
    }
}
