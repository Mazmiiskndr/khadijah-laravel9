<tbody>
    @foreach($orders as $key => $order)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $order->order_number }}</td>
        <td>{{ $order->customer->name }}</td>
        <td>
            <span class="badge badge-{{ $colors[$order->order_number] }}">
                {{ $order->order_status }}
            </span>
        </td>
        <td>
            <a href="{{ route('backend.sales.edit',$order->order_uid) }}">
                <button type="button" class="btn btn-pill btn-primary">
                    <i class="fa fa-edit"></i>
                </button>
            </a>
            {{-- TODO: --}}
            {{-- <button wire:click="deleteConfirmation('{{ $order->order_uid }}')" class="btn btn-pill btn-danger"><i
                    class="fa fa-trash"></i></button> --}}
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
