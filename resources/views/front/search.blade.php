@extends('layouts.front')

@section('content')

@include('partials.slidemenu')

<hr>
    <div class="align-left container">
            <div class="content-wrap">
                <div class="col-lg-12">
                    <p class="mbr-text mbr-fonts-style display-text"><a  href="{{route('home')}}" class="text-primary">Home</a> &gt;Search </p>
                </div>
            </div>
    </div>
<hr>
<br>
@include('partials.search')

<!-- Search Result Block  -->
<!-- <section class="features9 cid-sslWma43Fx" id="features10-7h">
    <div class="container">
       <div class="row">
			<div class="col-md-12" >
                <div class="card-wrapper">
				    <div class="search-result  ">
					    <h2>Results</h2>
					    <p>{{$countresult}}  Results</p>
				    </div>
			    </div>
		    </div>



                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card-wrapper media-container-row media-container-row">
                        <div class="card-box">
                            <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            All Categories
                            </h4>
                            <hr/>
                            <div class="list">
                                <li><a>Testing <span>10 </span></a></li>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-12 col-lg-4 col-lg-9">
                    <div class="card-wrapper media-container-row">
                        <div class="card-box">
                            <div class="row justify-content-left"> </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</section> -->
<section class="content16 cid-s9RPxwphdz" id="content16-1n">
<div class="container">
    <div class="container wrap">
        @foreach($services as $service )
        <div class="row justify-content-center">
            <div class="card-box">
            <u> <h3> <a href="{{route('services.show', $service->id)}}">{{$service->title}} </a> </h3></u>
            <p> {!!$service->description!!}</p>

            </div>
        </div>
        @endforeach
        <br>
        @foreach($directories as $directory )
        <div class="row justify-content-center">
            <div class="card-box">
            <u> <h3> <a href="{{route('directory.show', [$directory->id,1])}}">{{$directory->title}} </a> </h3></u>
            <p> {!!$directory->description!!}</p>

            </div>
        </div>
        @endforeach
        <br>
        @foreach($mediaitems as $mediaitem )
        <div class="row justify-content-center">
            <div class="card-box">
            <u> <h3> <a href="{{route('media.show', $mediaitem->id)}}">{{$mediaitem->title}} </a> </h3></u>
            <p> {!!$mediaitem->summary!!}</p>

            </div>
        </div>
        @endforeach
    </div>
</div>
</section>


<br>
<br>
<br>
<br>
<br>
<br>
@endsection
