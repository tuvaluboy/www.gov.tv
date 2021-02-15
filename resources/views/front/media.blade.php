@extends('layouts.front')

@section('content')


<section class="header4 cid-sdVgfli5UX" id="header4-2p">
    <div class="mbr-overlay">

    </div>
    <div class="align-left container">
        <div class="row">
            <div class="content-wrap">
                <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-2">
                <br><br><strong><br></strong><br><strong>{{$titlename}}</strong><br><br><br>
            </h1>
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




<section class="features6 cid-s9uzryvHBf mbr-parallax-background" id="features12-4c">
        <!-- @foreach($categories->chunk(3) as $category)


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

        @endforeach -->

    <div class="container">
    @foreach($categories->chunk(3) as $category)
        <div class="row mt-4 cid-saBl8LyfSn">
        @foreach($category as $services)
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                    <img src="{{asset($services->image->getUrl())}}" alt="No Image">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-5"><a href="{{route('media.list', $services->id)}}" class="text-primary">{{$services->title}}</a></h5>
                        <h6 class="item-subtitle mbr-fonts-style mt-1 display-7">
                            <!-- <strong>John Smith</strong><em> 10-10-2025</em></h6> -->
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">{!!$services->description!!}</p>
                    </div>
                    <div class="mbr-section-btn item-footer mt-2"><a href="{{route('media.list', $services->id)}}" class="btn item-btn btn-primary display-7">View More
                            </a></div>
                </div>
            </div>
        @endforeach


        </div>
    @endforeach
    </div>

</section>

<br>
<br>
<br>
<br>
<br>
<br>


@endsection
