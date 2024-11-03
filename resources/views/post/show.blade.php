<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
        <h4 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">{{ $post->user->name}}</h4>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2> {{$post->description}}</h2>
                </div>

                <form action="{{ route('posts.like', $post->id) }}" method="POST">
                    @csrf
                    <x-primary-button type="submit">Like</x-primary-button>
                </form>

                <!-- Display current like count for this post by the user -->
                <div class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">

                    <p>Likes: {{ $post->users()->where('user_id', Auth::id())->first()->pivot->likecount ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
