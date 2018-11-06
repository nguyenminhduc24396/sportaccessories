<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Model\Product;
use App\Http\Requests\StoreProductPost;
use App\Http\Requests\UpdateProductPost;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $keyword = $request->keyword;
        $data['key'] = ucfirst($keyword);
        $data['listPd'] = Product::orderBy('created_at', 'DESC')->where('namepd', 'LIKE', "%{$keyword}%")->orWhere('price', 'LIKE', "%{$keyword}%")->paginate(5);

        return view('admin.product.index',$data);
    }
    public function add()
    {
        $data = [];
        $data['categories'] = Category::all();

        return view('admin.product.add', $data);
    }
    public function handleadd(StoreProductPost $request)
    {
        $namePd = $request->namepd;
        $cat = $request->category_id;
        $price = $request->price;
        $sale = $request->sale;
        $qty = $request->qty;
        $description = $request->description;
        $checkUpload = false;
        $namefile = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $namefile = $file->getClientOriginalName();
            if ($file->getError() == 0) {
                if ($file->move("uploads/images", $namefile)) {
                    $checkUpload = true;
                }
            }
        }
        if (!$checkUpload && $namefile == '') {
            $request->session()->flash('errUpload', 'Vui lòng chọn File upload');

            return redirect()->route('admin.addproduct', ['state'=>'fail']);
        } else {
            $dataInsert = [
                'category_id' => $cat,
                'namepd' => $namePd,
                'image' => $namefile,
                'price' => $price,
                'sale' => $sale,
                'status' => 1,
                'qty' => $qty,
                'description' => $description,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ];
        }
        if (DB::table('products')->insert($dataInsert)) {
            return redirect()->route('admin.product');
        } else {
            return redirect()->route('admin.product.add', ['state'=>'err']);
        }
    }
    public function edit($id, Request $request)
    {
        $id = is_numeric($id) ? $id : 0;
        $infoPd = Product::find($id);
        if (isset($infoPd->id)) {
            $data = [];
            $data['categories'] = Category::all();
            $data['info'] = $infoPd;

            return view('admin.product.edit', $data);
        } else {
            // điều hướng về các trang Not found page
        }
    }
    public function handleedit(UpdateProductPost $request, $id)
    {
        $id = is_numeric($id) ? $id : 0;
        $infoPd = Product::find($id);
        $nameImage = $infoPd->image;
        $namePd = $request->namepd;
        $cat = $request->category_id;
        $price = $request->price;
        $sale = $request->sale;
        $qty = $request->qty;
        $status = $request->status;
        $description = $request->description;
        $checkUpload = false;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nameImage = $file->getClientOriginalName();
            if ($file->getError() == 0) {
                if ($file->move("uploads/images", $nameImage)) {
                    $checkUpload = true;
                }
            }
        }
        if (!$checkUpload && $nameImage == '') {
            $request->session()->flash('errUpload', 'Vui lòng chọn File upload');
            
            return redirect()->route('admin.product.detail', ['state'=>'fail2']);
        } else {
            $dataUpdate = [
                'category_id' => $cat,
                'namepd' => $namePd,
                'image' => $nameImage,
                'price' => $price,
                'sale' => $sale,
                'status' => $status,
                'qty' => $qty,
                'description' => $description,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        if (isset($infoPd->id)&& $infoPd->id>0) {
            if (DB::table('products')->where('id', $id)->update($dataUpdate)) {
                return redirect()->route('admin.product');
            } else {
                return redirect()->route('admin.product.detail', ['state'=>'err']);
            }
        }
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if ($id <= 0) {
            echo "ERR";
        } else {
            if (Product::where('id', $id)->delete()) {
                echo "OK";
            } else {
                echo "FAIL";
            }
        }
    }
}
