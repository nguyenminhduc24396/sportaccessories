<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Model\Product;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $data['new'] = Product::orderBy('created_at', 'DESC')->where('status', 1)->where('sale', null)->limit(8)->get();
        $data['sale'] = Product::where('sale', '<>', 0)->where('status', 1)->get();
        $data['best'] = Product::orderBy('count', 'DESC')->where('status', 1)->where('count', '>', 0)->limit(8)->get();
        $data['cart'] = \Cart::getContent();
        $data['categories'] = Category::where('status', 1)->get();
        return view('page.home.index', $data);
    }
}
