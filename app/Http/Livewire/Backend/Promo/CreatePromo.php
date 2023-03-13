<?php

namespace App\Http\Livewire\Backend\Promo;

use App\Models\Promo;
use Livewire\Component;

class CreatePromo extends Component
{
    public $promo_name, $promo_code, $promo_description,
            $discount_type, $discount_value, $start_date, $end_date;

    public $createModal = false;
    protected $listeners = [
        'createdPromo' => '$refresh',
    ];
    protected $rules = [
        'promo_name'            => 'required',
        'promo_code'            => 'required|unique:promo',
        'promo_description'     => 'nullable',
        'discount_type'         => 'required',
        'discount_value'        => 'required',
        'start_date'            => 'required',
        'end_date'              => 'required',
    ];
    protected $messages = [
        'promo_name.required'       => 'Nama Promo harus diisi!',
        'promo_code.required'       => 'Kode harus diisi!',
        'promo_code.unique'         => 'Kode telah digunakan!',
        'discount_type.required'    => 'Tipe Diskon harus diisi!',
        'discount_value.required'   => 'Nilai Diskon harus diisi!',
        'start_date.required'       => 'Tanggal Mulai harus diisi!',
        'end_date.required'         => 'Tanggal Selesai harus diisi!',
    ];

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

    public function render()
    {
        return view('livewire.backend.promo.create-promo');
    }

    /**
     * store
     *
     * @return void
     */
    public function store()
    {

        // Validate Form Request
        $this->validate();

        try {
            // Create Promo
            $promo = Promo::create([
                'promo_name'            => $this->promo_name,
                'promo_code'            => str()->upper($this->promo_code),
                'promo_description'     => $this->promo_description,
                'discount_type'         => $this->discount_type,
                'discount_value'        => $this->discount_value,
                'start_date'            => $this->start_date,
                'end_date'              => $this->end_date
            ]);

            // Set Flash Message
            session()->flash('success', 'Promo Berhasil di Tambahkan!');

            // Reset Form Fields After Creating Promo
            $this->resetFields();
            $this->emit('createdPromo', $promo);
            $this->dispatchBrowserEvent('close-modal');
        } catch (\Exception $e) {
            // Set Flash Message
            session()->flash('error', 'Promo Gagal di Tambahkan!');

            // Reset Form Fields After Creating Promo
            $this->resetFields();
        }
    }

    /**
     * closeModal
     *
     * @return void
     */
    public function closeModal()
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
        $this->promo_name = '';
        $this->promo_code = '';
        $this->promo_description = '';
        $this->discount_type = '';
        $this->discount_value = '';
        $this->start_date = '';
        $this->end_date = '';
    }
}
