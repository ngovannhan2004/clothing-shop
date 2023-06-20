@extends('admin.layouts.main')
@section('css')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
    <style>
        .swiper-container {
            width: 100%;
            height: auto;
            overflow: hidden; /* Thêm thuộc tính overflow để ảnh không tràn */
        }

        .swiper-slide {
            height: 300px;
            text-align: center;
            font-size: 18px;
            background: #fff;
            background-size: contain; /* Sử dụng contain thay vì cover để giữ kích thước tỉ lệ của ảnh */
            background-position: center;
        }
    </style>

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
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>

        window.onload = function () {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            $('#tags').select2({
                tags: true,
                tokenSeparators: [',']

            });
        };


        $('#feature_image_path').filemanager('image');
        $('#image_path').filemanager('image', {
            multiple: true
        })
        $(document).ready(function () {
            // Khởi tạo Swiper

            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 3,

            });
            console.log(swiper)

            // Lắng nghe sự kiện thay đổi giá trị của image_path_thumbnail
            $('#image_path_thumbnail').on('change', function () {
                var imagePaths = $(this).val().split(',');

                // Xóa nội dung cũ của Swiper
                $('#swiper-wrapper').html('');

                // Tạo các slide mới cho Swiper
                imagePaths.forEach(function (imagePath) {
                    $('#swiper-wrapper').append('<div class="swiper-slide" "><img class="img-fluid image" src="' + imagePath + '" /></div>');
                });

                // cập nhat lai swiper
                swiper.update();
            });
            $('#avatar_feature').on('change', function () {
                let avatar_product = $('#avatar_product');
                avatar_product.attr('src', $(this).val());
            })
        });
    </script>
@endsection
@section('title_page')
    Edit Product
@endsection
@section('title_page_name')
    Edit Product
@endsection
@section('name_layout')
    Edit Product
@endsection
@section('menu_active')

    @php
        $menu_parent = 'products';
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

    <form action="{{ route('admin.products.update',   $editProduct->id) }}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="col">
            <div class="form-group ">
                <label>Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm "
                       value="{{  $editProduct->name}}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group ">
                <label>Giá sản phẩm</label>
                <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm "
                       value="{{  $editProduct->price}}">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group d-flex justify-content-center">
                <div class="text-center mx-auto">
                    <img id="avatar_product" src="{{asset('adminlte/pngegg.png')}}" class="image img-fluid"
                         id="feature_image_path_thumbnail" style="max-width: 45%;">
                </div>
            </div>
            <div class="form-group ">
                <label>Ảnh đại diện </label>
                <div class="input-group">
                   <span class="input-group-btn">

                     <a id="feature_image_path" data-input="avatar_feature" data-preview="holder"
                        class="btn btn-primary">
                       <i class="fa fa-picture-o"></i> Choose
                     </a>
                   </span>
                    <input id="avatar_feature" class="form-control" type="text" name="feature_image_path">
                    <div class="col-md-12">
                        <div class="row">
                            <img src="{{  $editProduct->feature_image_path}}">
                        </div>
                    </div>
                </div>
                @error('feature_image_path')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group ">
                <label>Ảnh chi tiết </label>
                <div class="input-group">
                   <span class="input-group-btn">
                     <a id="image_path" data-input="image_path_thumbnail" data-preview="holder" class="btn btn-primary">
                       <i class="fa fa-picture-o"></i> Choose
                     </a>
                   </span>
                    <input id="image_path_thumbnail" class="form-control" type="text" name="image_path">

                </div>
                @error('image_path[]')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group ">
                <div class="swiper-container">
                    <div class="swiper-wrapper" id="swiper-wrapper">
                        @foreach(
                            $editProduct->images as $image)
                            <div class="swiper-slide">
                                <img class="img-fluid image" src="{{ $image->path }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label> Danh mục</label>
                <select id="#category" class="form-control select2bs4" name="category_id">
                    @foreach ($categories as $category)
                        @if ($category->parent_id == null)
                            <option @if($category->id == $editProduct->category_id) selected
                                    @endif value="{{ $category->id }}">{{ $category->name }}</option>
                            @foreach ($category->childrens as $childCategory)
                                @include('admin.partials.option_edit_product', ['childCategory' => $childCategory, 'name_extra' => '--', 'categoryId' => $editProduct->category_id])
                            @endforeach
                        @endif
                    @endforeach
                </select>
                @error('parent_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group ">
                <label>Nhập tag cho sản phẩm</label>
                <select id="tags" tags multiple="multiple" data-dropdown-css-class="select2-purple"
                        class="form-control " name="tags[]">
                    <option value="0">Chọn tag</option>
                    <option value="0">Chọn tag</option>


                </select>
                @error('tags')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Nhập nội dung</label>
                <textarea class="form-control" name="content_html" rows="3">{{$editProduct->content}} </textarea>
                @error('content')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
