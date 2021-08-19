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
        <form role="form" action="{{ url('/admin/tin-tuc/' . $article->id . '/update') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <section class="content">
                <div class="col-9 float-left">
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
                                <label for="ten">Tiêu đề <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="ten" name="name" value="{{ $article->name }}">
                            </div>

                            <div class="form-group">
                                <label for="info">Nội dung cơ bản <span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control" id="info" name="info">{!! $article->info !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="description">Nội dung chi tiết <span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control" id="description" name="description">{!! $article->description !!}</textarea>
                            </div>

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
                <div class="col-3 float-right">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Mã bài viết</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="text" readonly class="form-control" id="slug" name="slug" value="{{ $article->slug }}">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <p class="text-danger">Lưu ý: Mã của bài viết sẽ được tự động sinh ra khi bạn nhập tiêu đề của bài viết.</p>
                                </div>
                                <!-- /.card-footer-->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Thời gian cập nhật</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="text" disabled class="form-control" id="time_public" name="time_public" value="{{ \Carbon\Carbon::create($article->time_public)->format('d-m-Y') }}">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <p class="text-danger">Lưu ý: Thời gian cập nhật được đặt mặc định là ngày hôm nay.</p>
                                </div>
                                <!-- /.card-footer-->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Hình ảnh bài viết</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="file" readonly class="form-control" id="image" name="image">
                                        <br>
                                        <img width="160" src="{{ asset('image/articles/' . $article->image) }}" alt="{{ $article->slug }}">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <p class="text-danger">Lưu ý: Hình ảnh phải có định dạng .jpg(jpeg) hoặc .png và kích thước nhỏ hơn 2mb.</p>
                                </div>
                                <!-- /.card-footer-->
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
        // Replace ck editor
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

        'use strict';

        /**
         * function change text to slug
         *
         * @param title
         * @returns {string}
         * @constructor
         */
        window.changeToSlug = function (title)
        {
            let slug;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”

            return slug;
        };
    </script>
@endsection
