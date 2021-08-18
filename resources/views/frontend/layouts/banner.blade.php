<div data-v-ee72d266 class="col-lg-7 col-md-12 col-sm-12">
    <div data-v-ee72d266 class="main-banner-content-text">
        <h2 data-v-ee72d266 class="main-banner-title">@if(isset($settings['banner_slogan'])) {{ $settings['banner_slogan']->value }} @endif</h2>
        <p data-v-ee72d266 class="main-banner-desc">
            @if(isset($settings['banner_info'])) {{ $settings['banner_info']->value }} @endif
        </p>
    </div>
    <a data-v-ee72d266 href="https://pocinex.net/register?r=016FF02" target="_blank" class="margin-bottom-25px mx-auto btn-start button primary borderRounded font-20 text-decoration-none main-banner-link text-uppercase banner-btn-left">
        @if(isset($settings['banner_button_one'])) {{ $settings['banner_button_one']->value }} @endif
    </a>
    <br>
    <a data-v-ee72d266 href="@if(isset($settings['link_btn_two'])) {{ $settings['link_btn_two']->value }} @endif" target="_blank" class="margin-bottom-25px mx-auto btn-start button primary borderRounded font-20 text-decoration-none main-banner-link text-uppercase banner-btn-left">
        @if(isset($settings['banner_button_two'])) {{ $settings['banner_button_two']->value }} @endif
    </a>
    <br>
    <a data-v-ee72d266 href="@if(isset($settings['link_btn_three'])) {{ $settings['link_btn_three']->value }} @endif" target="_blank" class="margin-bottom-25px mx-auto btn-start button primary borderRounded font-20 text-decoration-none main-banner-link text-uppercase banner-btn-left">
        @if(isset($settings['banner_button_three'])) {{ $settings['banner_button_three']->value }} @endif
    </a>
</div>
<div data-v-ee72d266 class="col-lg-5 col-md-12 col-sm-12 d-flex justify-content-center justify-content-lg-end">
    <img src="@if(isset($banner)) {{ asset('image/banner/' . $banner->banner) }} @endif" class="main-banner-image">
</div>
