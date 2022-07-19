<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    use FileUpload;

    public function index()
    {
        $posts = Post::all();
        return view('welcome', compact('posts'));
    }


    public function create()
    {
        return view('create');
    }


    public function store(PostRequest $postRequest)
    {

        $data = $postRequest->validated();
        $data['user_id'] = 1;
        $data = $this->fileUpload($data);
        Post::create($data);
        return redirect()->route('home');
    }


    public function show($id)
    {
        $post = Post::find($id);
        return view('show', compact('post'));
    }


    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit', compact('post'));
    }


    public function update(PostUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $post = Post::find($id);
        if (isset($data['image'])) {
            $data = $this->fileUpload($data);
        }
        $post->update($data);
        return redirect()->route('home');
    }


    public function destroy($id)
    {
        $request = request()->merge(['id' => $id]);
        $request->validate(['id' => 'required|exists:posts,id']);
        $post = Post::find($id);
        unlink('storage/images/' . $post->image);
        $post->delete();
        return redirect()->route('home');
    }
}
