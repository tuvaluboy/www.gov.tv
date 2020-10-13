@extends('layouts.front')

@section('content')
<section class="engine"><a href="https://mobirise.info/k">develop free website</a></section><section class="header3 cid-s9Qus6o4ZX" id="header3-1p">

    

<div class="mbr-overlay" style="opacity: 0.2; background-color: rgb(0, 0, 0);"></div>

<div class="align-center container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-12">
            <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong>Announcements</strong></h1>
            
            <p class="mbr-text mbr-fonts-style display-7">Home &gt; Media &gt; Announcements &gt;</p>
            
        </div>
    </div>
</div>
</section>
 <br/>
 <div class="container">
 
      <table id="announcement" class=" table table-bordered table-striped table-hover datatable datatable-Page" >
        <thead>
          <tr > 
            <th>Title</th>
            <th>Date</th>
            <th></th>
          </tr>
           
        </thead>
        
        <tbody>
           @foreach($announcements as $key => $announcement)
            <tr>  
              <td>{{$announcement->title}}</td>
              <td>{{$announcement->created_at->toDateString()}}</td>
              <td>  
          
                <a class="btn btn-xs btn-primary" href="{{route('announcement.show', $announcement->id)}}">
                                          {{ trans('global.view') }}
                </a>
            
              </td>
            </tr>
          @endforeach
        
        </tbody>
        <tfoot>
        <tr > 
            <th>Title</th>
            <th>Date</th>
            <th></th>
          </tr>
        </tfoot>
        </table>
  
 </div>

<section class="content8 cid-s9QXXqNi5R" id="content8-21">

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <div class="mbr-section-btn align-center"><a class="btn btn-primary display-4" href="">Previous</a>
                <a class="btn btn-primary display-4" href="">Next</a></div>
        </div>
    </div>
</div> -->
</section>


@endsection

@section('scripts')

@endsection