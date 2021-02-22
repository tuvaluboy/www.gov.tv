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