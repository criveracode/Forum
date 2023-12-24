<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 mb-10 bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue-600 text-white/90 font-bold text-m text-center rounded-md']) }}>
    {{ $slot }}
</button>
