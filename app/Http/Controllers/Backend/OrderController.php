<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Order;
use App\Model\OrderDetail;
use App\User;
use App\Model\PaymentMethod;
use App\Model\OrderStatus;
use App\Model\Shipping;
use App\Model\Product;
use App\Http\Requests\UpdateOrderPost;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data['key'] = $keyword;
        $data['listOd'] = Order::orderBy('created_at', 'DESC')->with(['shipping', 'payment_method', 'order_status'])->where('name','LIKE', "%{$keyword}%")->paginate(10);

        return view('admin.order.index',$data);
    }
    public function edit($id, Request $request)
    {
        $id = is_numeric($id) ? $id : 0;
        $infoOd = Order::find($id);
        if (isset($infoOd->id)) {
            $data['shipping'] = Shipping::all();
            $data['payment'] = PaymentMethod::all();
            $data['orderStatus'] = OrderStatus::all();
            $data['info'] = $infoOd;

            return view('admin.order.edit', $data);
        } else {
            // điều hướng về các trang Not found page
        }
    }
    public function handleedit($id, UpdateOrderPost $request)
    {
        $data = $request->except('_token', 'username');
        $id = is_numeric($id) ? $id : 0;
        if($request->order_status_id == 3) {
            $data['ship_date'] = date('Y-m-d H:i:s');
        }
        $data['updated_at'] = date('Y-m-d H:i:s');
        $result = Order::find($id)->update($data);
        if ($result) {
            return redirect()->route('admin.order');
        } else {
            return redirect()->route('admin.order.edit', ['state'=>'err']);
        }
    }
    public function detail($id)
    {
        $id = is_numeric($id) ? $id : 0;
        $data['infoOd'] = OrderDetail::with('order')->where('order_id', $id)->get();
        
        return view('admin.order.detail', $data);
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if ($id <= 0) {
            echo "ERR";
        } else {
            if (Order::where('id', $id)->delete()) {
                echo "OK";
            } else {
                echo "FAIL";
            }
        }
    }
    public function ship(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if ($id <= 0) {
            echo "ERR";
        } else {
            if (Order::where('id', $id)->update(['order_status_id' => 2])) {
                echo "OK";
            } else {
                echo "FAIL";
            }
        }
    }
    public function done(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if ($id <= 0) {
            echo "ERR";
        } else {
            if (Order::where('id', $id)->update(['order_status_id' => 3, 'ship_date' => date('Y-m-d H:i:s')])) {
                echo "OK";
            } else {
                echo "FAIL";
            }
        }
    }
}
