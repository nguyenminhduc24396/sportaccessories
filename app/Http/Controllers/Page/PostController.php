<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\CartCondition;
use App\Model\Category;

class PostController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::where('status', 1)->get();
        $data['cart'] = \Cart::getContent();
        return view('page.post.index', $data);
    }
}
