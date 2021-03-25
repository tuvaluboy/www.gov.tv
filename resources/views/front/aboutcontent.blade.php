@extends('layouts.front')


@section('content')
<section class="engine"><a href="https://mobirise.info/z">best free css templates</a></section><section class="header3 cid-s9RYHp58EZ" id="header3-3f">



    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(35, 35, 35);"></div>

    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong><br></strong><br><strong>About Tuvalu</strong></h1>


            </div>
        </div>
    </div>
</section>
<hr>
        <div class="align-left container">
            <div class="col-lg-10">
                <p class="mbr-text mbr-fonts-style display-text"><a  href="{{route('home')}}" class="text-primary">Home</a> &gt;<a href="{{route('about')}}"> {{$titlename}} &gt; {{$content->title}} </a></p>
            </div>
        </div>

<hr>
<section class="tabs1 cid-s9S00yxLn7" id="tabs1-3g">




<div class="container">

<div class="row justify-content-left">




        <div class="col-12 col-lg-4 col-lg-12">
            <div class="card-wrapper media-container-row">
                <div class="card-box">
                    <br/>

                    <h5 class="card-title pb-3 mbr-fonts-style display-5">
                     {{$content->title}}</h5>
                    <p class="mbr-text mbr-fonts-style display-menu">
                    {!!$content->content!!}
                        <br>
                        <br>
                    </p>

                </div>
            </div>
        </div>

</div>
</div>
</section>

@endsection
