<tbody>
    @foreach ($tags as $tag)

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $tag->tag_name }}</td>
        @if($tag->tag_description)
        <td>{{ substr($tag->tag_description, 0, 25) }}...</td>
        @else
        <td> - </td>
        @endif
        <td>
            <button wire:click="getTag({{ $tag->tag_id }})" class="btn btn-pill btn-primary"
                data-bs-toggle="modal" data-bs-target="#updateTagModal"><i class="fa fa-edit"></i></button>
            <button wire:click="deleteConfirmation({{ $tag->tag_id }})" class="btn btn-pill btn-danger"><i
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
