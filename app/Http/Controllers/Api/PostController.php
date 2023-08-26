<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends ApiController
{
    public function index()
    {
        $posts = Post::orderByDesc('id')->get();

        return $this->sendResponse(PostResource::collection($posts));
    }

    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return $this->sendError('Post not found', 404);
        }

        return $this->sendResponse(new PostResource($post));
    }

    public function store(Request $request)
    {
        $this->validation([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Auth::user()->posts()->create($request->only(['title', 'content']));

        return $this->sendResponse(new PostResource($post), null, 201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return $this->sendError('Post not found', 404);
        }
        
        if ($post->user_id !== Auth::id()) {
            return $this->sendError('Unauthorized', 401);
        }
        $post->update($request->only(['title', 'content']));

        return $this->sendResponse(new PostResource($post));
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return $this->sendError('Post not found', 404);
        }

        if ($post->user_id !== Auth::id()) {
            return $this->sendError('Unauthorized', 401);
        }

        $post->delete();

        return $this->sendResponse(null, 'Post deleted', 200);
    }
}
