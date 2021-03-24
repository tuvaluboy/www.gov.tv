@extends('layouts.front')

@section('content')


<section class="header4 cid-sdVgfli5UX" id="header4-2p">
    <div class="mbr-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="content-wrap">
                <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-2">
                    <strong><br></strong><br><strong>{{$subcategories->title}}</strong>
            </h1>
                    <!-- <p class="mbr-text mbr-fonts-style display-6"><a href="{{route('showsubcategory.show', $serviceCategory->id)}}" class="text-primary">{{$serviceCategory->title}}</a> &gt; {{$subcategories->title}}</p> -->
            </div>
        </div>
    </div>
</section>

<hr>
    <div class="align-left container">
            <div class="content-wrap">
                <div class="col-lg-12">
                    <p class="mbr-text mbr-fonts-style display-text"><a  href="{{route('home')}}" class="text-primary">Home</a> &gt; <a href="{{route('showsubcategory.show', $serviceCategory->id)}}" class="text-primary">{{$serviceCategory->title}}</a> &gt; {{$subcategories->title}}</p>
                </div>
            </div>
    </div>
<hr>





<section class="content16 cid-shcGsn2WVM" id="content16-7o">




    <div class="container">

        <div class="row justify-content-left">


                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card-wrapper media-container-row media-container-row">
                        <div class="card-box">
                            <h4 class="card-title pb-3 mbr-fonts-style display-7">
                               <b> {{$subcategories->title}}</b>

                            </h4>
                            <p class="mbr-text mbr-fonts-style display-text">
                                @foreach($services as $ser)
                                @if($ser->id == $service->id)
                                  {{$ser->title}} <br>
                                @else
                                <a href="{{route('services.show', $ser->id)}}"> {{$ser->title}} </a><br>
                                @endif

                                @endforeach
                                <hr>
                            </p>
                            <p><b>Contacts </b></p>
                            @foreach($service->contacts as $contact)
                                @foreach($contact->contentDirectorySubCategories as $subcategory)
                                <a href="{{route('directory.show', [$contact->id,$subcategory])}}">{!!$contact->title!!}</a> <br><br>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 col-lg-9">
                    <div class="card-wrapper media-container-row">
                        <div class="card-box">
                            <br/>
                            <h2 class="card-title pb-3 mbr-fonts-style display-3">
                            {{$service->title}}</h2>
                            <p class="mbr-text mbr-fonts-style display-menu">
                            {!!$service->detailinformation!!}
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
