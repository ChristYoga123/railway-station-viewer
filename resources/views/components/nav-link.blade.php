@props(['active'])

@php
$adminClasses = ($active ?? false)
            ? 'text-xs uppercase py-3 font-bold block text-pink-500 hover:text-pink-600'
            : 'text-xs uppercase py-3 font-bold block text-slate-700 hover:text-slate-500';
$trainClasses = ($active ?? false)
            ? 'text-xs uppercase py-3 font-bold block text-blue-500 hover:text-blue-600'
            : 'text-xs uppercase py-3 font-bold block text-slate-700 hover:text-slate-500';
@endphp

<a @can('admin')
    {{ $attributes->merge(['class' => $adminClasses]) }}>
@endcan
@can('train')
    {{ $attributes->merge(['class' => $trainClasses]) }}>
@endcan
    {{ $icon ?? '' }}
    {{ $slot }}
</a>
