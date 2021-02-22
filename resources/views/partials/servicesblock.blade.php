<!-- <section class="features6 cid-s9uzryvHBf mbr-parallax-background" id="features12-4c">
    @foreach($servicescategories->chunk(3) as $servicescategory)
 
  
    {{-- @for($j =  0; $j < $counts ; $j++) --}}
    <div class="container">
       
       
        <div class="media-container-row">
             
            @foreach($servicescategory as $services)

                <div class="card p-3 col-12 col-md-6 col-lg-4">
              
                    <div class="card-box">  
                                <a href="{{route('showsubcategory.show', $services->id)}}"><h4 class="card-title py-3 mbr-fonts-style display-7">{{$services->title}}</h4>
                                <p class="mbr-text mbr-fonts-style mt-3 display-7">{!!$services->description!!}</p></a>
                    </div>
                </div>   
                
            @endforeach 
        </div> 
    </div> 
    
    @endforeach
</section> -->


<section class="content2 cid-saBl8LyfSn" id="content2-4k">
@foreach($servicescategories->chunk(3) as $servicescategory)
 
  
 {{-- @for($j =  0; $j < $counts ; $j++) --}}
    
    <div class="container">
        
        <div class="row mt-4">
        @foreach($servicescategory as $services)
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><a href="{{route('showsubcategory.show', $services->id)}}">{{$services->title}}</a></h5>
                        <!-- <h6 class="item-subtitle mbr-fonts-style mt-1 display-7">
                            <strong>John Smith</strong><em> 10-10-2025</em></h6> -->
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">{!!$services->description!!}</p>
                    </div>
                    
                </div>
            </div>
        @endforeach     
        </div>
    </div>
@endforeach    
</section>

<section class="features12 cid-sa9wPEpRgN mbr-parallax-background" id="features12-4c">

    
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255, 255, 255);">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="card-wrapper">
                    <div class="card-box align-left">
                        <h4 class="card-title mbr-fonts-style mb-4 display-2"><strong>About the Portal...!!!!</strong></h4>
                        <p class="mbr-text mbr-fonts-style mb-4 display-7">The complete Portal is yet to be deployed, however our ICT Staffs are working tirelessly around the clock to bring you the fully functioning and complete Portal.<br><br>Thank You&nbsp;</p>
                        <div class="mbr-section-btn"><a class="btn btn-primary display-4" href="https://127.0.0.1:8000">Create your own site</a></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="item mbr-flex">
                    <div class="icon-box">
                        <span class="mbr-iconfont mbrib-briefcase"></span>
                    </div>
                    <div class="text-box">
                        <h4 class="icon-title mbr-semibold mbr-black mbr-fonts-style display-7">
                            <strong>SERVICE Section</strong></h4>
                        <h5 class="icon-text mbr-black mbr-fonts-style display-4">Probably the biggest section of the portal that needs to be active and fully online. This section includes all Government Services at present being tranformed and made available online.</h5>
                    </div>
                </div>
                <div class="item mbr-flex">
                    <div class="icon-box">
                        <span class="mbr-iconfont mbrib-users"></span>
                    </div>
                    <div class="text-box">
                        <h4 class="icon-title mbr-semibold mbr-black mbr-fonts-style display-7">
                            <strong>MANATU TIITI Section</strong></h4>
                        <h5 class="icon-text mbr-black mbr-fonts-style display-4">A discussion forum that enable civil servants to posts and make comments on government related matter.</h5>
                    </div>
                </div>
                <div class="item mbr-flex">
                    <div class="icon-box">
                        <span class="mbr-iconfont socicon-internet socicon"></span>
                    </div>
                    <div class="text-box">
                        <h4 class="icon-title mbr-semibold mbr-black mbr-fonts-style display-7">
                            <strong>LOG IN Section</strong></h4>
                        <h5 class="icon-text mbr-black mbr-fonts-style display-4">Log-In section gives you access to the backend admin side whereby each designated staff from each department can upload and edit information related to their department.</h5>
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
