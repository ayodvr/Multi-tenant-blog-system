<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create post') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(count($errors) > 0) 
    @foreach($errors->all() as $error)
    <div
    class="alert alert-danger"
    style="width: 100%; margin: auto"
    >
    {{$error}}
    </div>
    @endforeach 
    @endif 
    @if(session('success'))
    <div
    class="alert alert-success"
    style="width: 100%; margin: auto"
    >
    {{session('success')}}
    </div>
    @endif
    <br>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('posts.update', $post) }}">
                        @csrf
                        @method('PUT')
                        @include('partials.form-group', [
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                            'value' => $post->title,
                            'error' => 'title'
                        ])
        
                        @include('partials.form-group', [
                            'label' => 'Content',
                            'name' => 'content',
                            'type' => 'textarea',
                            'value' => $post->content,
                            'error' => 'content',
                            'rows' => 8
                        ])
        
                        <div class="flex justify-end">
                            <x-primary-button class="ms-4">
                                {{ __('Update post') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
