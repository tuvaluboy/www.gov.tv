@extends('layouts.front')


@section('content')
<section class="engine"><a href="https://mobirise.info/z">best free css templates</a></section><section class="header3 cid-s9RYHp58EZ" id="header3-3f">



    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(35, 35, 35);"></div>

    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong><br></strong><br><strong>About Tuvalu</strong></h1>

                <p class="mbr-text mbr-fonts-style display-7"><a  href="{{route('home')}}" class="text-primary">Home</a> &gt; About Tuvalu&nbsp;<br><br></p>

            </div>
        </div>
    </div>
</section>
<section class="tabs1 cid-s9S00yxLn7" id="tabs1-3g">




    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-md-11">
                <ul class="nav nav-tabs mb-4" role="tablist">
                    <li class="nav-item first mbr-fonts-style"><a class="nav-link mbr-fonts-style show active display-7" role="tab" data-toggle="tab" href="#tabs1-3g_tab0" aria-selected="true"><strong>About Tuvalu&nbsp; &nbsp;</strong>&nbsp;&nbsp;</a></li>
                    <li class="nav-item"><a class="nav-link mbr-fonts-style show active display-7" role="tab" data-toggle="tab" href="#tabs1-3g_tab1" aria-selected="true"><strong>Tuvalu Constitution&nbsp; &nbsp;</strong>&nbsp;</a></li>
                    <li class="nav-item"><a class="nav-link mbr-fonts-style show active display-7" role="tab" data-toggle="tab" href="#tabs1-3g_tab2" aria-selected="true"><strong>National Development Plan&nbsp; &nbsp;</strong></a></li>
                    <li class="nav-item"><a class="nav-link mbr-fonts-style show active display-7" role="tab" data-toggle="tab" href="#tabs1-3g_tab3" aria-selected="true"><strong>Public Holidays 2020</strong></a></li>


                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane in active" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                    @if($about)
                                        {!! $about->description !!}
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text mbr-fonts-style display-7">
                                    @if($constitution)
                                        {!! $constitution->description!!}
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div id="tab3" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                    @if($tuvaludevelopmentplan)
                                        {!! $tuvaludevelopmentplan->description!!}
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div id="tab4" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                    @if($holiday)
                                        {!! $holiday->description!!}
                                    @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

@endsection
