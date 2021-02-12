@extends('layouts.front')

@section('content')

<section class="header4 cid-sdVgfli5UX" id="header4-2p">
    <div class="mbr-overlay"></div>
    <div class="align-left container">
        <div class="row">
            <div class="content-wrap"><br><br><br>
                <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-2">
                    <strong><br></strong><br><strong>{{$titlename}}</strong></h1><br><br><br>

            </div>
        </div>
    </div>
</section>

<hr>
    <div class="align-left container">
            <div class="content-wrap">
                <div class="col-lg-12">
                    <p class="mbr-text mbr-fonts-style display-text"><a  href="{{route('home')}}" class="text-primary">Home</a> &gt; <a href="{{route('media')}}"> Media</a> &gt;{{$titlename}} </p>
                </div>
            </div>
    </div>
<hr>


<section class="content16 cid-s9RPxwphdz" id="content16-1n">

    <div class="container">
    <div class="container wrap">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <div class="mbr-section-head align-center mb-4">


                </div>
                <div id="bootstrap-accordion_69" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">
                    @foreach($items as $item)
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" href="{{route('media.show', $item->id)}}" class="panel-title"   aria-expanded="false"  >
                            <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>{{$item->title}}</strong>
                                </h6>


                            <p class="mbr-fonts-style panel-text display-8">{{$item->created_at->toDateString()}} </p> </a>
                              <p class="mbr-fonts-style panel-text display-6">{{$item->summary}}</p>
                    </div>

                    @endforeach

                </div>
                {{$items->links()}}
            </div>

        </div>
    </div>
    </div>

</section>






@endsection
