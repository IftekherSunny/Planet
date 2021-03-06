@extends('layouts.auth')

@section('title')
    @include('layouts.partials._title', ['title' => 'Login'])
@stop

@section('content')
    <!-- Begin User Login -->
    <div class="user-login">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

           <div class="logo">
                <h2>{{ config('app.name') }}</h2>
           </div>

            <!-- Begin Panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><i class="fa fa-user"></i> Login</strong>
                </div>

                <!-- Begin Panel Body -->
                <div class="panel-body">

                    @include('layouts.partials.success')

                    @include('layouts.partials.error')

                    <form action="{{ url('/auth/login') }}" method="post">

                        <input type="hidden" id="_token" name="token" value="{{ csrf_token() }}" />

                        <!-- Email Field -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ Request::old('email') }}">
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="checkbox">
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Login</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div> <!-- End Panel Body -->

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-6">
                           <a href="{{ url('/auth/register') }}" class="pull-left">Create new account?</a>
                        </div>

                        <div class="col-xs-6">
                            <a href="{{ url('/auth/reset') }}" class="pull-right">Forgot your password?</a>
                        </div>
                    </div>

                </div>
            </div> <!-- End Panel -->

        </div>
    </div> <!-- End User Login -->
@endsection
