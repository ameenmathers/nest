@extends('layouts.dashboard')

@section('content')

    <div class="col-lg-12">
        @include('notification')
        <div class="white_card card_height_100 mb_30 QA_section">
            <div class="white_card_header">

                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Clients</h3>
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
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td> <img width="36" height="36" class="user_thumb" src="{{asset($client->image)}}" alt=""> </td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->email}}</td>
                                <td> {{$client->created_at}}</td>
                                <td> <form action="{{ url('admin/delete-user/'. $client->uid) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger btn-sm btn-rounded">
                                            Delete
                                        </button>
                                    </form></td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
