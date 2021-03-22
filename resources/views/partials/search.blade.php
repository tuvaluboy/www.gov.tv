<div class="container">

<div class="advance-search ">
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
</div>
