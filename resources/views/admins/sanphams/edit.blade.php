@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('css')
    <!-- Quill css -->
    <link href="{{ asset('assets/admin/libs/quill/quill.core.js') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản lý thông tin sản phẩm</h4>
            </div>
        </div>

        <div class="row">
            <!-- Striped Rows -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('admins.sanphams.update', $sanPham->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            @method('PUT')
                            <div class="row">                                                
                                    <div class="col-lg-4">  
                                        <div class="mb-3">
                                            <label for="ma_san_pham" class="form-label">Mã sản phẩm</label>
                                            <input type="text" id="ma_san_pham" name="ma_san_pham" class="form-control @error('ma_san_pham') is-invalid @enderror" 
                                            value="{{ $sanPham->ma_san_pham }}" placeholder="Mã sản phẩm">
                                            @error('ma_san_pham')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                                            <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control @error('ten_san_pham') is-invalid @enderror" 
                                            value="{{ $sanPham->ten_san_pham }}" placeholder="Tên sản phẩm">
                                            @error('ten_san_pham')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="gia_san_pham" class="form-label">Gía sản phẩm</label>
                                            <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control @error('gia_san_pham') is-invalid @enderror" 
                                            value="{{ $sanPham->gia_san_pham }}" placeholder="Gía sản phẩm">
                                            @error('gia_san_pham')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="gia_khuyen_mai" class="form-label">Gía khuyến mãi</label>
                                            <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control @error('gia_khuyen_mai') is-invalid @enderror" 
                                            value="{{ $sanPham->gia_khuyen_mai }}" placeholder="Gía khuyến mãi">
                                            @error('gia_khuyen_mai')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="danh_muc_id" class="form-label">Danh mục</label>
                                            <select name="danh_muc_id" class="form-select @error('danh_muc_id') is-invalid @enderror">
                                                <option selected>-- Chọn danh mục --</option>
                                                @foreach ($listDanhMuc as $item)
                                                    <option value="{{ $item->id }}" {{ $sanPham->danh_muc_id == $item->id ? 'selected' : '' }}>{{ $item->ten_danh_muc }}</option>
                                                @endforeach
                                            </select>
                                            @error('danh_muc_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="so_luong" class="form-label">Số lượng sản phẩm</label>
                                            <input type="number" id="so_luong" name="so_luong" class="form-control @error('so_luong') is-invalid @enderror" 
                                            value="{{ $sanPham->so_luong }}" placeholder="Số lượng">
                                            @error('so_luong')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                                            <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control @error('ngay_nhap') is-invalid @enderror" 
                                            value="{{ $sanPham->ngay_nhap }}" placeholder="Gía khuyến mãi">
                                            @error('ngay_nhap')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="mo_ta_ngan" class="form-label">Mô tả ngắn</label>
                                            <textarea class="form-control @error('mo_ta_ngan') is-invalid @enderror"
                                            name="mo_ta_ngan" id="mo_ta_ngan" rows="3" placeholder="Mô tả ngắn">{{ $sanPham->mo_ta_ngan }}</textarea>
                                            @error('mo_ta_ngan')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="is_type" class="form-label">Trang thái:</label>
                                            <div class="col-sm-10 mb-3 d-flex gap-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_type" id="gridRadios1" 
                                                    value="1" {{ $sanPham->is_type == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label text-success" for="gridRadios1">
                                                        Hiển thị
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_type" id="gridRadios2" 
                                                    value="0" {{ $sanPham->is_type == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label text-danger" for="gridRadios2">
                                                        Ẩn
                                                    </label>
                                                </div>
                                            </div>
                                        </div>   
                                        
                                        <label for="" class="form-label">Tùy chỉnh khác:</label>
                                        <div class="form-switch mb-2 ps-3 d-flex justify-content-between">   
                                            <div class="form-check">
                                                <input class="form-check-input bg-danger" type="checkbox" id="is_new" 
                                                name="is_new" {{ $sanPham->is_new == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_new">New</label>
                                            </div> 
                                            <div class="form-check">
                                                <input class="form-check-input bg-secondary" type="checkbox" id="is_hot" 
                                                name="is_hot" {{ $sanPham->is_hot == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_hot">Hot</label>
                                            </div> 
                                            <div class="form-check">
                                                <input class="form-check-input bg-warning" type="checkbox" id="is_hot_deal" 
                                                name="is_hot_deal" {{ $sanPham->is_hot_deal == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_hot_deal">Hot deal</label>
                                            </div> 
                                            <div class="form-check">
                                                <input class="form-check-input bg-success" type="checkbox" id="is_show_home" 
                                                name="is_show_home" {{ $sanPham->is_show_home == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_show_home">Show home</label>
                                            </div>            
                                        </div>

                                    </div>

                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="noi_dung" class="form-label">Mô tả chi tiết sản phẩm</label>
                                            <div id="quill-editor" style="height: 400px;">                                             
                                            </div>
                                            <textarea name="noi_dung" id="noi_dung_content" class="d-none"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="hinh_anh" class="form-label">Hình ảnh</label>
                                            <input type="file" id="hinh_anh" name="hinh_anh" class="form-control" onchange="showImage(event)">
                                            <img id="img_danh_muc" src="{{ Storage::url($sanPham->hinh_anh) }}" alt="Hình ảnh sản phẩm" style="width: 100px;">
                                        </div>  
                                        
                                        <div class="mb-3">
                                            <label for="hinh_anh" class="form-label">Album hình ảnh</label>
                                            <i id="add-row" class="mdi mdi-plus text-muted fs-18 rounded-2 border p-1" style="cursor: pointer;"></i>
                                            <table class="table align-middle table-nowrap mb-0">
                                                <tbody id="image-table-body">
                                                    @foreach ($sanPham->hinhAnhSanPham as $index => $hinhAnh)
                                                        <tr>
                                                            <td class="d-flex align-item-center">
                                                                <img id="preview_{{ $index }}" src="{{ Storage::url($hinhAnh->hinh_anh) }}" 
                                                                alt="Hình ảnh sản phẩm" style="width: 50px;" class="me-3">
                                                                <input type="file" id="hinh_anh" name="list_hinh_anh[{{ $hinhAnh->id }}]" 
                                                                class="form-control" onchange="previewImage(this, {{ $index }})">  
                                                                <input type="hidden" name="list_hinh_anh[{{ $hinhAnh->id }}]" value="{{ $hinhAnh->id }}">                                      
                                                            </td>
                                                            <td>
                                                                <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" 
                                                                style="cursor: pointer;" onclick="removeRow(this)"></i>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div> 
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-warning">Cập nhật</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection

@section('js')
    <!-- Quill Editor Js -->
    <script src="{{ asset('assets/admin/libs/quill/quill.core.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/quill/quill.min.js') }}"></script>
     
    <script>
        function showImage(event){
            const img_danh_muc = document.getElementById('img_danh_muc');
            console.log(img_danh_muc);

            const file = event.target.files[0];

            const reader = new FileReader();

            reader.onload = function(){
                img_danh_muc.src = reader.result;
                img_danh_muc.style.display = 'block';
            }

            if(file){
                reader.readAsDataURL(file);
            }
        }
    </script>

    {{-- Của phần nội dung --}}
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var quill = new Quill("#quill-editor", {
                theme: "snow",
        })     

        // Hiển thị nội dung cũ
        var old_content = `{!! $sanPham->noi_dung !!}`;
        quill.root.innerHTML = old_content

        // Cập nhật lại textarea ẩn khi nội dung của quill-editor thay đổi
        quill.on('text-change', function(){
            var html = quill.root.innerHTML;
            document.getElementById('noi_dung_content').value = html
            })
        })
    </script>

    {{-- Thêm album ảnh --}}
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var rowCount = {{ count($sanPham->hinhAnhSanPham) }};
            
            document.getElementById('add-row').addEventListener('click', function(){
                var tableBody = document.getElementById('image-table-body')

                var newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td class="d-flex align-item-center">
                        <img class="me-3" id="preview_${rowCount}" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0Wr3oWsq6KobkPqznhl09Wum9ujEihaUT4Q&s" 
                        alt="Hình ảnh sản phẩm" style="width: 50px;">
                        <input type="file" id="hinh_anh" name="list_hinh_anh[id_${rowCount}]" class="form-control" onchange="previewImage(this, ${rowCount})">                                        
                    </td>
                    <td>
                        <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" style="cursor: pointer;" onclick="removeRow(this)"></i>
                    </td>
                `;

                tableBody.appendChild(newRow);
                rowCount++;
            })      
        });

        function previewImage(input, rowIndex){
            if(input.files && input.files[0]){               
                const reader = new FileReader();

                reader.onload = function(e){
                    document.getElementById(`preview_${rowIndex}`).setAttribute('src', e.target.result)
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeRow(item){
            var row = item.closest('tr');
            row.remove();
        }
    </script>
@endsection