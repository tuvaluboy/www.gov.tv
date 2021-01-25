@extends('layouts.front')

@section('content')

<section class="header3 cid-shcGeNTMHt" id="header3-7n">

    

    <div class="mbr-overlay" style="opacity: 0.2; background-color: rgb(0, 0, 0);"></div>

    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong><br></strong><br><strong>{{$subcategories->title}}</strong></h1>
                
                <p class="mbr-text mbr-fonts-style display-7"><a href="{{route('showsubcategory.show', $serviceCategory->id)}}" class="text-primary">{{$serviceCategory->title}}</a> &gt; {{$subcategories->title}}</p>
                
            </div>
        </div>
    </div>
</section>

<section class="content16 cid-shcGsn2WVM" id="content16-7o">

    

    
    <div class="container">
        <div class="row justify-content-left">
           

                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card-wrapper media-container-row media-container-row">
                        <div class="card-box">
                            <h4 class="card-title pb-3 mbr-fonts-style display-7">
                                {{$subcategories->title}} 
                                
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                @foreach($services as $ser)
                                <a href="bus_industry.html"> {{$ser->title}} </a><br><hr>
                                @endforeach
                               
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-lg-4 col-lg-9">
                    <div class="card-wrapper media-container-row">
                        <div class="card-box">
                            <br/>
                            <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            <a>{{$service->title}}</a></h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                All Climate change related projects and resources. jhljfljhflyfuiyfdludulyouy ljhgojhfouyfouyfdouyouyoufy lkjgkgi lhgoyfoutdoyutd lhfgouyfouytd
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