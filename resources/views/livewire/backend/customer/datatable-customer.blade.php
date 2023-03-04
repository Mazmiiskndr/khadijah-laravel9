<tbody>
    @foreach ($customers as $customer)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->email }}</td>
        <td>{{ $customer->phone }}</td>
        <td>{{ date('d - F - Y',strtotime($customer->registration_date)) }}</td>
        <td>
            <button wire:click="getCategory({{ $customer->id }})" class="btn btn-pill btn-primary" data-bs-toggle="modal" data-bs-target="#updateCategoryModal">
                <i class="fa fa-edit"></i>
            </button>
            <button wire:click="deleteConfirmation({{ $customer->id }})" class="btn btn-pill btn-danger">
                <i class="fa fa-trash"></i>
            </button>
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
