
@props(['type' => 'button'])

<button {{ $attributes->merge([
    'type' => $type,
    'class' => 'btn btn-white'
]) }}>
    {{ $slot }}
</button>
