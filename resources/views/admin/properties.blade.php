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

                            <th scope="col">NIN</th>
                            <th scope="col">Office Address</th>
                            <th scope="col">Home Address</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Company Contact</th>
                            <th scope="col">Date of Upload</th>
                            <th scope="col">Status of Property</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($properties as $property)
                            <tr>
                                <td> <img width="36" height="36" class="user_thumb" src="{{asset($property->image)}}" alt=""> </td>
                                <td>{{$property->name}}</td>

                                <td><img width="36" height="36" class="user_thumb" src="{{asset($property->nin)}}" alt=""> </td>
                                <td>{{$property->agent->office_address}}</td>
                                <td>{{$property->agent->home_address}}</td>
                                <td>{{$property->agent->company_name}}</td>
                                <td>{{$property->agent->company_contact}}</td>
                                <td> {{$property->created_at}}</td>
                                <td>
                                    @if(!$property->approved)
                                        <form action="{{ url('admin/approve-property/'. $property->pid) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="badge-success">Approved</div><br>

                                            <button type="submit" class="btn-danger btn-sm btn-rounded">
                                                Ban
                                            </button>

                                        </form>

                                    @else
                                        <form action="{{ url('admin/hide-property/'. $property->pid) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="badge-danger">Not Approved</div><br>

                                            <button type="submit" class="btn-info btn-sm btn-rounded">
                                                Approve
                                            </button>

                                        </form>

                                    @endif
                                </td>

                                <td>
                                    <form action="{{ url('admin/delete-property/'. $property->pid) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger btn-sm btn-rounded">
                                            Delete
                                        </button>
                                    </form><br>
{{--                                    <a href="{{ url('admin/property-detail/'. $property->pid) }}" class="btn-info btn-rounded btn-sm">View</a>--}}
{{--                                --}}
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
