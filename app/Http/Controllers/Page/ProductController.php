<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Model\Product;

class ProductController extends Controller
{
    public function detail($id)
    {
        $id = is_numeric($id) ? $id : 0;
        $data = [];
        $data['info'] = Product::find($id);
        $cat_id = $data['info']['category_id'];
        if ($data['info']['status'] > 0) {
            $data['other1'] = Product::where('category_id', $cat_id)->where('id', '<>', $id)->take(4)->skip(0)->get();
            $data['other2'] = Product::where('category_id', $cat_id)->where('id', '<>', $id)->take(4)->skip(4)->get();
            $data['categories'] = Category::where('status', 1)->get();
            $data['cart'] = \Cart::getContent();
            
            return view('page.product.index', $data);
        } else {
            $data['categories'] = Category::where('status', 1)->get();
            $data['cart'] = \Cart::getContent();
            return view('page.404', $data);
        }
    }
    public function categories($id)
    {
        $id = is_numeric($id) ? $id : 0;
        $data = [];
        $data['listPd'] = Product::where('category_id', $id)->where('status', 1)->paginate(8);
        $data['cart'] = \Cart::getContent();
        $data['categories'] = Category::where('status', 1)->get();
        
        return view('page.product.category', $data);
    }
}
