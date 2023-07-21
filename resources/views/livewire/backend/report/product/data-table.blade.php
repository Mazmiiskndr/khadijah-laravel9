<tbody>
    @foreach ($products as $no => $product)
    <tr>
        <td>{{ $no + 1 }}</td>
        <td>{{ $product->product->product_name }}</td>
        <td>{{ $product->total_quantity }}</td>
    </tr>
    @endforeach
</tbody>
