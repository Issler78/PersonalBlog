<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function __construct(
        protected PostService $service
    ){}

    public function index(Request $request)
    {
        $posts = $this->service->getAll($request->filter);

        return view('IsslerBlog.IsslerBlog-index', compact('posts'));
    }

    public function create()
    {
        return view('IsslerBlog.IsslerBlog-publish');
    }

    public function store(StoreUpdatePostRequest $request)
    {
        if ($request->hasFile('thumbnail'))
        {    
            $thumbnail = $request->thumbnail;
    
            $thumbnailName = md5($thumbnail->getClientOriginalName() . strtotime("now") . "." . $thumbnail->extension());
    
            $thumbnail->move(public_path('img/posts/thumbnails'), $thumbnailName);
        }
        
        $this->service->new(
            $thumbnailName,
            $request->title,
            $request->category,
            $request->body
        );

        return redirect()->route('IsslerBlog.index');
    }

    public function show(string $id)
    {
        $post = $this->service->findOne($id);

        return view('IsslerBlog.IsslerBlog-show', compact('post'));
    }

    public function edit(string $id, Post $post)
    {
        $post = $post->findOrFail($id);

        return view('IsslerBlog.IsslerBlog-edit', compact('post'));
    }

    public function update(string $id, StoreUpdatePostRequest $request, Post $post)
    {
        if ($request->hasFile('thumbnail'))
        {
            $thumbnail = $request->thumbnail;
    
            $thumbnailName = md5($thumbnail->getClientOriginalName() . strtotime("now") . "." . $thumbnail->extension());

            $thumbnail->move(public_path('img/posts/thumbnails'), $thumbnailName);
            unlink(public_path('img/posts/thumbnails/' . $post->findOrFail($id)->thumbnail));
        }
        else
        {
            $thumbnailName = $post->findOrFail($id)->thumbnail;
        }

        $this->service->update(
            $id,
            $thumbnailName,
            $request->title,
            $request->category,
            $request->body 
        );

        return redirect()->route('IsslerBlog.index');
    }

    public function destroy(string $id, Post $post)
    {
        $post = $post->findOrFail($id);

        unlink(public_path('/img/posts/thumbnails/' . $post->thumbnail));

        $this->service->delete($id);

        return redirect()->route('IsslerBlog.index');
    }
}