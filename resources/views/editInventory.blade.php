@extends('layouts.hospital')

@section('content')
<section class="contact_area p_120">
    <div class="container">
        <div style="text-align: center;">
            <h1><span class="badge badge-danger">Update Inventory</span></h1>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ url('hospital/inventoryupdate')}}">
            @csrf
            @method('PUT')


            <!-- instock amount -->

            <div class="form-group">
                <label for="typeAstock">Type A Stock</label>
                <input type="number" class="form-control" name="typeAstock" min="0" required value="{{$hospital->type_A_inventory}}">
            </div>
            <div class="form-group">
                <label for="typeBstock">Type B Stock</label>
                <input type="number" class="form-control" name="typeBstock" min="0" required value="{{$hospital->type_B_inventory}}">
            </div>
            <div class="form-group">
                <label for="typeABstock">Type AB Stock</label>
                <input type="number" class="form-control" name="typeABstock" min="0" required value="{{$hospital->type_AB_inventory}}">
            </div>
            <div class="form-group">
                <label for="typeOstock">Type O Stock</label>
                <input type="number" class="form-control" name="typeOstock" min="0" required value="{{$hospital->type_O_inventory}}">
            </div>

            <!-- needed amount -->

            <div class="form-group">
                <label for="typeAneeded">Type A Needed</label>
                <input type="number" class="form-control" name="typeAneeded" min="0" required value="{{$hospital->type_A_needed}}">
            </div>
            <div class="form-group">
                <label for="typeBneeded">Type B Needed</label>
                <input type="number" class="form-control" name="typeBneeded" min="0" required value="{{$hospital->type_B_needed}}">
            </div>
            <div class="form-group">
                <label for="typeABneeded">Type AB Needed</label>
                <input type="number" class="form-control" name="typeABneeded" min="0" required value="{{$hospital->type_AB_needed}}">
            </div>
            <div class="form-group">
                <label for="typeOneeded">Type O Needed</label>
                <input type="number" class="form-control" name="typeOneeded" min="0" required value="{{$hospital->type_O_needed}}">
            </div>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</section>
@endsection