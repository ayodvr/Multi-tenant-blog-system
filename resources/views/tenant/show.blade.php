<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            📝 Blog Details
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                        <div class="max-w-4xl mx-auto px-5 sm:px-6 lg:px-8">
                                <h1 class="text-4xl font-bold text-gray-800 dark:text-white mb-4">
                                    {{ $post->title }}
                                </h1>
                    
                                <p class="text-sm text-gray-00 dark:text-gray-400 mb-6">
                                    Published on {{ $post->created_at->format('F d, Y') }}
                                    @if($post->user)
                                        by <span class="text-blue-600 dark:text-blue-400">{{ $post->user->name }}</span>
                                    @endif
                                </p>
                    
                                <div class="prose dark:prose-invert max-w-none">
                                    {!! nl2br(e($post->content)) !!}
                                </div>
                            </br>
                                <div class="mt-8">
                                    <a href="{{ route('posts.index') }}"
                                       class="inline-block bg-blue-600 hover:bg-blue-700 text-black font-semibold py-2 px-4 rounded-lg transition">
                                        ← Back to Posts
                                    </a>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</x-app-layout>