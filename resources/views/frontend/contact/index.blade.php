<x-frontend.master title="Kontak">
    @push('styles')
    @endpush

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Kontak</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!--section start-->
    <section class="contact-page section-b-space">
        <div class="container">
            <div class="row section-b-space">
                <div class="col-lg-7 map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1118.4672726470828!2d108.21564668677823!3d-7.343863594360415!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f5739661d6fa3%3A0x1d9d43c70bfddd2a!2sPusat%20Mukena%20Khadijah!5e0!3m2!1sid!2sid!4v1688292294692!5m2!1sid!2sid"
                        allowfullscreen="" loading="lazy"></iframe>

                </div>
                <div class="col-lg-5">
                    <div class="contact-right">
                        <ul>
                            <li>
                                <div class="contact-icon"><i class="fa fa-phone" aria-hidden="true"></i>
                                    <h6>No. Telepon</h6>
                                </div>
                                <div class="media-body">
                                    <p>{{ $contact->phone ?? "" }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <h6>Alamat</h6>
                                </div>
                                <div class="media-body">
                                    <p>{{ $contact->province ?? "" }}, {{ $contact->city ?? "" }},
                                        {{ $contact->address ?? "" }}, {{ $contact->postal_code ?? "" }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-envelope" aria-hidden="true"></i>
                                    <h6>Email</h6>
                                </div>
                                <div class="media-body">
                                    <p>{{ $contact->email ?? "" }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

    @push('scripts')
    @endpush

</x-frontend.master>
