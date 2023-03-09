
<div class="card-body filter-cards-view animate-chk">
    <div class="product-filter">
        <h6 class="f-w-600">Kategori</h6>
        <div class="checkbox-animated mt-0">
            @foreach ($categories as $category)

            <label class="d-block" for="edo-ani-{{ $category->category_id }}">
                <input class="radio_animated" id="edo-ani-{{ $category->category_id }}" type="checkbox"
                    wire:click="$emit('categorySelected', {{ $category->category_id }}, $event.target.checked);">
                {{ $category->category_name }}
            </label>

            @endforeach
        </div>
    </div>
    <div class="product-filter pb-0">
        <h6 class="f-w-600">Produk Terbaru</h6>
    </div>
    <div class="product-filter pb-0 new-products">
        <div class="owl-carousel owl-theme" id="testimonial">

            <div class="item">
                @foreach ($products as $product)
                <div class="product-box row">
                    <div class="product-img col-md-5">
                        <a href="{{ route('backend.product.show', ['product' => $product->product_id]) }}"><img class="img-fluid img-100" src="{{ asset('storage/'.$product->thumbnail) }}" alt="" title=""></a>
                    </div>
                    <div class="product-details col-md-7 text-start">
                        {{-- <span>
                            <i class="fa fa-star font-warning me-1"></i>
                            <i class="fa fa-star font-warning me-1"></i>
                            <i class="fa fa-star font-warning me-1"></i>
                            <i class="fa fa-star font-warning me-1"></i>
                            <i class="fa fa-star font-warning"></i>
                        </span> --}}
                        <p class="mb-0">{{ $product->product_name }}</p>
                        <div class="product-price">Rp. {{ number_format($product->price, 0, ',', '.') }}</div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    @push('scripts')
    @endpush
</div>
