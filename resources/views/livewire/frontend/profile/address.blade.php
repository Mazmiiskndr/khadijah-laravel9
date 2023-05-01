<div class="row">
    <div class="col-12">
        <div class="card mt-0">
            <div class="card-body">
                <div class="top-sec">
                    <h3>Buku Alamat</h3>
                    <a href="#" class="btn btn-sm btn-solid" wire:click="getCustomerAdress({{ $customer->id }})"
                        data-bs-toggle="modal" data-bs-target="#updateCustomerAddressModal">Edit</a>
                </div>
                <div class="address-book-section">
                    <div class="row g-4">
                        @php
                        $addressCustomer = $customer->address ? $customer->address : "-";
                        $provinceCustomer = $customer->province ? ucwords(strtolower($customer->province->name)) : "-";
                        $cityCustomer = $customer->city ? ucwords(strtolower($customer->city->name)) : "-";
                        $districtCustomer = $customer->district ? ucwords(strtolower($customer->district->name)) : "-";
                        @endphp
                        @if($addressCustomer != "-")
                        <div class="select-box active col-xl-12 col-md-12">
                            <div class="address-box">
                                <div class="top">
                                    <h6>{{ $customer->name }}</h6>
                                </div>
                                <div class="middle">
                                    <div class="address">
                                        <p>{{ $provinceCustomer }}, {{ $cityCustomer }} , {{ $districtCustomer }} </p>
                                        <p>{{ $addressCustomer }}</p>
                                        <p>{{ $customer->postal_code }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <address class="alert-warning">Anda belum mengatur alamat pengiriman.</address>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
