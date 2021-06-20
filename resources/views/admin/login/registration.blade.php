@extends('admin.master')
@extends('admin.includes.header')
@extends('admin.includes.menu')

@section('body')


    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 75px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Registration</h4>
                </div>
                <div class="panel-body">

                    <form action="" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="control-label col-md-3">Register Name</label>
                            <div class="col-md-9">
                                <input type="text" name="register_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">E-Mail Address</label>
                            <div class="col-md-9">
                                <input type="email" name="email_address" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Confirm Password</label>
                            <div class="col-md-9">
                                <input type="password" name="confirm_password" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Register" />
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
