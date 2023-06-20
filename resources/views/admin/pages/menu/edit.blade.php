@extends('admin.layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(window).on('load', function () {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endsection

@section('title_page')
    Create Menu
@endsection

@section('title_page_name')
    Create Menu
@endsection

@section('name_layout')
    Create Menu
@endsection

@section('menu_active')
    @php
        $menu_parent = 'menus';
        $menu_child = 'edit';
    @endphp
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger mt-3" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.menus.update', $editMenu->id) }}" method="post"
          enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label>Tên menu</label>
                <input value="{{$editMenu->name}}" type="text" class="form-control" name="name"
                       placeholder="Nhập tên danh mục">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Chọn menu cha</label>
                <select id="#category" class="form-control select2bs4" name="parent_id">
                    <option value="0">Danh mục cha</option>
                    @foreach ($menus as $menu)
                        @if(!$menu->id != $editMenu->id)
                            @if ($menu->parent_id == 0)
                                <option @if($menu->id == $editMenu->parent_id) selected
                                        @endif value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @foreach ($menu->childrens as $childMenu)
                                    @include('admin.partials.option_menu_edit', ['childMenu' => $childMenu, 'name_extra' => '--'])
                                @endforeach
                            @endif
                        @endif
                    @endforeach
                </select>
                @error('parent_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
