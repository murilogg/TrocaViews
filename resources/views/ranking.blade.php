@extends('layouts.app')


@section('content')

@push('components') 
    
    <link href="{{ asset('css/ranking/ranking.css') }}" rel="stylesheet">
@endpush

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="rating-block">
                <h4>Average user rating</h4>
                <h2 class="bold padding-bottom-7">3.0 <small>/ 5</small></h2>
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
        <div class="rating col-sm-6">
            <h4>Rating breakdown</h4>
            <div class="pull-left">
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">5 <i class="fa fa-star" aria-hidden="true"></i></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:6px 0;">
                        {{-- <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5">
                        </div> --}}
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;">1</div>
            </div>
            <div class="pull-left">
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">4 <i class="fa fa-star" aria-hidden="true"></i></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:6px 0;">
                        {{-- <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                        </div> --}}
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;">1</div>
            </div>
            <div class="pull-left">
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">3 <i class="fa fa-star" aria-hidden="true"></i></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:6px 0;">
                        {{-- <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                        </div> --}}
                        <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;">0</div>
            </div>
            <div class="pull-left">
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">2 <i class="fa fa-star" aria-hidden="true"></i></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:6px 0;">
                        {{-- <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                        </div> --}}
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;">0</div>
            </div>
            <div class="pull-left">
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">1 <i class="fa fa-star" aria-hidden="true"></i></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:6px 0;">
                        {{-- <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                        </div> --}}
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;">0</div>
            </div>
        </div>			
    </div>		
    <hr>	

    <div class="row">
        <div class="col-sm-7">
            <div class="review-block">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                        <div class="review-block-name"><a href="#">nktailor</a></div>
                        <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="review-block-rate">
                            <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="review-block-title">this was nice in buy</div>
                        <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                        <div class="review-block-name"><a href="#">nktailor</a></div>
                        <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="review-block-rate">
                            <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="review-block-title">this was nice in buy</div>
                        <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                        <div class="review-block-name"><a href="#">nktailor</a></div>
                        <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="review-block-rate">
                            <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="review-block-title">this was nice in buy</div>
                        <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection