@extends('layouts.app')

@section('content')
    <h1 class="display-3 text-center my-4">Mahilara <span class="display-2 text-danger">PUBG</span> Tournament</h1>
    <form action="{{route('pubg.register')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 row">

            <div class="col-md-6 float-left">
                <h2>Player 1 (Leader) Details</h2>
                <div class="form-group">
                    <label for="player1name">Name</label>
                    <input type="text" class="form-control @error('player1name') is-invalid @enderror"
                           name="player1name" value="{{ old('player1name') }}" id="player1name"
                           placeholder="Player real name">
                    @error('player1name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="player1id">PUBG ID Name</label>
                    <input type="text" class="form-control @error('player1id') is-invalid @enderror" id="player1id"
                           name="player1id" value="{{old('player1id')}}" placeholder="Player PUBG ID name">
                    @error('player1id')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="player1mobile">Mobile</label>
                    <input type="text" class="form-control @error('player1mobile') is-invalid @enderror"
                           id="player1mobile" name="player1mobile" value="{{old('player1mobile')}}"
                           placeholder="Player Mobile Number">
                    @error('player1mobile')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="player1fb">Facebook Id Link</label>
                    <input type="text" class="form-control @error('player1fb') is-invalid @enderror" id="player1fb"
                           name="player1fb" value="{{old('player1fb')}}" placeholder="Player Facebook Id link">
                    @error('player1fb')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="player1email">Email</label>
                    <input type="text" class="form-control @error('player1email') is-invalid @enderror"
                           id="player1email"
                           name="player1email" value="{{old('player1email')}}" placeholder="Player Facebook Id link">
                    @error('player1email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Gendar: &nbsp;</label>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input name="player1gendar" type="radio" class="form-check-input" checked value="1">
                            Male</label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input name="player1gendar" type="radio" class="form-check-input" value="2">
                            Female</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="player1password">{{ __('Password') }}</label>

                    <input id="player1password" type="password" placeholder="Enter Player 1 Password"
                           class="form-control @error('player1password') is-invalid @enderror" name="player1password"
                           required autocomplete="new-password">

                    @error('player1password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="player1password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="player1password-confirm" placeholder="Confirm Player 1 Password" type="password"
                           class="form-control" name="player1password_confirmation" required
                           autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="player1picture">Picture</label>
                    <input type="file" class="form-control-file  @error('player1picture') is-invalid @enderror"
                           id="player1picture" name="player1picture">
                    @error('player1picture')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 float-left">
                <h2>Player 2 Details</h2>
                <div class="form-group">
                    <label for="player2name">Name</label>
                    <input type="text" class="form-control @error('player2name') is-invalid @enderror" id="player2name"
                           name="player2name" value="{{old('player2name')}}" placeholder="Player real name">
                    @error('player2name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="player2id">PUBG ID Name</label>
                    <input type="text" class="form-control @error('player2id') is-invalid @enderror" id="player2id"
                           name="player2id" value="{{old('player2id')}}" placeholder="Player PUBG ID name">
                    @error('player2id')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="player2mobile">Mobile</label>
                    <input type="text" class="form-control @error('player2mobile') is-invalid @enderror"
                           id="player2mobile" value="{{old('player2mobile')}}" name="player2mobile"
                           placeholder="Player Mobile Number">
                    @error('player2mobile')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="player2fb">Facebook Id Link</label>
                    <input type="text" class="form-control @error('player2fb') is-invalid @enderror" id="player2fb"
                           name="player2fb" value="{{old('player2fb')}}" placeholder="Player Facebook Id link">
                    @error('player2fb')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="player2email">Email</label>
                    <input type="text" class="form-control @error('player2email') is-invalid @enderror"
                           id="player2email"
                           name="player2email" value="{{old('player2email')}}" placeholder="Player Facebook Id link">
                    @error('player2email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Gendar: &nbsp;</label>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input name="player2gendar" type="radio" class="form-check-input" checked value="1">
                            Male</label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input name="player2gendar" type="radio" class="form-check-input" value="2">Female
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="player2password">{{ __('Password') }}</label>

                    <input id="player2password" type="password" placeholder="Enter Player 2 Password"
                           class="form-control @error('player2password') is-invalid @enderror" name="player2password"
                           required autocomplete="new-password">

                    @error('player2password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="player2password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="player2password-confirm" placeholder="Confirm Player 2 Password" type="password"
                           class="form-control" name="player2password_confirmation" required
                           autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="player2picture">Picture</label>
                    <input type="file" class="form-control-file  @error('player2picture') is-invalid @enderror"
                           id="player2picture" name="player2picture">
                    @error('player2picture')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <hr>
        <div class="col-md-12">
            <h2>Team Details</h2>
            <div class="form-group">
                <label for="team-name">Team Name</label>
                <input type="text" class="form-control @error('team_name') is-invalid @enderror" id="team-name"
                       name="team_name" value="{{old('team_name')}}" placeholder="Team Name">
                @error('team_name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <hr>
        <div class="col-md-12">
            <h2>Payment Details</h2>
            <div class="form-group">
                <label for="payment-amount">Amount</label>
                <input type="number" class="form-control @error('payment_amount') is-invalid @enderror"
                       id="payment-amount" name="payment_amount" value="{{old('payment_amount')}}"
                       placeholder="Payment Amount">
                @error('payment_amount')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="payment-through">Tnx Id/ Person Name</label>
                <input type="text" class="form-control @error('payment_through') is-invalid @enderror"
                       id="payment-through" name="payment_through" value="{{old('payment_through')}}"
                       placeholder="Tnx Id/ Person Name">
                @error('payment_through')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <hr>
        <div class="col-md-12">
            <h2>Contact Information</h2>
            <div class="row">
                <div class="col-md-6 float-left">
                    <h4>Md. Saiful Islam (Sagar)</h4>
                    <ul>
                        <li>Mobile: 01703662756</li>
                        <li>Facebook: <a href="https://www.facebook.com">www.facebook.com</a></li>
                        <li>Email: lpop08783@gmail.com</li>
                    </ul>
                </div>
                <div class="col-md-6 float-left">
                    <h4>Md. Hafizul Islam</h4>
                    <ul>
                        <li>Mobile: 01905570797</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
