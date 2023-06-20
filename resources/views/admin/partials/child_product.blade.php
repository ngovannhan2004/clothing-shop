<!-- partials.child_category.blade.php -->
<tr style="padding: {{ $marginLeft }};">
    <td>{{ $childProduct->id }}</td>
    <td>{{ $childProduct->name }}</td>
    <td>{{ $childProduct->parent->name }}</td>
    <td>
        <a href="{{ route('admin.products.edit', $childProduct->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('admin.products.destroy', $childProduct->id) }}" class="btn btn-danger">Delete</a>
    </td>
</tr>

@if ($childProduct->childrens->count() > 0)
    @foreach ($childProduct->childrens as $grandChildProduct)
        @include('admin.partials.child_product', ['$childProduct' => $grandChildProduct])
    @endforeach
@endif
