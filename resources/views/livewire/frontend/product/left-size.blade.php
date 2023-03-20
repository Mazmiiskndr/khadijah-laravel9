<!-- size filter start here -->
<div class="collection-collapse-block border-0 open">
    <h3 class="collapse-block-title">Ukuran</h3>
    <div class="collection-collapse-block-content">
        <div class="collection-brand-filter">
            @foreach ($selected as $no => $size)
            <div class="form-check collection-filter-checkbox">
                <input type="checkbox" class="form-check-input" id="size-{{ $no }}"
                    wire:click="$emit('sizeSelected', '{{ $size }}', $event.target.checked);">
                <label class="form-check-label" for="size-{{ $no }}">{{ $size }}</label>
            </div>
            @endforeach

        </div>
    </div>
</div>
