<tbody>
    @foreach($products as $key => $productDetail)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $productDetail['product']->product_name }}</td>
        <td>{{ $productDetail['quantity'] }}</td>
        <td>Rp. {{ number_format($productDetail['price'], 0, ',', '.') }}</td>
        <td>Rp. {{ number_format($productDetail['price'] * $productDetail['quantity'] , 0, ',', '.') }}</td>
    </tr>
    @endforeach

    @if (session()->has('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif
</tbody>
