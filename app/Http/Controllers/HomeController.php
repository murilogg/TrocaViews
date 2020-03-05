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
    public function index()
    {
        $id = Auth()->id();
        $user = User::find(Auth()->id());
        $dados = Video::select('videos.id', 'videos.nameVideo', 'videos.viewVideo', 'videos.active', 
                        'videos.counterHr', 'videos.counterDay', DB::raw('now() as dataServidor'))
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            //->orWhere('ativo', '<>', 0)
                            ->where('user_id', '=', $id)
                            ->orderBy('videos.id')->get();

        return view('home', compact('user'), ['dados'=>$dados]);
    }

    public function logado(){
        $id = Auth()->id();
        $user = User::find(Auth()->id());
        $user->id = 0;
        $dados = Video::select('videos.id', 'videos.nameVideo', 'videos.viewVideo', 'videos.active', 
                        'videos.counterHr', 'videos.counterDay', DB::raw('now() as dataServidor'))
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            //->orWhere('ativo', '<>', 0)
                            ->where('user_id', '=', $id)
                            ->orderBy('videos.id')->get();

        return view('home', compact('user'), ['dados'=>$dados]);
    }

    public function addVideo(Request $request){

        $id = Auth::id();
        $user = User::find(Auth()->id()); 
        $codVideo = $request->input('video');
        $videoIgual = Video::where('videoId', $codVideo)->get();
        $firstVideo = DB::table('videos')->where('user_id', '=', $id)->get();
        $videoActive = Video::select('videos.active')
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            ->orWhere('active', '<>', 0)
                            ->where('user_id', '=', $id)->get();

        if(count($videoIgual) > 0){

            return 0;
        }

        if(count($firstVideo) == 0){           
            $user->limit = 2;
            $user->updated_at = now();
            $user->save();
        }

        if(count($videoActive) >= 2){
           
            return 2;
        }

        $novo = new Video();
        $novo->nameVideo = $request->input('nome');
        $novo->videoId = $codVideo;
        $novo->viewVideo = 0;
        $novo->active = true;
        $novo->counterHr = Carbon::now()->subHour();
        $novo->counterDay = Carbon::now();
        $novo->created_at = Carbon::now();
        $novo->updated_at = Carbon::now();
        $novo->user_id = Auth::id();
        $novo->save();

        return 1; 
    }

    public function obter(){
        $id = Auth::id();
        $record = DB::table('videos')
                            ->select('*')
                            ->where('active', '<>', 0)
                            ->where('videos.user_id', '<>', $id)
                            ->where('counterHr', '<', DB::raw('NOW() - INTERVAL 1 HOUR'))
                            ->get();

        return json_encode($record);
    }

    public function ativaDesativa($id){
        $video = Video::find($id);
        $videoActive = Video::select('videos.active')
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            ->orWhere('active', '<>', 0)
                            ->where('user_id', '=', $id)->get();
        
        if(count($videoActive) >= 2){

            return 0;
        }else if($video->active == false){
            $video->active = true;
            $video->save();
        }else{
            $video->active = false;
            $video->save();
        }
        
        return redirect('/troca');
    }

    public function store(Request $request){
        dd($request->file('photo'));
    }
}
