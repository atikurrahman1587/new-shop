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
                    <div class="col-md-12 well text-center">
                    <br/>
                        <h3><span class="text-success">Dear</span>,<span class="text-danger"> {{ Session::get('customerName') }}</span>. You have to give us product shipping info to complete your valuable order. If your billing info & shipping info are same then just press on <span class="text-info">save shipping info</span> button </h3>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel-heading">
                            <h3>Shipping Info Goes Here....</h3>
                            <br/>
                            {{ Form::open(['route'=>'new-shipping', 'method'=>'POST']) }}
                            <div class="form-group">
                                <input type="text" value="{{ $customer->first_name.' '.$customer->lest_name }}" name="full_name" class="form-control" placeholder="Full Name" />
                            </div>
                            <div class="form-group">
                                <input type="email" value="{{ $customer->email_address }}" name="email_address" class="form-control" placeholder="example@gamil.com" />
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{ $customer->phone_number }}" name="phone_number" class="form-control" placeholder="Phone Number" />
                            </div>
                            <div class="form-group">
                                <textarea name="address" placeholder="Address" class="form-control">{{ $customer->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btn" class="btn btn-info btn-block" value="Save Shipping Info"/>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

