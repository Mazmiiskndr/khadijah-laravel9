<x-frontend.master title="Pembayaran">

    {{-- START ALERT SUCCESS SECTION --}}
    <section class="section-b-space light-layout">
        @livewire('frontend.checkout.alert-success')
    </section>
    {{-- END ALERT SUCCESS SECTION --}}


    {{-- START ORDER DETAIL SECTION --}}
    <section class="section-b-space">
        @livewire('frontend.checkout.order-detail')
    </section>
    {{-- END ORDER DETAIL SECTION --}}

    @push('scripts')
        @if (session()->has('success'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        @endif
    @endpush
</x-frontend.master>
