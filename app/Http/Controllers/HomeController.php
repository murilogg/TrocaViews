<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Video;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(Auth()->id());
        return view('home', compact('user'));
    }

    public function logado(){
        $user = User::find(Auth()->id());
        $user->id = 0;
        return view('home', compact('user'));
    }

    public function addVideo(Request $request){

        $codVideo = $request->input('video');

        $userId = Auth::id();
        $videos = Video::where('user_id', $userId)->get();

        foreach($videos as $v){
            if($v->codigoVideo == $codVideo){

                return 0;
            }
        }

        $novo = new Video();
        $novo->codigoVideo = $codVideo;
        $novo->created_at = new DateTime();
        $novo->updated_at = new DateTime();
        $novo->user_id = Auth()->id();
        $novo->save();

        return $videos; 
    }

    public function obter(){
        $todos = Video::all();

        return json_encode($todos);
    }

    public function lista(){
        $todos = Video;

    }
}
