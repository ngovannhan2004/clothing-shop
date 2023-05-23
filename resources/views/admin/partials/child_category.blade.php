<!-- partials.child_category.blade.php -->
<tr style="padding: {{ $marginLeft }};">
    <td>{{ $childCategory->id }}</td>
    <td>{{ $childCategory->name }}</td>
    <td>{{ $childCategory->parent->name }}</td>
    <td>
        <a href="{{ route('admin.categories.edit', $childCategory->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('admin.categories.destroy', $childCategory->id) }}" class="btn btn-danger">Delete</a>
    </td>
</tr>

@if ($childCategory->childrens->count() > 0)
    @foreach ($childCategory->childrens as $grandChildCategory)
        @include('admin.partials.child_category', ['childCategory' => $grandChildCategory])
    @endforeach
@endif
