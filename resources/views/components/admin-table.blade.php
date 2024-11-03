@props(['allPosts'])

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
        <thead>
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200 bg-gray-50">
                ID
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200 bg-gray-50">
                Title
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200 bg-gray-50">
                Active
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200 bg-gray-50">
                User ID
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200 bg-gray-50">
                Category ID
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200 bg-gray-50">
                Created At
            </th>
        </tr>
        </thead>
        <tbody class="text-gray-700">
        @foreach($allPosts as $post)
            <tr class="hover:bg-gray-100">
                <td class="px-6 py-4 border-b border-gray-200">
                    {{$post->id}}
                </td>
                <td class="px-6 py-4 border-b border-gray-200">
                    {{$post->title}}
                </td>
                <td class="px-6 py-4 border-b border-gray-200">
                    <form action="{{ route('posts.toggleActive', $post) }}" method="POST">
                        @csrf
                        <button type="submit">{{ $post->active ? 'Activate' : 'Deactivate' }}</button>
                    </form>
                </td>
                <td class="px-6 py-4 border-b border-gray-200">
                    {{$post->user->name}}
                </td>
                <td class="px-6 py-4 border-b border-gray-200">
                    {{$post->category->title}}
                </td>
                <td class="px-6 py-4 border-b border-gray-200">
                    {{$post->created_at}}
                </td>
                <td class="px-6 py-4 border-b border-gray-200">
                    <a href="{{route("posts.edit",$post->id)}}"> edit</a>
                </td>
                <td class="px-6 py-4 border-b border-gray-200">

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @if(auth()->check() && auth()->user()->admin)
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        @endif
                    </form>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
