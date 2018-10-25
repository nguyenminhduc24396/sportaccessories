<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Model\Product;
use App\Model\Contact;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $data['new'] = Product::orderBy('created_at', 'DESC')->where('status', 1)->where('qty', '>', 0)->where('sale', null)->limit(8)->get();
        $data['sale'] = Product::where('sale', '<>', 0)->where('status', 1)->where('qty', '>', 0)->get();
        $data['best'] = Product::orderBy('count', 'DESC')->where('status', 1)->where('qty', '>', 0)->where('count', '>', 0)->limit(8)->get();
        $data['cart'] = \Cart::getContent();
        $data['categories'] = Category::where('status', 1)->get();

        return view('page.home.index', $data);
    }
    public function contact()
    {
        $data['cart'] = \Cart::getContent();
        $data['categories'] = Category::where('status', 1)->get();

        return view('page.home.contact', $data);
    }
    public function handleContact(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = date('Y-m-d H:i:s');
        $result = Contact::insert($data);
        if ($result) {
            return redirect()->route('home');
        } else {
            return redirect()->route('contact', ['state'=>'err']);
        }
    }
    public function question()
    {
        $data['cart'] = \Cart::getContent();
        $data['categories'] = Category::where('status', 1)->get();
        
        return view('page.home.question', $data);
    }
}
