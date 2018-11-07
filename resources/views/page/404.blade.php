@extends('page.layout')

@section('content')
    <div class="main">
        <div class="container">
            <div class="page-not-found">
                <div class="page-not-found-img"><img src="{{ URL::to('/').'/images/404.jpg' }}" alt=""></div>
                <div class="page-content" style="margin-bottom: 30px;">
                    <div class="title-note">
                        <h1>@lang('layout.404')</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
