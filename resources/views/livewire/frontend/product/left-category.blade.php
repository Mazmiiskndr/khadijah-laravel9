<div class="collection-collapse-block open">
    <h3 class="collapse-block-title">Kategori</h3>
    <div class="collection-collapse-block-content">
        <div class="collection-brand-filter">
            @foreach ($categories as $category)
            <div class="form-check collection-filter-checkbox">
                <input type="checkbox" class="form-check-input" id="category-{{ $category->category_id }}" wire:click="$emit('categorySelected', {{ $category->category_id }}, $event.target.checked);">
                <label class="form-check-label" for="category-{{ $category->category_id }}">{{ $category->category_name }}</label>
            </div>
            @endforeach
        </div>
    </div>
</div>
