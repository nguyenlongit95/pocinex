<div data-v-ee72d266="" class="z-index-1">
    <div data-v-0ba9bc78="" class="footerFAQs">
        <div data-v-0ba9bc78="" class="container position-relative">
            <div data-v-0ba9bc78="" class="py-3 py-sm-5 blockRow border-bottom pb-0">
                <div data-v-0ba9bc78="" class="block logo">
                    <p data-v-0ba9bc78="" class="mb-lg-2 mb-1">
                        <img width="236" height="73" src="{{ asset('image/logo/logo.8bc073bd.svg') }}" alt="Pocinex">
                    </p>
                    <div data-v-0ba9bc78="" class="font-12 txtContent">© {{ \Carbon\Carbon::now()->format('Y') }}
                        <div data-v-0ba9bc78="" class="text-domain d-inline-block">Pocinex</div>
                        All rights reserved.
                    </div>
                </div>
            </div>
            <div data-v-0ba9bc78="" class="py-3 py-sm-5 blockRow mb-0">
                <div data-v-0ba9bc78="" class="block">
                    <p data-v-0ba9bc78="" class="txtContent fullText">
                        @if(isset($settings['footer_info'])) {{ $settings['footer_info']->value }} @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
