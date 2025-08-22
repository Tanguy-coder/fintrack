@props([
    'disabled' => false,
    'label' => '',
    'status' => '',
    'name' => '',
    'value' => '1',
    'checked' => false,
    'required' => false,
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
    $isChecked = old($name, $checked) ? 'checked' : '';
@endphp

<div class="form-group {{ $statusClass }} {{ $errorClass }}">
    @if($label)
        <label for="{{ $name }}" class="col-sm-2 control-label">
            {{ $label }}
            @if($required) <span class="text-danger">*</span> @endif
        </label>
    @endif

    <div class="col-sm-10">
        <input type="hidden" name="{{ $name }}" value="0">
        <div class="switch">
            <div class="onoffswitch">
                <input
                    type="checkbox"
                    class="onoffswitch-checkbox {{ $errorClass }}"
                    id="{{ $name }}"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    {{ $isChecked }}
                    {{ $disabled ? 'disabled' : '' }}
                >
                <label class="onoffswitch-label" for="{{ $name }}">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>
        </div>

        @error($name)
            <div class="invalid-feedback text-danger d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
