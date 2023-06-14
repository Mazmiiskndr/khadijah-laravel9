<?php

namespace App\Repositories\Cart;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Cart;
use App\Models\Product;

class CartRepositoryImplement extends Eloquent implements CartRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Cart $model)
    {
        $this->model = $model;
    }

    /**
     * getAllDataByCustomer
     * @param  mixed $customer_id
     */
    public function getAllDataByCustomer($customer_id)
    {
        return $this->model->with('product')->where('customer_id', $customer_id)->get();
    }

    /**
     * addProductToCart
     * @param  mixed $uid
     * @param  mixed $customerId
     * @param  mixed $data
     */
    public function addProductToCart($uid, $customerId, $data = [])
    {
        // Get product by uid
        $product = Product::where('product_uid', $uid)->first();

        // Check if product is not empty
        if (!empty($product)) {
            $productId = $product->product_id;
            $quantity = $data['quantity'] ?? 1;
            $color = $data['color'];
            $size = $data['size'];
            // Create new cart
            $cart = Cart::create([
                'product_id' => $productId,
                'customer_id' => $customerId,
                'quantity' => $quantity,
                'color' => $color,
                'size' => $size,
            ]);

            return $cart;
        }
        return null;
    }
}
