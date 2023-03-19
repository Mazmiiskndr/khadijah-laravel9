<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- facebook chat section start -->
<!-- <div id="fb-root"></div>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src =
                'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script> -->
<!-- Your customer chat code -->
<!-- <div class="fb-customerchat" attribution=setup_tool page_id="2123438804574660" theme_color="#0084ff"
        logged_in_greeting="Hi! Welcome to PixelStrap Themes  How can we help you?"
        logged_out_greeting="Hi! Welcome to PixelStrap Themes  How can we help you?">
    </div> -->
<!-- facebook chat section end -->


<!-- tap to top -->
<div class="tap-top top-cls">
    <div>
        <i class="fa fa-angle-double-up"></i>
    </div>
</div>
<!-- tap to top end -->


<!-- latest jquery-->
<script src="{{ asset('assets/assets/js/jquery-3.3.1.min.js') }}"></script>

<!-- fly cart ui jquery-->
<script src="{{ asset('assets/assets/js/jquery-ui.min.js') }}"></script>

<!-- exitintent jquery-->
<script src="{{ asset('assets/assets/js/jquery.exitintent.js') }}"></script>
<script src="{{ asset('assets/assets/js/exit.js') }}"></script>

<!-- slick js-->
<script src="{{ asset('assets/assets/js/slick.js') }}"></script>

<!-- menu js-->
<script src="{{ asset('assets/assets/js/menu.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('assets/assets/js/lazysizes.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('assets/assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Bootstrap Notification js-->
<script src="{{ asset('assets/assets/js/bootstrap-notify.min.js') }}"></script>

<!-- Fly cart js-->
<script src="{{ asset('assets/assets/js/fly-cart.js') }}"></script>

<!-- Theme js-->
<script src="{{ asset('assets/assets/js/theme-setting.js') }}"></script>
<script src="{{ asset('assets/assets/js/script.js') }}"></script>

<script>
    $(window).on('load', function () {
            setTimeout(function () {
                $('#exampleModal').modal('show');
            }, 2500);
        });

        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
</script>
