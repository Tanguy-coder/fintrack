@props(['type' => 'button', 'alert' => ''])

<button {{ $attributes->merge([
    'type' => $type,
    'class' => 'btn btn-danger '.$alert,
]) }}>
    {{ $slot }}
</button>
