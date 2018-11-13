@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">Báo cáo doanh thu</h3>
        </div>
    </div>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary active">
            <input type="radio" name="options" id="1" checked> Ngày
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="options" id="2"> Tháng
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="options" id="3""> Năm
        </label>
    </div>
    <div class="row">
        <div class="col-lg-12 mt-3">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>Ngày</th>
                        <th>Số đơn hàng</th>
                        <th>Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($date as $key => $val)
                    <tr class="text-center">
                        <td>{{ \Carbon\Carbon::parse($val->date)->format('d-m-Y') }}</td>
                        <td>{{ $val->count }}</td>
                        <td>{{ number_format($val->sale) }} VNĐ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
