@extends('layouts.hospital')

@section('content')
    <section class="contact_area p_120">
        <div class="container">
            <div class="section-top-border" style=" border: solid #ff8080; border-radius: 80px;padding :30px">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <!-- <div class="row"> -->
                <div class="comment-form">
                    <h4>Donate Now </h4>
                  
                    <form action="{{ route('donations.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group form-inline">
                            <label for="name" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Donor Name : ') }}</strong></label>
                            <div class="form-group col-lg-2 col-md-2 name">
                                <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" readonly onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Blood Type : ') }}</strong></label>
                            <div class="form-group col-lg-2 col-md-2 name">
                                  <input type="text" class="form-control" id="name" value="{{ $request->blood_type }}" readonly onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Hospital : ') }}</strong></label>
                            <div class="form-group col-lg-2 col-md-2 name">
                                <input type="text" class="form-control" id="name" value="{{ $request->hospital->name}}" readonly onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            </div>
                            
                        </div>

                        <div class="form-group form-inline">
                            <label style="margin-left:-1%;" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Amount : ') }}</strong></label>
                            <div class="form-group col-lg-10 col-md-10 ">
                                 <input style="border-style: solid;border-width: thin;" type="number" required class="form-control" 
                                 id="donations_amount" name="donations_amount" 
                                 value="{{ old('donations_amount') }}" autocomplete="donations_amount" 
                                 placeholder="Donation Amount" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Donation Amount'">
                            </div>  
                        </div>
                        {{-- <div class="form-group form-inline">
                            <label  class="col-md-2 col-form-label text-md-right"><strong>{{ __('Comments : ') }}</strong></label>
                            <div class="form-group col-lg-10 col-md-10 ">
                            </div>  
                        </div>
                        <div class="form-group">
                            <textarea style="width:95%;margin-left: 5%"  class="form-control mb-8" rows="5" id="comments" name="comments" placeholder="Comments" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
                                ></textarea>
                        </div> --}}
                        @if (Session::has('succes'))
                                 <div class="alert alert-success">{{ Session::get('succes') }}</div>
                        @endif
                        <input type="hidden" name="request_id" value={{$request->id}}>
                        <input type="hidden" name="blood_type" value={{$request->blood_type}}>
                        <button type="submit" style="margin-left: 60%" class="primary-btn submit_btn">Donate</button>
                    </form>
                </div>
            <!-- </div> -->
            </div>
        </div>
    </section>
@endsection
