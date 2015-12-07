@extends('master')

@section('nav-bar')
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">ET-TVET MIS</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <div class="navbar-form navbar-right">
            <a href="auth/login" class="btn btn-success" role="button">Login</a>
        </div>
      </div><!--/.navbar-collapse -->
    </div>
  </nav>
@stop

@section('content')
    <div class="row">
        <div class="col col-lg-8 col-lg-offset-2">
                <img src="{{ URL::asset('img/mis_front.PNG') }}" class="img-responsive" width="100%" alt="Management Information System">
        </div>
    </div>
@stop