<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\CartCondition;
use App\Model\Category;
use App\User;
use App\Http\Requests\UpdateUserPost;

class UserController extends Controller
{
    public function index()
    {
        $data['cart'] = \Cart::getContent();
        $data['categories'] = Category::where('status', 1)->get();

        return view('page.info.index', $data);
    }
    public function update(UpdateUserPost $request)
    {
        $id = Auth::id();
        $id = is_numeric($id) ? $id : 0;
        $data = $request->except('_token', 'password');
        if($request->password != null) {
            $data['password'] = bcrypt($request->password);
        }
        $data['updated_at'] = date('Y-m-d H:i:s');
        $result = User::find($id)->update($data);
        if ($result) {
            return redirect()->back()->with('success', 'Cập nhật thông tin thành công');
        } else {
            return redirect()->route('info', ['state'=>'error']);
        }
    }
}
