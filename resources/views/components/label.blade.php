@props(['value'])

<label {{ $attributes->merge(['class' => 'sr-only']) }}>
    {{ $value ?? $slot }}
</label>
