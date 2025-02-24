@props(['type' => 'button', 'alert' => ''])

<button {{ $attributes->merge([
    'type' => $type,
    'class' => 'btn btn-primary '.$alert,
]) }}>
    {{ $slot }}
</button>
