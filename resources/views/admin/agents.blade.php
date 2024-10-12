@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        @include('notification')
        <div class="white_card card_height_100 mb_30 QA_section">
            <div class="white_card_header">

                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Agents</h3>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div class="QA_table table-responsive ">

                    <table class="table pt-0">
                        <thead>
                        <tr>
                            <th scope="col">Profile</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">NIN</th>
                            <th scope="col">Office Address</th>
                            <th scope="col">Home Address</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Company Contact</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($agents as $agent)
                            <tr>
                                <td> <img width="36" height="36" class="user_thumb" src="{{asset($agent->image)}}" alt=""> </td>
                                <td>{{$agent->name}}</td>
                                <td>{{$agent->phone}}</td>
                                <td>{{$agent->email}}</td>
                                <td><img width="36" height="36" class="user_thumb" src="{{asset($agent->nin)}}" alt=""> </td>
                                <td>{{$agent->agentUser->office_address}}</td>
                                <td>{{$agent->agentUser->home_address}}</td>
                                <td>{{$agent->agentUser->company_name}}</td>
                                <td>{{$agent->agentUser->company_contact}}</td>
                                <td> {{$agent->created_at}}</td>
                                <td>
                                    @if($agent->approved)
                                        <form action="{{ url('admin/approved-agent/'. $agent->uid) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="badge-success">Approved</div><br>

                                            <button type="submit" class="btn-danger btn-sm btn-rounded">
                                                Ban Agent
                                            </button>

                                        </form>

                                    @else
                                        <form action="{{ url('admin/ban-agent/'. $agent->uid) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="badge-danger">Not Approved</div>

                                            <button type="submit" class="btn-primary btn-sm btn-rounded">
                                                Approve Agent
                                            </button>

                                        </form>

                                    @endif
                                </td>

                                <td>
                                    <form action="{{ url('admin/delete-user/'. $agent->uid) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger btn-sm btn-rounded">
                                            Delete
                                        </button>
                                    </form>
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
