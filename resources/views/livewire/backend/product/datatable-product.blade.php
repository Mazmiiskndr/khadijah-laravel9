<tbody>
    @foreach ($products as $product)
    @php
        $dateAdded = Carbon\Carbon::parse($product->date_added)->translatedFormat('d F Y');
    @endphp
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td class="text-center"><img src="{{ asset('storage/'.$product->thumbnail) }}" style="width:50px;"
                class="img-thumbnail img-rounded" alt="-"></td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->category->category_name }}</td>
        <td>
            Rp. {{ number_format($product->price - $product->discount, 0, ',', '.') }} <br>
            <del>Rp. {{ number_format($product->price, 0, ',', '.') }} </del> &nbsp;
            <small>({{ round(($product->discount / $product->price) * 100) }}%)</small>
        </td>
        <td>{{ $product->size }}</td>
        <td>{{ $dateAdded }}</td>
        <td>
            <button onclick="detailProduct('{{ $product->product_uid }}')" class="btn btn-pill btn-info">
                <i class="fa fa-eye"></i>
            </button>
        </td>
    </tr>
    @endforeach
    @push('scripts')
    <script>
        function detailProduct(uid) {
            window.location.href = "{{ route('backend.product.show', ['product' => ':uid']) }}".replace(':uid', uid);
        }
    </script>
    @endpush
</tbody>
