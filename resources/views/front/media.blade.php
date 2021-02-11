@extends('layouts.front')

@section('content')


<section class="header4 cid-sdVgfli5UX" id="header4-2p">
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
</section>

<hr>
    <div class="align-left container">
            <div class="content-wrap">
                <div class="col-lg-12">
                    <p class="mbr-text mbr-fonts-style display-text"><a  href="{{route('home')}}" class="text-primary">Home</a> &gt; {{$titlename}}</p>
                </div>
            </div>
    </div>
<hr>
<section class="features3 cid-s9QBKWYm2c" id="features3-1y">


    <section class="features6 cid-s9uzryvHBf mbr-parallax-background" id="features12-4c">
        @foreach($categories->chunk(3) as $category)


        {{-- @for($j =  0; $j < $counts ; $j++) --}}
        <div class="container">


            <div class="media-container-row">

                @foreach($category as $services)

                    <div class="card p-3 col-12 col-md-6 col-lg-4">

                        <div class="card-box">
                                    <a href="{{route('media.list', $services->id)}}"><h4 class="card-title py-3 mbr-fonts-style display-7">{{$services->title}}</h4>
                                    <p class="mbr-text mbr-fonts-style display-4">{!!$services->description!!}</p></a>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>

        @endforeach
    </section>




</section>



@endsection
