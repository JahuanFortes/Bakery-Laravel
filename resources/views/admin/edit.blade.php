<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route("posts.update",$post->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <x-input-label for="title"/>
                        <x-text-input name="title" type="text" value="{{ old('title', $post->title) }}" required/>
                        @error('title')<span>{{$message}}</span> @enderror

                        <x-input-label for="description"/>
                        <x-input-textarea name="description" value="{{ old('description', $post->description) }}"
                                          required/>
                        @error('description')<span>{{$message}}</span> @enderror

                        <x-categories-list :allCategories="$categories" name="category"/>

                        <x-primary-button>
                            Submit
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



