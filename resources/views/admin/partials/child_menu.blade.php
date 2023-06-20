<!-- partials.child_category.blade.php -->
<tr style="padding: {{ $marginLeft }};">
    <td>{{ $childMenu->id }}</td>
    <td>{{ $childMenu->name }}</td>
    <td>{{ $childMenu->parent->name }}</td>
    <td>
        <a href="{{ route('admin.menus.edit', $childMenu->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('admin.menus.destroy', $childMenu->id) }}" class="btn btn-danger">Delete</a>
    </td>
</tr>

@if ($childMenu->childrens->count() > 0)
    @foreach ($childMenu->childrens as $grandChildMenu)
        @include('admin.partials.child_menu', ['childMenu' => $grandChildMenu])
    @endforeach
@endif
