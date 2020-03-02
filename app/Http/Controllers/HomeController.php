<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon;
use App\User;
use App\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth()->id();
        $data = Carbon::now();
        $user = User::find(Auth()->id());
        $dados = Video::select('videos.id', 'videos.nomeVideo', 'videos.vistoVideo', 'videos.ativo', 
                        'videos.contadorHr', 'videos.contadorDia', DB::raw('now() as dataServidor'))
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            //->orWhere('ativo', '<>', 0)
                            ->where('user_id', '=', $id)
                            ->orderBy('videos.id')->get();

        return view('home', compact('user', 'data'), ['dados'=>$dados]);
    }

    public function logado(){
        $id = Auth()->id();
        $data = Carbon::now();
        $user = User::find(Auth()->id());
        $user->id = 0;
        $dados = Video::select('videos.id', 'videos.nomeVideo', 'videos.vistoVideo', 'videos.ativo', 
                        'videos.contadorHr', 'videos.contadorDia', DB::raw('now() as dataServidor'))
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            //->orWhere('ativo', '<>', 0)
                            ->where('user_id', '=', $id)
                            ->orderBy('videos.id')->get();

        
        return view('home', compact('user', 'data'), ['dados'=>$dados]);
    }

    public function addVideo(Request $request){

        $id = Auth::id();
        $user = User::find(Auth()->id()); 
        $codVideo = $request->input('video');
        $temVideoIgual = Video::where('videoId', $codVideo)->get();
        $firstVideo = DB::table('videos')->where('user_id', '=', $id)->get();
        $videoAtivo = Video::select('videos.ativo')
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            ->orWhere('ativo', '<>', 0)
                            ->where('user_id', '=', $id)->get();

        if(count($temVideoIgual) > 0){

            return 0;
        }

        if(count($firstVideo) == 0){           
            $user->limit = 2;
            $user->updated_at = now();
            $user->save();
        }

        if(count($videoAtivo) >= 2){
           
            return 2;
        }

        $novo = new Video();
        $novo->nomeVideo = $request->input('nome');
        $novo->videoId = $codVideo;
        $novo->vistoVideo = 0;
        $novo->ativo = true;
        $novo->contadorHr = Carbon::now()->subHour();
        $novo->contadorDia = Carbon::now();
        $novo->created_at = Carbon::now();
        $novo->updated_at = Carbon::now();
        $novo->user_id = Auth::id();
        $novo->save();

        return 1; 
    }

    public function obter(){
        $record = DB::table('videos')
                            ->select("*")
                            ->where("ativo", "<>", 0)
                            ->where('contadorHr', '<', DB::raw('NOW() - INTERVAL 1 HOUR'))
                            ->get();

        return json_encode($record);
    }

    public function ativaDesativa($id){
        $video = Video::find($id);
        $videoAtivo = Video::select('videos.ativo')
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            ->orWhere('ativo', '<>', 0)
                            ->where('user_id', '=', $id)->get();
        
        if(count($videoAtivo) >= 2){

            return 0;
        }else if($video->ativo == false){
            $video->ativo = true;
            $video->save();
        }else{
            $video->ativo = false;
            $video->save();
        }
        
        return redirect('/troca');
    }
}
