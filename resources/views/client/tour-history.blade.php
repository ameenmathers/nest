@extends('layouts.dashboard')

@section('content')

    <div class="col-lg-12">
        @include('notification')
        <div class="white_card card_height_100 mb_30 QA_section">
            <div class="white_card_header">

                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Tour History</h3>
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

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tours as $tour)
                            <tr>
                                <td>{{$tour->client->name}}</td>
                                <td>{{$tour->agent->name}}</td>
                                <td>{{ \Carbon\Carbon::parse($tour->date)->format('F j, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($tour->time)->format('g:i A') }}</td>

                                <td>{{$tour->tourProperty->name}}</td>
                                <td>{{$tour->tourProperty->district}}</td>
                                <td>{{$tour->payment_status}}</td>
                                <td>
                                    @if($tour->tour_status == 'accepted')
                                        <div style="text-align:center; background-color: lightgreen; border-radius: 10px; padding: 5px 0px;">Accepted</div>
                                    @elseif($tour->tour_status == 'cancelled')
                                        <div style="text-align:center; background-color: red; border-radius: 10px; padding: 5px 0px;">Cancelled</div>
                                    @elseif($tour->tour_status == 'pending')
                                        <div style="text-align:center; background-color: lightskyblue; border-radius: 10px; padding: 5px 0px;">Pending</div>
                                    @endif
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
