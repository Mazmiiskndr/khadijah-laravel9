<x-frontend.master>
    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><span>Create account</span></li>
                </ul>
            </div>
        </div>
        <div class="holder">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-18 col-lg-12">
                        <h2 class="text-center">Create an Account</h2>

                        <div class="form-wrapper">
                            <p>To access your whishlist, address book and contact preferences and to take advantage of our
                                speedy checkout, create an account with us now.</p>
                                {{-- *** TODO: *** and *** FIXME: *** --}}
                            {{-- <form method="POST" action="{{ route('login') }}" wire:submit.prevent="submit">
                                <div class="form-group">
                                    @csrf
                                    @include('components.form.input', [
                                    'type' => 'email',
                                    'label' => 'Email',
                                    'placeholder' => 'Enter your Email',
                                    'name' => 'email',
                                    'id' => 'email'
                                    ])
                                    <small class="text-danger">*** TODO ***</small>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="clearfix">
                                    <input id="checkbox1" name="checkbox1" type="checkbox" checked="checked">
                                    <label for="checkbox1">By registering your details you agree to our <a href="#"
                                            class="custom-color" data-fancybox data-src="#modalTerms">Terms and
                                            Conditions</a> and <a href="#" class="custom-color" data-fancybox
                                            data-src="#modalCookies">Cookie Policy</a></label>
                                </div>
                                <div class="text-center">
                                    <button class="btn">create an account</button>
                                </div>
                            </form> --}}
                            @livewire('customer-login')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalTerms" style="display: none;" class="modal-info-content modal-info-content-lg">
        <div class="modal-info-heading">
            <h2>Terms and Conditions</h2>
        </div>
        <p>This website is operated by a.season. Throughout the site, the terms “we”, “us” and “our” refer to a.season.
            a.season offers this website, including all information, tools and services available from this site to you, the
            user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.</p>
        <p>By visiting our site and/ or purchasing something from us, you engage in our “Service” and agree to be bound by
            the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and
            conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all
            users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or
            contributors of content.</p>
        <p>Please read these Terms of Service carefully before accessing or using our website. By accessing or using any
            part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and
            conditions of this agreement, then you may not access the website or use any services. If these Terms of Service
            are considered an offer, acceptance is expressly limited to these Terms of Service.</p>
        <p>Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You
            can review the most current version of the Terms of Service at any time on this page. We reserve the right to
            update, change or replace any part of these Terms of Service by posting updates and/or changes to our website.
            It is your responsibility to check this page periodically for changes. Your continued use of or access to the
            website following the posting of any changes constitutes acceptance of those changes.</p>
        <p>Our store is hosted on Shopify Inc. They provide us with the online e-commerce platform that allows us to sell
            our products and services to you.</p>
    </div>
    <div id="modalCookies" style="display: none;" class="modal-info-content modal-info-content-lg">
        <div class="modal-info-heading">
            <h2>Cookie Policy</h2>
        </div>
        <p>This website is operated by a.season. Throughout the site, the terms “we”, “us” and “our” refer to a.season.
            a.season offers this website, including all information, tools and services available from this site to you, the
            user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.</p>
        <p>By visiting our site and/ or purchasing something from us, you engage in our “Service” and agree to be bound by
            the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and
            conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all
            users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or
            contributors of content.</p>
        <p>Please read these Terms of Service carefully before accessing or using our website. By accessing or using any
            part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and
            conditions of this agreement, then you may not access the website or use any services. If these Terms of Service
            are considered an offer, acceptance is expressly limited to these Terms of Service.</p>
        <p>Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You
            can review the most current version of the Terms of Service at any time on this page. We reserve the right to
            update, change or replace any part of these Terms of Service by posting updates and/or changes to our website.
            It is your responsibility to check this page periodically for changes. Your continued use of or access to the
            website following the posting of any changes constitutes acceptance of those changes.</p>
        <p>Our store is hosted on Shopify Inc. They provide us with the online e-commerce platform that allows us to sell
            our products and services to you.</p>
    </div>
</x-frontend.master>
