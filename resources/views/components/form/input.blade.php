<label for="{{ $id ?? 'name' }}">{{ $label ?? 'Name' }}</label>
<input type="{{ $type ?? 'text' }}" class="form-control" placeholder="{{ $placeholder ?? 'First name' }}"
    name="{{ $name ?? 'name' }}" id="{{ $id ?? 'name' }}">
