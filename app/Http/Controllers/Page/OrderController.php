<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\CartCondition;
use App\Model\Category;
use App\Model\Order;
use App\Model\OrderDetail;
use App\User;
use App\Model\PaymentMethod;
use App\Model\OrderStatus;
use App\Model\Shipping;
use App\Model\Product;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $id = Auth::id();
        $id = is_numeric($id) ? $id : 0;
        $data['listOd'] = Order::with(['shipping', 'payment_method', 'order_status'])->where('user_id', $id)->paginate(10);
        $data['cart'] = \Cart::getContent();
        $data['categories'] = Category::where('status', 1)->get();

        return view('page.order.index',$data);
    }
    public function remove($id, Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if (Order::where('id', $id)->delete()) {
            return redirect()->back();
        } else {
            echo redirect()->route('order',['state'=>'fail']);
        }
    }
    public function detail($id)
    {
        $id = is_numeric($id) ? $id : 0;
        $data['infoOd'] = OrderDetail::with('product', 'order')->where('order_id', $id)->get();
        $data['cart'] = \Cart::getContent();
        $data['categories'] = Category::where('status', 1)->get();
        
        return view('page.order.detail', $data);
    }
}
