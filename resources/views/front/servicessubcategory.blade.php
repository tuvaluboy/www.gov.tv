@extends('layouts.front')

@section('content')
<!--
<section class="header4 cid-s1YPl57Et0" id="header4-2p">
    <div class="mbr-overlay"></div>
    <div class="align-left container">
        <div class="row">
            <div class="content-wrap"><br><br><br>
                <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-2">
                    <strong><br></strong><br><strong>{{$serviceCategory->title}}</strong></h1><br><br><br>

            </div>
        </div>
    </div>
</section> -->
@include('partials.slidemenu')
<hr>
    <div class="align-left container">
            <div class="content-wrap">
                <div class="col-lg-12">
                    <p class="mbr-text mbr-fonts-style display-text"><a  href="{{route('home')}}" class="text-primary">Home</a> &gt; {{$serviceCategory->title}}</p>
                </div>
            </div>
    </div>
<hr>

<section class="accordion1 cid-s1YPFUMG3v" id="accordions1-a">




    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="section-head text-center">
                    <h2 class="mbr-section-title mbr-bold pb-2 mbr-fonts-style display-2">
                    {{$serviceCategory->title}}</h2>
                    <!-- <p class="mbr-section-text align-center pb-4 mbr-regular mbr-black mbr-fonts-style display-7">Lorem ipsum
                        dolor sit amet,
                        consectetur adipisicing elit, sed do eiusmod tempor.</p> -->
                </div>
                <div class="clearfix"></div>
                <div id="bootstrap-toggle" class="toggle-panel accordionStyles tab-content">
                @foreach($subcategories as $subcategory)
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="collapsed panel-title" data-toggle="collapse" data-core="" href="#collapse1{{$subcategory->id}}_4" aria-expanded="false" aria-controls="collapse1">
                                <h4 class="mbr-regular mbr-fonts-style display-7">{{$subcategory->title}}
                                </h4>
                                <span class="sign mbr-iconfont mbri-plus inactive"></span>
                            </a>
                        </div>
                        <div id="collapse1{{$subcategory->id}}_4" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">

                                    <p class="mbr-fonts-style mbr-regular mbr-text panel-text display-7">
                                    @foreach($subcategory->servicessubcategoryServices as $service)
                                    <a href="{{route('services.show', $service->id)}}"><u>{{$service->title}}</u></a><br>
                                    {!!$service->description!!} <br>
                                    @endforeach</p>

                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
