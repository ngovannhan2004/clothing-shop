
<option value="{{ $childCategory->id }}">{{ $name_extra.' '.$childCategory->name }}</option>
@if ($childCategory->childrens->count() > 0)
    @foreach ($childCategory->childrens as $grandChildCategory)
        @include('admin.partials.option_category', ['childCategory' => $grandChildCategory, 'name_extra' => $name_extra.'--'])
    @endforeach
@endif
