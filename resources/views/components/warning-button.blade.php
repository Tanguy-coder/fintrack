@props(['type' => 'button', 'alert' => ''])

<button {{ $attributes->merge([
    'type' => $type,
    'class' => 'btn btn-warning '.$alert,
]) }}>
    {{ $slot }}
</button>
