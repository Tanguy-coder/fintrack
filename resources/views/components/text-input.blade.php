@props(['disabled' => false, 'label' =>'' , 'status' =>'success', 'name' =>'', 'value' => '', 'required' =>false])

@php
    $statusClass = match($status) {
        'success' => 'has-success',
        'danger' => 'has-danger',
        'warning' => 'has-warning',
        default => '',
    };
@endphp
<div class="form-group ">
    <label class="col-sm-2 control-label">{{ $label }}</label>
    <div class="col-sm-10">
        <input type="text" class="form-control {{ $statusClass }}" name="{{ $name }}" value="{{ $value }}" required="{{ $required }}" {{ $disabled ? 'disabled' : '' }}>
    </div>
</div>
