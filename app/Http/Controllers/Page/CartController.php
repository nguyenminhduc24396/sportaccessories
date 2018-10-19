<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Category;
use App\Model\Product;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Shipping;
use App\User;
use Darryldecode\Cart\CartCondition;

class CartController extends Controller
{
    public function index()
    {
        $data = [];
        $data['cart'] = \Cart::getContent();
        $data['categories'] = Category::where('status', 1)->get();
        return view('page.cart.index',$data);
    }
    public function add($id, Request $request){
        $id = is_numeric($id) ? $id : 0;
        $infoPd = Product::find($id);
        if (isset($infoPd->id) && $infoPd->id > 0) {
            $dataAdd = [
                'id' => $id, 
                'name' => $infoPd->namepd,
                'price' => ($infoPd->sale != null) ? $infoPd->sale : $infoPd->price,
                'quantity' => 1,
                'attributes' => [
                    'image' => $infoPd->image,
                ]
            ];
            if (\Cart::add($dataAdd)) {
                return redirect()->route('cart');
            } else {
                return redirect()->route('cart',['state'=>'fail']);
            }
        } else {
            return view('page.404');
        }
    }
    public function update(Request $request)
    {
        \Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity,
            ),
        ));
    }
    public function remove($id){
        \Cart::remove($id);
        return redirect()->route('cart');
    }
    public function checkout()
    {
        if (Auth::check()) {
            $data['info'] = Auth::user();
        $data['cart'] = \Cart::getContent();
        $data['shipping'] = Shipping::all();
        $data['categories'] = Category::where('status', 1)->get();
        return view('page.checkout.index', $data);
        }
        return redirect('/login');
    }
    public function handleCheckout(Request $request)
    {
        $data1 = $request->except('_token');
        $data1['user_id'] = Auth::id();
        $data1['updated_at'] = null;
        $data1['ship_date'] = null;
        $order = Order::create($data1);
        $data2 = \Cart::getContent();
        $flag = true;
        foreach ($data2 as $key => $val) {
            $product = Product::find($val->id);
            $orderdetail = OrderDetail::insert([
                'order_id' => $order->id,
                'product_id' => $val->id,
                'price' => $val->price,
                'qty' => $val->quantity,
            ]);
            if(!$orderdetail) {
                $flag = false;
                break;
            }
            $pd = Product::find($val->id);
            $qty = $pd->qty - $val->quantity;
            $count = $pd->count + $val->quantity;
            Product::find($val->id)->update(['qty' => $qty, 'count' =>$count]);
        }
        if ($flag) {
            \Cart::clear();
            return redirect()->route('home');
        } else {
            return redirect()->route('cart',['state'=>'error']);
        }
    }
}
