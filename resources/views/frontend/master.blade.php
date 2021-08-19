<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('/image/favicon/favicon.ico') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('/css/CustomStyle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/chunk-libs.885b8ade.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/commons.2bcf511d.css') }}" rel="stylesheet">
    <link href="{{ asset('/plugins/fontawesome-free/css/all.css') }}" rel="stylesheet">
    <title>Pocinex</title>
</head>
<body>
<div class="wrapper Home back-ground-white">
    <div data-v-81a8b050 class="spaceTop heightUnset" id="top-panel"></div>
    <div data-v-1b09fdb8 class="headerMaster notAuthentication"></div>
    <main class="wrapper-main-content primary1">
        <div id="main-content" class="">
            <div class="homepage w-100">
                <section data-v-ee72d266 class="main-banner">
                    <div data-v-ee72d266 class="main-banner-content">
                        <div data-v-ee72d266 class="row">
                            <div data-v-1b09fdb8="" class="px-0 boxHeader navbar d-flex align-items-center py-2-px Home">
                                <div data-v-1b09fdb8="" class="headerWapper w-100 px-30-px notAuthentication">
                                    <div data-v-1b09fdb8="" class="justify-content-between align-items-center w-100">
                                        @include('frontend.layouts.menu')
                                    </div>
                                </div>
                            </div>

                            @include('frontend.layouts.banner')
                        </div>
                    </div>
                </section>

                <section data-v-ee72d266="" class="introduce text-center">
                    @include('frontend.layouts.introduct')
                </section>

                @yield('content')

                @include('frontend.layouts.footer')
            </div>
        </div>
    </main>
    <a id="topcontrol" title="Scroll to Top"><i class="fa fa-angle-up fa-lg fa-angle-style"></i></a>

    <div id="section-chat">
        <div id="custom_zalo_chat" class="widget_text col pb-0 widget widget_custom_html">
            <div class="zalo_chat_left custom-html-widget">
                <a target="_blank" href="https://zalo.me/0855292777" rel="nofollow">
                    <img id="img-zalo" src="{{ asset('/image/icon/LogoZalo.png') }}" alt="">
                </a>
            </div>
            <div class="sitechatzalo">
                <a target="_blank" href="https://zalo.me/0855292777" rel="nofollow">
                    <span class="iczalo">&nbsp;</span>Tư vấn Zalo 24/7
                </a>
            </div>
        </div>
        <div id="custom_hotline" class="widget_text col pb-0 widget widget_custom_html">
            <div class="sitechatzalo">
                <a target="_blank" href="https://zalo.me/0855292777" rel="nofollow">
                    <span class="hot_line">Hotline:</span>
                    <span class="number_hotline">&nbsp; @if(isset($settings['hot_line'])) {{ $settings['hot_line']->value }} @endif</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="coin-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chọn loại coins</h5>
            </div>
            <div class="modal-body">
                <label for="loai_coin_modal">Chọn loại coin: <span class="text-danger">*</span></label>
                <select name="loai_coin_modal" class="form-control back-ground-white" id="loai_coin_modal">
                    @foreach ($virualMoney as $value)
                        <option value="{{ $value->code }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btn-close" data-dismiss="modal">Đóng</button>
                <button type="button" onclick="selectCoin()" class="btn btn-primary" id="btn-select">Lựa chọn</button>
            </div>
        </div>
    </div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('/plugins/jquery/jquery.js') }}" type="text/javascript"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="{{ asset('') }}"></script>
@yield('customjs')
<script>
    $(document).ready(function () {
        $('#select-coin-modal').on('click', function () {
            $('#coin-modal').css('display', 'block');
            $('#coin-modal').css('opacity', '1');
        });
        $('#btn-close').on('click', function () {
            $('#coin-modal').css('display', 'none');
            $('#coin-modal').css('opacity', '0');
        });

        $('#loai_coin_mua').on('change', function () {
             let _coin = $(this).val();
             $.ajax({
                 url: '{{ url('/select-coin') }}',
                 type: 'get',
                 data: {
                     coin: _coin
                 }, success: function (res) {
                     if (res.code == 200) {
                         let _data = res.data;
                         $('#box-gia-mua').val(_data.buy);
                         $('.box-giao-dich').addClass('display-none');
                         $('.box-giao-dich').removeClass('display-block');
                     }
                 }
             });
        });

        $('#loai_coin').on('change', function () {
            let _coin = $(this).val();
            $.ajax({
                url: '{{ url('/find-coin') }}',
                type: 'get',
                data: {
                    coin: _coin
                }, success: function (res) {
                    if (res.code == 200) {
                        let _data = res.data;
                        $('#box-gia-ban').val(_data.sell);
                        $('.box-giao-dich').addClass('display-none');
                        $('.box-giao-dich').removeClass('display-block');
                    }
                }
            });
        });

        if(getUrlParameter('page') > 0) {
            window.location.href = '#tin-tuc-hang-ngay';
        }
    });

    /**
     * Function get parameter on the web and scroll to element
     *
     * @param name
     * @returns {string}
     */
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    /**
     * Coin Buy transactions
     */
    function clickBtnMua() {
        let _giaMua = $('#box-gia-mua').val();
        let _qty = $('#so_luong_mua').val();
        $('#so_tien_tra').val(_giaMua * _qty);
        $('.box-giao-dich').addClass('display-block');
        $('.box-giao-dich').removeClass('display-none');
    }

    /**
     *  Coin sell transactions
     */
    function clickBtnBan() {
        let _giaBan = $('#box-gia-ban').val();
        let _qty = $('#so_luong_ban').val();
        $('#so_tien_nhan').val(_giaBan * _qty);
        $('.box-giao-dich').addClass('display-block');
        $('.box-giao-dich').removeClass('display-none');
    }

    function selectCoin() {
        let e = document.getElementById("loai_coin_modal");
        let _coin = e.options[e.selectedIndex].value; console.log(_coin);
        // Call API get virual money and price
        $.ajax({
            url : '{{ url('/select-coin') }}',
            type: 'get',
            data: {
                coin: _coin
            },
            success: function (res) {
                if (res.code == 200) {
                    let _data = res.data;
                    $('#gia_ban').val(_data.sell);
                    $('#txt_gia_ban').text(_data.sell);
                    $('#gia_mua').val(_data.buy);
                    $('#txt_gia_mua').text(_data.buy);
                    $('.icon-virual-money').attr('src', _data.image);
                    $('#coin-modal').css('display', 'none');
                    $('#coin-modal').css('opacity', '0');
                }
            }
        });
    }

    /**
     * scroll to top
     */
    $('#topcontrol').on('click', function () {
        $('body,html').animate({
            scrollTop: 0
        });
    });
</script>

</body>
</html>
