<!--

<section class="content2 cid-saBl8LyfSn" id="content2-4k">
@foreach($servicescategories->chunk(3) as $servicescategory)


    <div class="container">

        <div class="row mt-4">
        @foreach($servicescategory as $services)
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">

                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><a href="{{route('showsubcategory.show', $services->id)}}">{{$services->title}}</a></h5>

                        <p class="mbr-text mbr-fonts-style mt-3 display-7">{!!$services->description!!}</p>
                    </div>

                </div>
            </div>
        @endforeach
        </div>
    </div>
@endforeach
</section> -->

<section class="features4 cid-s1YNzGfN84" id="features4-2">


@foreach($servicescategories->chunk(3) as $servicescategory)




    <div class="container mbr-white">

        <div class="row justify-content-center">
        @foreach($servicescategory as $services)
            <div class="card col-12 col-md-6 col-lg-4">
                <a  href="{{route('showsubcategory.show', $services->id)}}">
                <div class="card-wrapper align-center" >
                        <div class="img-wrapper">
                                <span class="mbr-iconfont mobi-mbri-paper-{{$services->icon}} mobi-mbri"></span>
                            </div>
                    <div class="card-box align-center">

                        <h4 class="mbr-section-title pb-2 mbr-semibold mbr-fonts-style display-5">{{$services->title}}</h4>
                        <p class="mbr-section-text align-center mbr-regular pb-2 mbr-fonts-style display-7">
                        {!!$services->description!!}</p>

                        <div class="link-wrapper">
                          
                            <span class="mbr-iconfont mobi-mbri-right mobi-mbri"> </span>
                           
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
    @endforeach
</section>
