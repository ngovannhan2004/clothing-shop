@if ($childCategory->parent_id != $editCategory->id && $childCategory->id != $editCategory->id)
    <option @if($childCategory->id == $editCategory->parent_id) selected
            @endif value="{{ $childCategory->id }}">{{ $name_extra.' '.$childCategory->name }}</option>
    @if ($childCategory->childrens->count() > 0)
        @foreach ($childCategory->childrens as $grandChildCategory)
            @include('admin.partials.option_category_edit', ['childCategory' => $grandChildCategory, 'name_extra' => $name_extra.'--'])
        @endforeach
    @endif
@endif
