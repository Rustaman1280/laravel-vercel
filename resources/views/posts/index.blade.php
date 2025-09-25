<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-md bg-green-50 p-4 text-green-700 dark:bg-green-900/30 dark:text-green-300">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-4">
                <form method="GET" class="flex-1 max-w-sm">
                    <label for="q" class="sr-only">Search</label>
                    <input type="text" name="q" id="q" value="{{ request('q') }}" placeholder="Search title..."
                           class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500" />
                </form>

                <a href="{{ route('posts.create') }}" class="ms-4 inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    + New Post
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Title</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Published</th>
                                    <th class="px-4 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($posts as $post)
                                    <tr>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('posts.show', $post) }}" class="text-indigo-600 hover:underline">
                                                {{ $post->title }}
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">{{ optional($post->published_at)->format('Y-m-d H:i') ?? '-' }}</td>
                                        <td class="px-4 py-3 text-right whitespace-nowrap">
                                            <a href="{{ route('posts.edit', $post) }}" class="text-sm text-blue-600 hover:underline me-3">Edit</a>
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm text-red-600 hover:underline" onclick="return confirm('Delete this post?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-4 py-6 text-center text-gray-500">No posts yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $posts->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</x-app-layout>
