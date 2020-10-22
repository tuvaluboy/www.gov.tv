@extends('layouts.front')

<style>
   


    .navbars {
      width: 100%;
      background-color: #22a5e5;
      overflow: auto;
      
      
    }
    
    .navbars a {
      float: left;
      padding: 12px;
      color: white;
      text-decoration: none;
      font-size: 16px;
      width: 25%; /* Four links of equal widths */
      text-align: center;
    }
    
    .navbars a:hover {
      background-color: #ffd102;
    }
    
    .navbars a.active {
      background-color: #ffd102;
    }
    
    @media screen and (max-width: 500px) {
      .navbars a {
        float: none;
        display: block;
        width: 100%;
        text-align: center;
      }
    }
    </style>
  

@section('content')

<section class="header3 cid-s9R1xdT7sx" id="header3-26">

    

    <div class="mbr-overlay" style="opacity: 0.2; background-color: rgb(0, 0, 0);"></div>

    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong><br></strong><strong>Directory</strong></h1>
                
                <p class="mbr-text mbr-fonts-style display-7"><br><a  href="{{route('home')}}" class="text-primary">Home</a> &gt; Directory<br><br></p>
                
            </div>
        </div>
    </div>
</section>
<br>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="navbars">
                    <a href="the_government.html"><strong>The Government</strong></a> 
                    <a href="gov_agen_insti.html"><strong>Government Agencies</strong></a> 
                    <a href="missions.html"><strong>Tuvalu Missions Abroad</strong></a> 
                    <a href="missions.html"><strong>Foreign Offices</strong></a> 
                </div>    
            </div>
        </div>
    </div>  


    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong><br></strong><strong>The Government</strong></h1>
            </div>
        </div>
    </div>  


<section class="testimonials5 cid-s9R3497Ow0" id="testimonials5-29">
    
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 align-center">
                
                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="media-container-column">
              
        <div class="mbr-testimonial align-center ">
                <div class="panel-item">
                    <div class="card-block">
                        <div class="testimonial-photo">
                            <img src="assets/images/face1.jpg">
                        </div>
                        <p class="mbr-text mbr-fonts-style mbr-white display-7">
                            <strong>Governor General</strong>
                            <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, aspernatur, voluptatibus, atque, tempore molestiae.
                        </p>
                    </div>
                    
                </div>
            </div>

            <div class="mbr-testimonial align-center ">
                <div class="panel-item">
                    <div class="card-block">
                        <div class="testimonial-photo">
                            <img src="assets/images/face3.jpg">
                        </div>
                        <p class="mbr-text mbr-fonts-style mbr-white display-7">
                            <strong>Hon. Kausea Natano</strong>
                            <br><strong>Prime Minister</strong>
                            <br>Responsible for: Office of the Prime Minister
                          
                        </p>
                    </div>
                </div>
            </div>

            <div class="mbr-testimonial align-center">
                <div class="panel-item">
                    <div class="card-block">
                        <div class="testimonial-photo">
                            <img src="assets/images/face3.jpg">
                        </div>
                        <p class="mbr-text mbr-fonts-style mbr-white display-7">
                            <strong>Hon. Minute Taupo</strong>
                            <br><strong>Deputy Prime Minister and Minister of Fisheries and Trade</strong>
                            <br>Responsible for: <a href="https://www.tuvalufisheries.tv/" class="text-primary" target="_blank">Fisheries</a> and <a href="https://tuvalu.tradeportal.org/" class="text-primary" target="_blank">Trade</a>
                          
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>   
</section>



