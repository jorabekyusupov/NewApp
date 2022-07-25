<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Traits\FileUpload;

class PostApiController extends Controller
{

    use FileUpload;

    public function index()
    {
        $posts = Post::query()->get();
        return $this->responseWithData(['posts' => PostResource::collection($posts)]);

    }

    public function store(PostStoreRequest $postStoreRequest)
    {
        $data = $postStoreRequest->validated();
        $data = $this->fileUpload($data);
        $data['user_id'] = 1;
        $post = Post::create($data);
        $resource = new PostResource($post);
        return $this->responseWithMessage(true, 'Post created successfully', 201);
    }


    public function show($id)
    {
        $model = Post::find($id);
        if (!$model) {
            return $this->responseWithMessage(false, 'Post not found', 404);
        }
        $resource = new PostResource($model);
        return  $this->responseWithData(['post' => $resource]);
    }


    public function update($id, PostUpdateRequest $postUpdateRequest)
    {
        $data = $postUpdateRequest->validated();
        if (isset($data['image'])) {
            $data = $this->fileUpload($data);
        }
        $post = Post::find($id);
        if (!$post) {
            return $this->responseWithMessage(false, 'Post not found', 404);
        }
        $post->update($data);
        $resource = new PostResource($post);
        return response()->json($resource);
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return  $this->responseWithMessage(false, 'Post not found', 404);
        }
        $post->delete();
        return $this->responseWithMessage(true, 'Post deleted successfully', 204);
    }
}
