@extends('layouts.hospital')

@section('content')
<div class="section-top-border">
    <form action="{{ route('requests.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <h3 class="mb-30 title_color">Create Reauest</h3>
                <div class="mt-10">
                    <input type="number" name="amount" placeholder="Amount" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Amount'" required class="single-input" min="1">
                </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-sm-30 element-wrap">
                <div class="single-element-widget">
                    <h3 class="mb-30 title_color">Switches</h3>
                    <div class="switch-wrap d-flex justify-content-between">
                        <p><strong>Emergency</strong></p>
                        <div class="primary-switch">
                            <input type="checkbox" id="default-switch" name="emergency">
                            <label for="default-switch"></label>
                        </div>
                    </div>
                </div>
                <h3 class="mb-30 title_color">Blood Type</h3>
                <div class="default-select" id="default-select">
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
        <button type="submit" class="genric-btn success-border circle arrow">
            Create
        </button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection