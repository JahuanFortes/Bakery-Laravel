<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rules') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2>Rules</h2>
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque odio justo, auctor a
                        volutpat eget, dapibus finibus dui. Praesent sit amet pharetra lacus, in dictum lectus. In hac
                        habitasse platea dictumst. Nunc purus leo, blandit at est auctor, dictum lobortis massa. Aliquam
                        at commodo justo, et varius enim. Sed euismod, nunc quis convallis ornare, sapien ligula
                        imperdiet sem, eu maximus quam nunc nec metus. Sed magna mi, blandit quis quam vel, tincidunt
                        porttitor magna.</p>
                    {{--                    @dump($category)--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
