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
                <a class="navbar-brand" href="/home">ET-TVET MIS</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/home">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Main <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/institutions">Institutions</a></li>
                            <li><a href="/users">Users</a></li>
                            <li><a href="/sectors">Sectors</a></li>
                            <li><a href="/subsectors">Sub-Sectors</a></li>
                            <li><a href="/occupations">Occupations</a></li>
                            <li><a href="/competencies">Competences</a></li>
                        </ul>
                    </li>
                    <li><a href="/about">About</a></li>
                </ul>

                <div class="navbar-form navbar-right">
                    <a href="/auth/logout" class="btn btn-primary" role="button">Logout</a>
                </div>

            </div><!--/.navbar-collapse -->
        </div>
    </nav>
@stop