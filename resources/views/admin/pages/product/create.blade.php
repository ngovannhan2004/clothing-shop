@extends('admin.layouts.main')
@section('menu_active')
    @php
        $menu_parent = 'products';
        $menu_child = 'create';
    @endphp
@endsection
@section('title_page')
    Create Product
@endsection
@section('title_page_name')
    Create Product
@endsection
@section('name_layout')
    Create Product
@endsection

@section('content')
    <form>
        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="email" class="form-control" placeholder="Nhập tên danh mục ">

        </div>

        <div class="form-group">
            <label>Chọn danh mục cha</label>
            <select class="form-control">
                <option value="0">Chọn danh mục</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
