@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-primary inline-flex items-center px-1 border-b-2 border-indigo-primary border-primary text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 border-b-2 border-transparent text-sm font-medium leading-5  text-primary  hover:text-primary dark:hover:text-primary hover:border-primary dark:hover:border-primary focus:outline-none focus:text-primary dark:focus:primary focus:border-primary dark:focus:border-primary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} py-2>
    {{ $slot }}
</a>