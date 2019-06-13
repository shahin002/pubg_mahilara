@extends('layouts.app')

@section('content')
    <h1 class="display-3 text-center my-4">Mahilara <span class="display-2 text-danger">PUBG</span> Tournament</h1>
    <h1 class="display-4 text-center ">Team List</h1>

    <div class="row justify-content-center">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Team Name</th>
                <th scope="col">Player Names</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teams as $key=>$team)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$team->name}}</td>
                    <td>
                        <ul>
                            @foreach($team->players as $player)
                                <li>{{$player->name}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{config('pubg.status.'.$team->status)}} @if(auth()->user()->status ==1 && $team->status==0) <a
                                class="btn btn-success" href="{{route('pubg.accept',$team->id)}}" onclick="event.preventDefault();
                                                     document.getElementById('accept-team').submit();">Activate<i
                                    class="fa fa-check-circle"></i></a>
                        <form id="accept-team" action="{{ route('pubg.accept',$team->id) }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
