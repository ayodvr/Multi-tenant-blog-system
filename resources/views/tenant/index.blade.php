@extends('layouts.posts')

@section('content')
<div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">📝 All Blog Posts</h1>
    </br>
        <div class="grid gap-6">
            @forelse ($posts as $post)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-lg transition p-6">
                    <h1 class="text-xl font-semibold text-blue-700 dark:text-blue-400 hover:underline">
                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    </h1>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">{{ Str::limit($post->content, 120) }}</p>
                    <div class="text-sm text-gray-500 dark:text-gray-400 mt-4">
                        Posted on {{ $post->created_at->format('M d, Y') }}
                    </div>
                </div>
            @empty
                <p class="text-gray-500 dark:text-gray-400">No posts available yet.</p>
            @endforelse
        </div>
    </div>
    {{ $posts->links() }}
</div>
@endsection