@props(['active'])

@php
$adminClasses = ($active ?? false)
            ? 'text-xs uppercase py-3 font-bold block text-blue-500 hover:text-blue-600'
            : 'text-xs uppercase py-3 font-bold block text-slate-700 hover:text-slate-500';
$stationClasses = ($active ?? false)
            ? 'text-xs uppercase py-3 font-bold block text-pink-500 hover:text-pink-600'
            : 'text-xs uppercase py-3 font-bold block text-slate-700 hover:text-slate-500';
@endphp

<a @can('admin')
    {{ $attributes->merge(['class' => $adminClasses]) }}>
@endcan
@can('station')
    {{ $attributes->merge(['class' => $stationClasses]) }}>
@endcan
    {{ $icon ?? '' }}
    {{ $slot }}
</a>
