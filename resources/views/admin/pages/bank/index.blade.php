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
                        <h1 class="m-0 text-dark">Cập nhật tỷ giá ngân hàng</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="col-12">
            @include('admin.layouts.errors')
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="col-6 float-left">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tỷ giá theo đồng <span class="text-red font-weight-bold">USD</span></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="table-usd">
                            <thead class="text-center">
                                <th>
                                    <td>Ngày</td>
                                    <td>Tỷ giá</td>
                                    <td>Đồng tiền</td>
                                    <td>Cập nhập</td>
                                </th>
                            </thead>
                            <tbody class="text-center">
                                @if(!is_null($usd))
                                    @foreach ($usd as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td><input type="text" disabled class="form-control date_range" name="date" value="{{ $value->date }}"></td>
                                            <td><input type="text" id="exchange_rate_usd_{{ $value->id }}" class="form-control" name="exchange_rate" value="{{ $value->exchange_rate }}"></td>
                                            <td>
                                                <img height="32" width="32" src="{{ asset('/image/virual_money/' . $value->image) }}" alt="{{ $value->date }}">
                                            </td>
                                            <td>
                                                <button type="submit" onclick="editExchangeUSD({{ $value->id }})" class="btn-plus"><i class="fa fa-pen"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>Chưa có cập nhật, hãy thêm ở dòng bên dưới.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <br>
                        <p class="">Bảng thêm mới tỷ suất trong ngày</p>
                        <!-- /.card-body -->
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <th>
                                    <td>Ngày</td>
                                    <td>Tỷ giá</td>
                                    <td>Đồng tiền</td>
                                    <td>Cập nhập</td>
                                </th>
                            </thead>
                            <tbody>
                            <form action="{{ url('/admin/ty-suat-ngan-hang/add/usd') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <tr>
                                    <td></td>
                                    <td><input type="date" class="form-control" name="date" value=""></td>
                                    <td><input type="text" class="form-control" name="exchange_rate" value=""></td>
                                    <td>
                                        <select class="form-control" name="coin_id" id="coin_id">
                                            @foreach($virualMoney as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            </form>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <p class="text-danger">Danh sách các lần cập nhật tỷ giá theo đồng (USD) cập nhật cho ngày hôm nay.</p>
                    </div>
                </div>
            </div>
            <div class="col-6 float-right">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tỷ giá theo đồng <span class="text-danger font-weight-bold">VNĐ</span></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="table-vnd">
                            <thead class="text-center">
                            <th>
                            <td>Ngày</td>
                            <td>Tỷ giá</td>
                            <td>Đồng tiền</td>
                            <td>Cập nhập</td>
                            </th>
                            </thead>
                            <tbody class="text-center">
                            @if(!is_null($vnd))
                                @foreach ($vnd as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td><input type="text" disabled class="form-control date_range" name="date" value="{{ $value->date }}"></td>
                                        <td><input type="text" class="form-control" id="exchange_rate_vnd_{{ $value->id }}" name="exchange_rate" value="{{ $value->exchange_rate }}"></td>
                                        <td>
                                            <img height="32" width="32" src="{{ asset('/image/virual_money/' . $value->image) }}" alt="{{ $value->date }}">
                                        </td>
                                        <td>
                                            <button type="submit" onclick="editExchangeVND({{ $value->id }})" class="btn-plus"><i class="fa fa-pen"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>Chưa có cập nhật, hãy thêm ở dòng bên dưới.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <br>
                        <p class="">Bảng thêm mới tỷ suất trong ngày</p>
                        <!-- /.card-body -->
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <th>
                            <td>Ngày</td>
                            <td>Tỷ giá</td>
                            <td>Đồng tiền</td>
                            <td>Cập nhập</td>
                            </th>
                            </thead>
                            <tbody>
                            <form action="{{ url('/admin/ty-suat-ngan-hang/add/vnd') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <tr>
                                    <td></td>
                                    <td><input type="date" class="form-control" name="date" value=""></td>
                                    <td><input type="text" class="form-control" name="exchange_rate" value=""></td>
                                    <td>
                                        <select class="form-control" name="coin_id" id="coin_id">
                                            @foreach($virualMoney as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            </form>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <p class="text-danger">Các lần cập nhật tỷ giá theo (VNĐ) cập nhật cho ngày hôm nay.</p>
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
@endsection

@section('custom-js')
    <script src="{{ asset('') }}"></script>
    <script>
        $(document).ready( function () {
            $('#table-usd').DataTable();
            $('#table-vnd').DataTable();
        });

        function editExchangeUSD(id) {
            let _token = $('#token').val();
            let _exchangeRage = $('#exchange_rate_usd_' + id).val();
            $.ajax({
                url: '{{ url('/admin/ty-suat-ngan-hang/edit/usd/') }}',
                type: 'post',
                data: {
                    _token: _token,
                    _exchangeRage: _exchangeRage,
                    id: id
                },
                success: function (res) {
                    if (res.code === 200) {
                        window.location.reload();
                    } else {
                        alert('Có lỗi hệ thống xảy ra.');
                    }
                }
            });
        }

        function editExchangeVND(id) {
            let _token = $('#token').val();
            let _exchangeRage = $('#exchange_rate_vnd_' + id).val();
            $.ajax({
                url: '{{ url('/admin/ty-suat-ngan-hang/edit/vnd/') }}',
                type: 'post',
                data: {
                    _token: _token,
                    _exchangeRage: _exchangeRage,
                    id: id
                },
                success: function (res) {
                    if (res.code === 200) {
                        window.location.reload();
                    } else {
                        alert('Có lỗi hệ thống xảy ra.');
                    }
                }
            });
        }
    </script>
@endsection
