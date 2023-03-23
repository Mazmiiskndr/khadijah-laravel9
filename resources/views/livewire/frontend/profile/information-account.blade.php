<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-title">
                <h3>Detail Informasi</h3>
                <a href="#" wire:click="getCustomer({{ $customer->id }})" data-bs-toggle="modal"
                    data-bs-target="#updateCustomerModal">Edit</a>
            </div>
            <div class="box-content">
                @php
                $addressCustomer = $customer->address ? $customer->address : "-";
                $provinceCustomer = $customer->province ? ucwords(strtolower($customer->province->name)) : "-";
                $cityCustomer = $customer->city ? ucwords(strtolower($customer->city->name)) : "-";
                $districtCustomer = $customer->district ? ucwords(strtolower($customer->district->name)) : "-";
                @endphp
                <table class="table table-borderless">
                    <tr>
                        <th style="width:250px;">Nama</th>
                        <th style="width:30px;" class="text-center">:</th>
                        <td>{{ ucwords($customer->name) }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th style="width:30px;" class="text-center">:</th>
                        <td>{{ $customer->email }}</td>
                    </tr>
                    <tr>
                        <th>No. Telepon/WhatsApp</th>
                        <th style="width:30px;" class="text-center">:</th>
                        <td>{{ $customer->phone }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <th style="width:30px;" class="text-center">:</th>
                        <td>{{ $customer->gender }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th style="width:30px;" class="text-center">:</th>
                        <td>
                            @if($addressCustomer != "-")
                            <address>{{ $provinceCustomer }}, {{ $cityCustomer }}, {{ $districtCustomer }}, {{
                                $addressCustomer }} </address>
                            @else
                            <address class="text-warning">Anda belum mengatur alamat pengiriman.</address>
                            @endif
                        </td>
                    </tr>
                </table>
                <hr>
            </div>
        </div>
    </div>
</div>
