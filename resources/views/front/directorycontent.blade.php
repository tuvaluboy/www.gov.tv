@extends('layouts.front')

@section('content')


<section class="header4 cid-sdVgfli5UX" id="header4-2p">
    <div class="mbr-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="content-wrap">
                <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-2">
                    <strong><br></strong><br><strong>{{$directorycontent->title}}</strong>
            </h1>
            </div>
        </div>
    </div>
</section>

<hr>
    <div class="align-left container">
            <div class="content-wrap">
                <div class="col-lg-12">
                    <p class="mbr-text mbr-fonts-style display-text"><a  href="{{route('home')}}" class="text-primary">Home</a> /
                    </p>
                </div>
            </div>
    </div>
<hr>


<section class="features2 cid-s1YPl57Et0" id="features2-3">

<div class="container">
    <div class="row justify-content-center">

        <div class="col-lg-3 col-md-12 md-pb">
        <div class="title-wrapper align-left">

                <h6 class="mbr-section-title mbr-white   pb-3 mbr-fonts-style display-2"> Contact</h6>
                <p class="card-text mbr-regular mbr-black mbr-fonts-style display-7">
                {!!$directorycontent->contact_information !!}
                </p>
        </div>
        </div>
        <div class="col-lg-9 col-md-12 md-pb">
        @if($directorycontent->ministry)
        <h5><a href="{{route('directory.showministry', [$directorycontent->ministry->id ])}}"> {{$directorycontent->ministry->title}} </a>
             </h4>
             @endif
            <div class="title-wrapper align-left">
                <div class="line"></div>
                <h3 class="mbr-section-title mbr-white mbr-semibold pb-3 mbr-fonts-style display-2">  {{$directorycontent->title}}</h3>

            </div>
            <div class="row">
                <div class="card p-3 col-12 col-md-6 col-lg-12">
                    <div class="card-wrapper">
                        <div class="card-box">

                            <p class="card-text mbr-regular mbr-black mbr-fonts-style display-7">
                            {!!$directorycontent->detailinformation!!}
                                <br>


                        </div>
                       
                    </div>
                </div>
            </div>
            @foreach($directorycontent->files as $file)
            <a href="{{ $file->getUrl() }}" target="_blank"><span class="mbr-iconfont mobi-mbri-file mobi-mbri" style="color: rgb(0, 119, 255); fill: rgb(0, 119, 255);"></span>{{$file->name }}</a> <br>
            @endforeach
        </div>
    </div>
</div>
</section>


@endsection
