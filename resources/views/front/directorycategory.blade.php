@extends('layouts.front')

@section('content')

<section class="header3 cid-s9R1xdT7sx" id="header3-26">



    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(0, 0, 0);">
    <br>
    <br>
    </div>

     <div class="align-left container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12"><br><br>
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong><br></strong><strong>{{$titlename}}</strong></h1><br><br><br><br><br>


            </div>
        </div>
    </div>
</section>
<hr>
        <div class="align-left container">
            <div class="col-lg-10">
                <p class="mbr-text mbr-fonts-style display-text"><a  href="{{route('home')}}" class="text-primary">Home</a> &gt; {{$titlename}}</p>
            </div>
        </div>

<hr>



    <!-- <section class="features6 cid-s9uzryvHBf mbr-parallax-background" id="features12-4c">
        @foreach($diretorycategory->chunk(3) as $category)


        {{-- @for($j =  0; $j < $counts ; $j++) --}}
        <div class="container">


            <div class="media-container-row">

                @foreach($category as $services)

                    <div class="card p-3 col-12 col-md-6 col-lg-4">
                        <div class="card-img pb-3">
                            <a href="budget.html"><span class="mbr-iconfont mbrib-cash"></span></a>
                        </div>
                        <div class="card-box">
                                    <a href="{{route('directory.list', $services->id)}}"><h4 class="card-title py-3 mbr-fonts-style display-7">{{$services->title}}</h4>
                                    <p class="mbr-text mbr-fonts-style display-4">{!!$services->description!!}</p></a>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>

        @endforeach
    
    </section> -->

<section class="content2 cid-saBl8LyfSn" id="content2-4k">
    @foreach($diretorycategory->chunk(3) as $category)


        {{-- @for($j =  0; $j < $counts ; $j++) --}}
    
    <div class="container">
        
        <div class="row mt-4">
        @foreach($category as $services)
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><a href="{{route('directory.list', $services->id)}}">{{$services->title}}</a></h5>
                        
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">{!!$services->description!!}</p><br><br><br>
                    </div> 
                </div>
            </div>
        @endforeach   
        </div>
    </div>
    @endforeach
</section>
    <br>
    <br>
    <br>
    <br>
    <br>








