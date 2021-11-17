<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $items = Item::where("user_id", "=", backpack_user()->id)->get();
        return view("cart", ["items" => $items]);
    }

    public function changeQuantity($id, $quantity)
    {
        Item::find($id)->update(["quantity" => $quantity]);
    }

    public function pushToCart($id)
    {
        $totalItem = Item::where("user_id", "=", backpack_user()->id)->where("order_id", "=", null)->get();
        foreach ($totalItem as $miniItem) {
            if ($miniItem->product_id == $id) {
                Item::find($miniItem->id)->update(["quantity" => $miniItem->quantity + 1]);
                return redirect("/cart");
            }
        }
        $item = [
            "product_id" => $id,
            "user_id" => backpack_user()->id,
            "quantity" => 1,
        ];
        Item::create($item);
        return redirect("/cart");
    }
}
