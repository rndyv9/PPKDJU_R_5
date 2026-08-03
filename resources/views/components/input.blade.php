@props(['name', 'label', 'type' => 'text', 'value' => ''])

<fieldset class="form-group">
    <label class="form-label">{{ $label }}</label>
    <input name="{{ $name }}" type="{{ $type }}" value="{{ old($name, $value) }}"
        class="form-control @error($name) is-invalid @enderror" {{ $attributes }}>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</fieldset>
