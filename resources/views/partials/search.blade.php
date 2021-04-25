 

{{-- <div class="advance-search ">
                    <form action="{{ route('search') }}" method="GET">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="search" value="{{ old('search') }}" class="form-control" placeholder="Search Gov" />
                                <p class="help-block"></p>
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>


                            <div class="form-group col-md-4">
                                <button type="submit"
                                        class="btn btn-primary">
                                        Search Now
                                </button>
                            </div>
                        </div>

                </form>
</div>
</div> --}}
 
 
    
<section class="form1 solutionm4_form1 cid-svcYTSiRaN" id="form1-d">
    
    
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto mbr-form" >
                    <!--Formbuilder Form-->
                    <form action="{{ route('search') }}" method="GET" class="mbr-form form-with-styler" data-form-title="Search">
                     
                        <div class="dragArea form-row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 class="mbr-bold mbr-fonts-style display-2"></h4>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="pb-4 mbr-fonts-style display-7"></p>
                            </div>
                            <div data-for="name" class="col form-group">
                                <input type="text" name="search" placeholder="Search Gov.tv" data-form-field="search" class="form-control display-7" value="" id="search">
                            </div>
                          
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary display-4"><span class="p-2 mbr-iconfont mbri-search"></span></button>
                            </div>
                        </div>
                    </form>
                    <!--Formbuilder Form-->
                </div>
            </div>
        </div>
    </section>