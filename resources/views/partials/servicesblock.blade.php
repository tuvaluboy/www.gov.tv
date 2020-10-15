<section class="features6 cid-s9uzryvHBf mbr-parallax-background" id="features12-4c">

@for($j = 0; $j < $counts; $j++)


    <div class="container">
        <div class="media-container-row">
        @for($i = 0; $i < 3; $i++)

            <div class="card p-3 col-12 col-md-6 col-lg-4">

                <div class="card-box">

                            <a><h4 class="card-title py-3 mbr-fonts-style display-7">{{$servicescategories[$j]->title}}</h4>
                            <p class="mbr-text mbr-fonts-style display-4">{!!$servicescategories[$j]->description!!}</p></a>


                </div>
            </div>

           @php
            $j++;
           @endphp

        @endfor

        </div>
    </div>

@endfor



</section>
