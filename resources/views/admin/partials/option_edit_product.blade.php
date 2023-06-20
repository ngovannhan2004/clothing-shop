<option
    @if($childCategory->id == $categoryId) selected @endif
    value="{{ $childCategory->id }}">{{ $name_extra.' '.$childCategory->name }}</option>
@if ($childCategory->childrens->count() > 0)
    @foreach ($childCategory->childrens as $grandChildCategory)
        @include('admin.partials.option_category', ['childCategory' => $grandChildCategory, 'name_extra' => $name_extra.'--', 'categoryId' => $categoryId])
    @endforeach
@endif
