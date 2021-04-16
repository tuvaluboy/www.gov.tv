
<section class="clients2 cid-ssJDGmsKPt mbr-parallax-background" id="clients2-m">




@foreach($diretorycategories->chunk(3) as $directorycategory)



<div class="container">
    <div class="row justify-content-center">
    @foreach($directorycategory as $category)
        <div class="card col-12 col-md-6 col-lg-4">
            <div class="card-wrapper">
                <!-- <div class="img-wrapper">
                    <img src="assets/images/1.png" alt="Mobirise">
                </div> -->
                <div class="card-box align-center">

                    <h6 class="card-title mbr-fonts-style mb-3 display-5">
                        <strong>{{$category->title}}</strong>
                    </h6>
                    <p class="mbr-text mbr-fonts-style mb-4 display-5">
                      {{$category->description}}</p>
                    <div class="mbr-section-btn mt-3">
                        <a class="btn btn-primary-outline display-4" href="#">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>
@endforeach

</section>
