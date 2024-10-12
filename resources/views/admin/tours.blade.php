@extends('layouts.dashboard')

@section('content')

    <div class="col-lg-12">
        @include('notification')
        <div class="white_card card_height_100 mb_30 QA_section">
            <div class="white_card_header">

                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Tours</h3>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div class="QA_table table-responsive ">

                    <table class="table pt-0">
                        <thead>
                        <tr>
                            <th scope="col">Client</th>
                            <th scope="col">Agent</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Property</th>
                            <th scope="col">Location</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Tour Status</th>
                            <th scope="col">Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tours as $tour)
                            <tr>
                                <td>{{$tour->client->name}}</td>
                                <td>{{$tour->agent->name}}</td>
                                <td>{{$tour->date}}</td>
                                <td>{{$tour->time}}</td>
                                <td>{{$tour->tourProperty->name}}</td>
                                <td>{{$tour->tourProperty->district}}</td>
                                <td>{{$tour->payment_status}}</td>
                                <td>{{$tour->tour_status}}</td>
                                <td>{{$tour->created_at}}</td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
