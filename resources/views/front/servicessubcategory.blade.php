@extends('layouts.front')

@section('content')

<section class="header4 cid-sdOOR86ulw" id="header4-1m">

    
    <div class="mbr-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="content-wrap">
                <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-2">
                    <strong><br></strong><br><strong>{{$serviceCategory->title}}</strong></h1>
                
                

                
            </div>
        </div>
    </div>
</section>

<section class="content16 cid-s9RPxwphdz" id="content16-1n">

    

  
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <div class="mbr-section-head align-center mb-4">
                    <h3 class="mbr-section-title mb-0 mbr-fonts-style display-2">
                    {{-- <strong>{{$serviceCategory->title}}</strong></h3> --}}
                    
                </div>
                <div id="bootstrap-accordion_69" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">
                    @foreach($subcategories as $subcategory)
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-core="" href="#collapse{{$subcategory->id}}_69" aria-expanded="false" aria-controls="collapse1">
                            <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>{{$subcategory->title}}</strong>
                                </h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        
                    <div id="collapse{{$subcategory->id}}_69" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_69">
                            <div class="panel-body">
                                @foreach($subcategory->services as $service)
                                <p class="mbr-fonts-style panel-text display-4">
                                    
                                <a href="#"><u>{{$service->title}}</u></a>
                                <p>{!!$service->description!!}</p>
                                    <br> 
                                   
                                </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                       

                    @endforeach
             
          
      
                    
                    
                </div>
            </div>
        </div>
    </div>
 
</section>




@endsection
