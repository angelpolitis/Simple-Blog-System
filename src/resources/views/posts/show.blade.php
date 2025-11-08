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
                Comments @if($totalComments) ({{ $totalComments }}) @endif
            </h3>

            @livewire("post-comments", ["post" => $post])
        </div>
    </div>
</x-app-layout>