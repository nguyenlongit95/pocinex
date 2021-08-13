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
                        <h1 class="m-0 text-dark">Quản lý banner</h1>

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="col-12">
            @include('admin.layouts.errors')
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-danger">Chỉ có 1 banner được phép hoạt động.</p>
                    <p class="text-danger">Hình ảnh gửi lên phải nhỏ hơn 2mb và có định dạng là png hoặc jpg.</p>
                </div>
                <div class="col-md-6">
                    <form action="{{ url('/admin/banner/create') }}" id="form-add-banner" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-9 float-right">
                            <label class="text-success" for="banner">Thêm banner mới</label>
                            <input type="file" name="banner" value="" id="banner">
                        </div>
                    </form>
                </div>
                @if(!empty($banners))
                    @foreach($banners as $banner)
                    <div class="col-3 float-left">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{ asset('image/banner/' . $banner->banner) }}" height="250" width="250" alt="">
                            </div>
                            <div class="card-footer">
                                <div class="card-footer text-right">
                                    @if($banner->status == 1)
                                    <a href="{{ url('/admin/banner/' . $banner->id . '/un-active') }}" type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Đang hoạt động</a>
                                    @else
                                    <a href="{{ url('/admin/banner/' . $banner->id . '/active') }}" type="submit" class="btn btn-warning"><i class="fas fa-cog"></i> Kích hoạt</a>
                                    @endif
                                    <a href="{{ url('/admin/banner/' . $banner->id . '/delete') }}" type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {!! $banners->render() !!}
                @endif
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script>
        $(document).ready(function () {
             $('#banner').on('change', function (evt) {
                 $('#form-add-banner').submit();
             });
        });
    </script>
@endsection
