<?php
    $user = \Illuminate\Support\Facades\Auth::user();
?>

@extends('master')

@section('nav-bar')
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/home">ET-TVET MIS</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/home">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Main <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/tvi/{{ $user->institution_id }}/profile">My Institution Profile</a></li>
                            <li><a href="/formal-trainings">Formal Training</a></li>
                            <li><a href="/short-term-trainings">Short-Term Training</a></li>
                            <li><a href="/assessments">Assessment</a></li>
                            <li><a href="/cooperative-trainings">Cooperative Training</a></li>
                            <li><a href="/trainers">Trainers</a></li>
                            <li><a href="/dropouts">Dropouts</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Industry Extensions</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/industry-extension-1"># 1</a></li>
                                    <li><a href="/industry-extension-2"># 2</a></li>
                                    <li><a href="/industry-extension-3"># 3</a></li>
                                    <li><a href="/industry-extension-4"># 4</a></li>
                                    <li><a href="/industry-extension-5"># 5</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Report <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Report Dates</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/create-report-date">Create</a></li>
                                    <li><a href="/report-dates">View All</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/tvi/about">About</a></li>
                </ul>

                <div class="navbar-form navbar-right">
                    <a href="/auth/logout" class="btn btn-primary" role="button">Logout</a>
                </div>

                {{--{!! Form::open(['url'=>'/search', 'class'=>'navbar-form navbar-right']) !!}
                    <div class="form-group">
                        <input type="text" placeholder="Search" class="form-control">
                    </div>

                    <a href="/auth/logout" class="btn btn-primary" role="button">Logout</a>
                {!! Form::close() !!}--}}

            </div><!--/.navbar-collapse -->
        </div>
    </nav>
@endsection