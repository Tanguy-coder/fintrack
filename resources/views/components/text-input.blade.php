@props([
    'disabled' => false,
    'label' => '',
    'status' => 'success',
    'name' => '',
    'value' => '',
    'required' => false,
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

    $inputValue = old($name, $value);
@endphp
@if($type === 'hidden')
    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
@else
<div class="form-group  {{ $errorClass }}">
    <label class="col-sm-2 control-label">{{ $label }}</label>
    <div class="col-sm-10">
        <input
            type="{{ $type }}"
            class="form-control {{ $errorClass }} {{ $statusClass }}"
            name="{{ $name }}"
            value="{{ $inputValue }}"
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
        >

        @error($name)
            <div class="invalid-feedback text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
@endif
