@extends('page.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">@lang('layout.home')</a></li>
                <li class="active">@lang('layout.question')</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="checkout">
                <div class="row">
                    <div class="col-sm-12">
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
                </div>
            </div>
        </div>
    </div>
@endsection
