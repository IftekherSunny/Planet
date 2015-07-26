<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title>Sun Planet</title>
    <style>
        .heading {
            padding-top: 20%;
        }
        .heading h1 {
            color: #afafaf;
            font-size: 50px;
        }
        .show-message {
            margin-top: 70px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Sun Planet</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/home">Home <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Session::has('login'))
                    <li><a href="/change_password">Change Password</a></li>
                    <li><a href="/auth/logout">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">

        @if(Session::has('flash_notification.message'))
        <div class="show-message">
            @include('vendor.sun.flash.Flash_Message')
        </div>
        @endif

        <div class="heading text-center">
            <h1>Welcome to Sun Planet</h1>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>