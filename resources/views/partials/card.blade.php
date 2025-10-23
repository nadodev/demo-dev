{{-- Card Component --}}
<div class="bg-white rounded-lg shadow-md border border-gray-200 {{ $class ?? '' }}">
    @if(isset($header))
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">{{ $header }}</h3>
        </div>
    @endif
    
    <div class="px-6 py-4">
        {{ $slot }}
    </div>
    
    @if(isset($footer))
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            {{ $footer }}
        </div>
    @endif
</div>
