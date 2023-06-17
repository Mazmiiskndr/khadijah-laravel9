<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\RekeningCustomer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateCards extends Component
{
    public $updateModal = false;

    // Declare variable
    public $rekening_id,$customer_id, $provider, $rekening_name, $rekening_number;

    // Listeners
    protected $listeners = [
        'rekeningUpdated' => '$refresh',
        'getRekening' => 'show'
    ];

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
        return view('livewire.frontend.profile.update-cards');
    }


    /**
     * show
     *
     * @param  mixed $rekening
     * @return void
     */
    public function show($rekening)
    {
        $this->rekening_id = $rekening['id'];
        $this->provider = $rekening['provider'];
        $this->rekening_name = $rekening['rekening_name'];
        $this->rekening_number = $rekening['rekening_number'];
        $this->updateModal = true;
    }

    // create function update
    public function update()
    {
        // Validate Form Request
        $this->validate();
        try {
            $this->customer_id = Auth::guard('customer')->user()->id;
            // Create New Customer
            $rekeningCustomer = RekeningCustomer::find($this->rekening_id);
            $rekeningCustomer->update([
                'customer_id' => $this->customer_id,
                'provider' => $this->provider,
                'rekening_name' => $this->rekening_name,
                'rekening_number' => $this->rekening_number,
            ]);
            // Set Flash Message
            session()->flash('success', 'Rekening / Pembayaran Berhasil di Update!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
            // Emit event to reload datatable
            $this->emit('rekeningUpdated',$rekeningCustomer);
            $this->dispatchBrowserEvent('close-modal');
            // Close Modal
            $this->updateModal = false;
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', $th->getMessage());
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
        $this->updateModal = false;
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
