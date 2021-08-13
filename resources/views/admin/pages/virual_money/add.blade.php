@extends('admin.master')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('/css/CustomStyle.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thêm đồng mới</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="col-12">
            @include('admin.layouts.errors')
        </div>
        <!-- /.content-header -->
        <form role="form" action="{{ url('/admin/tien-ao/create') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <section class="content">
                <div class="col-7 float-left">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin cơ bản</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ten">Tên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="ten" name="name" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="ten">Mã <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="">
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card-footer">
                            <p class="text-danger">Lưu ý: Mã của đồng tiên phải viết không dấu.</p>
                            <p class="text-danger">Lưu ý: các trường có dấu <span class="text-danger">*</span> là những trường bắt buộc phải nhập.</p>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i> Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5 float-right">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin thêm</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="bye">Giá mua theo ngày <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="buy" name="buy" placeholder="123">
                            </div>
                            <div class="form-group">
                                <label for="sell">Giá bán theo ngày <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="sell" name="sell" placeholder="123">
                            </div>
                            <div class="form-group">
                                <label for="image">Icon hình ảnh <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <p class="text-danger">Lưu ý: hình ảnh không được nhập quá 2mb và phải là file có định dạng: .png hoặc .jpg (jpeg)</p>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                </div>
            </section>
        </form>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('') }}"></script>
@endsection
