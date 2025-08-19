@props([
    'name',
    'label' => '',
    'value' => '',
    'rows' => 4,
    'placeholder' => '',
    'required' => false,
    'disabled' => false,
])

<div class="form-group">
<div class="col-sm-2 control-label">
        @if($label)
        <label for="{{ $name }}" class="block mb-1 font-medium text-gray-700">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
</div>
    <div class="col-sm-10">
        <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
        {{ $attributes->merge(['class' => 'form-control']) }}
    >{{ old($name, $value) }}</textarea>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
    </div>
</div>
