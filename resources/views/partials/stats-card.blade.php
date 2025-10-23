{{-- Stats Card Component --}}
<div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <div class="w-8 h-8 {{ $iconBg ?? 'bg-purple-100' }} rounded-md flex items-center justify-center">
                @if(isset($icon))
                    {!! $icon !!}
                @else
                    <svg class="w-5 h-5 {{ $iconColor ?? 'text-purple-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                @endif
            </div>
        </div>
        <div class="ml-4">
            <p class="text-sm font-medium text-gray-500">{{ $label }}</p>
            <p class="text-2xl font-semibold text-gray-900">{{ $value }}</p>
        </div>
    </div>
    
    @if(isset($change))
        <div class="mt-4">
            <span class="text-sm {{ $change['positive'] ? 'text-green-600' : 'text-red-600' }}">
                {{ $change['positive'] ? '↗' : '↘' }} {{ $change['value'] }}%
            </span>
            <span class="text-sm text-gray-500 ml-1">{{ $change['period'] ?? 'vs mês anterior' }}</span>
        </div>
    @endif
</div>
