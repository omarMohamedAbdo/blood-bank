@extends('layouts.hospital')

@section('content')
<section class="contact_area p_120">
    <div class="container">
        <table class="table">
            <thead class="table-danger">
                <tr>
                    <th scope="col">Blood Type</th>
                    <th scope="col">In Stock</th>
                    <th scope="col">Needed Amount</th>
                    <th scope="col">Shortage/Surplus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A</td>
                    <td>{{$hospital->type_A_inventory}}</td>
                    <td>{{$hospital->type_A_needed}}</td>
                    <td>{{$hospital->type_A_inventory - $hospital->type_A_needed}}</td>
                </tr>
                <tr>
                    <td>B</td>
                    <td>{{$hospital->type_B_inventory}}</td>
                    <td>{{$hospital->type_B_needed}}</td>
                    <td>{{$hospital->type_B_inventory - $hospital->type_B_needed}}</td>
                </tr>
                <tr>
                    <td>AB</td>
                    <td>{{$hospital->type_AB_inventory}}</td>
                    <td>{{$hospital->type_AB_needed}}</td>
                    <td>{{$hospital->type_AB_inventory - $hospital->type_AB_needed}}</td>
                </tr>
                <tr>
                    <td>O</td>
                    <td>{{$hospital->type_O_inventory}}</td>
                    <td>{{$hospital->type_O_needed}}</td>
                    <td>{{$hospital->type_O_inventory - $hospital->type_O_needed}}</td>
                </tr>
            </tbody>
        </table>
        <div style="text-align: center;">
            <a href="{{route('inventoryedit')}}" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Update Inventory</a>
        </div>
    </div>
</section>
@endsection