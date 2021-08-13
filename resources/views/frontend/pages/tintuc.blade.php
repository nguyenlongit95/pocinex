@extends('frontend.master')

@section('content')

    @include('frontend.partials.usdt')

    <section data-v-ee72d266="" id="tin-tuc-hang-ngay" class="trading margin-right-none z-index-1">
        <div data-v-ee72d266="" class="trading-bg"></div>
        <div data-v-ee72d266="" class="container">
            <div data-v-ee72d266="" class="trading-main-title">
                Tin tức hàng ngày
            </div>
            <div data-v-ee72d266="" class="trading-main-subtitle">
                Cập nhật tin tức tỷ giá, lợi nhuận, lãi suất nhanh chóng và dễ dàng.
            </div>
            <div data-v-ee72d266="" class="swiper-container-trading swiper-container-initialized swiper-container-horizontal">
                <div data-v-ee72d266="" class="swiper-wrapper" id="swiper-wrapper-7b2202c9636c68b4" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                    @if(!empty($articles))
                        @foreach($articles as $article)
                            <div data-v-ee72d266="" class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 3" style="width: 330px; margin-right: 60px;">
                                <div data-v-ee72d266="" class="trading-group trading-group-index">
                                    <img data-v-ee72d266="" class="img-thumbnail-index" src="{{ asset('image/articles/' . $article->image) }}">
                                    <div data-v-ee72d266="" class="trading-title">
                                        <a href="{{ url('/tin-tuc/' . $article->slug) }}">{{ $article->name }}</a>
                                    </div>
                                    <div data-v-ee72d266="" class="trading-description">
                                        {!! $article->info !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
            <br>
            <div class="pagination float-right pagination-item">
                {!! $articles->links() !!}
            </div>
        </div>
    </section>

    <div class="" id="content-article-detail">
        <div class="container">
            <div id="article-box">
                <div class="box-usd col-md-12">
                    <div class="row">
                        <div class="title text-center">
                            <h1 class="font-weight-bold">{!! $articleDetail->name !!}</h1>
                            <br>
                            {!! $articleDetail->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
    <script>
        $(document).ready(function () {
            window.location.href = "#content-article-detail";
        });
    </script>
@endsection
