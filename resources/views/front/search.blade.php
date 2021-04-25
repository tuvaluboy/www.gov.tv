@extends('layouts.front')

@section('content')

@include('partials.slidemenu')

<hr>
    <div class="align-left container">
            <div class="content-wrap">
                <div class="col-lg-12">
                    <p class="mbr-text mbr-fonts-style display-text"><a  href="{{route('home')}}" class="text-primary">Home</a> &gt;Search </p>
                </div>
            </div>
    </div>
<hr>
<br>
@include('partials.search')
{{--  
<section class="content16 cid-s9RPxwphdz" id="content16-1n">
<div class="container">
    <div class="container wrap">
        @foreach($services as $service )
        <div class="row justify-content-center">
            <div class="card-box">
            <u> <h3> <a href="{{route('services.show', $service->id)}}">{{$service->title}} </a> </h3></u>
            <p> {!!$service->description!!}
            <span>
                @foreach($service->tags as $tag)
                    {{$tag->name}}
                @endforeach
            </span>
            </p>

            </div>
        </div>
        @endforeach
        <br>
        @foreach($directories as $directory )
        <div class="row justify-content-center">
            <div class="card-box">
            <u> <h3> <a href="{{route('directory.show', [$directory->id,1])}}">{{$directory->title}} </a> </h3></u>

            <p> {!!$directory->description!!}</p>


            </div>
        </div>
        @endforeach
        <br>
        @foreach($mediaitems as $mediaitem )
        <div class="row justify-content-center">
            <div class="card-box">
            <u> <h3> <a href="{{route('media.show', $mediaitem->id)}}">{{$mediaitem->title}} </a> </h3></u>
            <p> {!!$mediaitem->summary!!}</p>

            </div>
        </div>
        @endforeach
    </div>
</div>
</section> --}}
 
<section class="features2 cid-s1YPl57Et0" id="features2-3">



    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-3 col-md-12 md-pb">
            <div class="title-wrapper align-left">

                    <h6 class="mbr-section-title mbr-white   pb-3 mbr-fonts-style display-2"> Result</h6>
                    <p class="mbr-text pb-3 mbr-white mbr-regular mbr-fonts-style display-7"> {{$countresult}} </p>
                       
                  
        </div>
            </div>
            <div class="col-lg-9 col-md-12 md-pb">
                <div class="title-wrapper align-left">
                    <div class="line"></div>
                    <h3 class="mbr-section-title mbr-white mbr-semibold pb-3 mbr-fonts-style display-2">  </h3>

                </div>
                <div class="row">
                    <div class="card p-3 col-12 col-md-6 col-lg-12">
                        <div class="card-wrapper">
                            <div class="card-box">
                                <p class="card-text mbr-regular mbr-black mbr-fonts-style display-7">
                                    @foreach($services as $service )
                                    <u> <h3> <a href="{{route('services.show', $service->id)}}">{{$service->title}} </a> </h3></u>
                                    {!!$service->description!!}
                                    @endforeach
                                </p>
                                <p class="card-text mbr-regular mbr-black mbr-fonts-style display-7">
                                    @foreach($directories as $directory )
                                    <u> <h3> <a href="{{route('directory.show', [$directory->id,1])}}">{{$directory->title}} </a> </h3></u>
                                    {!!$directory->description!!}
                                    @endforeach
                                </p>
                                <p class="card-text mbr-regular mbr-black mbr-fonts-style display-7">
                                    @foreach($mediaitems as $mediaitem )
                                    <u> <h3> <a href="{{route('media.show', $mediaitem->id)}}">{{$mediaitem->title}} </a> </h3></u>
                                    {!!$mediaitem->summary!!}
                                    @endforeach
                                </p>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<br>
<br>
<br>
<br>
<br>
<br>
@endsection
