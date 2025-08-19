@props([
    'label' => '',
    'options' => [],
    'selected' => [],
    'id' => '',
    'name' => '',
    'status' => '',
    'displayField' => ['libelle'],
    'separator' => ' ',
    'required' => true,
])

<div class="form-group">
    @if($label)
        <label for="{{ $id ?: $name }}" class="col-sm-2 control-label">
            {{ $label }}
            @if($required) <span class="text-danger">*</span> @endif
        </label>
    @endif

    <div class="col-sm-10">
        <select
            name="{{ $name }}[]"
            id="{{ $id ?: $name }}"
            multiple
            data-placeholder="Choisir un ou plusieurs éléments..."
            {{ $required ? 'required' : '' }}
            {{ $attributes->merge(['class' => 'form-control select2-multiple']) }}
        >
            @foreach($options as $value)
                <option value="{{ $value->id }}"
                    {{ (collect(old($name, $selected))->contains($value->id)) ? 'selected' : '' }}>
                    @foreach($displayField as $field)
                        {{ $value->{$field} }}{{ !$loop->last ? $separator : '' }}
                    @endforeach
                </option>
            @endforeach
        </select>

        @error($name)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

@section('extra-scripts')
<script defer>
    document.addEventListener('DOMContentLoaded', function () {
        $('#{{ $id ?: $name }}').select2({
            placeholder: $('#{{ $id ?: $name }}').data('placeholder'),
            allowClear: true,
            width: '100%'
        });
    });
</script>
@endsection
