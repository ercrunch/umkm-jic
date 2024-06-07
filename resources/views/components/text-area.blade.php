@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-700 bg-white text-gray-600 focus:border-rose-200  focus:ring-rose-300  rounded-md shadow-sm']) !!}>
