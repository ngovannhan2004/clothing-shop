
<option value="{{ $childMenu->id }}">{{ $name_extra.' '.$childMenu->name }}</option>
@if ($childMenu->childrens->count() > 0)
    @foreach ($childMenu->childrens as $grandChildMenu)
        @include('admin.partials.option_menu', ['childMenu' => $grandChildMenu, 'name_extra' => $name_extra.'--'])
    @endforeach
@endif
