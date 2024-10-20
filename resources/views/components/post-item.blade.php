@props(['post'])
@props(['categories'])
<div>
    @foreach($posts as $post)
        @foreach($categories as $category)
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                <div class="md:flex">
                    <div class="md:shrink-0">
                        <img src="#" class="h-48 w-full object-cover md:h-full md:w-48"/>
                    </div>
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                            {{$category->title}}
                        </div>
                        <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">
                            {{$post->title}}
                        </a>
                        <p class="mt-2 text-slate-500">{{$post->description}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach

</div>
