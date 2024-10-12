@extends('layouts.dashboard')

@section('content')

    <div class="col-lg-12">
        @include('notification')
        <div class="white_card card_height_100 mb_30 QA_section">
            <div class="white_card_header">

                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Properties</h3>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div class="QA_table table-responsive ">

                    <table class="table pt-0">
                        <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Approval</th>
                            <th scope="col">Location</th>
                            <th scope="col">Type</th>
                            <th scope="col">Size</th>
                            <th scope="col">Bathrooms</th>
                            <th scope="col">Bedrooms</th>
                            <th scope="col">Parking Space</th>
                            <th scope="col">Date</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($properties as $property)
                            <tr>
                                <td> <img width="36" height="36" class="user_thumb" src="{{asset($property->thumbnail)}}" alt=""> </td>
                                <td>{{$property->name}}</td>
                                <td>
                                    @if($property->approved)
                                        <div style="padding-left: 5px; padding-right: 5px; border-radius: 10px;" class="btn-primary">Approved</div>
                                    @else
                                        <div style="padding-left: 5px; padding-right: 5px; border-radius: 10px;" class="btn-info">Pending</div>
                                    @endif
                                </td>
                                <td>{{$property->district}}</td>
                                <td>{{$property->type}}</td>
                                <td>{{$property->size}}</td>
                                <td>{{$property->bathroom}}</td>
                                <td>{{$property->bedroom}}</td>
                                <td>{{$property->parking_space}}</td>
                                <td> {{$property->created_at}}</td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
