<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function store(StoreUpdatePostRequest $request)
    {
        $request->validated();

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
        $post = $this->model->find($id);

        return view('IsslerBlog.IsslerBlog-show', compact('post'));
    }

    public function edit(string $id)
    {
        $post = $this->model->find($id);

        return view('IsslerBlog.IsslerBlog-edit', compact('post'));
    }

    public function update(string $id, StoreUpdatePostRequest $request)
    {
        $request->validated();

        if ($request->hasFile('thumbnail'))
        {
            $thumbnail = $request->thumbnail;
    
            $thumbnailName = md5($thumbnail->getClientOriginalName() . strtotime("now") . "." . $thumbnail->extension());

            $thumbnail->move(public_path('img/posts/thumbnails'), $thumbnailName);
            unlink(public_path('img/posts/thumbnails/' . $this->model->findOrFail($id)->thumbnail));
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