@extends('layouts.front')

@section('content')

<div class="container">
        <br/>
        <br/>
        <div class="form-group">
            <a class="btn btn-primary" href="{{ route('vacancies') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
        <div class="title-wrapper mb-5"> 
        </div>
        <div class="row">
        <div class="col-12 col-md-4 image-block">
                      
                   <p>
                   Rate: {{ $vacancy->rate}} <br/>
                   Level: {{ $vacancy->level}} <br/>
                   Deadline Date: {{ $vacancy->duedate}} <br/>
                   </p>
                    @if($vacancy->file)
                                <a href="{{ $vacancy->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                    @else
                    <p>NO FILE! </P>
                    @endif 
            </div>
            <div class="col-12 col-md-8">
                <div class="text-wrapper">
                    <h3 class="mbr-section-subtitle mbr-fonts-style mb-3 display-5">
                        <strong>{{$vacancy->title}}</strong></h3>
                    <p class="mbr-text mbr-fonts-style display-7">
                        {!! $vacancy->description !!}
                </div>
            </div>
         
        </div>

        <div class="form-group">
            <a class="btn btn-primary" href="{{ route('vacancies') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>


@endsection