<section class="testimonials5 cid-s9R3497Ow0" id="testimonials5-29">

    

        <div class="container-fluid">
            <div class="row">

                <div class="col-12 col-lg-6">
                <div class="mbr-testimonial align-center">
                    <div class="panel-item">
                        <div class="card-block">
                            <div class="testimonial-photo">
                                <img src="assets/images/face3.jpg">
                            </div>
                            <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                <strong>Hon. Samuelu P Teo</strong>
                                <br><strong>Speaker of the House of Representatives</strong>
                                <br>Responsible for: House of Representatives
                                
                            </p>
                        </div>
                    </div>
                </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="mbr-testimonial align-center">
                        <div class="panel-item">
                            <div class="card-block">
                                <div class="testimonial-photo">
                                    <img src="assets/images/face3.jpg">
                                </div>
                                <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                    <strong>Hon. Simon Kofe</strong>
                                    <br><strong>Minister of Justice, Communication and Foreign Affairs</strong>
                                    <br>Responsible for: Justice, Communication and Foreign Affairs
                                </p>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="mbr-testimonial align-center">
                            <div class="panel-item">
                                <div class="card-block">
                                    <div class="testimonial-photo">
                                        <img src="assets/images/face3.jpg">
                                    </div>
                                    <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                        <strong>Hon. Seve Paeniu</strong>
                                        <br><strong>Minister of Finance</strong>
                                        <br>Responsible for: <a href="https://mfed.tv" class="text-primary" target="_blank">Finance</a> 
                                    </p>
                                </div>
                            </div>
                        </div>
                        </div>
        
                        <div class="col-12 col-lg-6">
                            <div class="mbr-testimonial align-center">
                                <div class="panel-item">
                                    <div class="card-block">
                                        <div class="testimonial-photo">
                                            <img src="assets/images/face3.jpg">
                                        </div>
                                        <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                            <strong>Hon. Katepu Laoi</strong>
                                            <br><strong>Minister of Local Government and Agriculture</strong>
                                            <br>Responsible for: Local Government and Agriculture
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="mbr-testimonial align-center">
                                    <div class="panel-item">
                                        <div class="card-block">
                                            <div class="testimonial-photo">
                                                <img src="assets/images/face3.jpg">
                                            </div>
                                            <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                                <strong>Hon. Ampelosa Tehulu</strong>
                                                <br><strong>Minister of Public Works, Infrastructure and Enviroment</strong>
                                                <br>Resposible for: Pubic Works, Infrastructure and Environment
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                
                                <div class="col-12 col-lg-6">
                                    <div class="mbr-testimonial align-center">
                                        <div class="panel-item">
                                            <div class="card-block">
                                                <div class="testimonial-photo">
                                                    <img src="assets/images/face3.jpg">
                                                </div>
                                                <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                                    <strong>Hon. Isaia Taape</strong>
                                                    <br><strong>Minister of Health and Social Welfare</strong>
                                                    <br>Repsonsible for: Health and Social Welfare
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="mbr-testimonial align-center">
                                            <div class="panel-item">
                                                <div class="card-block">
                                                    <div class="testimonial-photo">
                                                        <img src="assets/images/face3.jpg">
                                                    </div>
                                                    <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                                        <strong>Hon. Timi Melei</strong>
                                                        <br><strong>Minister of Education, Youths and Sports</strong>
                                                        <br>Repsonsible for: Education, Youths and Sports
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                        
                                        <div class="col-12 col-lg-6">
                                            <div class="mbr-testimonial align-center">
                                                <div class="panel-item">
                                                    <div class="card-block">
                                                        <div class="testimonial-photo">
                                                            <img src="assets/images/face3.jpg">
                                                        </div>
                                                        <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                                            <strong>Hon. Nielu Meisake</strong>
                                                            <br><strong>Minister of Transport, Energy and Tourism</strong>
                                                            <br>Repsonsible for: Transport, Energy and Tourism
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                            
            </div>
        </div>
</section>
<hr>

<section class="content2 cid-saBl8LyfSn" id="content2-4k">
    <div class="container-fluid">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-5"><strong>Permanent Secretaries - C.E.O's</strong></h4>
        </div>
    </div>
</section>        

