<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;


class PostController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index','show'])
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenant = auth()->user()->tenant;
        return response()->json($tenant->posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = auth()->user()->tenant->posts()->create($request->only('title', 'content'));
        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        Gate::authorize('modify', $post);

        $post = Post::where('tenant_id', auth()->user()->tenant->id)->first();
        $post->update($request->only('title', 'content'));
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('modify', $post);

        $post = Post::where('tenant_id', auth()->user()->tenant->id)->first();
        $post->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
