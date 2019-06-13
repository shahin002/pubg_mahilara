@extends('layouts.app')

@section('content')
    <h1 class="display-3 text-center my-4">Mahilara <span class="display-2 text-danger">PUBG</span> Tournament</h1>
    <div class="col-md-12 row">

        <div class="col-md-6 float-left">
            <h2>Player 1 (Leader) Details</h2>
        </div>
        <div class="col-md-6 float-left">
            <h2>Player 2 Details</h2>
        </div>
        @foreach($team->players as $player)
            <div class="col-md-6 float-left">
                <div class="form-group">
                    <label for="player1name"><b>Name: </b>{{$player->name}}</label>
                </div>
                <div class="form-group">
                    <label for="player1id"><b>PUBG ID Name: </b>{{$player->pubg_id}}</label>
                </div>
                <div class="form-group">
                    <label for="player1mobile"><b>Mobile:</b> {{$player->mobile}}</label>
                </div>
                <div class="form-group">
                    <label for="player1fb"><b>Facebook Id Link: </b>{{$player->facebook_id}}</label>
                </div>
                <div class="form-group">
                    <label for="player1email"><b>Email: </b>{{$player->email}}</label>
                </div>
                <div class="form-group">
                    <label><b>Gendar: </b>{{config('pubg.gendar.'.$player->gendar)}}</label>
                </div>
                <div class="form-group">
                    <label for="player1picture"><b>Picture: </b></label>
                    <img src="{{asset($player->profile_picture)}}" height="100" width="100" alt="">

                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="col-md-12">
        <h2>Team Details</h2>
        <div class="form-group">
            <label for="team-name"><b>Team Name: </b>{{$team->name}}</label>
        </div>
    </div>
    <hr>
    <div class="col-md-12">
        <h2>Payment Details</h2>
        <div class="form-group">
            <label for="payment-amount"><b>Amount: </b>{{$team->payment_amount}}</label>
        </div>
        <div class="form-group">
            <label for="payment-through"><b>Tnx Id/ Person Name: </b>{{$team->payment_reference}}</label>
        </div>
        <div class="form-group">
            <label for="payment-through"><b>Status: </b>{{config('pubg.status.'.$team->status)}}</label>
        </div>
    </div>
    <hr>
@endsection
