<div class="input-group mb-3">
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
        class="form-control @error($name) is-invalid @enderror" value="{{ old($name) }}" required
        autocomplete="{{ $name }}" autofocus>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-{{ $icon }}"></span>
        </div>
    </div>

    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
