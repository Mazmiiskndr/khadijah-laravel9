<x-frontend.master title="Detail Transaksi">


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
