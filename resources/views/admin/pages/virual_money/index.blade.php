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
                        <h1 class="m-0 text-dark">Danh sách tiền ảo</h1>
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
                            <a href="{{ url('/admin/tien-ao/add') }}" class="float-right btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
                    </div>
                </div>
                <table class="table table-hover table-bordered">
                    <thead class="background-blue color-white">
                        <th>
                            <td>Name</td>
                            <td>code</td>
                            <td>Hình ảnh</td>
                            <td class="text-center">Action</td>
                        </th>
                    </thead>
                    <tbody>
                    @if(!empty($virualMoneys))
                        @foreach($virualMoneys as $virualMoney)
                            <tr>
                                <td class="text-center">{{ $virualMoney->id }}</td>
                                <td>{{ $virualMoney->name }}</td>
                                <td>{{ $virualMoney->code }}</td>
                                <td>
                                    <img height="32" width="32" src="{{ asset('/image/virual_money/' . $virualMoney->image ) }}" alt="{{ $virualMoney->code }}">
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/admin/tien-ao/'.$virualMoney->id.'/edit') }}"><i class="fas fa-edit"></i></a> |
                                    <a href="{{ url('/admin/tien-ao/'.$virualMoney->id.'/delete') }}"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('') }}"></script>
@endsection
