@extends('layouts.posts')

@section('content')
<div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">📝 All Blog Posts</h1>
    </br>
    <div class="grid gap-6">
        @forelse ($tenant_post as $post)
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-lg transition p-6 relative">
                <h3 class="text-xl font-semibold text-blue-700 dark:text-blue-400 hover:underline">
                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mt-2">
                    {{ Str::limit($post->content, 120) }}
                </p>

                <div class="text-sm text-gray-500 dark:text-gray-400 mt-4">
                    Posted on {{ $post->created_at->format('M d, Y') }}
                </div>
            </br>
                <div class="absolute top-4 right-4 flex space-x-2">
                    <a href="{{ route('posts.edit', $post) }}"
                       class="text-sm bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-1 px-3 rounded-lg shadow-sm">
                        Edit
                    </a>

                    <form action="{{ route('posts.destroy', $post) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="text-sm bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-1 px-3 rounded-lg shadow-sm">
                        Delete
                    </button>
                </form>
                </div>
    
            </div>
        @empty
            <p class="text-gray-500 dark:text-gray-400">No posts available yet.</p>
        @endforelse
    </div>
    
    </div>
    {{ $tenant_post->links() }}
</div>
@endsection