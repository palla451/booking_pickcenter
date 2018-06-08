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
                @if (auth()->id()==$booking->booked_by || auth()->user()->hasRole('superadmin|admin'))
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Booking</h3>
                        </div>
                        <!-- /.box-header -->
                        <form class="form-horizontal" action="{{ route('bookings.update',$booking->id) }}" method="POST">

                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label for="id" class="col-sm-2 control-label">booked id</label>
                                <div class="col-sm-6">
                                    <input value="{{ $booking->id }}" name="id" type="number" class="form-control" id="id" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id" class="col-sm-2 control-label">booked by id</label>
                                <div class="col-sm-6">
                                    <input value="{{ $booking->booked_by }}" name="id" type="text" class="form-control" id="booked_by_id" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="booked_by" class="col-sm-2 control-label">booked by</label>
                                <div class="col-sm-6">
                                    <input value="{{ $booking->user->name }}" name="booked_by_name" type="text" class="form-control" id="booked_by_name" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">email</label>
                                <div class="col-sm-6">
                                    <input value="{{ $booking->user->email }}" type="email" class="form-control" id="email" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="start_date" class="col-sm-2 control-label">start date</label>
                                <div class="col-sm-6">
                                    <input value="{{ $booking->start_date }}" type="text" class="form-control" name="start_date" id="start_date" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="end_date" class="col-sm-2 control-label">end date</label>
                                <div class="col-sm-6">
                                    <input value="{{ $booking->end_date }}" type="text" class="form-control" name="end_date" id="end_date" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="room" class="col-sm-2 control-label">resource</label>
                                <div class="col-sm-6">
                                    <input value="{{ $booking->room->name }}" type="text" class="form-control" name="room" id="room" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="room_type" class="col-sm-2 control-label">resource</label>
                                <div class="col-sm-6">
                                    <input value="{{ $booking->room->type }}" type="text" class="form-control" name="room_type" id="room_type" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="room_type" class="col-sm-2 control-label">price</label>
                                <div class="col-sm-6">
                                    <input value="€ {{ $booking->price }},00" type="text" class="form-control" name="price" id="price" readonly>
                                </div>
                            </div>
                            <div class="form-group" style="display: none">
                                <label for="room_type" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-6">
                                    <input value="{{ $booking->status }}" type="text" class="form-control" name="status" id="status" readonly>
                                </div>
                            </div>
                            @if(auth()->user()->hasRole('superadmin|admin'))
                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">status</label>
                                <div class="col-sm-6">
                                    <select name="status">
                                        <option value="1">Option</option>
                                        <option value="0">Confimed</option>
                                    </select>
                                </div>
                            </div>
                            @else
                                @endif
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Send</button>
                                </div>
                            </div>
                            <!-- space -->
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" action="{{ route('options.edit',$booking->id) }}" method="GET">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary btn-ls">
                                        Add Optionals
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                @else
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">My Dashboard</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <h4 style="text-align: center">You are not authorized to visit this page</h4>
                        </div>
                    </div>
                @endif
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection