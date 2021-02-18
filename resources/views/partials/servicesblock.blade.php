<section class="features6 cid-s9uzryvHBf" id="features6-11">
    @foreach($servicescategories->chunk(3) as $servicescategory)
 
    <div class="container">
        <div class="media-container-row"> 
            @foreach($servicescategory as $services)
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-img pb-3">
                    <a><span class="mbr-iconfont mbrib-cash"></span></a>
                </div>
                    <div class="card-box">  
                                <a href="{{route('showsubcategory.show', $services->id)}}"><h4 class="card-title py-3 mbr-fonts-style display-7">{{$services->title}}</h4>
                                <p class="mbr-text mbr-fonts-style display-4">{!!$services->description!!}</p></a> 
                    </div>
                </div>     
            @endforeach 
        </div> 
    </div> 
    
    @endforeach
</section>
