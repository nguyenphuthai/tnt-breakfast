<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    public function index(){
        $waiting = new \ArrayObject();
        $shipping = new \ArrayObject();
        $done = new \ArrayObject();
        $cancel = new \ArrayObject();
        $orders = Order::where("customers_id","=",backpack_user()->id)->orderBy("created_at","DESC")->get();
        foreach ($orders as $order){
            switch ($order->status){
                case 0:
                    $waiting->append($order);
                    break;
                case 1:
                    $shipping->append($order);
                    break;
                case 2:
                    $done->append($order);
                    break;
                case 3:
                    $cancel->append($order);
                    break;
                default:
            }
        }
//        return $waiting;
//        return $orders->items()->get();
        return view("history",["waiting"=>$waiting,"shipping"=>$shipping,"done"=>$done,"cancel"=>$cancel]);
    }
}
