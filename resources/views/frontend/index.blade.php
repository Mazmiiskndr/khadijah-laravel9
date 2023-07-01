@push('styles')

@endpush
<x-frontend.master title="Khadijah Label">

    {{-- Start Slider --}}
    <x-frontend.home.slider />
    {{-- End Slider --}}

    {{-- Start Collection Banner --}}
    <x-frontend.home.collection-banner />
    {{-- End Collection Banner --}}

    {{-- Start Paragraph --}}
    <x-frontend.home.paragraph />
    {{-- End Paragraph --}}

    {{-- Start Product Slider --}}
    <x-frontend.home.product-slider>
        {{-- Start Product Box --}}
        @livewire('frontend.home.product-box')
        {{-- End Product Box --}}
    </x-frontend.home.product-slider>
    {{-- End Product Slider --}}

    {{-- Start Parallax Banner --}}
    <x-frontend.home.parallax-banner />
    {{-- End Parallax Banner --}}

    {{-- Start Service Layout --}}
    <x-frontend.home.service-layout />
    {{-- End Service Layout --}}

@livewire('frontend.product.detail-cart')
<!-- section End -->
@push('scripts')
<script>
    window.addEventListener('close-modal-product', event =>{
        $('#quick-view').modal('hide');
    });
</script>
@endpush
</x-frontend.master>
