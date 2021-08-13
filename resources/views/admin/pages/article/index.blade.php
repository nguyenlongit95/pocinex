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
                        <h1 class="m-0 text-dark">Danh sách tin tức</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="col-12">
            @include('admin.layouts.errors')
        </div>
        <section class="content">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ url('/admin/tin-tuc/add') }}" class="float-right btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
                    </div>
                </div>
                <table class="table table-hover table-bordered">
                    <thead class="background-blue color-white">
                        <th>
                            <td>Name</td>
                            <td>slug</td>
                            <td>Thông tin cơ bản</td>
                            <td class="text-center">Action</td>
                        </th>
                    </thead>
                    <tbody>
                    @if(!empty($articles))
                        @foreach($articles as $article)
                            <tr>
                                <td class="text-center">{{ $article->id }}</td>
                                <td>{{ $article->name }}</td>
                                <td>{{ $article->slug }}</td>
                                <td>{!! $article->info !!}</td>
                                <td class="text-center">
                                    <a href="{{ url('/admin/tin-tuc/'.$article->id.'/edit') }}"><i class="fas fa-edit"></i></a> |
                                    <a href="{{ url('/admin/tin-tuc/'.$article->id.'/delete') }}"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {!! $articles->render() !!}
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('') }}"></script>
@endsection
