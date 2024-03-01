<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\Posts\NewPostDTO;
use App\DTOs\Posts\UpdatePostDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(
        protected PostService $service
    ){}

    public function index(Request $request)
    {
        $posts = $this->service->getAll($request->filter);

        $filters = ['filter' => $request->get('filter', '')];

        return view('IsslerBlog.IsslerBlog-index', compact('posts', 'filters'));
    }

    public function create()
    {
        return view('IsslerBlog.IsslerBlog-publish');
    }

    public function store(StoreUpdatePostRequest $request)
    {
        $this->service->new(
            NewPostDTO::makeFromRequest($request)
        );

        return redirect()->route('IsslerBlog.index');
    }

    public function show(string $id)
    {
        $post = $this->service->findOne($id);

        return view('IsslerBlog.IsslerBlog-show', compact('post'));
    }

    public function edit(string $id)
    {
        $post = $this->service->findOne($id);

        return view('IsslerBlog.IsslerBlog-edit', compact('post'));
    }

    public function update(StoreUpdatePostRequest $request)
    {
        $this->service->update(
            UpdatePostDTO::makeFromRequest($request)
        );

        return redirect()->route('IsslerBlog.index');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('IsslerBlog.index');
    }
}