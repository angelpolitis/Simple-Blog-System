<div class="space-y-4">
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
    <form wire:submit.prevent="addComment" class="mt-4 space-y-2">
        <textarea wire:model.defer="newComment"
            rows="3"
            class="w-full px-3 py-2 border rounded-md
                            bg-white dark:bg-gray-900
                            text-gray-800 dark:text-gray-200
                            border-gray-300 dark:border-gray-700
                            placeholder-gray-400 dark:placeholder-gray-500
                            focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Add a comment..."></textarea>
        @error('newComment')
        <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <button
            type="submit"
            class="px-4 py-2 rounded-md text-white bg-blue-600 hover:bg-blue-700
                dark:bg-blue-500 dark:hover:bg-blue-600 transition flex items-center justify-center"
            wire:loading.attr="disabled"
            wire:target="addComment"
        >
            <svg wire:loading wire:target="addComment" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
            </svg>

            <span wire:loading.remove wire:target="addComment">
                Comment
            </span>
        </button>
    </form>
    @endauth
</div>