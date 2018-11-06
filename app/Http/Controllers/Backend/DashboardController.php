<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\Contact;
use App\Model\Question;
use App\Http\Requests\UpdateUserPost;

class DashboardController extends Controller
{
    public function index()
    {
        $data['info'] = Auth::user();
        
        return view('admin.dashboard.index', $data);
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
    public function question()
    {
        $data['listQ'] = Question::all();
        return view('admin.question.index', $data);
    }
    public function add(Request $request)
    {
        $data = $request->except('_token');
        $result = Question::create($data);
        return redirect()->route('admin.question');
    }
    public function updateQuestion(Request $request)
    {}
    public function delete(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if ($id <= 0) {
            echo "ERR";
        } else {
            if (Question::where('id', $id)->delete()) {
                echo "OK";
            } else {
                echo "FAIL";
            }
        }
    }
    public function contact(Request $request)
    {
        $keyword = $request->keyword;
        $data['key'] = $keyword;
        $data['contact'] = Contact::where('name', 'LIKE', "%{$keyword}%")->orWhere('email', 'LIKE', "%{$keyword}%")->paginate(10);

        return view('admin.contact.index', $data);
    }
    public function reply(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if ($id <= 0) {
            echo "ERR";
        } else {
            if (Contact::where('id', $id)->update(['updated_at' => date('Y-m-d H:i:s')])) {
                echo "OK";
            } else {
                echo "FAIL";
            }
        }
    }
}
