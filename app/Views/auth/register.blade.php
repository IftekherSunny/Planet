@extends('layouts.auth')

@section('title')
    @include('layouts.partials._title', ['title' => 'Register'])
@stop

@section('content')
    <!-- Begin User SignUp -->
    <div class="user-signup">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

            <div class="logo">
                <h2>{{ config('app.name') }}</h2>
            </div>

            <!-- Begin Panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><i class="fa fa-users"></i> Register </strong>
                </div>

                <!-- Begin Panel Body -->
                <div class="panel-body">

                    @include('layouts.partials.error')
                    @include('layouts.partials.success')

                    <form action="{{ url('/auth/register') }}" method="post">

                        <input type="hidden" name="token" id="token" value="{{ csrf_token() }}" />

                        <!-- Username Field -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{Request::old('name')}}">
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{Request::old('email')}}" />
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                        </div>

                        <!-- Password Confirmation Field -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-block btn-success pull-right"><i class="fa fa-check"></i> Register </button>
                                </div>
                            </div>
                        </div>



                    </form>
                </div> <!-- End Panel Body -->

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{ url('/auth/login') }}" class="pull-left">Already have an account?</a>
                        </div>

                        <div class="col-xs-6">
                            <a href="{{ url('/auth/reset') }}" class="pull-right">Forgot your password?</a>
                        </div>
                    </div>

                </div>

            </div> <!-- End Panel -->

        </div>
    </div> <!-- End User SignUp -->
@stop
