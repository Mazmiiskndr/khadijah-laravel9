@foreach ($categories as $index => $category)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $category->category_name }}</td>
    <td>{{ substr($category->category_description, 0, 25) }}...</td>
    <td>
        <a href="#" class="btn btn-pill btn-primary"><i class="fa fa-edit"></i></a>
        </li>
        <a href="#" class="btn btn-pill btn-danger"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach
