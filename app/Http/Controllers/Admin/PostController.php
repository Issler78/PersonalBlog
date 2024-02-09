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
            'thumbnail' => 'required|image|mimes:png,jpg,webp',
            'title' => 'required|min:3|max:255',
            'category' => Rule::in('F', 'B', 'M', 'G'),
            'body' => 'required|min:3'
        ]);

        $thumbnail = $request->thumbnail;

        $thumbnailName = md5($thumbnail->getClientOriginalName() . strtotime("now") . "." . $thumbnail->extension());

        $thumbnail->move(public_path('img/posts/thumbnails'), $thumbnailName);
        
        $this->model->create([
            'thumbnail' => $thumbnailName,
            'title' => $request->title,
            'category' => $request->category,
            'body' => $request->body
        ]);


        return redirect()->route('IsslerBlog.index');
    }

    public function show(string $id)
    {
        $post = $this->model->all()->find($id);

        return view('IsslerBlog.IsslerBlog-show', compact('post'));
    }

    public function edit(string $id)
    {
        $post = $this->model->all()->find($id);

        return view('IsslerBlog.IsslerBlog-edit', compact('post'));
    }

    public function update(string $id, Request $request)
    {
        $request->validate([
            'thumbnail' => 'image|mimes:png,jpg,webp',
            'title' => 'required|min:3|max:255',
            'category' => Rule::in('F', 'B', 'M', 'G'),
            'body' => 'required|min:3'
        ]);

        if ($request->hasFile('thumbnail'))
        {
            $thumbnail = $request->thumbnail;
    
            $thumbnailName = md5($thumbnail->getClientOriginalName() . strtotime("now") . "." . $thumbnail->extension());

            $thumbnail->move(public_path('img/posts/thumbnails'), $thumbnailName);
        }
        else
        {
            $thumbnailName = $this->model->findOrFail($id)->thumbnail;
        }

        $this->model->findOrFail($id)->update([
            'thumbnail' => $thumbnailName,
            'title' => $request->title,
            'category' => $request->category,
            'body' => $request->body 
        ]);

        return redirect()->route('IsslerBlog.index');
    }

    public function destroy(string $id)
    {
        $this->model->findOrFail($id)->delete();

        return redirect()->route('IsslerBlog.index');
    }
}