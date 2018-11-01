<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\CartCondition;
use App\Model\Category;
use App\Model\Post;

class PostController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::where('status', 1)->get();
        $data['cart'] = \Cart::getContent();
        $data['infoPost'] = Post::with('user')->where('status', 1)->get();
        return view('page.post.index', $data);
    }
    public function detail($slug, $id)
    {
        $id = is_numeric($id) ? $id : 0;
        $data['infoPost'] = Post::find($id);
        $data['categories'] = Category::where('status', 1)->get();
        $data['cart'] = \Cart::getContent();
        return view('page.post.detail', $data);
    }
}
