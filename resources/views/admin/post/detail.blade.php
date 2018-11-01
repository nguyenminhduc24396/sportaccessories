@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">{{ $infoPost->title }}</h3>
    </div>
    <div class="col-lg-12 mt-3">
        <div class="row">
            <div class="col-lg-12">
                {!! $infoPost->description !!}
            </div>
        </div>
    </div>
</div>
@endsection
