@extends('layouts.hospital')

@section('css')


@endsection

@section('content')
<section class="contact_area p_120">
    <div class="container">
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
                    </div>
                    @isset($hospitals)
                    <div class="default-select" id="default-select">
                        <h3 class="mb-30 title_color">Select Hospital</h3>
                        <select required name="hospital">
                            <option value="None" selected="true" disabled>Select Hospital</option>
                            @foreach ($hospitals as $hospital)
                            @if ($hospital->name != Auth::guard('hospital')->user()->name)
                            <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    @foreach ($hospitals as $hospital)
                    @endforeach

                    @endisset
                    <div class="col-lg-3 col-md-4 mt-sm-30 element-wrap">
                        <div class="single-element-widget">
                            <div class="switch-wrap d-flex justify-content-between">
                                <p><strong>Emergency</strong></p>
                                <div class="primary-switch">
                                    <input type="checkbox" id="default-switch" name="emergency">
                                    <label for="default-switch"></label>
                                </div>
                            </div>
                        </div>

                        <div class="default-select" id="default-select">
                            <h3 class="mb-30 title_color">Blood Type</h3>
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
</section>

@endsection

@section('js')

@endsection