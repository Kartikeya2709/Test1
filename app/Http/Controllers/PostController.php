<?php
namespace App\Http\Controllers; 

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{

    public function __construct()
{
    $this->middleware('auth')->except(['index', 'show']);
}

    public function index() {
        $posts = Post::all();
        // return "hello";
        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Post created!');
    }

    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Post updated!');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted!');
    }

    public function show(Post $post)
{
    return view('posts.show', compact('post'));
}
}
