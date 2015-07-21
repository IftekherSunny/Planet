@extends('layouts.auth')

@section('title')
    @include('layouts.partials._title', ['title' => 'Reset Password'])
@stop

@section('content')
    <!-- Begin User Forgot Password -->
    <div class="user-forgot-password">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

            <div class="logo">
                <h2>My Awesome App</h2>
            </div>

            <!-- Begin Panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><i class="fa fa-unlock-alt"></i> Reset Password</strong>
                </div>

                <!-- Begin Panel Body -->
                <div class="panel-body">

                    @include('layouts.partials.error')
                    @include('layouts.partials.success')

                    <form action="/auth/reset" method="post">

                        <input type="hidden" name="token" id="token" value="{{ csrf_token()}}" />

                        <!-- Email Field -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-refresh"></i> Reset</button>
                        </div>

                    </form>
                </div> <!-- End Panel Body -->

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="/auth/register" class="pull-left">Create new account?</a>
                        </div>

                        <div class="col-xs-6">
                            <a href="/auth/login" class="pull-right">Already have an account?</a>
                        </div>
                    </div>

                </div>
            </div> <!-- End Panel -->

        </div>
    </div> <!-- End User Forgot Password -->

@stop
