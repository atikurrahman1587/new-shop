@extends('admin.master')


@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success"></h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success">Customer Info For This Order</h3>
                    <table class="table table-bordered table-hover table-responsive">
                        <tr>
                            <th>Customer Name</th>
                            <td>{{ $customer->first_name.' '.$customer->lest_name }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $customer->phone_number }}</td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>{{ $customer->email_address }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $customer->address }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success"></h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success">Order Info For This Order</h3>
                    <table class="table table-bordered table-hover table-responsive">
                        <tr>
                            <th>Order No</th>
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>{{ $order->order_total }}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{ $order->order_status }}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Shipping Info For This Order</h3>
                    <table class="table table-bordered table-hover table-responsive">
                        <tr>
                            <th>Full Name</th>
                            <td>{{ $shipping->full_name }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $shipping->phone_number }}</td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>{{ $shipping->email_address }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $shipping->address }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Payment Info For This Order</h3>
                    <table class="table table-bordered table-hover table-responsive">
                        <tr>
                            <th>Payment Type</th>
                            <td>{{ $payment->payment_type }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{ $payment->payment_status }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">Product Info For This Order</h3>
                    <table class="table table-bordered table-hover table-responsive">
                        <thead class="bg-primary">
                        <tr>
                            <th class="text-center">Sl No</th>
                            <th class="text-center">Product id</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Product Price</th>
                            <th class="text-center">Product Quantity</th>
                            <th class="text-center">Total Price</th>
                        </tr>
                        </thead>
                        @php($i=1)
                            @foreach($orderDetails as $orderDetail)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-center">{{ $orderDetail->product_id }}</td>
                                <td class="text-center">{{ $orderDetail->product_name }}</td>
                                <td class="text-center">TK.{{ $orderDetail->product_price }}</td>
                                <td class="text-center">{{ $orderDetail->product_quantity }}</td>
                                <td class="text-center">TK.{{ $orderDetail->product_price*$orderDetail->product_quantity }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

