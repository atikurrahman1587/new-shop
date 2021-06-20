@extends('admin.master')


@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Order</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success" id="xyz">{{ Session::get('massage') }}</h3>
                    <table class="table table-bordered table-hover table-responsive">
                        <thead class="bg-primary">
                        <tr>
                            <th class="text-center">Sl No</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Order Total</th>
                            <th class="text-center">Order Date</th>
                            <th class="text-center">Order Status</th>
                            <th class="text-center">payment Type</th>
                            <th class="text-center">payment Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        @php($i=1)
                        @foreach($orders as $order)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-center">{{ $order->first_name.' '.$order->lest_name }}</td>
                                <td class="text-center">TK.{{ $order->order_total }}</td>
                                <td class="text-center">{{ $order->created_at }}</td>
                                <td class="text-center">{{ $order->order_status }}</td>
                                <td class="text-center">{{ $order->payment_type }}</td>
                                <td class="text-center">{{ $order->payment_status }}</td>
                                <td class="text-center">
                                    <a href="{{ route('viw-order-detail', ['id'=>$order->id]) }}" class="btn btn-info btn-xs" title="Viw order details">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    <a href="{{ route('viw-order-invoice', ['id'=>$order->id]) }}" class="btn btn-info btn-xs" title="Viw order Invoice">
                                        <span class="glyphicon glyphicon-zoom-out"></span>
                                    </a>
                                    <a href="{{ route('download-order-invoice', ['id'=>$order->id]) }}" class="btn btn-success btn-xs" title="Download order Invoice">
                                        <span class="glyphicon glyphicon-download"></span>
                                    </a>
                                    <a href="{{ route('unpublished-category', ['id'=>$order->id]) }}" class="btn btn-primary btn-xs" title="Edit order">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{ route('unpublished-category', ['id'=>$order->id]) }}" class="btn btn-danger btn-xs" title="Delete order">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
