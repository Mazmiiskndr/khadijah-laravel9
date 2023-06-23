<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\RekeningCustomer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateCards extends Component
{
    public $createModal = false;

    // Declare variable
    public $customer_id, $provider, $rekening_name, $rekening_number;

    // Listeners
    // protected $listeners = [
    //     'rekeningCreated' => '$refresh',
    // ];

    // RULES VALIDATION
    protected $rules = [
        'provider' => 'required',
        'rekening_name' => 'required',
        'rekening_number' => 'required|numeric',
    ];

    // MESSAGE VALIDATION
    protected $messages = [
        'provider.required' => 'Metode Pembayaran harus diisi',
        'rekening_name.required' => 'Nama Rekening harus diisi',
        'rekening_number.required' => 'Nomor Rekening harus diisi',
        'rekening_number.numeric' => 'Nomor Rekening harus berupa angka',
    ];

    public function render()
    {
        return view('livewire.frontend.profile.create-cards');
    }

    // Create Store Function for Create Rekening Customer
    public function store()
    {
        // Validate Form Request
        $this->validate();
        try {
            $this->customer_id = Auth::guard('customer')->user()->id;
            // Create New Customer
            $rekeningCustomer = RekeningCustomer::create([
                'customer_id' => $this->customer_id,
                'provider' => $this->provider,
                'rekening_name' => $this->rekening_name,
                'rekening_number' => $this->rekening_number,
            ]);
            // Set Flash Message
            session()->flash('success', 'Rekening / Pembayaran Berhasil di Tambahkan!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
            // Emit event to reload datatable
            $this->emit('rekeningCreated', $rekeningCustomer);
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Exception $e) {
            // Set Flash Message
            session()->flash('error', 'Rekening / Pembayaran Gagal di Tambahkan!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
        }
    }

    /**
     * updated
     *
     * @param  mixed $property
     * @return void
     */
    public function updated($property)
    {
        // Every time a property changes
        // (only `text` for now), validate it
        $this->validateOnly($property);
    }

    /**
     * closeRekeningModal
     *
     * @return void
     */
    public function closeRekeningModal()
    {
        $this->createModal = false;
        $this->resetFields();
    }

    /**
     * resetFields
     *
     * @return void
     */
    public function resetFields()
    {
        $this->customer_id = '';
        $this->provider = '';
        $this->rekening_name = '';
        $this->rekening_number = '';
    }
}
