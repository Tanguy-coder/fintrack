@props(['label' => '', 'options' => [], 'selected' => null])

<div class="form-group">
    <label class="font-normal">{{ $label }}</label>
    <div>
        <select data-placeholder="Choose an option..." class="chosen-select" tabindex="2">
            <option value="">Choisir un élément dans la liste</option>
            @foreach($options as $value => $text)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                    {{ $text }}
                </option>
            @endforeach
        </select>
    </div>
</div>
