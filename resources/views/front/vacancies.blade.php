@extends('layouts.front')

@section('content')

<section class="engine"><a href="https://mobirise.info/v">free html templates</a></section><section class="header3 cid-s9RT98pIP1" id="header3-3a">

    

    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(35, 35, 35);"></div>

    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong><br></strong><strong><br></strong><strong>Vacancies</strong></h1>
                
                <p class="mbr-text mbr-fonts-style display-7"><a  href="{{route('home')}}" class="text-primary">Home</a> &gt; Vacancies</p>
                
            </div>
        </div>
    </div>
</section>

<section class="features11 cid-s9RUegFwCH" id="features11-3b">

    

    

    <div class="container">   
        <div class="col-md-12">
            <div class="media-container-row">
                <div class="mbr-figure m-auto" style="width: 30%;">
                    <img src="{{asset('assets/images/codeofarms-329x331.jpg')}}" alt="Mobirise" title="">
                </div>
                <div class=" align-left aside-content">
                    
                    <div class="mbr-section-text">
                        
                    </div>

                    <div class="block-content">
                        <div class="card p-3 pr-3">
                            <div class="media">
                                     
                                <div class="media-body">
                                    <h4 class="card-title mbr-fonts-style display-7"><strong>JOB APPLICATION&nbsp; GUIDELINE</strong></h4>
                                </div>
                            </div>                

                            <div class="card-box">
                                <p class="block-text mbr-fonts-style display-7">A brief list of guidelines outlining on how do you go about applying for a vacancy position in the civil service.</p>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div> 
    </div>          
</section>

<section class="testimonials4 cid-s9RVHVnIO9" id="testimonials4-3c">

  

  
  <div class="container">
    <h2 class="pb-3 mbr-fonts-style mbr-white align-center display-7"><strong>
        List of Civil Service Vacancies</strong></h2>
    
    <div class="col-md-10 testimonials-container"> 
      

      
    <!-- <div class="testimonials-item">
        <div class="user row">
          
          <div class="testimonials-caption">
            <div class="user_text ">
              <p class="mbr-fonts-style display-7">
                 Job Vacancy Position&nbsp;<br>
              </p>
            </div>
            
            
          </div>
        </div>
      </div> -->
<table id="vacancy" class=" table table-bordered table-striped table-hover datatable datatable-Page" >
   <thead>
     <tr > 
       <th>Title</th>
       <th>Due Date</th>
       <th></th>
     </tr>
      
   </thead>
   
   <tbody>
      @foreach($vacancies as $key => $vacancy)
       <tr>  
         <td>{{$vacancy->title}}</td>
         <td>{{$vacancy->duedate}}</td>
         <td>  
     
           <a class="btn btn-xs btn-primary" href="{{route('vacancies.show', $vacancy->id)}}">
                                     {{ trans('global.view') }}
           </a>
       
         </td>
       </tr>
     @endforeach
   
   </tbody>
   <tfoot>
   <tr > 
       <th>Title</th>
       <th>Due Date</th>
       <th></th>
     </tr>
   </tfoot>
</table>
      </div>
  </div>
</section>
@endsection