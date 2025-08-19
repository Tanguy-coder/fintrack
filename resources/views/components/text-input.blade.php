@props([
    'disabled' => false,
    'label' => '',
    'status' => '',
    'name' => '',
    'value' => '',
    'required' => true,
    'type' => 'text'
])

@php
    $statusClass = match($status) {
        'success' => 'has-success',
        'danger' => 'has-danger',
        'warning' => 'has-warning',
        default => '',
    };

    $errorClass = $errors->has($name) ? 'is-invalid has-danger' : '';

    // garde la valeur précédente si erreur
    $inputValue = old($name, $value);
@endphp

@if($type === 'hidden')
    <input type="hidden" name="{{ $name }}" value="{{ $inputValue }}">
@else
<div class="form-group {{ $statusClass }} {{ $errorClass }}">
    @if($label)
        <label for="{{ $name }}" class="col-sm-2 control-label">
            {{ $label }}
            @if($required) <span class="text-danger">*</span> @endif
        </label>
    @endif

    <div class="col-sm-10">
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ $inputValue }}"
            class="form-control {{ $errorClass }}"
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
        >

        @error($name)
            <div class="invalid-feedback text-danger d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
@endif
