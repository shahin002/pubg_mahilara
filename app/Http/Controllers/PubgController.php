<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function PHPSTORM_META\elementType;

class PubgController extends Controller
{
    public function index()
    {
        return view('welcome');

    }

    public function savePlayer(Request $request)
    {
        $attributes = [
            "player1name" => "Player Name",
            "player1id" => "Player Pubg Id",
            "player1mobile" => "Player Mobile Number",
            "player1fb" => "Player Facebook Id",
            "player1email" => "Player Email address",
            "player1password" => "Player Password",
            "player1picture" => "Player Picture",
            "player2name" => "Player Name",
            "player2id" => "Player Pubg Id",
            "player2mobile" => "Player Mobile Number",
            "player2fb" => "Player Facebook Id",
            "player2email" => "Player Email address",
            "player2password" => "Player Password",
            "player2picture" => "Player Picture",
            "team_name" => "Team Name",
            "payment_amount" => "Pament Amount",
            "payment_through" => "Tnx Id",
        ];
        $validator = Validator::make($request->all(), [
            "player1name" => ['required', 'string', 'max:255'],
            "player1id" => ['required', 'string', 'max:255', 'unique:users,pubg_id'],
            "player1mobile" => ['required', 'string', 'max:255', 'unique:users,mobile'],
            "player1fb" => ['required', 'string', 'max:255'],
            "player1email" => ['required', 'string', 'max:255', 'unique:users,email'],
            "player1password" => ['required', 'string', 'min:8', 'confirmed'],
            "player1picture" => ['image'],
            "player2name" => ['required', 'string', 'max:255'],
            "player2id" => ['required', 'string', 'max:255', 'unique:users,pubg_id'],
            "player2mobile" => ['required', 'string', 'max:255', 'unique:users,mobile'],
            "player2fb" => ['required', 'string', 'max:255'],
            "player2email" => ['required', 'string', 'max:255', 'unique:users,email'],
            "player2password" => ['required', 'string', 'min:8', 'confirmed'],
            "player2picture" => ['image'],
            "team_name" => ['required', 'string', 'max:255'],
            "payment_amount" => ['required', 'integer'],
            "payment_through" => ['required', 'string', 'max:255'],
        ], [], $attributes);
        $validator->validate();
        try {

            DB::transaction(function () use ($request) {
                $team = new Team();
                $team->name = $request->team_name;
                $team->payment_amount = $request->payment_amount;
                $team->payment_reference = $request->payment_through;
                $team->save();
                $user1 = new User();
                $user1->name = $request->player1name;
                $user1->email = $request->player1email;
                $user1->mobile = $request->player1mobile;
                $user1->pubg_id = $request->player1id;
                $user1->facebook_id = $request->player1fb;
                $user1->gendar = $request->player1gendar;
                $user1->password = bcrypt($request->player1password);
                $user1->team_id = $team->id;

                if ($request->hasFile('player1picture')){
                    $user1->profile_picture=$this->imageUpload($request->player1picture);
                }
                $user1->save();

                $user2 = new User();
                $user2->name = $request->player2name;
                $user2->email = $request->player2email;
                $user2->mobile = $request->player2mobile;
                $user2->pubg_id = $request->player2id;
                $user2->facebook_id = $request->player2fb;
                $user2->gendar = $request->player2gendar;
                $user2->password = bcrypt($request->player2password);
                $user2->team_id = $team->id;

                if ($request->hasFile('player2picture')){
                    $user2->profile_picture=$this->imageUpload($request->player2picture);
                }
                $user2->save();
            });
        } catch (\Exception $e) {
            return back()->with('errMsg','Something went wrong, Please Try again');
        }
        return redirect(route('pubg.login'))->with('successMsg', 'You are Successfully registerred');

    }

    public function home()
    {
        $data=array();
        $data['teams']=Team::with('players')->get();
        return view('home')->with($data);
    }

    public function rules()
    {
        return view('rules');
    }

    public function accept(Request $request,$id)
    {
        $team=Team::find($id);
        if ($team){
            $team->status=1;
            $team->save();
            return redirect(route('pubg.home'))->with('successMsg','Team activated successfully.');
        }else{
            return back()->with('errMsg','Wrong Team Selected');
        }
    }

    private function imageUpload($media){
        /*file upload start*/
        $path = "assets/img/players";
        $name=Str::random(4).time().".".$media->getClientOriginalExtension();
        $media->move(public_path($path),$name);
        /*file upload end*/
        return $path.'/'.$name;
    }
}
