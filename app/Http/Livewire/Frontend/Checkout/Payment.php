<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\RekeningCustomer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Payment extends Component
{

    use WithFileUploads;

    public $rekening, $customer_id, $selectedRekening, $provider, $rekening_name, $rekening_number, $payment_proof,$order_uid;

    // Validation rules
    protected $rules = [
        'selectedRekening' => 'required',
        'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'provider' => 'required',
        'rekening_name' => 'required',
        'rekening_number' => 'required|numeric',
    ];

    // Validation error messages
    protected $messages = [
        'selectedRekening.required' => 'Silahkan pilih rekening',
        'payment_proof.required' => 'Silahkan upload bukti pembayaran',
        'payment_proof.image' => 'Bukti pembayaran harus berupa gambar',
        'payment_proof.mimes' => 'Bukti pembayaran harus berformat: jpg, jpeg, png',
        'payment_proof.max' => 'Bukti pembayaran tidak boleh lebih dari 2MB',
        'provider.required' => 'Silahkan pilih metode pembayaran',
        'rekening_name.required' => 'Silahkan masukkan nama rekening',
        'rekening_number.required' => 'Silahkan masukkan nomor rekening',
        'rekening_number.numeric' => 'Nomor rekening harus berupa angka',
    ];


    /**
     * Handle updated property.
     * @param string $property
     */
    public function updated($property)
    {
        // Validate only the updated property
        $this->validateOnly($property);
    }

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->rekening = RekeningCustomer::where('customer_id', $this->customer_id)->get();
    }

    /**
     * Renders the Livewire component view associated with this component.
     * @return View The view of this component.
     */
    public function render()
    {
        return view('livewire.frontend.checkout.payment');
    }

    /**
     * Store a new payment.
     * @return void
     */
    public function storePayment()
    {
        try {
            // Perform validation
            $this->performValidation();

            // Handle payment proof upload
            $fileName = $this->handlePaymentProofUpload();

            // Determine whether the customer has an account or not
            $isAccountExist = count($this->rekening) > 0;

            // Perform order update
            $this->performOrderUpdate($isAccountExist, $fileName);

            // Reset form fields
            $this->resetFields();

            // Set flash message
            session()->flash('success', 'Pembayaran Berhasil!');
        } catch (\Exception $e) {
            // Handle the exception
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        } finally {
            // Close the payment modal, whether the process was successful or not
            $this->closePaymentModal();
        }
    }


    /**
     * Performs validation.
     */
    private function performValidation()
    {
        $this->validateOnly('payment_proof');

        if (count($this->rekening) > 0) {
            $this->validateOnly('selectedRekening');
        } else {
            $this->validateOnly('provider');
            $this->validateOnly('rekening_name');
            $this->validateOnly('rekening_number');
        }
    }

    /**
     * Handle payment proof upload.
     *
     * @return string $fileName
     */
    private function handlePaymentProofUpload()
    {
        $fileName = 'assets/images/payment_proof/' . "bukti_pembayaran_" . str()->random(10) . '.' . $this->payment_proof->getClientOriginalExtension();
        $this->payment_proof->storeAs('public', $fileName);

        return $fileName;
    }

    /**
     * Perform order update.
     * @param bool $isAccountExist
     * @param string $fileName
     */
    private function performOrderUpdate($isAccountExist, $fileName)
    {
        // Get the order
        $order = Order::where('order_uid', $this->order_uid)->first();

        if ($isAccountExist) {
            $rekening = RekeningCustomer::where('id', $this->selectedRekening)->first();
        } else {
            $rekening = RekeningCustomer::firstOrCreate(
                [
                    'customer_id' => $this->customer_id,
                    'provider' => $this->provider,
                    'rekening_name' => $this->rekening_name,
                    'rekening_number' => $this->rekening_number,
                ]
            );
        }
        $order->update([
            'provider' => $rekening->provider,
            'rekening_name' => $rekening->rekening_name,
            'payment_date' => date('Y-m-d H:i:s'),
            'rekening_number' => $rekening->rekening_number,
            'payment_proof' => $fileName,
            'order_status' => OrderStatus::PAYMENT_VERIFICATION,
        ]);
        // Emit paymentUpdated event
        $this->emit('paymentUpdated', $order);
    }



    /**
     * Closes the payment modal by dispatching a browser event.
     * @return void
     */
    public function closePaymentModal()
    {
        // Dispatch a browser event to close the modal
        $this->dispatchBrowserEvent('close-modal');
    }

    /**
     * Resets the Fields.
     * @return void
     */
    public function resetFields()
    {
        $this->selectedRekening = null;
        $this->provider = null;
        $this->rekening_name = null;
        $this->rekening_number = null;
        $this->payment_proof = null;
    }
}
