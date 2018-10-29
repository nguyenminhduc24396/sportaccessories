@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active">Câu hỏi thường gặp</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="checkout">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="checkout-step">
                            @foreach($listQ as $key => $val)
                            <div class="checkout-step-item">
                                <div class="step-title clearfix collapsed" data-toggle="collapse" data-target="#{{ $key }}">
                                    <span class="number">{{ $key+1 }}</span>
                                    <h2>{{ $val->question }}</h2>
                                </div>
                                <div id="{{ $key }}" class="collapse">
                                    <div class="step-content">
                                        {{ $val->answer }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="block block-layered-nav">
                            <div class="block-content">
                                <h2>Checkout progress</h2>
                                <ol class="checkout-progress">
                                    <li><span class="fa fa-play-circle-o"></span> Billing address</li>
                                    <li><span class="fa fa-play-circle-o"></span> Shipping address</li>
                                    <li><span class="fa fa-play-circle-o"></span> shipping method</li>
                                    <li><span class="fa fa-play-circle-o"></span> payment methor</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
