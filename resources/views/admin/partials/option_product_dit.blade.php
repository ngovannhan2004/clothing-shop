
@if ($childProduct->parent_id != $editProduct->id && $childProduct->id != $editProduct->id)
    <option @if($childProduct->id == $editProduct->parent_id) selected
            @endif value="{{ $childProduct->id }}">{{ $name_extra.' '.$childProduct->name }}</option>
    @if ($childProduct->childrens->count() > 0)
        @foreach ($childProduct->childrens as $grandChildProduct)
            @include('admin.partials.option_product_dit', ['childProduct' => $grandChildProduct, 'name_extra' => $name_extra.'--'])
        @endforeach
    @endif
@endif
