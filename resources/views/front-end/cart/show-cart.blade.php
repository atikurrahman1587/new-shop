@extends('front-end.master')

@section('title')
    Add To Card
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
                    <div class="col-md-11 col-md-offset-1">
                        <h3 class="text-center text-success" style="padding-bottom: 10px">My Shopping Cart</h3>
                        <table class="table table-bordered">
                            <tr class="bg-info">
                                <th>SL No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price TK.</th>
                                <th>Quantity</th>
                                <th>Total Price TK.</th>
                                <th>Action</th>
                            </tr>
                            @php($i=1)
                            @php($sum = 0)
                            @foreach($cartProducts as $cartProduct)
                            <tr>
                                <th>{{ $i++ }}</th>
                                <th>{{ $cartProduct->name }}</th>
                                <th><img src="{{ asset( $cartProduct->options->image) }}" alt="" height="100" width="100" /></th>
                                <th>TK.{{ $cartProduct->price }}</th>
                                <th>
                                    {{ Form::open(['route'=>'update-cart', 'method'=>'POST']) }}
                                        <input type="number" name="qty" value="{{ $cartProduct->qty }}" min="1"/>
                                        <input type="hidden" name="rowId" value="{{ $cartProduct->rowId }}" min="1"/>
                                        <input type="submit" name="btn" value="Update" />
                                    {{ Form::close() }}
                                </th>
                                <th>TK.{{ $total = $cartProduct->price*$cartProduct->qty }}</th>
                                <th>
                                    <a href="{{ route('delete-cart-item', ['rowId'=>$cartProduct->rowId]) }}" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </th>
                            </tr>
                               <?php $sum = $sum+$total; ?>
                            @endforeach
                        </table>
                        <hr/>
                        <table class="table table-bordered">
                            <tr>
                                <th>Item Total (TK.)</th>
                                <td>{{ $sum }}</td>
                            </tr>
                            <tr>
                                <th>Vat Total (TK.)</th>
                                <td>{{ $vat = 0 }}</td>
                            </tr>
                            <tr>
                                <th>Grand Total (TK.)</th>
                                <td>{{ $orderTotal = $sum+$vat }}</td>
                                <?php
                                    Session::put('orderTotal', $orderTotal);
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        @if(Session::get('customerId') && Session::get('shippingId'))
                            <a href="{{ route('checkout-payment') }}" class="btn btn-success pull-right">Checkout</a>
                        @elseif(Session::get('customerId'))
                            <a href="{{ route('checkout-shipping') }}" class="btn btn-success pull-right">Checkout</a>
                        @else
                            <a href="{{ route('checkout') }}" class="btn btn-success pull-right">Checkout</a>
                        @endif
                        <a href="" class="btn btn-success">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
