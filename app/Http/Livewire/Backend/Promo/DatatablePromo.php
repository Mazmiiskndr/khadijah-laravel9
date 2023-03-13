<?php

namespace App\Http\Livewire\Backend\Promo;

use App\Models\Promo;
use App\Services\Promo\PromoService;
use Livewire\Component;

class DatatablePromo extends Component
{
    public $promo;
    public $promo_id;
    protected $listeners = [
        'createdPromo' => 'handleStored',
        'updatedPromo' => 'handleUpdated',
        'deleteConfirmation' => 'destroy',
    ];
    public function render(PromoService $promoService)
    {
        return view('livewire.backend.promo.datatable-promo', [
            'promos' => $promoService->getAllData(),
        ]);
    }


    /**
     * getPromo
     *
     * @param  mixed $promo_id
     * @return void
     */
    public function getPromo($promo_id)
    {
        $promo = Promo::find($promo_id);
        $this->emit('getPromo', $promo);
    }

    /**
     * deleteConfirmation
     *
     * @param  mixed $promo_id
     * @return void
     */
    public function deleteConfirmation($promo_id)
    {
        $this->promo_id  = $promo_id;
        $this->dispatchBrowserEvent('delete-show-confirmation');
    }

    /**
     * destroy
     *
     * @param  mixed $promo_id
     * @return void
     */
    public function destroy()
    {
        $promo = Promo::where('promo_id', $this->promo_id)->first();
        $promo->delete();
        // Set Flash Message
        session()->flash('success', 'Promo Berhasil di Hapus!');
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
