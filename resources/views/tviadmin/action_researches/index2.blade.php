<?php
    $url = \Illuminate\Support\Facades\Request::url();
?>
@extends('tviadmin')

@section('content')
    <div class="flash-message">
        @foreach(['danger', 'warning', 'success', 'info'] as $msg)
            @if(\Illuminate\Support\Facades\Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">
                    {{ \Illuminate\Support\Facades\Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </p>
            @endif
        @endforeach
    </div>
    <h1>Action Research</h1>

    {!! $action_researches->render() !!}

    <div class="panel panel-default">
        <div class="panel-heading">Report Schedule : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    @forelse($action_researches as $action_research)
        <div class="panel panel-default">
            <div class="panel-heading"><a href="{{ '/action-research/' . $action_research->id }}/edit"
                                                     title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>&nbsp;
                                                 <a href="{{ '/action-research/' . $action_research->id }}/delete"
                                                     title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col col-lg-6 col-md-6 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Number of Proposed Action Research</div>
                            <div class="panel-body">{{ $action_research->proposal }}</div>
                        </div> <!-- div class="panel panel-default" -->
                    </div>

                    <div class="col col-lg-6 col-md-6 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Completed Action Research</div>
                            <div class="panel-body">{{ $action_research->completed }}</div>
                        </div> <!-- div class="panel panel-default" -->
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="alert alert-info">No entries...</p>
    @endforelse

    {!! $action_researches->render() !!}
@stop