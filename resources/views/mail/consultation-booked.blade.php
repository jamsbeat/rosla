<x-mail::message>
# Introduction

{{-- Adding a styled hero section --}}
<div class="bg-gray-100 p-6 rounded-lg mb-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Welcome!</h1>
    <p class="text-gray-600">
        Thank you for booking your consultation with us.
    </p>
</div>

{{-- Styling the button --}}
<x-mail::button :url="''" class="bg-blue-500 hover:bg-blue-600">
    View Booking Details 
</x-mail::button>

{{-- Styled footer --}}
<div class="mt-8 text-gray-600">
    Thanks,<br>
    {{ config('app.name') }}
</div>
</x-mail::message>