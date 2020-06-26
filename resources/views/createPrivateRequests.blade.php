@extends('layouts.hospital')

@section('css')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<style>
body{
    margin-top:20px;
    
}

.be-comment-block {
    margin-bottom: 50px !important;
    border: 1px solid #edeff2;
    border-radius: 2px;
    padding: 50px 70px;
    border:1px solid #ffffff;
}

.comments-title {
    font-size: 16px;
    color: #262626;
    margin-bottom: 15px;
    font-family: 'Conv_helveticaneuecyr-bold';
}

.be-img-comment {
    width: 60px;
    height: 60px;
    float: left;
    margin-bottom: 15px;
}

.be-ava-comment {
    width: 60px;
    height: 60px;
    border-radius: 50%;
}

.be-comment-content {
    margin-left: 80px;
}

.be-comment-content span {
    display: inline-block;
    width: 49%;
    margin-bottom: 15px;
}

.be-comment-name {
    font-size: 13px;
    font-family: 'Conv_helveticaneuecyr-bold';
}

.be-comment-content a {
    color: #383b43;
}

.be-comment-content span {
    display: inline-block;
    width: 49%;
    margin-bottom: 15px;
}

.be-comment-time {
    text-align: right;
}

.be-comment-time {
    font-size: 11px;
    color: #b4b7c1;
}

.be-comment-text {
    font-size: 13px;
    line-height: 18px;
    color: #7a8192;
    display: block;
    background: #f6f6f7;
    border: 1px solid #edeff2;
    padding: 15px 20px 20px 20px;
}

.form-group.fl_icon .icon {
    position: absolute;
    top: 1px;
    left: 16px;
    width: 48px;
    height: 48px;
    background: #f6f6f7;
    color: #b5b8c2;
    text-align: center;
    line-height: 50px;
    -webkit-border-top-left-radius: 2px;
    -webkit-border-bottom-left-radius: 2px;
    -moz-border-radius-topleft: 2px;
    -moz-border-radius-bottomleft: 2px;
    border-top-left-radius: 2px;
    border-bottom-left-radius: 2px;
}

.form-group .form-input {
    font-size: 16px;
    line-height: 50px;
    font-weight: 400;
    color: black;
    width: 100%;
    height: 50px;
    padding-left: 20px;
    padding-right: 20px;
    border: 1px solid lightslategray;
    border-radius: 3px;
}

.form-group .form-input:disabled {
    font-size: 13px;
    line-height: 50px;
    font-weight: 400;
    color: #b4b7c1;
    width: 100%;
    height: 50px;
    padding-left: 20px;
    padding-right: 20px;
    border: 1px solid #edeff2;
    border-radius: 3px;
}

    

.form-group.fl_icon .form-input {
    padding-left: 70px;
}

.form-group textarea.form-input {
    height: 150px;
}


</style>

@endsection

@section('content')
<section class="contact_area p_120">
    <div class="container">
        <div class="be-comment-block">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="section-top-border" style=" border: solid #ff8080; border-radius: 80px;padding :30px">
            <form action="{{ route('requests.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="mt-10">
                            <input type="number" name="amount" placeholder="Amount" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Amount'" required class="single-input" min="1">
                        </div>
                        <div class="mt-10">
                            <div class="form-group ">
                                 <input type="text"  class="form-input @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'">
                            </div>  
                        </div>
                        <div class="mt-10">									
                            <div class="form-group">
                                <textarea style="font-size:16px;" class="form-input" style="size:90px;" name="details" id="details"  placeholder="Details"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-sm-30 element-wrap">
                        <div class="single-element-widget">
                            <div class="switch-wrap justify-content-between">
                                <p><strong>Emergency</strong></p>
                                <div class="primary-switch">
                                    <input type="checkbox" id="default-switch" name="emergency">
                                    <label for="default-switch"></label>
                                </div>
                            </div>
                        </div>
                        @isset($hospitals)
                        <div class="default-select" id="default-select">
                            <h3 class="title_color">Select Hospital</h3>
                            <select required name="hospital">
                                <option value="None" selected="true" disabled>Select Hospital</option>
                                @foreach ($hospitals as $hospital)
                                @if ($hospital->name != Auth::guard('hospital')->user()->name && $hospital->is_active == 1)
                                <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div> 
                        @endisset
                        
                        <div class="default-select" id="default-select">
                            <h3 class="title_color">Blood Type</h3>
                            <select required name="blood">
                                <option value="None" selected="true" disabled>Blood Type</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div style="text-align: center; margin-top:100px">
                    <button type="submit" class="genric-btn success circle arrow">
                        Create
                    </button>
                </div>
                <input type="hidden" name="private" value="true">
            </form>
        </div>
        </div>
    </div>
</section>

@endsection

@section('js')

@endsection