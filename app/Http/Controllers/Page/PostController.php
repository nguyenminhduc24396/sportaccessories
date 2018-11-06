<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Model\Post;

class PostController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::where('status', 1)->get();
        $data['cart'] = \Cart::getContent();
        $title = DB::table('posts')->select('description')->get();
        foreach ($title as $key => $val) {
            $data['title'][$key] = strip_tags(substr($val->description, 0, 92));
        }
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
