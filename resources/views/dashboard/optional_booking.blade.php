@extends('dashboard.layouts')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> {{ __('Home') }}</a></li>
        <li class="active">{{ __('Dashboard') }}</li>
    </ol>
@endsection

@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-briefcase"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('Total Room') }}</span>
                        <span class="info-box-number">{{ number_format(\App\Room::all()->count()) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-calendar-check-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('Total Booking') }}</span>
                        <span class="info-box-number">{{ number_format(\App\Booking::all()->count()) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-people"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('Active User') }}</span>
                        <span class="info-box-number">{{ number_format(\App\User::active()->count()) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('Total User') }}</span>
                        <span class="info-box-number">{{ number_format(\App\User::all()->count()) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="{{ route('options.update',$optionals->id) }}" method="POST">

                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">


                    <div class="form-group">
                        <label for="user_coffee_break" class="col-sm-2 control-label">Coffee Break</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->user_coffee_break}}" name="user_coffee_break" type="number" class="form-control" id="user_coffee_break">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="video_proiettore" class="col-sm-2 control-label">Quick Lunch</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->quick_lunch}}" name="video_proiettore" type="number" class="form-control" id="quick_lunch" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="video_proiettore" class="col-sm-2 control-label">Video Proiettore</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->videoproiettore}}" name="video_proiettore" type="number" class="form-control" id="video_proiettore" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="permenent_coffee" class="col-sm-2 control-label">Permenent Coffee</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->permenent_coffee}}" name="permenent_coffee" type="number" class="form-control" id="permenent_coffee" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="wifi" class="col-sm-2 control-label">Wi-Fi</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->wifi}}" name="wifi" type="number" class="form-control" id="wifi" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="videoconferenza" class="col-sm-2 control-label">VideoConferenza</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->videoconferenza}}" name="videoconferenza" type="number" class="form-control" id="videoconferenza" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="web_conference" class="col-sm-2 control-label">Web-Conference</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->web_conference}}" name="web_conference" type="number" class="form-control" id="web_conference" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lavagna_fogli_mobili" class="col-sm-2 control-label">Lavagna Fogli Mobili</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->lavagna_fogli_mobili}}" name="lavagna_fogli_mobili" type="number" class="form-control" id="lavagna_fogli_mobili" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="stampante" class="col-sm-2 control-label">Stampante</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->stampante}}" name="stampante" type="number" class="form-control" id="stampante" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="permenent_coffee_plus" class="col-sm-2 control-label">Permenent Coffee Plus</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->permenent_coffee_plus}}" name="permenent_coffee_plus" type="number" class="form-control" id="permenent_coffee_plus" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="connessione_internet_cavo" class="col-sm-2 control-label">Internet via cavo</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->connessione_internet_cavo}}" name="connessione_internet_cavo" type="number" class="form-control" id="connessione_internet_cavo" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="integrazione_permanent_coffee" class="col-sm-2 control-label">Int. Permanent Coffee</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->integrazione_permanent_coffee}}" name="integrazione_permanent_coffee" type="number" class="form-control" id="integrazione_permanent_coffee" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="upgrade_banda_max_10Mb" class="col-sm-2 control-label">Upgrade Banda 10Mb</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->upgrade_banda_max_10Mb}}" name="upgrade_banda_max_10Mb" type="number" class="form-control" id="upgrade_banda_max_10Mb" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="upgrade_banda_max_8Mb" class="col-sm-2 control-label">Upgrade Banda 8Mb</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals-> upgrade_banda_max_8Mb}}" name="upgrade_banda_max_8Mb" type="number" class="form-control" id="upgrade_banda_max_8Mb" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="upgrade_banda_max_20Mb" class="col-sm-2 control-label">Upgrade Banda 20Mb</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->upgrade_banda_max_20Mb}}" name="upgrade_banda_max_20Mb" type="number" class="form-control" id="upgrade_banda_max_20Mb" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="wireless_fino_4Mb_max_20accessi" class="col-sm-2 control-label">Wireless max 20 accessi</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->wireless_fino_4Mb_max_20accessi}}" name="wireless_fino_4Mb_max_20accessi" type="number" class="form-control" id="wireless_fino_4Mb_max_20accessi" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="wireless_fino_8Mb_max_35accessi" class="col-sm-2 control-label">Wireless max 35 accessi</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->wireless_fino_8Mb_max_35accessi}}" name="wireless_fino_8Mb_max_35accessi" type="number" class="form-control" id="wireless_fino_8Mb_max_35accessi" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="wireless_fino_10MB_max_50accessi" class="col-sm-2 control-label">Wireless max 50 accessi</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->wireless_fino_10MB_max_50accessi}}" name="wireless_fino_10MB_max_50accessi" type="number" class="form-control" id="wireless_fino_10MB_max_50accessi" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="wireless_fino_10MB_max_50accessi" class="col-sm-2 control-label">Wireless max 50 accessi</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->wireless_fino_10MB_max_50accessi}}" name="wireless_fino_10MB_max_50accessi" type="number" class="form-control" id="wireless_fino_10MB_max_50accessi" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="videoregistrazione" class="col-sm-2 control-label">Videoregistrazione</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->videoregistrazione}}" name="videoregistrazione" type="number" class="form-control" id="videoregistrazione" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fattorino" class="col-sm-2 control-label">Fattorino</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->fattorino}}" name="fattorino" type="number" class="form-control" id="fattorino" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lavagna_interattiva" class="col-sm-2 control-label">Lavagna Interattiva</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->lavagna_interattiva}}" name="lavagna_interattiva" type="number" class="form-control" id="lavagna_interattiva" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="integrazione_permanent_coffee" class="col-sm-2 control-label">Int. Permanent Coffee</label>
                        <div class="col-sm-6">
                            <input value="{{$optionals->integrazione_permanent_coffee}}" name="integrazione_permanent_coffee" type="number" class="form-control" id="integrazione_permanent_coffee" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.col -->
        </div>
    </section>
    @endsection