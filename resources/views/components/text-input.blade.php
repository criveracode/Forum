@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-slate-800 border-1 border-slate-900 rounded-md w-full p-3 text-white/60 text-m']) !!}>
