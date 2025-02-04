<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Video;
use App\Ranking;
use Carbon\Carbon;

class RankingController extends Controller
{
    public function index(){
        $id = Auth()->id();
        $user = User::find(Auth()->id());
        $user->id = 0;
        $name = Explode(" ",$user->name);
        $user->name = $name[0];
        $dados = Video::select('videos.id', 'videos.nameVideo', 'videos.viewVideo', 'videos.active', 
                        'videos.counterHr', 'videos.counterDay', DB::raw('now() as dataServidor'))
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            //->orWhere('ativo', '<>', 0)
                            ->where('user_id', '=', $id)
                            ->orderBy('videos.id')->get();

        return view('ranking', compact('user'), ['dados'=>$dados]);
    }

    
    public function comment(Request $request){
        $idVisitor = Auth()->id();
        $ranking = $request->input('ranking');
        $idVideo = $request->input('idVideo');
        $comment = $request->input('comment');

        $result = Ranking::select('*')
                            ->join($idVisitor, '=', 'rankings.visitor_id')
                            ->join($idVideo, '=', 'rankings.video_id')
                            ->get();
        if(isset($result)){
            $idRanking = $result->id;
            $data = Ranking::find($idRanking);
            $data->qtdViewVisitor += 1;
            $data->counter = DB::raw('now()');
            $data->save();

            dd($data);
        }else{
            $ranking = new Ranking();
            $ranking->qtdViewVisitor += 1;
            $ranking->msgVisitor = $comment;
            $ranking->ranking = $ranking;
        }
    }
}
