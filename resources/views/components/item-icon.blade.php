@props(['type'])

@php
    $config = match($type) {
        'destination' => ['icon' => 'map-pin', 'bg' => 'bg-blue-50', 'text' => 'text-blue-600'],
        'hotel' => ['icon' => 'building-2', 'bg' => 'bg-violet-50', 'text' => 'text-violet-600'],
        'attraction' => ['icon' => 'landmark', 'bg' => 'bg-amber-50', 'text' => 'text-amber-600'],
        'activity' => ['icon' => 'flag', 'bg' => 'bg-emerald-50', 'text' => 'text-emerald-600'],
        'transport' => ['icon' => 'plane', 'bg' => 'bg-sky-50', 'text' => 'text-sky-600'],
        'restaurant' => ['icon' => 'utensils', 'bg' => 'bg-rose-50', 'text' => 'text-rose-600'],
        default => ['icon' => 'circle-dot', 'bg' => 'bg-gray-50', 'text' => 'text-gray-600'],
    };
@endphp

<span class="shrink-0 w-8 h-8 rounded-lg {{ $config['bg'] }} {{ $config['text'] }} flex items-center justify-center">
    <i data-lucide="{{ $config['icon'] }}" class="w-4 h-4"></i>
</span>