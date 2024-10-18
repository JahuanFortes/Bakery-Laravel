<x-app-layout>
    @dump($categories)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="#">
                        @csrf
                        <x-input-label for="title"/>
                        <x-text-input name="title"/>

                        <x-input-label for="description"/>
                        <x-input-textarea name="description"/>

                        <x-categories-list :categories="$categories">

                        </x-categories-list>

                        <x-primary-button>
                            Submit
                        </x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>



