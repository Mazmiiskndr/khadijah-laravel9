<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Customer;
use App\Models\RekeningCustomer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GridCards extends Component
{
    // public $rekeningCustomers;
    public $rekening_id;

    protected $listeners = [
        'rekeningCreated' => 'handleStored',
        'rekeningUpdated' => 'handleUpdated',
        'deleteCard' => 'destroy',
    ];
    public function render()
    {
        $customer = Customer::with( 'rekening_customers')->where('id', Auth::guard('customer')->user()->id)->first();
        $rekeningCustomers = $customer->rekening_customers->count() > 0 ? $customer->rekening_customers : collect();
        return view('livewire.frontend.profile.grid-cards',[
            'rekeningCustomers' => $rekeningCustomers,
        ]);
    }

    /**
     * getCustomer
     *
     * @param  mixed $rekening_id
     * @return void
     */
    public function getRekening($rekening_id)
    {
        $rekening = RekeningCustomer::find($rekening_id);
        $this->emit('getRekening', $rekening);
    }

    /**
     * deleteConfirmation
     *
     * @param  mixed $rekening_id
     * @return void
     */
    public function deleteConfirmation($rekening_id)
    {
        $this->rekening_id  = $rekening_id;
        $this->dispatchBrowserEvent('delete-card-show-confirmation');
    }

    /**
     * destroy
     *
     * @param  mixed $rekening_id
     * @return void
     */
    public function destroy()
    {
        $rekening = RekeningCustomer::find($this->rekening_id);
        $rekening->delete();
        // Set Flash Message
        session()->flash('success', 'Rekening / Pembayaran Berhasil di Hapus!');
    }

    /**
     * handleStored
     *
     * @return void
     */
    public function handleStored()
    {
        //
    }

    /**
     * handleUpdated
     *
     * @return void
     */
    public function handleUpdated()
    {
        //
    }
}
