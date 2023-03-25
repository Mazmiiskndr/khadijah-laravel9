<div>
    <div class="welcome-msg">
        <h4>Halo, {{ ucwords($customer->name) }} !</h4>
        <p>Dari Halaman Akun Anda, Anda dapat melihat gambaran singkat aktivitas akun terbaru Anda dan memperbarui informasi
            akun
            Anda. Pilih tautan di bawah ini untuk melihat atau mengedit informasi Anda.</p>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="counter-box">
                <img src="{{ asset('assets/assets/images/icon/dashboard/sale.png') }}" class="img-fluid">
                <div>
                    <h3>25</h3>
                    <h5>Total Order</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="counter-box">
                <img src="{{ asset('assets/assets/images/icon/dashboard/homework.png') }}" class="img-fluid">
                <div>
                    <h3>5</h3>
                    <h5>Pending Orders</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="counter-box">
                <img src="{{ asset('assets/assets/images/icon/dashboard/order.png') }}" class="img-fluid">
                <div>
                    <h3>50</h3>
                    <h5>Wishlist</h5>
                </div>
            </div>
        </div>
    </div>
</div>