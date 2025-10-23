{{-- Button Component --}}
@php
    $baseClasses = 'inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-200';
    
    $variantClasses = match($variant ?? 'primary') {
        'primary' => 'bg-purple-600 hover:bg-purple-700 text-white focus:ring-purple-500',
        'secondary' => 'bg-gray-600 hover:bg-gray-700 text-white focus:ring-gray-500',
        'success' => 'bg-green-600 hover:bg-green-700 text-white focus:ring-green-500',
        'warning' => 'bg-yellow-600 hover:bg-yellow-700 text-white focus:ring-yellow-500',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white focus:ring-red-500',
        'outline' => 'border-gray-300 text-gray-700 bg-white hover:bg-gray-50 focus:ring-purple-500',
        'ghost' => 'text-gray-700 hover:bg-gray-100 focus:ring-purple-500',
        default => 'bg-purple-600 hover:bg-purple-700 text-white focus:ring-purple-500'
    };
    
    $sizeClasses = match($size ?? 'md') {
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base',
        default => 'px-4 py-2 text-sm'
    };
    
    $classes = $baseClasses . ' ' . $variantClasses . ' ' . $sizeClasses . ' ' . ($class ?? '');
@endphp

@if(isset($href))
    <a href="{{ $href }}" class="{{ $classes }}" {{ $attributes ?? '' }}>
        @if(isset($icon))
            <span class="mr-2">{!! $icon !!}</span>
        @endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type ?? 'button' }}" class="{{ $classes }}" {{ $attributes ?? '' }}>
        @if(isset($icon))
            <span class="mr-2">{!! $icon !!}</span>
        @endif
        {{ $slot }}
    </button>
@endif
