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
                                <li>@if(!empty($player->profile_picture))<img class="player-image" height="50"
                                                                              width="50"
                                                                              src="{{asset($player->profile_picture)}}"
                                                                              alt="">@endif {{$player->name}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{config('pubg.status.'.$team->status)}} &nbsp;
                        &nbsp; @if(auth()->user()->status ==1 && $team->status==0) <a
                                class="btn btn-success" href="{{route('pubg.accept',$team->id)}}" onclick="event.preventDefault();
                                                     document.getElementById('accept-team').submit();"><i
                                    class="fa fa-check-circle"></i> Activate</a>
                        <form id="accept-team" action="{{ route('pubg.accept',$team->id) }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                        &nbsp; &nbsp; <a class="btn btn-info" href="{{route('pubg.team_details',$team->id)}}"><i class="fa fa-eye"></i> View Details</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- The Close Button -->
        <span class="close">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01" width="400" height="600">

        <!-- Modal Caption (Image Text) -->
        <div id="caption"></div>
    </div>
@endsection
@section('custom_style')
    <style type="text/css">
        td ul li {
            padding-bottom: 10px;
        }

        /* Style the Image Used to Trigger the Modal */
        .player-image {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .player-image:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9); /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation - Zoom in the Modal */
        .modal-content, #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
@endsection
@section('custom_js')
    <script>
        $(document).ready(function () {
            // This WILL work because we are listening on the 'document',
            // for a click on an element with an ID of #test-element
            $(document).on("click", ".player-image", function () {
                var modal = document.getElementById("myModal");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                modal.style.display = "block";
                modalImg.src = this.src;

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    modal.style.display = "none";
                }
            });
        });
        // Get the modal

    </script>
@endsection
