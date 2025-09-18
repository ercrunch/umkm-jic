@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-700 bg-white text-gray-600 focus:border-black focus:ring-black  rounded-md shadow-sm']) !!}>
