<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Video;
use Carbon\Traits\Timestamp;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth()->id();
        $user = User::find(Auth()->id());
        $dados = Video::select('videos.id', 'videos.nomeVideo', 'videos.vistoVideo', 'videos.user_id')
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            ->orWhere('ativo', '<>', 0)
                            ->where('user_id', '=', $id)->get();

        return view('home', compact('user'), ['dados'=>$dados]);
    }

    public function logado(){
        $id = Auth()->id();
        $user = User::find(Auth()->id());
        $user->id = 0;
        $dados = Video::select('videos.id', 'videos.nomeVideo', 'videos.vistoVideo', 'videos.user_id')
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            ->orWhere('ativo', '<>', 0)
                            ->where('user_id', '=', $id)->get();

        
        return view('home', compact('user'), ['dados'=>$dados]);
    }

    public function addVideo(Request $request){

        $id = Auth::id();
        $codVideo = $request->input('video');
        $temVideoIgual = Video::where('codigoVideo', $codVideo)->get();
        $firstVideo = DB::table('videos')->where('user_id', '=', $id)->get();
        $videoAtivo = Video::select('videos.id')
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            ->orWhere('ativo', '<>', 0)
                            ->where('user_id', '=', $id)->get();

        if(count($temVideoIgual) > 0){

            return 0;
        }

        if(count($videoAtivo) == 2){
           
            return 2;
        }

        if(count($firstVideo) == 0){
            $user = User::find(Auth()->id());            
            $user->limit = 2;
            $user->updated_at = new DateTime();
            $user->save();
        }

        $novo = new Video();
        $novo->nomeVideo = $request->input('nome');
        $novo->codigoVideo = $codVideo;
        $novo->vistoVideo = 0;
        $novo->ativo = true;
        $novo->contador = 1;
        $novo->created_at = new DateTime();
        $novo->updated_at = new DateTime();
        $novo->user_id = Auth::id();
        $novo->save();

        return 1; 
    }

    public function obter(){
        $userId = Auth::id();
        $videos = Video::where('user_id', '<>', $userId)->get();
        
        return json_encode($videos);
    }

}
