<?php

namespace App\Http\Controllers;

use App\Http\Requests\postRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use FileUpload;

    protected array $columns = ['id', 'Title', 'Subtitle', 'category', 'Image', 'Status', 'Actions'];


    public function index(Request $request)
    {
        $data = [
            [
                'title' => 'Title',
                'sub_title' => 'Subtitle',
                'category_id' => 13,
                'image' => 'Image',
                'description' => 'Description',
                'user_id' => 1
            ],
            [
                'title' => 'Title',
                'sub_title' => 'Subtitle',
                'category_id' => 13,
                'image' => 'Image',
                'description' => 'Description',
                'user_id' => 1

            ],
            [
                'title' => 'Title',
                'sub_title' => 'Subtitle',
                'category_id' => 13,
                'image' => 'Image',
                'description' => 'Description',
                'user_id' => 1

            ],
            [
                'title' => 'Title',
                'sub_title' => 'Subtitle',
                'category_id' => 13,
                'image' => 'Image',
                'description' => 'Description',
                'user_id' => 1

            ]
        ];
       Post::query()->insert($data);
        $columns = $this->columns;
        $posts = Post::query()->with('category')->get();
        $resources = PostResource::collection($posts);
        return view('welcome', ['posts' => $resources, 'columns' => $columns]);
    }


    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }


    public function store(postRequest $postRequest)
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
        $post = Post::with('category')->find($id);
        $categories = Category::all();
        return view('edit', compact('post', 'categories'));
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
