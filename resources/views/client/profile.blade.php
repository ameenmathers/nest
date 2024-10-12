@extends('layouts.dashboard')

@section('content')

    <div class="col-lg-12">
        <div class="white_card  mb_30">
            @include('notification')
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Profile</h3>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div class="table-responsive">
                    <table class="table bayer_table m-0">
                        <tbody>
                        <tr style="border: hidden;">

                            <form action="{{ route('agent-update-profile') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <td>
                                    <img class="byder_thumb" src="{{asset($user->image)}}" alt=""><br><br>
                                    <div class="payment_gatway text-start">
                                        <label>Name</label>
                                        <input class="form-control" type="text" name="name" value="{{$user->name}}" placeholder="{{$user->name}}"><br>
                                        <label>Phone</label>
                                        <input class="form-control" type="text" name="phone" value="{{$user->phone}}" placeholder="{{$user->phone}}">

                                    </div>
                                    <br>
                                    <button class="btn-primary btn" type="submit">Update</button>
                                </td>



                            </form>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
