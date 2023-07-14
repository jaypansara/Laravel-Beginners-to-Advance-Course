<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $Posts = Post::paginate(15);
        $Posts = Post::paginate(9);
        return view('posts.index', ['posts' => $Posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        //    Post::create($request->all());
        Post::create([
            'title' => $request->title,
            'user_id'=> 1,
            'description' => $request->description,
            'is_publish' => $request->is_publish,
            'is_active' => $request->is_active
        ]);

        $request->session()->flash('alert-success', 'saved successfully!');
        // session::put('alert-success','saved successfully');
        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }

        // with compact
        //  return view('posts.show', compact('post'));

        // with array
        return view('posts.show ', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {

        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        $post->update([
            'title' => $request->title,

            'description' => $request->description,
            'is_publish' => $request->is_publish,
            'is_active' => $request->is_active
        ]);

        $request->session()->flash('alert-info', 'Post Update Successfully');

        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request  $request, string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        $post->delete();
        //(function add Request $request)$request->session()->flash('alert-success','Post Deleted Successfully');
        request()->session()->flash('alert-danger', 'Post Deleted Successfully');
        return to_route('posts.index');
    }
    public function softDelete(request $request, $id)
    {
        $post = Post::onlyTrashed()->find($id);
        if (!$post) {
            abort(404);
        }

        $post->update([
            'deleted_at' => null
        ]);

        $request->session()->flash('alert-message', 'Post Recovered Successfully');
        return to_route('posts.index');
    }

    public function getPosts(){
        return DB::table('posts')->first();
    }
}
