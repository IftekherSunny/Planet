@extends('layouts.auth')

@section('title')
    @include('layouts.partials._title', ['title' => 'Login'])
@stop

@section('content')
    <!-- Begin Change Password -->
    <div class="user-signup">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

            <div class="logo">
                <h2>{{ config('app.app.name') }}</h2>
            </div>

            <!-- Begin Panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><i class="fa fa-key"></i> Change Password</strong>
                </div>

                <!-- Begin Panel Body -->
                <div class="panel-body">

                    @include('layouts.partials.success')

                    @include('layouts.partials.error')

                    <form action="/change_password" method="post">

                        <input type="hidden" id="_token" name="token" value="{{ csrf_token() }}" />

                        <!-- Old Password Field -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
                            </div>
                        </div>

                        <!-- New Password Field -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                            </div>
                        </div>

                        <!-- Confirm New Password Field -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm New Password">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="checkbox">
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-success btn-block">Update</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div> <!-- End Panel Body -->

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="/auth/register" class="pull-left">Create new account?</a>
                        </div>

                        <div class="col-xs-6">
                            <a href="/auth/reset" class="pull-right">Forgot your password?</a>
                        </div>
                    </div>

                </div>
            </div> <!-- End Panel -->

        </div>
    </div> <!-- End Change Password -->
@endsection
