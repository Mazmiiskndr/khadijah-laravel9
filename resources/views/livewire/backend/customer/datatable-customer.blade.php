<tbody>
    @foreach ($customers as $customer)
    @php
    $registrationDate = Carbon\Carbon::parse($customer->registration_date)->translatedFormat('d F Y');
    @endphp
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->email }}</td>
        <td>{{ $customer->phone }}</td>
        <td>{{ $registrationDate }}</td>
        <td>
            <button wire:click="getCustomer('{{ $customer->customer_uid }}')" class="btn btn-pill btn-primary" data-bs-toggle="modal" data-bs-target="#updateCustomerModal">
                <i class="fa fa-edit"></i>
            </button>
            <button wire:click="deleteConfirmation('{{ $customer->customer_uid }}')" class="btn btn-pill btn-danger">
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
