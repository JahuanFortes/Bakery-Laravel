<form action="{{ route('post.filter') }}" method="GET">
    <label class="font-semibold text-gray-800 dark:text-gray-200 leading-tight" for="category_id"/>
    <select name="category_id" id="category_id"
            class="rounded-md shadow-lg bg-gray-800 text-gray-800 dark:text-gray-200 leading-tight">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
    </select>
    <x-primary-button type="submit">Filter</x-primary-button>
</form>