<section class="testimonials5 cid-s9R3497Ow0" id="testimonials5-29">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="mbr-testimonial align-items">
                     <div class="panel-item">
                        <div class="card-block">
                            <div class="testimonial-photo">
                                <img src="assets/images/face3.jpg">
                            </div>
                            <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                <strong>Dr. Tapugao Falefou </strong>
                                <br><strong>Secretary to Government</strong>
                                <br>Office of the Prime Minister (OPM)
                            
                            </p>
                        </div>
                     </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="mbr-testimonial align-items">
                     <div class="panel-item">
                        <div class="card-block">
                            <div class="testimonial-photo">
                                <img src="assets/images/face3.jpg">
                            </div>
                            <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                <strong>Dr. Tufoua Panapa</strong>
                                <br><strong>Permanent Secretary - C.E.O</strong>
                                <br>Ministry of Education, Youths and Sports
                            
                            </p>
                        </div>
                     </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="mbr-testimonial align-items">
                     <div class="panel-item">
                        <div class="card-block">
                            <div class="testimonial-photo">
                                <img src="assets/images/face3.jpg">
                            </div>
                            <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                <strong>Mr. Faivatala Moreti</strong>
                                <br><strong>Permanent Secretary - C.E.O</strong>
                                <br>Ministry of Finance
                            
                            </p>
                        </div>
                     </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="mbr-testimonial align-items">
                     <div class="panel-item">
                        <div class="card-block">
                            <div class="testimonial-photo">
                                <img src="assets/images/face3.jpg">
                            </div>
                            <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                <strong>Mr. </strong>
                                <br><strong>Permanent Secretary - C.E.O</strong>
                                <br>Ministry of Fisheries and Trade
                            
                            </p>
                        </div>
                     </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="mbr-testimonial align-items">
                     <div class="panel-item">
                        <div class="card-block">
                            <div class="testimonial-photo">
                                <img src="assets/images/face3.jpg">
                            </div>
                            <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                <strong>Mr. </strong>
                                <br><strong>Permanent Secretary - C.E.O</strong>
                                <br>Ministry of Justice, Communication and Foreign Affairs
                            
                            </p>
                        </div>
                     </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="mbr-testimonial align-items">
                     <div class="panel-item">
                        <div class="card-block">
                            <div class="testimonial-photo">
                                <img src="assets/images/face3.jpg">
                            </div>
                            <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                <strong>Mr. Taufia </strong>
                                <br><strong>Permanent Secretary - C.E.O</strong>
                                <br>Ministry of Local Government and Agriculture
                            
                            </p>
                        </div>
                     </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="mbr-testimonial align-items">
                     <div class="panel-item">
                        <div class="card-block">
                            <div class="testimonial-photo">
                                <img src="assets/images/face3.jpg">
                            </div>
                            <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                <strong>Mr. </strong>
                                <br><strong>Permanent Secretary - C.E.O</strong>
                                <br>Ministry of Public Works, Infrastructure and Enviroment
                            
                            </p>
                        </div>
                     </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="mbr-testimonial align-items">
                     <div class="panel-item">
                        <div class="card-block">
                            <div class="testimonial-photo">
                                <img src="assets/images/face3.jpg">
                            </div>
                            <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                <strong>Mr. </strong>
                                <br><strong>Permanent Secretary - C.E.O</strong>
                                <br>Ministry of Health and Social Welfare
                            
                            </p>
                        </div>
                     </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="mbr-testimonial align-items">
                     <div class="panel-item">
                        <div class="card-block">
                            <div class="testimonial-photo">
                                <img src="assets/images/face3.jpg">
                            </div>
                            <p class="mbr-text mbr-fonts-style mbr-white display-7">
                                <strong>Mr. Avafoa Irata </strong>
                                <br><strong>Permanent Secretary - C.E.O</strong>
                                <br>Ministry of Transport, Energy and Tourism
                            
                            </p>
                        </div>
                     </div>
                </div>
            </div>

        </div>
    </div>        
</section>


@endsection