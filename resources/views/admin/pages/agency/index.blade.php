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
                        <h1 class="m-0 text-dark">Cập nhật thông tin hướng dẫn đại lý</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="col-12">
            @include('admin.layouts.errors')
        </div>
        <!-- /.content-header -->
        <form role="form" action="{{ url('/admin/dai-ly/' . $agency->id . '/update') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <section class="content">
                <div class="col-12 float-left">
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
                            <label for="description">Nội dung hướng dẫn đăng ký đại lý <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $agency->description }}</textarea>
                            <!-- /.card-body -->
                        </div>
                        <div class="card-footer">
                            <p class="text-danger">Lưu ý: các trường có dấu <span class="text-danger">*</span> là những trường bắt buộc phải nhập.</p>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i> Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('') }}"></script>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('description',
                {
                    filebrowserBrowseUrl : '{{ asset('/plugins/') }}' + '/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl : '{{ asset('/plugins/') }}' + '/ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl : '{{ asset('/plugins/') }}' + '/ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl : '{{ asset('/plugins/') }}' + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl : '{{ asset('/plugins/') }}' + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl : '{{ asset('/plugins/') }}' + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });

            $('#ten').on('keyup', function (evt) {
                let  name = $('#ten').val();
                $('#slug').val(changeToSlug(name));
            });
        });
    </script>
@endsection
