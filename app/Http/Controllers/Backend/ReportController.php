<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Order;
use App\Model\OrderDetail;

class ReportController extends Controller
{
    public function index()
    {
        $data['date'] = DB::table('orders')->select(DB::raw('COUNT(id) as count'), DB::raw('DATE(updated_at) as date'), DB::raw('SUM(total_price) as sale'))->where('order_status_id', 3)->groupBy(DB::raw('DATE(updated_at)'))->get();
        $data['month'] = DB::table('orders')->select(DB::raw('COUNT(id) as count'), DB::raw("(DATE_FORMAT(updated_at, '%m-%Y')) as month"), DB::raw('SUM(total_price) as sale'))->groupBy(DB::raw("DATE_FORMAT(updated_at, '%m-%Y')"))->get();

        return view('admin.report.index', $data);
    }
}
