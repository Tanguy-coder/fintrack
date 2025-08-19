@props([
    'label' => '',
    'options' => [],
    'selected' => null,
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
            name="{{ $name }}"
            id="{{ $id ?: $name }}"
            data-placeholder="Choose an option..."
            tabindex="2"
            {{ $required ? 'required' : '' }} {{-- ✅ attribut propre --}}
            {{ $attributes->merge(['class' => 'form-control chosen-select']) }}
        >
            <option value="">Choisir un élément dans la liste</option>
            @foreach($options as $value)
                <option value="{{ $value->id }}" {{ old($name, $selected) == $value->id ? 'selected' : '' }}>
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

{{-- @section('extra-scripts')
<script defer>
    document.addEventListener('DOMContentLoaded', function () {
        $('#{{ $id ?: $name }}').chosen({
            width: '100%'
        });
    });
</script>
@endsection --}}
