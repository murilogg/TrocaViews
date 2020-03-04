<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Video;
use Carbon\Carbon;

class RankingController extends Controller
{
    public function index(){
        $id = Auth()->id();
        $user = User::find(Auth()->id());
        $user->id = 0;
        $dados = Video::select('videos.id', 'videos.nameVideo', 'videos.viewVideo', 'videos.active', 
                        'videos.counterHr', 'videos.counterDay', DB::raw('now() as dataServidor'))
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            //->orWhere('ativo', '<>', 0)
                            ->where('user_id', '=', $id)
                            ->orderBy('videos.id')->get();

        return view('ranking', compact('user'), ['dados'=>$dados]);
    }
}
