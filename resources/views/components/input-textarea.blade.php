@props(['value'])
<div>
    <div>
        <textarea {{ $attributes->merge(['class' => 'block font-medium text-sm border-gray-300 resize-none dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 w-48']) }}>
            {{ $value ?? $slot }}
        </textarea>
    </div>
</div>

