@extends('layouts.front')

@section('content')

<section class="engine"><a href="https://mobirise.info/m">free website design templates</a></section><section class="header3 cid-sa9qCnqftl" id="header3-44">

    

    <div class="mbr-overlay" style="opacity: 0.2; background-color: rgb(0, 0, 0);"></div>

    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong><br></strong><br><strong>Budget</strong></h1>
                
                <p class="mbr-text mbr-fonts-style display-7">Home &gt; Budget</p>
                
            </div>
        </div>
    </div>
</section>

<section class="section-table cid-sa9vef7MOQ" id="table1-4b">

  
  
  <div class="container container-table">
      <!-- <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">
          Budget Reports</h2> -->
      
      <div class="table-wrapper">
        <div class="container">
          
        </div>

        <div class="container scroll">
          <table name="budget" id="budget" class="table" cellspacing="0" data-empty="No matching records found">
            <thead>
              <tr class="table-heads ">  
                <th class="head-item mbr-fonts-style display-7">
                        Title
                </th>
                <th>
                        Date
                </th>
                <th>
                &nbsp;
                </th>
              </tr>
            </thead>

            <tbody> 
            @foreach($budgets as $key => $budget)
              <tr>  
                <td class="body-item mbr-fonts-style display-7">{{$budget->title}}</td>
                <td>{{$budget->created_at->toDateString()}}</td>
                <td>
                    @if($budget->file)
                        <a href="{{ $budget->file->getUrl() }}" target="_blank">
                            {{ trans('global.view_file') }}
                        </a>
                    @endif
                </td>
              
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="container table-info-container">
          
        </div>
      </div>
    </div>
</section>

@endsection