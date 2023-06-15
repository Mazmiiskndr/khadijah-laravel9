<?php

namespace App\Repositories\Checkout;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Order;
use App\Models\ShippingDetail;
use App\Models\OrderDetail;
use App\Services\Cart\CartService;
use Illuminate\Support\Facades\Auth;
use Exception;

class CheckoutRepositoryImplement extends Eloquent implements CheckoutRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;
    protected $cartService;
    protected $shippingDetail;
    protected $orderDetail;

    public function __construct(Order $model, CartService $cartService, ShippingDetail $shippingDetail, OrderDetail $orderDetail)
    {
        $this->model = $model;
        $this->cartService = $cartService;
        $this->shippingDetail = $shippingDetail;
        $this->orderDetail = $orderDetail;
    }

    /**
     * Store the order and its details.
     * @param  mixed $data
     * @return void
     */
    public function storeCheckout($data)
    {
        try {
            $order = $this->createOrder($data);
            $this->createShippingDetail($order, $data);
            $cartData = $this->getCustomerCartData();

            foreach ($cartData as $cart) {
                $this->createOrderDetail($order, $cart);
                // After creating the OrderDetail, remove the item from the cart
                $this->removeFromCart($cart);
            }

            return "success";
        } catch (Exception $e) {
            // You might want to return or display the error message here
            // For example: return back()->withErrors(['msg', $e->getMessage()]);
        }
    }

    /**
     * Create a new shipping detail instance.
     * @param Order $order The order instance that the shipping detail is associated with.
     * @param $data
     * @return void
     */
    private function createShippingDetail(Order $order, $data)
    {
        $shippingDetail = $this->shippingDetail;
        $shippingDetail->order_id = $order->order_id;
        $shippingDetail->expedition = $data['expedition'];
        $shippingDetail->parcel = $data['parcel'];
        $shippingDetail->delivery_cost = $data['deliveryCost'];
        $shippingDetail->weight = array_sum($data['parcels']); // Assuming $data['parcels'] contains the weight of each parcel TODO:
        $shippingDetail->save();
    }

    /**
     * Remove an item from the cart.
     * @param $cart
     */
    private function removeFromCart($cart)
    {
        $cart->delete();
    }

    /**
     * Fetch customer cart data.
     * @return mixed
     */
    private function getCustomerCartData()
    {
        return $this->cartService->getAllDataByCustomer(Auth::guard('customer')->user()->id);
    }

    /**
     * Create a new order instance.
     *
     * @param array $data The data for creating the order.
     * @return \App\Models\Order
     */
    private function createOrder($data)
    {
        $order = $this->model->create([
            'customer_id' => 1, // You need to set this according to your application TODO:
            'order_date' => now(),
            'order_status' => 'Pending',
            'total_price' => $data['total'],
            'receiver_name' => $data['name'],
            'shipping_address' => $data['address'],
            'shipping_city' => $data['city_id'],
            'shipping_province' => $data['province_id'],
            'shipping_postal_code' => $data['postal_code'],
            'receiver_phone' => $data['phone']
        ]);

        return $order;
    }

    /**
     * Create a new order detail instance.
     * @param Order $order
     * @param $cart
     */
    private function createOrderDetail(Order $order, $cart)
    {
        $orderDetail = new OrderDetail();
        $orderDetail->order_id = $order->order_id;
        $orderDetail->product_id = $cart->product_id;
        $orderDetail->price = $cart->product->price;
        $orderDetail->quantity = $cart->quantity;
        $orderDetail->save();
    }

    // Write something awesome :)
}
