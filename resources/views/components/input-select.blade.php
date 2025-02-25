@props(['label' => '', 'options' => [], 'selected' => null, 'name' => '', 'status' => ''])

<div class="form-group">
    <label class="col-sm-2 control-label">{{ $label }}</label>
    <div class="col-sm-10">
        <select data-placeholder="Choose an option..." class="chosen-select " tabindex="2" name="{{ $name }}">
            <option value="">Choisir un élément dans la liste</option>
            @foreach($options as $value => $text)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                    {{ $text }}
                </option>
            @endforeach
        </select>
        @error($name)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
