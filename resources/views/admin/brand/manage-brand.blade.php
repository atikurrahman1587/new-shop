@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Brand</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-center text-success" id="xyz">{{ Session::get('massage') }}</h3>
                    <table class="table table-bordered table-hover table-responsive">
                        <thead class="bg-primary">
                        <tr>
                            <th class="text-center">Sl No</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Category Description</th>
                            <th class="text-center">Publication Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        @php($i=1)
                        @foreach($brands as $brand)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $brand->brand_name }}</td>
                                <td>{{ $brand->brand_description }}</td>
                                <td class="text-center">{{ $brand->publication_status ==1 ? 'Published' : 'Unpublished' }}</td>
                                <td class="text-center">
                                    @if( $brand->publication_status ==1 )
                                    <a href="{{ route('unpublished-brand', ['id'=>$brand->id]) }}" class="btn btn-info btn-xs">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </a>
                                    @else
                                    <a href="{{ route('published-brand', ['id'=>$brand->id]) }}" class="btn btn-warning btn-xs">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </a>
                                    @endif

                                    <a href="{{ route('edit-brand', ['id'=>$brand->id]) }}" class="btn btn-success btn-xs">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{ route('delete-brand', ['id'=>$brand->id]) }}" onclick="return confirm('Are you sure delete this..!!')" class="btn btn-danger btn-xs">
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
