@extends('admin.master')




@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Product</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success" id="xyz">{{ Session::get('massage') }}</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-responsive">
                            <thead class="bg-primary">
                            <tr>
                                <th class="text-center">Sl No</th>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">Brand Name</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Product Price</th>
                                <th class="text-center">Product Quantity</th>
                                <th class="text-center">Product Image</th>
                                <th class="text-center">Publication Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            @php($i=1)
                            @foreach($products as $product)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>{{ $product->brand_name }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->product_quantity }}</td>
                                <td class="text-center">
                                    <img src="{{ asset($product->product_image) }}" alt="" style="width: 25%;">
                                </td>
                                <td class="text-center" style="margin-top: 25px">{{ $product->publication_status == 1 ? 'published' : 'Unpublished' }}</td>
                                <td class="text-center">
                                    @if($product->publication_status == 1)
                                        <a href="{{ route('unpublished-product', ['id'=>$product->id]) }}" class="btn btn-info btn-xs" title="Published">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{ route('published-product', ['id'=>$product->id]) }}" class="btn btn-warning btn-xs" title="Unpublished">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif

                                    <a href="{{ route('viw-product', ['id'=>$product->id]) }}" class="btn btn-success btn-xs" title="View Details">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>

                                    <a href="{{ route('edit-product', ['id'=>$product->id]) }}" class="btn btn-success btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                    <a href="{{ route('delete-product', ['id'=>$product->id]) }}" onclick="return confirm('Are you sure delete this..!!')" class="btn btn-danger btn-xs" title="Delete">
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
    </div>
@endsection
