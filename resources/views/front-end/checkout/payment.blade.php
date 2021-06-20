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
                        <h3><span class="text-success">Dear</span>,<span class="text-danger"> {{ Session::get('customerName') }}</span>. You have to give us product Payment method</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 well">
                        {{ Form::open(['route'=>'new-order', 'method'=>'POST']) }}
                            <table class="table table-bordered">
                                <tr>
                                    <th>Cash On Delivery</th>
                                    <th><input type="radio" name="payment_type" value="Cash" />Cash on delivery</th>
                                </tr>
                                <tr>
                                    <th>Paypal</th>
                                    <th><input type="radio" name="payment_type" value="Paypal" />Paypal</th>
                                </tr>
                                <tr>
                                    <th>Bkash</th>
                                    <th><input type="radio" name="payment_type" value="Bkash" />Bkash</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th><input type="submit" name="btn" value="Confirm Order" /></th>
                                </tr>
                            </table>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

