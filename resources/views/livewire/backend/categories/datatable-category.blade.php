<tbody>
    @foreach ($categories as $category)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->category_name }}</td>
        <td>{{ substr($category->category_description, 0, 25) }}...</td>
        <td>
            <button wire:click="getCategory({{ $category->category_id }})" class="btn btn-pill btn-primary"
                data-bs-toggle="modal" data-bs-target="#updateCategoryModal"><i class="fa fa-edit"></i></button>
            {{-- *** TODO: DELETE!! *** --}}
            <a href="#" class="btn btn-pill btn-danger"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
    @endforeach
</tbody>
