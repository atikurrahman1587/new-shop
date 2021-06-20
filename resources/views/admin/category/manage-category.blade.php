@extends('admin.master')


@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Category</h4>
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
                        @foreach($categories as $category)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->category_description }}</td>
                            <td class="text-center">{{ $category->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td class="text-center">
                                @if($category->publication_status == 1)
                                <a href="{{ route('unpublished-category', ['id'=>$category->id]) }}" class="btn btn-info btn-xs">
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                </a>
                                @else
                                    <a href="{{ route('published-category', ['id'=>$category->id]) }}" class="btn btn-warning btn-xs">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </a>
                                @endif

                                <a href="{{ route('edit-category', ['id'=>$category->id]) }}" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ route('delete-category', ['id'=>$category->id]) }} " onclick="return confirm('Are you sure delete this..!!')" class="btn btn-danger btn-xs">
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
