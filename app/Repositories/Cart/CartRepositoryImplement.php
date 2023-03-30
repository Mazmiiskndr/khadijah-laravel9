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
     * Add product to cart.
     * @param string $uid
     * @param int $customerId
     */
    public function addProductToCart($uid, $customerId)
    {
        // Get product by uid
        $product = Product::where('product_uid', $uid)->first();

        // Check if product is not empty
        if (!empty($product)) {
            $productId = $product->product_id;
            $quantity = 1;

            // Check if product already exists in customer's cart
            $existingCart = Cart::where('product_id', $productId)
                ->where('customer_id', $customerId)
                ->first();

            if (!empty($existingCart)) {
                // Update cart quantity
                $existingCart->quantity += 1;
                $existingCart->save();
                return $existingCart;
            } else {
                // Create new cart
                $cart = Cart::create([
                    'product_id' => $productId,
                    'customer_id' => $customerId,
                    'quantity' => $quantity,
                ]);

                return $cart;
            }
        }
        return null;
    }

}
