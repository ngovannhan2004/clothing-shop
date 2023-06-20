
<option value="{{ $childProduct->id }}">{{ $name_extra.' '.$childProduct->name }}</option>
@if ($childProduct->childrens->count() > 0)
    @foreach ($childProduct->childrens as $grandChildProduct)
        @include('admin.partials.option_product', ['childProduct' => $grandChildProduct, 'name_extra' => $name_extra.'--'])
    @endforeach
@endif

