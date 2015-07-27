@extends('layouts.default')

@section('content')
    @if(Session::has('flash_notification.message'))
        @include('vendor.sun.flash.Flash_Message')
    @endif

    <div class="container">
        <div class="row">
            <div class="page-header">
                <h1>Home Page</h1>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                   Welcome to home page.
                </div>
            </div>
        </div>
    </div>
@stop