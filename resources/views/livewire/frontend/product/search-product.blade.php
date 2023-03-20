<div class="mb-3">
    <div class="form-group">
        <label for="search-product">Cari Produk</label>
        <input wire:model.debounce.10ms="keyword" onkeydown="if(event.keyCode == 13) {event.preventDefault();}"
        type="search" class="form-control" id="search-product" placeholder="Cari Produk yang diinginkan..." autofocus>
    </div>
</div>
