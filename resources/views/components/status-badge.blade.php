@props(['status'])

@php
    $config = match($status->value) {
        'draft' => ['label' => $status->label(), 'bg' => 'bg-gray-100', 'text' => 'text-gray-700', 'dot' => 'bg-gray-400'],
        'pending' => ['label' => $status->label(), 'bg' => 'bg-yellow-50', 'text' => 'text-yellow-700', 'dot' => 'bg-yellow-400'],
        'reviewing' => ['label' => $status->label(), 'bg' => 'bg-blue-50', 'text' => 'text-blue-700', 'dot' => 'bg-blue-400'],
        'quoted' => ['label' => $status->label(), 'bg' => 'bg-violet-50', 'text' => 'text-violet-700', 'dot' => 'bg-violet-400'],
        'approved' => ['label' => $status->label(), 'bg' => 'bg-green-50', 'text' => 'text-green-700', 'dot' => 'bg-green-400'],
        'booked' => ['label' => $status->label(), 'bg' => 'bg-emerald-50', 'text' => 'text-emerald-700', 'dot' => 'bg-emerald-400'],
        'cancelled' => ['label' => $status->label(), 'bg' => 'bg-red-50', 'text' => 'text-red-700', 'dot' => 'bg-red-400'],
        default => ['label' => $status->value, 'bg' => 'bg-gray-100', 'text' => 'text-gray-700', 'dot' => 'bg-gray-400'],
    };
@endphp

<span class="inline-flex items-center gap-1.5 text-xs font-medium px-2.5 py-1 rounded-full {{ $config['bg'] }} {{ $config['text'] }}">
    <span class="w-1.5 h-1.5 rounded-full {{ $config['dot'] }}"></span>
    {{ $config['label'] }}
</span>