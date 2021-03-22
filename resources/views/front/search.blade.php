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


<!-- Search Result Block  -->
<section class="features9 cid-sslWma43Fx" id="features10-7h">
    <div class="container">
       <div class="row">
			<div class="col-md-12" >
                <div class="card-wrapper">
				    <div class="search-result  ">
					    <h2>Results</h2>
					    <p>  Results</p>
				    </div>
			    </div>
		    </div>
        
       
      
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card-wrapper media-container-row media-container-row">
                        <div class="card-box">
                            <h4 class="card-title pb-3 mbr-fonts-style display-7">


                            </h4>

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
</section>



<br>
<br>
<br>
<br>
<br>
<br>
@endsection
