<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductGroupItem;
use App\Models\UserProductGroup;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addProductInCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
        ]);

        $cart = Cart::create([
            'product_id' => $request->product_id,
            'user_id' => '15',
            'quantity' => '1'
        ]);
        return $cart;
    }

    public function setCartProductQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required'
        ]);

        $cart = Cart::where('product_id',$request->product_id)->update([
            'quantity' => $request->quantity
        ]);
        return $cart;
    }

    public function removeProductFromCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
        ]);

        $cart = Cart::where('product_id', $request->product_id)->first();

        if ($cart) {
            $delete = $cart->delete();
            return true;
        } else {
            return false;
        }

    }


    public function getUserCart()
    {
        //$cart = Cart::select('product_id', 'quantity')->with('product')->get();
        $cart = DB::select('SELECT
                cart.product_id as product_id,
                cart.quantity as quantity,
                products.price as price
            FROM
                `cart`
                LEFT JOIN products
            ON cart.product_id=products.product_id');

        $product_ids = [];
        foreach($cart as $item){
            array_push($product_ids,$item->product_id);
            }

        $discounts = ProductGroupItem::get();

        $nodiscount=false;
        foreach($discounts as $itm){
            dump(in_array($itm->product_id, $product_ids));
            if (in_array($itm->product_id, $product_ids))
            {
                
            }
            else
            {
               $nodiscount=true;
                break;
            }
        }


        if(!$nodiscount){
            $discount_price= 55;
        }else{
            $discount_price=0;
        }
        $products = [
            'products'=>$cart,
            'discount' =>$discount_price
        ];
        return $products;

    }
}
