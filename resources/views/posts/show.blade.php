<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <article class="prose dark:prose-invert max-w-none">
                        {!! nl2br(e($post->content)) !!}
                    </article>

                    <div class="mt-6 flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                        <span>Created: {{ $post->created_at->format('Y-m-d H:i') }}</span>
                        <span>Updated: {{ $post->updated_at->format('Y-m-d H:i') }}</span>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-3">
                        <a href="{{ route('posts.edit', $post) }}" class="px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700">Edit</a>
                        <a href="{{ route('posts.index') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
