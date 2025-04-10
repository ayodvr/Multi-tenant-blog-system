<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class WebPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->isAdmin()){
            $posts = Post::orderBy('created_at', 'desc')->paginate(5);
            return view('tenant.index')->with('posts', $posts);
        }else{
            $tenant_post = Post::where('tenant_id', auth()->user()->tenant->id)->paginate(5);
            return view('tenant.tenant_post')->with('tenant_post', $tenant_post);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = auth()->user()->tenant->posts()->create($request->only('title', 'content'));

        return back()->with('success', 'Post created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('tenant.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('tenant.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::where('tenant_id', auth()->user()->tenant->id)->first();
        $post->update($request->only('title', 'content'));
        return back()->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return back();
    }
}
