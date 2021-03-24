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
                    <a href="{{route('directory')}}" class="text-primary">Directory</a> /
                    <a href="{{route('directory.list', $directorysubcategory->directorycategory->id)}}">{{$directorysubcategory->directorycategory->title}} </a>/
                    {{$directorysubcategory->title}}</p>
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
                             <b> Contact
                            </b>
                            </h4>

                            <p class="mbr-text mbr-fonts-style display-text">

                                {!!$directorycontent->contact_information !!}
                                <hr>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 col-lg-9">
                    <div class="card-wrapper media-container-row">
                        <div class="card-box">
                            <br/>
                            @if($directorycontent->type == "Body")
                                @foreach($directorysubcategory->contents as $ser)
                                    @if($ser->type == "Head")
                                    <h5><a href="{{route('directory.show', [$ser->id,$directorysubcategory->id])}}"> {{$ser->title}} </a>
                                    </h4><hr><br>
                                    @endif
                                @endforeach
                            @endif
                            <h3>
                            <b>{!!$directorycontent->detailinformation!!}</b>
                            </h3>

                            {!!$directorycontent->description!!}
                                <br>
                            @if($directorycontent->type == "Head")
                            <h5><b>Departments</b></h5>
                            @foreach($directorysubcategory->contents as $ser)
                                @if($ser->id == $directorycontent->id)

                                @else
                                    <a href="{{route('directory.show', [$ser->id,$directorysubcategory->id])}}"> {{$ser->title}} </a><br>
                                @endif
                            @endforeach
                                <br>
                            @endif
                        </div>
                    </div>
                </div>

        </div>
    </div>
</section>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


@endsection
