<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $items = Item::where("user_id","=",backpack_user()->id)->get();
        $totalCost = 0;
        $totalItem = Item::where("user_id","=",backpack_user()->id)->where("order_id","=",null)->get();
        foreach ($totalItem as $miniItem){
            $totalCost += $miniItem->Product()->first()->price*$miniItem->quantity;
        }
        return view("cart",["items"=>$items,"totalCost"=>number_format($totalCost)." đ"]);
    }
    public function changeQuantity($id,$quantity){
        Item::find($id)->update(["quantity"=>$quantity]);
        $totalCost = 0;
        $totalItem = Item::where("user_id","=",backpack_user()->id)->where("order_id","=",null)->get();
        foreach ($totalItem as $miniItem){
            $totalCost += $miniItem->Product()->first()->price*$miniItem->quantity;
        }
        $data = new \stdClass();
        $data->cost = number_format($totalCost)." đ";
        return $data;

    }
    public function pushToCart($id){
        $totalItem = Item::where("user_id","=",backpack_user()->id)->where("order_id","=",null)->get();
        foreach ($totalItem as $miniItem){
            if($miniItem->product_id == $id){
                $quantity = ($miniItem->quantity)+1;
                Item::find($miniItem->id)->update(["quantity"=>$quantity]);
                return redirect("/cart");
            }
        }
        $item = [
            "product_id"=>$id,
            "user_id"=>backpack_user()->id,
            "quantity"=>1,
        ];
        Item::create($item);
        return redirect("/cart");
    }
    public function addOrder(Request $request){
        $order = [
            'customers_id'=>backpack_user()->id,
            'status'=>0,
            'total'=>$request->total,
            'ship_address'=>$request->address,
            "payment_method"=>$request->payment,
        ];
        $newOrder = Order::create($order);
        $totalItem = Item::where("user_id","=",backpack_user()->id)->where("order_id","=",null)->get();
        foreach ($totalItem as $miniItem){
           Item::find($miniItem->id)->update(["order_id"=>$newOrder->id]);
        }
        return redirect("/cart");
    }
    public function destroyItem($id){
        Item::find($id)->delete();
        return redirect("/cart");
    }
}
