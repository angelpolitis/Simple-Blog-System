<x-app-layout>
    <x-page-header title="Dashboard" />

    <div class="py-6 max-w-7xl mx-auto px-6 space-y-6">
        @forelse ($posts as $post)
            <div class="border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800
                    p-5 rounded-lg shadow-sm hover:shadow-md transition relative">

                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                            <a href="{{ route('post.show', $post) }}" class="hover:underline">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            by {{ $post->user->name }} • {{ $post->created_at->diffForHumans() }}
                        </p>
                    </div>

                    {{-- Edit/Delete buttons for author --}}
                    @can('update', $post)
                    <div class="flex space-x-2">
                        <a href="{{ route('post.edit', $post) }}"
                            class="text-blue-600 dark:text-blue-400 hover:underline text-sm leading-[1.875em]">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('post.destroy', $post) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 dark:text-red-400 hover:underline text-sm"
                                onclick="return confirm('Are you sure you want to delete this post?')">
                                Delete
                            </button>
                        </form>
                    </div>
                    @endcan
                </div>

            </div>
        @empty
            <div class="py-12">
                <div class="max-w-7xl mx-auto">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            {{ __("No posts yet.") }}
                        </div>
                    </div>
                </div>
            </div>
        @endforelse


        <div class="pt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>