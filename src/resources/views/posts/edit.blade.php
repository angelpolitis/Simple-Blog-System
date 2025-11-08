<x-app-layout>
    <x-page-header title="Edit Post"/>

    <div class="py-6 max-w-7xl mx-auto px-2">
        <form method="POST" action="{{ route('post.update', $post) }}">
            @method('PUT')
            @include('posts._form', ['buttonText' => 'Update Post'])
        </form>
    </div>
</x-app-layout>