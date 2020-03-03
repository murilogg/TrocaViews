<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Video;
use Carbon\Carbon;

class RankingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $id = Auth()->id();
        $data = Carbon::now();
        $user = User::find(Auth()->id());
        $dados = Video::select('videos.id', 'videos.nomeVideo', 'videos.vistoVideo', 'videos.ativo', 
                        'videos.contadorHr', 'videos.contadorDia', DB::raw('now() as dataServidor'))
                            ->join('users', 'users.id', '=', 'videos.user_id')
                            //->orWhere('ativo', '<>', 0)
                            ->where('user_id', '=', $id)
                            ->orderBy('videos.id')->get();

        return view('ranking', compact('user', 'data'), ['dados'=>$dados]);
    }
}
