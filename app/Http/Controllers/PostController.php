<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use FileUpload;

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('welcome', compact('posts'));
    }


    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $data = $request->all();
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


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $post = Post::find($id);
        if (isset($data['image'])){
            $data = $this->fileUpload($data);
        }
        $post->update($data);
        return redirect()->route('home');
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('home');
    }
}
