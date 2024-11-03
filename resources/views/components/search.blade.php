<div>
    @csrf
    <form method="get" action="/search">
        <label>
            <input name="search" placeholder="Search..."
                   value="{{request()->input('search') ? request()->input('search'):''}}"/>
        </label>
        <button
            class="inline-flex items-center content-end px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
            type="submit">Search
        </button>
    </form>
    {{--filter Doesn't work--}}
    {{--    <form action="{{ route('post.filter') }}" method="GET">--}}
    {{--        <label for="category_id">Filter:</label>--}}
    {{--        <select name="category_id" id="category_id">--}}
    {{--            @foreach($categories as $category)--}}
    {{--                <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
    {{--            @endforeach--}}
    {{--        </select>--}}
    {{--        <button type="submit">Submit</button>--}}
    {{--    </form>--}}
</div>
