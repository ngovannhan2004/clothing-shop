@extends('admin.layouts.main')
@section('css')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('js')
    <script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
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
        onload
        window.onload = function () {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        };
    </script>
@endsection
@section('title_page')
    create Users
@endsection
@section('title_page_name')
    Create Users
@endsection
@section('name_layout')
    Create Users
@endsection
@section('menu_active')

    @php
        $menu_parent = 'users';
        $menu_child = 'create';
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

    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf
        <div class="col-md-6">
            <div class="form-group ">
                <label>Tên user</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên user ">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group ">
                <label>Email</label>
                <input type="text" class="form-control" name="email" placeholder="Nhập email ">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group ">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Nhập password ">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label> Chọn vai trò</label>
                <select id="#category" class="form-control select2bs4" name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
