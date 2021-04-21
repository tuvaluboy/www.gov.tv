@extends('layouts.front')

@section('content')

<!-- Slide Image -->
@include('partials.slidemenu')


@include('partials.search')
<!-- Directory -->
<!-- <section class="content1 cid-s48udlf8KU" id="content1-8">

    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-md-9">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2"><strong>Services</strong></h3>

            </div>
        </div>
    </div>
</section> -->

<!-- Services Block  -->
@include('partials.servicesblock')

<!-- Directory -->
<section class="features3 solutionm4_features3 cid-suH2PdPBWP mbr-parallax-background" id="features3-3">

<div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255, 255, 255);">
</div>
@foreach($diretorycategories->chunk(3) as $category)


    <div class="container mbr-white">

        <div class="row justify-content-center">
        @foreach($category as $services)

            @if($loop->first)
            <div class="card  md-pb first  col-12 col-md-6 col-lg-4">
            <a href="{{route('directory.list', $services->id)}}">
                <div class="card-wrapper align-center">
                    <div class="card-box align-center">

                        <h4 class="mbr-section-title pb-2 mbr-semibold mbr-fonts-style display-5">{{$services->title}}</h4>
                        <p class="mbr-section-text align-center mbr-regular pb-2 mbr-fonts-style display-7">
                        {!!$services->description!!}</p>
                    </div>
                    <div class="img-wrapper"> 
                        <img src="{{ $services->image->getUrl() }}">
                        {{-- <img src="assets/images/02.jpg" alt="Mobirise"> --}}
                    </div>
                </div>
                </a>
            </div>
            @continue
            @elseif($loop->last)
            <div class="card  md-pb last  col-12 col-md-6 col-lg-4">
            <a href="{{route('directory.list', $services->id)}}">
                <div class="card-wrapper align-center">
                    <div class="card-box align-center">

                        <h4 class="mbr-section-title pb-2 mbr-semibold mbr-fonts-style display-5">{{$services->title}}</h4>
                        <p class="mbr-section-text align-center mbr-regular pb-2 mbr-fonts-style display-7">
                        {!!$services->description!!}</p>
                    </div>
                    <div class="img-wrapper">
                            <img src="{{ $services->image->getUrl() }}">
                    </div>
                </div>
                </a>
            </div>
            @continue
            @else
            <div class="card  md-pb   col-12 col-md-6 col-lg-4">
            <a href="{{route('directory.list', $services->id)}}">
                <div class="card-wrapper align-center">
                    <div class="card-box align-center">

                        <h4 class="mbr-section-title pb-2 mbr-semibold mbr-fonts-style display-5">{{$services->title}}</h4>
                        <p class="mbr-section-text align-center mbr-regular pb-2 mbr-fonts-style display-7">
                        {!!$services->description!!}</p>
                    </div>
                    <div class="img-wrapper">
                            <img src="{{ $services->image->getUrl() }}">
                    </div>
                </div>
                </a>
            </div>
            @continue
            @endif

         @endforeach
        </div>
    </div>
    @endforeach
</section>


<!-- Media -->
<section class="features5 cid-s1YQ4DrGok" id="features5-d">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-7 pb-4">
                <h4 class="main-subtitle align-center mbr-bold mbr-black mbr-fonts-style display-2">Media</h4>
                <!-- <p class="mbr-section-text align-center mbr-regular mbr-black mbr-fonts-style display-7">Lorem ipsum dolor sit amet,
                    consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->

            </div>
        </div>
        <div class="row">
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper card1">
                    <div class="card-box">
                        <h4 class="card-title align-center mbr-bold pb-4 mbr-white mbr-fonts-style display-5">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                        <p class="mbr-text align-center pt-3 mbr-white mbr-regular mbr-fonts-style display-7">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    </div>
                </div>
            </div>
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper card2">
                    <div class="card-box">
                        <h4 class="card-title align-center mbr-bold pb-4 mbr-white mbr-fonts-style display-5">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                        <p class="mbr-text align-center pt-3 mbr-white mbr-regular mbr-fonts-style display-7">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    </div>
                </div>
            </div>
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper card3">
                    <div class="card-box">
                        <h4 class="card-title align-center mbr-bold pb-4 mbr-white mbr-fonts-style display-5">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                        <p class="mbr-text align-center pt-3 mbr-white mbr-regular mbr-fonts-style display-7">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Another Section -->


@endsection

