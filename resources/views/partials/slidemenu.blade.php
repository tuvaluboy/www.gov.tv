<!-- <section class="engine"><a href="index.html">Mobirise</a></section><section class="carousel slide cid-sa8zLphmfj" data-interval="false" id="slider1-3v">



    <div class="full-screen">
        <div class="mbr-slider slide carousel" data-keyboard="false" data-ride="carousel" data-interval="8000" data-pause="true">

        <div class="carousel-inner" role="listbox">
        <div class="carousel-item slider-fullscreen-image active" data-bg-video-slide="false" style="background-image: url(assets/images/mbr-2-1920x959.jpg);">
                <div class="container container-slide">
                    <div class="image_wrapper">
                        <div class="mbr-overlay" style="opacity: 0.4;">
                            </div>
                                <img src="assets/images/mbr-2-1920x959.jpg" alt="" title="">
                                    <div class="carousel-caption justify-content-center">
                                        <div class="col-10 align-left">
                                            <h2 class="mbr-fonts-style display-1">Tuvalu eGov.tv</h2>
                                                <p class="lead mbr-text mbr-fonts-style display-5">Successful Sharing Platform to Imrpove Government Services<br>Productivity.</p>
                                                    <div class="mbr-section-btn" buttons="0">
                                                        <a class=""></a>
                                                        <a class="btn display-4 btn-warning" href="#">OUR SERVICES</a>
                                                    </div>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
            @foreach($imageslides as $imageslide)
            <div class="carousel-item slider-fullscreen-image " data-bg-video-slide="false" style="background-image: url({{ asset($imageslide->image->getUrl()) }});">
                <div class="container container-slide">
                    <div class="image_wrapper">
                        <div class="mbr-overlay" style="opacity: 0.4;">
                            </div>
                                <img src="{{asset($imageslide->image->getUrl('preview'))}}" alt="" title="">
                                    <div class="carousel-caption justify-content-center">
                                        <div class="col-10 align-left">
                                            <h2 class="mbr-fonts-style display-1">{{$imageslide->title}}</h2>
                                                <p class="lead mbr-text mbr-fonts-style display-5">{{$imageslide->description}}.</p>

                                                    <div class="mbr-section-btn" buttons="0">
                                                    @if($imageslide->firstbutton)
                                                        <a class=""></a>
                                                        <a class="btn display-4 btn-warning" href="{{$imageslide->firstbutton_link}}">{{$imageslide->firstbutton}}</a>
                                                    </div>
                                                    @endif
                                                    @if($imageslide->secondbutton)
                                                    <div class="mbr-section-btn" buttons="0">
                                                        <a class=""></a>
                                                        <a class="btn display-4 btn-warning" href="{{$imageslide->secondbutton_link}}">{{$imageslide->secondbutton}}</a>
                                                    </div>
                                                    @endif



                                        </div>
                                    </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>

             <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#slider1-3v">
                    <span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
                        <span class="sr-only">Previous</span></a>
                            <a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#slider1-3v">
                                <span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
                                <span class="sr-only">Next</span>
                </a>
        </div>
    </div>


</section> -->

<section class="header4 cid-sdVgfli5UX mbr-parallax-background" id="header4-2p">


    <div class="mbr-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="content-wrap">
                <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-1"><strong><br></strong><strong>Gov.tv</strong></h1>

                <p class="mbr-fonts-style mbr-text mbr-white mb-3 display-5">Successful Sharing Platform to Improve <br>Government Services&nbsp;Productivity<br><br></p>


            </div>
        </div>
    </div>
</section>
