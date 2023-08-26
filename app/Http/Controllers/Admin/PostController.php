<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::flash('page', 'post');
        $posts = Post::with('user')->where('user_id', auth()->user()->id)->get()->toArray();
        return view('admin.posts.index', array('posts' => $posts));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        Post::create([
            'user_id'=> auth()->user()->id,
            'title'=> $request->title,
            'status'=>1,
            'description' => $request->description
        ]);
        return to_route('admin.posts.index')->with('success_message', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) 
    {
        // if (Gate::allows('edit')) { // for gate 
        // //if (auth()->user()->can('view')) { //this for gate
        //     return auth()->user()->id === $post->user_id
        //     ? view('admin.posts.edit', array('post' => $post))
        //     : abort(404);
        // }
        // else 
        // {
        //     abort(403);
        // }
        $this->authorize('view', $post);
            return view('admin.posts.edit', array('post' => $post));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'user_id'=> auth()->user()->id,
            'title'=> $request->title,
            'status'=>1,
            'description' => $request->description
        ]);
        return to_route('admin.posts.index')->with('success_message', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('admin.posts.index')->with('success_message', 'Post deleted successfully');
    }
}
