<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\UpdateUserPost;

class DashboardController extends Controller
{
    public function index()
    {
        $data['info'] = Auth::user();
        
        return view('admin.dashboard.index',$data);
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
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.dashboard.edit', ['state'=>'err']);
        }
    }
}
