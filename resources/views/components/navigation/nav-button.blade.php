@props(['active'])

@php
$classes = ($active ?? false)
            ? ''
            : 'inline-flex items-center px-1 border-b-2 border-transparent text-sm font-medium leading-5  text-primary  hover:text-primary dark:hover:text-primary hover:border-primary dark:hover:border-primary focus:outline-none focus:text-primary dark:focus:primary focus:border-primary dark:focus:border-primary transition duration-150 ease-in-out';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }} py-2>
    {{ $slot }}
</button>