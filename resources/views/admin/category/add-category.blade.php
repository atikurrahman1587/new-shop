@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Add Category Form</h4>
                </div>
                <div class="panel-body">

                    <h3 class="text-center text-success" id="xyz">{{ Session::get('massage') }}</h3>

                    {{ Form::open(['route'=>'new-category', 'method'=>'POST', 'class'=>'form-horizontal']) }}
                        <div class="form-group">
                            <label class="control-label col-md-4">Category Name</label>
                            <div class="col-md-8">
                                <input type="text" name="category_name" class="form-control" />
                                <span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Category Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="category_description"></textarea>
                                <span class="text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Publication Status</label>
                            <div class="col-md-8">
                                <label><input type="radio" checked name="publication_status" value="1" />Published</label>
                                <label><input type="radio" name="publication_status" value="0" />Unpublished</label>
                                <br/>
                                <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Category Info" />
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
