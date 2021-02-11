@extends('layouts.front')

@section('content')
<div class="container">
        
        
        <div class="form-group">
            <a class="btn btn-primary" href="{{ route('announcement') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
        <div class="title-wrapper mb-5">
        </div>
        <div class="row">

            <div class="col-12 col-md-12">
                <div class="text-wrapper">
                    <h3 class="mbr-section-subtitle mbr-fonts-style mb-3 display-5">
                        <strong>{{$announcement->title}}</strong></h3>
                    <p class="mbr-text mbr-fonts-style display-7">
                        {!! $announcement->description !!}
                </div>
            </div>

        </div>

        <div class="form-group">
            <a class="btn btn-primary" href="{{ route('announcement') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>

@endsection
