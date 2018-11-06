<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Model\Product;
use App\Http\Requests\StoreCategoryPost;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $keyword = $request->keyword;
        $data['key'] = ucfirst($keyword);
        $data['listCat'] = Category::where('name_cat', 'LIKE', "%{$keyword}%")->paginate(8);
        
        return view('admin.category.index', $data);
    }
    public function add(StoreCategoryPost $request)
    {
        $data = $request->except('_token');
        $result = Category::create($data);
        return redirect()->route('admin.category');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if ($id <= 0) {
            echo "ERR";
        } else {
            $product = Category::where('id', $id)->withCount('products')->first();
            if ($product->products_count > 0) {
                echo "FAIL";
            } else {
                $product->delete();
                echo "OK";
            }
        }
    }
    public function update($id, Request $request)
    {
        $id = is_numeric($id) ? $id : 0;
        $data = $request->except('_token');
        $result = Category::find($id)->update($data);
        if ($result) {
            if($data['status'] == 0){
                Product::where('category_id', $id)->update(['status' => 0]);
            } else {
                Product::where('category_id', $id)->update(['status' => 1]);
            }
            return redirect()->route('admin.category');
        } else {
            return redirect()->route('admin.category', ['state'=>'err']);
        }
    }
}
