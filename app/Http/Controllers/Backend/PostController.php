<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data['key'] = $keyword;
        $data['listPd'] = Post::orderBy('created_at', 'DESC')->where('title', 'LIKE', "%{$keyword}%")->orWhere('slug', 'LIKE', "%{$keyword}%")->paginate(5);
        return view('admin.post.index', $data);
    }
    public function add()
    {}
    public function handleadd()
    {}
    public function delete()
    {}
    public function edit()
    {}
    public function handleedit()
    {}
}
