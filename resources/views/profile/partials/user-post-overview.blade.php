@php
    use App\Http\Controllers\PostController;

    // Fetch posts for the authenticated user
    $postController = new PostController();
    $userPosts = $postController->getPostsByUser(auth()->user()->id);
@endphp

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-user-post-table :posts="$userPosts" name="userPosts"/>
            </div>
        </div>
    </div>
</div>

