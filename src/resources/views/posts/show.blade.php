<x-app-layout>
    <x-page-header title="{{ $post->title }}"/>

    <div class="py-6 max-w-7xl mx-auto space-y-8 px-6">

        {{-- Post --}}
        <div class="border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
            <p class="text-gray-800 dark:text-gray-200">
                {{ $post->content }}
            </p>

            <p class="text-sm text-gray-500 dark:text-gray-400 mt-3">
                by {{ $post->user->name }} • {{ $post->created_at->diffForHumans() }}
            </p>

            @can('update', $post)
            <div class="mt-4 flex space-x-3">
                <a href="{{ route('post.edit', $post) }}"
                    class="text-blue-600 dark:text-blue-400 hover:underline">
                    Edit
                </a>

                <form method="POST" action="{{ route('post.destroy', $post) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-red-600 dark:text-red-400 hover:underline"
                        onclick="return confirm('Are you sure you want to delete this post?')">
                        Delete
                    </button>
                </form>
            </div>
            @endcan
        </div>

        {{-- Comments --}}
        <div class="border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 mb-4">
                Comments
            </h3>

            @forelse ($post->comments as $comment)
            <div class="mb-4 pb-4 border-b border-gray-200 dark:border-gray-700 last:border-0">
                <p class="text-gray-800 dark:text-gray-200">{{ $comment->comment }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    by {{ $comment->user->name }} • {{ $comment->created_at->diffForHumans() }}
                </p>
            </div>
            @empty
            <p class="text-gray-500 dark:text-gray-400">No comments yet.</p>
            @endforelse

            @auth
            <form method="POST" action="{{ route('post.comment', $post) }}" class="mt-6 space-y-2">
                @csrf
                <textarea
                    name="comment"
                    rows="3"
                    class="w-full px-3 py-2 border rounded-md
                               bg-white dark:bg-gray-900
                               text-gray-800 dark:text-gray-200
                               border-gray-300 dark:border-gray-700
                               placeholder-gray-400 dark:placeholder-gray-500
                               focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Add a comment..."></textarea>

                @error('comment')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <button
                    type="submit"
                    class="px-4 py-2 rounded-md text-white bg-blue-600 hover:bg-blue-700
                               dark:bg-blue-500 dark:hover:bg-blue-600
                               transition">
                    Comment
                </button>
            </form>
            @endauth
        </div>
    </div>
</x-app-layout>