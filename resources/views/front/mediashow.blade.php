@extends('layouts.front')

@section('content')


{{-- <section class="header4 cid-sdVgfli5UX" id="header4-2p">
    <div class="mbr-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="content-wrap">
                <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-2">
                    <strong><br></strong><br><strong>{{$titlename}}</strong>
            </h1>
            </div>
        </div>
    </div>
</section> --}}
@include('partials.slidemenu')
<hr>
    <div class="align-left container">
            <div class="content-wrap">
                <div class="col-lg-12">
                    <p class="mbr-text mbr-fonts-style display-text"><a  href="{{route('home')}}" class="text-primary">Home</a>   &gt; <a href="{{route('media.list',$category->id)}}"> {{$category->title}} </a> &gt;  {{$titlename}}</p>
                </div>
            </div>
    </div>
<hr>

{{-- <section class="content16 cid-s9QBKWYm2c" id="content16-7o">
    <div class="container">

        <div class="row justify-content-left">


                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card-wrapper media-container-row media-container-row">
                        <div class="card-box">
                            <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            {{$category->title}}

                            </h4>
                            <p class="mbr-text mbr-fonts-style display-text">
                                @foreach($items as $item)
                                @if($item->id == $selecteditem->id)
                                      {{$selecteditem->title}}<br>
                                @else

                                <a href="{{route('media.show', $item->id)}}"> {{$item->title}} </a><br>
                                @endif

                                @endforeach

                                {{$items->links()}}
                                <hr>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 col-lg-9">
                    <div class="card-wrapper media-container-row">
                        <div class="card-box">
                            <br/>
                            <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            <a>{{$selecteditem->title}}</a></h4>
                            <p class="mbr-text mbr-fonts-style display-7">

                            {!!$selecteditem->description!!}
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</section> --}}

<section class="features2 cid-s1YPl57Et0" id="features2-3">

        <div class="container">
            <div class="row justify-content-center">
        
                <div class="col-lg-3 col-md-12 md-pb">
                <div class="title-wrapper align-left">
        
                        <h6 class="mbr-section-title mbr-white   pb-3 mbr-fonts-style display-2">  {{$category->title}}</h6>
                        <p class="card-text mbr-regular mbr-black mbr-fonts-style display-7">
                                @foreach($items as $item)
                                @if($item->id == $selecteditem->id)
                                      {{$selecteditem->title}}<br>
                                @else

                                <a href="{{route('media.show', $item->id)}}"> {{$item->title}} </a><br>
                                @endif

                                @endforeach
                        </p>
                        {{$items->links()}} <hr>
                </div>
                </div>
                <div class="col-lg-9 col-md-12 md-pb">
              
                    <div class="title-wrapper align-left">
                        <div class="line"></div>
                        <h3 class="mbr-section-title mbr-white mbr-semibold pb-3 mbr-fonts-style display-2">  {{$selecteditem->title}}</h3>
        
                    </div>
                    <div class="row">
                        <div class="card p-3 col-12 col-md-6 col-lg-12">
                              
                                       
                            <div class="card-wrapper">

                                <div class="card-box">
        
                                    <p class="card-text mbr-regular mbr-black mbr-fonts-style display-7">
                                            {!!$selecteditem->description!!}
                                        <br>
                                        
                               
                                        
                                </div>
                                <br>
                          
                        
                            </div>
                             
                            @foreach($selecteditem->file as $file)
                            <a href="{{ $file->getUrl() }}" target="_blank"><span class="mbr-iconfont mobi-mbri-file mobi-mbri" style="color: rgb(0, 119, 255); fill: rgb(0, 119, 255);"></span>{{ $file->name }}</a> 
                            @endforeach

                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
@endsection
