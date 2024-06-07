@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-700 bg-white text-gray-600 focus:border-orange-900 focus:ring-orange-950  rounded-md shadow-sm']) !!}>
