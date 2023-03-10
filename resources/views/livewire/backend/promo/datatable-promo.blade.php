<tbody>
    @foreach ($promos as $promo)
    @php
    $startDate = Carbon\Carbon::parse($promo->start_date)->translatedFormat('d F Y');
    $endDate = Carbon\Carbon::parse($promo->end_date)->translatedFormat('d F Y');
    @endphp
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $promo->promo_name }}</td>
        <td>{{ str()->upper($promo->promo_code) }}</td>
        <td>{{ $promo->discount_type }}</td>
        @if ($promo->discount_type == "Nominal")
        <td>Rp. {{ number_format($promo->discount_value, 0) }}</td>
        @else
        <td>{{ $promo->discount_value }} %</td>
        @endif
        <td>{{ $startDate }}</td>
        <td>{{ $endDate }}</td>
        {{-- *** TODO: ***  --}}
        <td>
            <button wire:click="getCategory({{ $promo->category_id }})" class="btn btn-pill btn-primary"
                data-bs-toggle="modal" data-bs-target="#updateCategoryModal"><i class="fa fa-edit"></i></button>
            <button wire:click="deleteConfirmation({{ $promo->category_id }})" class="btn btn-pill btn-danger"><i
                    class="fa fa-trash"></i></button>
        </td>
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
