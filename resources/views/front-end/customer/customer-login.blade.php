@extends('front-end.master')

@section('title')
    Checkout
@endsection

@section('body')

    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ route('/') }}">Home</a> / <span>Add To Card</span></h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->
    <div class="content">
        <!--single-->
        <div class="single-wl3">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 well">
                        <div class="panel-heading">
                            <h3>Register Here</h3>
                            <br/>
                            {{ Form::open(['method'=>'POST']) }}
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="lest_name" class="form-control" placeholder="Lest Name" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email_address" class="form-control" placeholder="example@gamil.com" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" />
                            </div>
                            <div class="form-group">
                                <textarea name="address" placeholder="Address" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btn" class="btn btn-info btn-block" value="Register"/>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                    <div class="col-md-5 well" style="margin-left: 20px;">
                        <div class="panel-heading">
                            <h3 class="text-center">Login Here!</h3>
                            <br/>
                            <h3 class="text-center text-danger">{{ Session::get('message') }}</h3>
                            <br/>
                            {{ Form::open(['method'=>'POST']) }}
                            <div class="form-group">
                                <input type="email" name="email_address" class="form-control" placeholder="example@gamil.com" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Register"/>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

