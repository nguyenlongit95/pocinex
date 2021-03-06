<div class="" id="content-section">
    <div class="container">
        <div id="trading-usd">
            <div class="title text-center">
                <h1 class="font-weight-bold">Tham gia nhóm mua bán USDT</h1>
                <br>
                <!-- Link to group -->
                <a href="@if(isset($settings['link_btn_three'])) {{ $settings['link_btn_three']->value }} @endif" target="_blank" class="btnSignIn btnMainBorder btn-large menu-item-width text-decoration-none">
                    <span class="font-weight-bold btn btn-danger border-radius-15">THAM GIA NGAY</span>
                </a>
            </div>
            <div class="box-usd col-md-12">
                <div class="row">
                    <div class="box-header col-md-12">
                        <div class="row">
                            <div class="col-md-1 pull-left">
                                <img src="{{ asset('image/virual_money/' . $initUSDT->image) }}" class="icon-virual-money" alt="">
                                <input type="hidden" name="coin_nav" id="coin_nav" value="{{ $initUSDT->image }}">
                            </div>
                            <div class="col-md-9"></div>
                            <div class="col-md-2 pull-right">
                                <button class="btn btn-select-coin" id="select-coin-modal">Chọn coin khác</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="gia-ban col-md-5 col-xs-12">
                                <i class="fa fa-cart-plus"></i> Giá bán
                                <br><br>
                                <h3 class="font-weight-bold"><span class="text-green" id="txt_gia_ban">{{ number_format($initUSDT->sell, 0) }}</span> VNĐ</h3>
                                <input type="hidden" id="gia_ban" value="{{ $initUSDT->sell }}">
                                <br>
                                <button class="btn btn-success">MUA NGAY</button>
                            </div>
                            <div class="col-md-2 col-xs-12"></div>
                            <div class="gia-mua col-md-5 col-xs-12">
                                <i class="fa fa-cart-plus"></i> Giá mua
                                <br><br>
                                <h3 class="font-weight-bold"><span class="text-green" id="txt_gia_mua">{{ number_format($initUSDT->buy, 0) }}</span> VNĐ</h3>
                                <input type="hidden" id="gia_ban" value="{{ $initUSDT->buy }}">
                                <br>
                                <button class="btn btn-danger">BÁN NGAY</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 margin-top-15">
                        <div class="row">
                            <div class="col-md-6 box-mua-ngay border-right-white">
                                <h4 class="text-center">Mua ngay</h4>
                                <form class="form-group">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label class="padding-left-none" for="loai_coin_mua">Chọn loại coin <span class="text-danger">*</span> </label>
                                            <select class="form-control back-ground-white" name="loai_coin" id="loai_coin_mua">
                                                <option value="{{ $virualMoney->code }}">{{ $virualMoney->name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label class="padding-left-none" for="so_luong_mua">Số lượng cần mua <span class="text-danger">*</span> </label>
                                            <input type="number" class="form-control back-ground-white" name="so_luong" placeholder="0" id="so_luong_mua">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label class="padding-left-none" for="so_tien_tra">Số tiền trả (VND) <span class="text-danger">*</span> </label>
                                            <input type="number" readonly class="form-control back-ground-white" name="so_tien_tra" value="" id="so_tien_tra">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label class="padding-left-none" for="dia_chi">Địa chỉ nhận coin <span class="text-danger">*</span> </label>
                                            <textarea class="form-control back-ground-white" name="dia_chi" id="dia_chi" cols="" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-2 float-right">
                                        <div class="row">
                                            <button type="button" onclick="clickBtnMua()" class="btn btn-success">Mua</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 box-ban-ngay">
                                <h4 class="text-center">Bán ngay</h4>
                                <form class="form-group">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label class="padding-left-none" for="loai_coin">Chọn loại coin <span class="text-danger">*</span> </label>
                                            <select class="form-control back-ground-white" name="loai_coin" id="loai_coin">
                                                <option value="{{ $virualMoney->code }}">{{ $virualMoney->name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label class="padding-left-none" for="so_luong_ban">Số lượng cần bán <span class="text-danger">*</span> </label>
                                            <input type="number" class="form-control back-ground-white" name="so_luong" placeholder="0" id="so_luong_ban">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label class="padding-left-none" for="email_ban">Tùy chọn email <span class="text-danger">*</span> </label>
                                            <input type="email" class="form-control back-ground-white" name="email_ban" placeholder="03@gmail.com" id="email_ban">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label class="padding-left-none" for="so_tien_nhan">Số tiền nhận <span class="text-danger">*</span> </label>
                                            <input type="number" readonly class="form-control back-ground-white" name="so_tien_nhan" value="" id="so_tien_nhan">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-2 float-right">
                                        <div class="row">
                                            <button type="button" onclick="clickBtnBan()" class="btn btn-danger">Bán</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 margin-top-15">
                        <div class="row">
                            <div class="box-giao-dich display-none">
                                <h3>Thông tin chuyển khoản</h3>
                                <p>Vui lòng chuyển khoảng qua ngân hàng <span class="font-weight-bold text-danger font-italic">@if(isset($settings['bank_name'])) {{ $settings['bank_name']->value }} @endif</span></p>
                                <p>Số tài khoản ngân hàng: <span class="font-weight-bold text-danger font-italic">@if(isset($settings['bank_number'])) {{ $settings['bank_number']->value }} @endif</span></p>
                                <p>Tên chủ tài khoản: <span class="font-weight-bold text-danger font-italic">@if(isset($settings['bank_account_name'])) {{ $settings['bank_account_name']->value }} @endif</span></p>
                                <p>Nội dung chuyển khoản: <span class="font-weight-bold text-danger font-italic">@if(isset($settings['send_notification'])) {{ $settings['send_notification']->value }} @endif</span></p>
                                <p class="text-danger font-italic">Lưu ý: vui lòng chuyển khoản qua ngân hàng MB quân đội trước khi mua <span class="text-danger">*</span> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" readonly id="box-gia-mua" value="{{ $initUSDT->sell }}">
<input type="hidden" readonly id="box-gia-ban" value="{{ $initUSDT->buy }}">
