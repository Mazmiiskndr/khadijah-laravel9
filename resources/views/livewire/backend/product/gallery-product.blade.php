<div class="my-gallery card-body row gallery-with-description" itemscope="">
    @foreach ($products as $product)
    @php
    // buat path ke file gambar
    $path = public_path('storage/'.$product->thumbnail);

    // inisialisasi $size dengan nilai default
    $size = '1600x900';

    // periksa apakah file gambar tersedia
    if (file_exists($path)) {
    // baca ukuran gambar menggunakan getimagesize()
    $imageSize = getimagesize($path);
    // set $size dengan nilai lebar x tinggi gambar
    $size = $imageSize[0].'x'.$imageSize[1];
    }
    @endphp
    <figure class="col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope=""><a
            href="{{ asset('storage/'.$product->thumbnail) }}" itemprop="contentUrl" data-size="{{ $size }}"><img
                src="{{ asset('storage/'.$product->thumbnail) }}" itemprop="thumbnail" alt="Image description">
            <div class="caption">
                <h4>{{ $product->product_name }}</h4>
                <p>{{ substr($product->product_description, 0, 80) }}...</p>
            </div>
        </a>
        <figcaption itemprop="caption description">
            <h4>{{ $product->product_name }}</h4>
            <p>{{ substr($product->product_description, 0, 80) }}...</p>
        </figcaption>
    </figure>
    @endforeach

    <div class="d-flex justify-content-center my-3">
        {{ $products->links() }}
    </div>
</div>
