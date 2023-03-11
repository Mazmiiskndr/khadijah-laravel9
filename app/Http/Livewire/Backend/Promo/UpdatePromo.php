<?php

namespace App\Http\Livewire\Backend\Promo;

use App\Models\Promo;
use Carbon\Carbon;
use Livewire\Component;

class UpdatePromo extends Component
{
    public $promo_id, $promo_name, $promo_code, $promo_description,
        $discount_type, $discount_value, $start_date, $end_date;

    public $promo;

    public $updateModal = false;
    protected $listeners = [
        'updatedPromo'  => '$refresh',
        'getPromo'      => 'show'
    ];


    // Rules Validation
    protected function getRules()
    {
        return [
            'promo_name'            => 'required',
            'promo_code'            => 'required|unique:promo,promo_code,' . $this->promo_id . ',promo_id',
            'promo_description'     => 'nullable',
            'discount_type'         => 'required',
            'discount_value'        => 'required',
            'start_date'            => 'required',
            'end_date'              => 'required',
        ];
    }


    // Make Validation message
    protected function getMessages()
    {
        return [
            'promo_name.required'       => 'Nama Promo harus diisi!',
            'promo_code.required'       => 'Kode harus diisi!',
            'promo_code.unique'         => 'Kode telah digunakan!',
            'discount_type.required'    => 'Tipe Diskon harus diisi!',
            'discount_value.required'   => 'Nilai Diskon harus diisi!',
            'start_date.required'       => 'Tanggal Mulai harus diisi!',
            'end_date.required'         => 'Tanggal Selesai harus diisi!',
        ];
    }
    public function render()
    {
        return view('livewire.backend.promo.update-promo');
    }

    /**
     * show
     *
     * @param  mixed $promo
     * @return void
     */
    public function show($promo)
    {
        $this->updateModal          = true;
        $this->promo_id             = $promo['promo_id'];
        $this->promo_name           = $promo['promo_name'];
        $this->promo_code           = $promo['promo_code'];
        $this->promo_description    = $promo['promo_description'];
        $this->discount_type        = $promo['discount_type'];
        $this->discount_value       = $promo['discount_value'];
        $this->start_date = Carbon::parse($promo['start_date'])->format('Y-m-d');
        $this->end_date = Carbon::parse($promo['end_date'])->format('Y-m-d');
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        // buatkan validate dengan message error harus diisi
        // Create Validate
        $this->validate($this->getRules(), $this->getMessages());
        if ($this->promo_id) {
            $promo = Promo::find($this->promo_id);
            $promo->update([
                'promo_name'            => $this->promo_name,
                'promo_code'            => str()->upper($this->promo_code),
                'promo_description'     => $this->promo_description,
                'discount_type'         => $this->discount_type,
                'discount_value'        => $this->discount_value,
                'start_date'            => $this->start_date,
                'end_date'              => $this->end_date
            ]);
            $this->updateModal = false;
            // Set Flash Message
            session()->flash('success', 'Promo Berhasil di Update!');
            $this->resetFields();
            // $this->emit('updatedPromo');
            // buatkan emit dengan flash message
            $this->emit('updatedPromo', $promo);
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    /**
     * closeModal
     *
     * @return void
     */
    public function closeModal()
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
        $this->promo_id = '';
        $this->promo_name = '';
        $this->promo_code = '';
        $this->promo_description = '';
        $this->discount_type = '';
        $this->discount_value = '';
        $this->start_date = '';
        $this->end_date = '';
    }
}
