<section class="features18 popup-btn-cards cid-s9hN14RCwX" id="features18-9">

    <div class="container">
        
        <h3 class="mbr-section-subtitle display-5 align-center mbr-fonts-style mbr-light"><strong>Latest News</strong></h3>
        <div class="media-container-row pt-5 ">
      @foreach($newsandupdates as $newsandupdate)  
      <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper ">
                    <div class="card-img">
                        <div class="mbr-overlay"></div>
                        <div class="mbr-section-btn text-center">
                        @if($newsandupdate->type=="update")
                        <a href="{{route('announcement.show', $newsandupdate->id)}}" class="btn btn-primary display-4">Read More</a>
                        @else
                        <a href="{{route('news.show', $newsandupdate->id)}}" class="btn btn-primary display-4">Read More</a>
                        @endif
                        </div>
                        
                        <img src="{{ $newsandupdate->image->getUrl('preview') }}" alt="Mobirise" title=" ">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-7"><strong>{{$newsandupdate->created_at->toDateString()}}</strong></h4>
                        <p class="mbr-text mbr-fonts-style align-left display-7" >{!!
                            implode(' ', array_slice(explode(' ', $newsandupdate->description), 0, 50))."\n";
                      

                        !!}<br></p>
                    </div>
                </div>
      </div>
      @endforeach
     

        </div>
    </div>
</section>