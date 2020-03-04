@extends('layouts.app')


@section('content')

@push('components') 
    <link href="{{ asset('css/ranking/ranking.css') }}" rel="stylesheet">
@endpush

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="rating-block">
                <h4>Average user rating</h4>
                <h2 class="bold padding-bottom-6">3.0 <small>/ 5</small></h2>
                <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="rating col-sm-4">
            <h4>Rating breakdown</h4>
    @for ($i = 5; $i > 0 ; $i--)
            <div class="pull-left">
                <div class="pull-left space">
                    <div class="ratingStar">{{ $i }} 
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="pull-left progressBar">
                    <div class="progress progressBarHeight">
                        {{-- <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5">
                        </div> --}}
        @if ($i == 5)
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
        @elseif($i == 4)
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
        @elseif($i == 3)
                        <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
        @elseif($i == 2)   
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
        @else
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
        @endif
                    </div>
                </div>
                <div class="pull-right">{{ $i }}</div>
            </div>
    @endfor
        </div>	
        <div class="col-sm-3">
            <div class="rating-block">
                <h5 class="rank">RANK</h5>
                <h2 class="bold padding-bottom-6 rank">1213</h2>
                <div class="rank">
                    <button type="button" class="btn btn-warning btn-grey btn-sm" aria-label="Align">
                        <i class="fa fa-star-o fa-2x rank" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>		
    </div>		
    <hr>	

    <div class="row msg">
        <div class="col-sm-12">
    @for($i = 0; $i < 5; $i++)
            <div class="review-block">
                <div class="row">
                    <div class="col-sm-2">
                        <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                        <div class="review-block-name"><a href="#">nktailor</a></div>
                        <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                    </div>
                    <div class="col-sm-10">
                        <div class="review-block-rate">
                            <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="review-block-title">this was nice in buy</div>
                        <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                    </div>
                </div>
            </div>
            <hr>
    @endfor
    </div>
</div>

@endsection