<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data['key'] = $keyword;
        $data['listPost'] = Post::orderBy('status', 'ASC')->with(['user'])->where('title', 'LIKE', "%{$keyword}%")->orWhere('slug', 'LIKE', "%{$keyword}%")->paginate(5);
        return view('admin.post.index', $data);
    }
    public function add()
    {
        return view('admin.post.add');
    }
    public function handleadd(Request $request)
    {
        $id = Auth::id();
        $title = $request->title;
        $description = $request->description;
        $checkUpload = false;
        $namefile = '';
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $namefile = $file->getClientOriginalName();
            if ($file->getError() == 0) {
                if ($file->move("uploads/images", $namefile)) {
                    $checkUpload = true;
                }
            }
        }
        if (!$checkUpload && $namefile == '') {
            $request->session()->flash('errUpload', 'Vui lòng chọn File upload');

            return redirect()->route('admin.post.add', ['state'=>'fail']);
        } else {
            $dataInsert = [
                'user_id' => $id,
                'title' => $title,
                'description' => $description,
                'thumbnail' => $namefile,
                'slug' => str_slug($title),
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ];
        }
        if (DB::table('posts')->insert($dataInsert)) {
            return redirect()->route('admin.post');
        } else {
            return redirect()->route('admin.post.add', ['state'=>'err']);
        }
    }
    public function detail($id)
    {
        $id = is_numeric($id) ? $id : 0;
        $data['infoPost'] = Post::find($id);
        return view('admin.post.detail', $data);
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if ($id <= 0) {
            echo "ERR";
        } else {
            if (Post::where('id', $id)->delete()) {
                echo "OK";
            } else {
                echo "FAIL";
            }
        }
    }
    public function browse(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if ($id <= 0) {
            echo "ERR";
        } else {
            if (Post::where('id', $id)->update(['status' => 1])) {
                echo "OK";
            } else {
                echo "FAIL";
            }
        }
    }
    public function edit($id, Request $request)
    {
        $id = is_numeric($id) ? $id : 0;
        $infoPost = Post::find($id);
        if (isset($infoPost->id)) {
            $data['info'] = $infoPost;

            return view('admin.post.edit', $data);
        } else {
            // điều hướng về các trang Not found page
        }
    }
    public function handleedit($id, Request $request)
    {
        $id = is_numeric($id) ? $id : 0;
        $infoPost = Post::find($id);
        $nameImage = $infoPost->thumbnail;
        $title = $request->title;
        $description = $request->description;
        $status = $request->status;
        $checkUpload = false;
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $nameImage = $file->getClientOriginalName();
            if ($file->getError() == 0) {
                if ($file->move("uploads/images", $nameImage)) {
                    $checkUpload = true;
                }
            }
        }
        if (!$checkUpload && $nameImage == '') {
            $request->session()->flash('errUpload', 'Vui lòng chọn File upload');

            return redirect()->route('admin.post.edit', ['state'=>'fail']);
        } else {
            $dataUpdate = [
                'user_id' => $id,
                'title' => $title,
                'description' => $description,
                'thumbnail' => $nameImage,
                'slug' => str_slug($title),
                'status' => $status,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        if (isset($infoPost->id) && $infoPost->id > 0) {
            if (DB::table('posts')->where('id', $id)->update($dataUpdate)) {
                return redirect()->route('admin.post');
            } else {
                return redirect()->route('admin.post.detail', ['state'=>'err']);
            }
        }
    }
}
