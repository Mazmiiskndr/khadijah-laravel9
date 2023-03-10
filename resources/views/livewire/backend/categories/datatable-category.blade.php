<tbody>
    @foreach ($categories as $category)

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->category_name }}</td>
        @if($category->category_description)
        <td>{{ substr($category->category_description, 0, 25) }}...</td>
        @else
        <td> - </td>
        @endif
        <td>
            <button wire:click="getCategory({{ $category->category_id }})" class="btn btn-pill btn-primary"
                data-bs-toggle="modal" data-bs-target="#updateCategoryModal"><i class="fa fa-edit"></i></button>
            <button wire:click="deleteConfirmation({{ $category->category_id }})" class="btn btn-pill btn-danger"><i class="fa fa-trash"></i></button>
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
