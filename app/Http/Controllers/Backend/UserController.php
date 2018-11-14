<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPost;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $keyword = $request->keyword;
        $role = $request->role;
        $data['key'] = ucfirst($keyword);
        $queryByName = [
            ['role', '<>', -1],
            ['name', 'LIKE', "%{$keyword}%"]
        ];
        $queryByEmail = [
            ['role', '<>', -1],
            ['email', 'LIKE', "%{$keyword}%"]
        ];
        if (isset($role) && $role != -1) {
            $queryByName[] = ['role', $role];
            $queryByEmail[] = ['role', $role];
        }
        $data['listAcc'] = User::where($queryByName)->orWhere($queryByEmail)->paginate(7);

        return view('admin.user.index', $data);
    }
    public function add()
    {
        return view('admin.user.add');
    }
    public function handleadd(StoreUserPost $request)
    {
        $data = $request->except('_token', 'password');
        $data['password'] = bcrypt($request->password);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['role'] = 0;
        $result = User::insert($data);
        if ($result) {
            return redirect()->route('admin.user')->with('success', "Thêm tài khoản quản lý thành công");
        } else {
            return redirect()->route('admin.user.edit', ['state'=>'err']);
        }
    }
    public function edit($id, Request $request)
    {
        $id = is_numeric($id) ? $id : 0;
        $infoAcc = User::find($id);
        if (isset($infoAcc->id)) {
            $data = [];
            $data['info'] = $infoAcc;
            
            return view('admin.user.edit', $data);
        } else {
            // điều hướng về các trang Not found page
        }
    }
    public function handleedit($id, UpdateUserPost $request)
    {
        $data = $request->except('_token');
        $id = is_numeric($id) ? $id : 0;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $result = User::find($id)->update($data);
        if ($result) {
            return redirect()->route('admin.user')->with('success', "Cập nhật tài khoản thành công");
        } else {
            return redirect()->route('admin.user.edit', ['state'=>'err']);
        }
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if ($id <= 0) {
            echo "ERR";
        } else {
            if (User::where('id', $id)->delete()) {
                echo "OK";
            } else {
                echo "FAIL";
            }
        }
    }
}
