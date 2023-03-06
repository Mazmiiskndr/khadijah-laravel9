<div>
    <span class="f-w-600 m-r-5">Menampilkan Produk {{ $paginationData['firstItem'] }} - {{ $paginationData['lastItem']
        }} dari {{ $paginationData['total'] }}</span>
    <div class="select2-drpdwn-product select-options d-inline-block">
        <select wire:model="selectedShowing" name="selectedShowing" id="selectedShowing" class="form-select mb-3"
            name="select">
            <option value="featured">-- Pilihan --</option>
            <option value="lowest_price">Harga Terendah</option>
            <option value="highest_price">Harga Tertinggi</option>
        </select>
    </div>
</div>
