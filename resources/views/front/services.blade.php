@extends('layouts.front')

@section('content')

@include('partials.slidemenu')


<hr>
    <div class="align-left container">
            <div class="content-wrap">
                <div class="col-lg-12">
                    <p class="mbr-text mbr-fonts-style display-text"><a  href="{{route('home')}}" class="text-primary">Home</a> &gt; <a href="{{route('showsubcategory.show', $serviceCategory->id)}}" class="text-primary">{{$serviceCategory->title}}</a> &gt; {{$subcategories->title}}</p>
                </div>
            </div>
    </div>
<hr>

<section class="features2 cid-s1YPl57Et0" id="features2-3">



    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-3 col-md-12 md-pb">
            <div class="title-wrapper align-left">

                    <h6 class="mbr-section-title mbr-white   pb-3 mbr-fonts-style display-2"> {{$serviceCategory->title}}</h6>
                    <p class="mbr-text pb-3 mbr-white mbr-regular mbr-fonts-style display-7">
                        @foreach($subcategories->servicessubcategoryServices as $ser)
                                @if($ser->title == $service->title )
        	                    {{$ser->title}}<br><br>
                                @else
                                <a href="{{route('services.show', $ser->id)}}"> {{$ser->title}} </a><br><br>
                                @endif
                        @endforeach
                    <hr> <h5 class="card-title mbr-regular pb-1 mbr-black mbr-fonts-style display-5">Contacts</h5>
                        @foreach($service->contacts as $contact)
                            <a href="{{route('directory.show', [$contact->id])}}">{!!$contact->title!!}</a> <br><br>

                        @endforeach
                    </p>
        </div>
            </div>
            <div class="col-lg-9 col-md-12 md-pb">
                <div class="title-wrapper align-left">
                    <div class="line"></div>
                    <h3 class="mbr-section-title mbr-white mbr-semibold pb-3 mbr-fonts-style display-2">  {{$service->title}}</h3>

                </div>
                <div class="row">
                    <div class="card p-3 col-12 col-md-6 col-lg-12">
                        <div class="card-wrapper">
                            <div class="card-box">
                                <p class="card-text mbr-regular mbr-black mbr-fonts-style display-7">
                                {!!$service->detailinformation!!}</p>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                @foreach($service->files as $file)
                            <a href="{{ $file->getUrl() }}" target="_blank"><span class="mbr-iconfont mobi-mbri-file mobi-mbri" style="color: rgb(0, 119, 255); fill: rgb(0, 119, 255);"></span>{{$file->name }}</a> <br>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
