<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\Posts\{NewPostDTO, UpdatePostDTO};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePostRequest;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(
        protected PostService $service
    ){}

    public function index(Request $request)
    {
        $filters = $request->get('filter', '');

        $posts = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('totalPerPage', 8),
            filter: $filters
        );

        dd($posts);

        $filters = ['filter' => $filters];

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