<div data-v-ee72d266 class="col-lg-7 col-md-12 col-sm-12">
    <div data-v-ee72d266 class="main-banner-content-text">
        <h2 data-v-ee72d266 class="main-banner-title">Cách tốt hơn để giao dịch và kiếm tiền</h2>
        <p data-v-ee72d266 class="main-banner-desc">
            Pocinex là một nền tảng giao
            dịch thế hệ mới giúp bạn giao dịch dễ dàng và có lợi nhuận cao. Mục tiêu
            của chúng tôi là trở thành nơi tốt nhất để mọi người giao dịch và kiếm
            tiền.
        </p>
    </div>
    <a data-v-ee72d266 href="https://pocinex.net/register?r=016FF02" target="_blank" class="margin-bottom-25px mx-auto btn-start button primary borderRounded font-20 text-decoration-none main-banner-link text-uppercase banner-btn-left">
        Đăng ký tham gia
    </a>
    <br>
    <a data-v-ee72d266 href="@if(isset($settings['telegram'])) {{ $settings['telegram']->value }} @endif" target="_blank" class="margin-bottom-25px mx-auto btn-start button primary borderRounded font-20 text-decoration-none main-banner-link text-uppercase banner-btn-left">
        Tham gia nhóm telegram
    </a>
    <br>
    <a data-v-ee72d266 href="@if(isset($settings['facebook'])) {{ $settings['facebook']->value }} @endif" target="_blank" class="margin-bottom-25px mx-auto btn-start button primary borderRounded font-20 text-decoration-none main-banner-link text-uppercase banner-btn-left">
        Tham gia nhóm Facebook
    </a>
</div>
<div data-v-ee72d266 class="col-lg-5 col-md-12 col-sm-12 d-flex justify-content-center justify-content-lg-end">
    <img src="@if(isset($banner)) {{ asset('image/banner/' . $banner->banner) }} @endif" class="main-banner-image">
</div>
