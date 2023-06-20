@section('css')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('js')
    <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
        $(function () {
            $('#table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
@extends('admin.layouts.main')
@section('title_page')
    Index Menu
@endsection
@section('title_page_name')
    Index Menu
@endsection
@section('name_layout')
    Index Menu
@endsection
@section('menu_active')
    @php
        $menu_parent = 'menus';
        $menu_child = 'index';
    @endphp
@endsection
@section('content')

    @if (session('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table id="table" class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Parent ID</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($menus as $menu)
            @if($menu->parent_id == null)
                <tr>
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>None</td>
                    <td>
                        <a href="{{ route('admin.menus.edit',  $menu->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('admin.menus.destroy', $menu->id) }}"
                           class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @foreach ($menu->childrens as $childMenu)
                    @include('admin.partials.child_menu', ['childMenu' => $childMenu, 'marginLeft' => '40px'])
                @endforeach
            @endif
        @endforeach
        </tbody>
    </table>
@endsection
