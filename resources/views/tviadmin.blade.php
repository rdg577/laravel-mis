<?php
    $user = \Illuminate\Support\Facades\Auth::user();
?>

@extends('master')

@section('nav-bar')
    <nav class="navbar navbar-default navbar-fixed-top">
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
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Trainees</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/trainees-new-enrollees">Newly Registered</a></li>
                                    <li><a href="/trainees-re-enrollees">Current Re-Registered</a></li>
                                    <li><a href="/trainees-transferees">Transferred</a></li>
                                    <li><a href="/trainees-graduates">Graduates</a></li>
                                    <li><a href="/short-term-trainees">Short Term</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Dropouts</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/dropout-from-transferees">From Transferred</a></li>
                                    <li><a href="/dropout-graduates">Graduates</a></li>
                                    <li><a href="/dropout-short-term">Short-Term-Trainees</a> </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Assessment</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/assessment-transferees">From Transferred</a></li>
                                    <li><a href="/assessment-graduates">Graduates</a></li>
                                    <li><a href="/assessment-short-term">Short-Term-Trainees</a> </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Cooperative Training</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/cooperative-training-transferees">From Transferred</a></li>
                                    <li><a href="/cooperative-training-graduates">Graduates</a></li>
                                    <li><a href="/cooperative-training-short-term">Short-Term-Trainees</a> </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Saving</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/saving-transferees">From Transferred</a></li>
                                    <li><a href="/saving-graduates">Graduates</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Job Placement</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/job-placement-graduates">Graduates</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Research</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/action-research">Action Research</a></li>
                                    <li><a href="/tracer-studies">Tracer Study</a></li>
                                </ul>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Old Modules</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/formal-trainings">Formal Training</a></li>
                                    <li><a href="/short-term-trainings">Short-Term Training</a></li>
                                    <li><a href="/assessments">Assessment</a></li>
                                    <li><a href="/cooperative-trainings">Cooperative Training</a></li>
                                    <li><a href="/trainers">Trainers</a></li>
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
                            <li role="separator" class="divider"></li>
                            <li><a href="/change-password">Change Password</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Report <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/report-data-summary">Data Summary</a></li>
                        </ul>
                    </li>
                    <li><a href="/indicators">Indicators</a></li>
                    <li><a href="/about">About</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                 <ul class="nav navbar-nav navbar-right">
                     <!-- Authentication Links -->
                     @if (Auth::guest() || !Auth::check())
                         <li><a href="{{ url('/auth/login') }}">Login</a></li>
                         {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                     @else
                         <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                 {{ Auth::user()->name }} <span class="caret"></span>
                             </a>

                             <ul class="dropdown-menu" role="menu">
                                 <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                             </ul>
                         </li>
                     @endif
                 </ul>

                {{--<div class="navbar-form navbar-right">
                    <span class="">{{ $user->name }}</span>
                    <a href="/auth/logout" class="btn btn-primary" role="button">Logout</a>
                </div>--}}

            </div><!--/.navbar-collapse -->
        </div>
    </nav>
@endsection