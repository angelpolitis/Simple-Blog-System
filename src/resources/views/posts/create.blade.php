<x-app-layout>
    <x-page-header title="Create Post"/>

    <div class="py-6 max-w-7xl mx-auto px-2">
        <form method="POST" action="{{ route('post.store') }}">
            @include('posts._form', ['buttonText' => 'Create Post'])
        </form>
    </div>
</x-app-layout>