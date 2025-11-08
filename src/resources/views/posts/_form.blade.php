@csrf

@if($method ?? false)
    @method($method)
@endif

<div class="max-w-7xl mx-auto p-6 bg-white dark:bg-gray-900 rounded-lg">
    <!-- Title -->
    <div class="mb-4">
        <label for="title" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Title</label>
        <input id="title" name="title" type="text"
            value="{{ old('title', $post->title ?? '') }}"
            class="w-full px-3 py-2 border rounded-md
                bg-white dark:bg-gray-800
                text-gray-900 dark:text-gray-100
                border-gray-300 dark:border-gray-600
                placeholder-gray-400 dark:placeholder-gray-500
                focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Enter title">
        @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Content -->
    <div class="mb-4">
        <label for="content" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Content</label>
        <textarea id="content" name="content" rows="5"
            class="w-full px-3 py-2 border rounded-md
                bg-white dark:bg-gray-800
                text-gray-900 dark:text-gray-100
                border-gray-300 dark:border-gray-600
                placeholder-gray-400 dark:placeholder-gray-500
                focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Write your post content here">{{ old('content', $post->content ?? '') }}</textarea>
        @error('content')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit Button -->
    <div class="text-right">
        <button type="submit"
            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700
                        dark:bg-blue-500 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            {{ $buttonText ?? 'Submit' }}
        </button>
    </div>
</div>