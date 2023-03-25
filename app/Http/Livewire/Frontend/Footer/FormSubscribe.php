<?php

namespace App\Http\Livewire\Frontend\Footer;

use App\Models\Subscriber;
use Livewire\Component;

class FormSubscribe extends Component
{
    public $email_subscriber;
    protected $rules = [
        'email_subscriber' => 'required|email|unique:subscribers,email_subscriber',
    ];
    protected $messages = [
        'email_subscriber.required'     => 'Email harus diisi!',
        'email_subscriber.email'        => 'Email tidak valid!',
        'email_subscriber.unique'       => 'Email telah digunakan oleh pelanggan lain',
    ];

    protected $listeners = [
        'createdSubscribe' => 'handleStored',
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
        return view('livewire.frontend.footer.form-subscribe');
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
            // Create Subscriber
            $subscriber = Subscriber::create([
                'email_subscriber' => $this->email_subscriber,
            ]);

            // Set Flash Message
            session()->flash('success', 'Terima kasih telah berlangganan!');
            // Reset Form Fields After Creating Category
            $this->resetFields();
            $this->emit('createdSubscribe', $subscriber);
        } catch (\Throwable $th) {
            // Set Flash Message
            session()->flash('error', 'Gagal berlangganan!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
        }
    }

    /**
     * resetFields
     *
     * @return void
     */
    public function resetFields()
    {
        $this->email_subscriber = '';
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

}
