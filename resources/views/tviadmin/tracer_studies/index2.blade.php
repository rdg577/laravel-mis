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
    <h1>Tracer Study</h1>

    {!! $tracer_studies->render() !!}

    <div class="panel panel-default">
        <div class="panel-heading">Report Schedule : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    @forelse($tracer_studies as $tracer_study)
        <div class="panel panel-default">
            <div class="panel-heading"><a href="{{ '/tracer-studies/' . $tracer_study->id }}/edit"
                                                     title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>&nbsp;
                                                 <a href="{{ '/tracer-studies/' . $tracer_study->id }}/delete"
                                                     title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col col-lg-6 col-md-6 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Number of Proposed Tracer Study</div>
                            <div class="panel-body">{{ $tracer_study->proposal }}</div>
                        </div> <!-- div class="panel panel-default" -->
                    </div>

                    <div class="col col-lg-6 col-md-6 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Completed Tracer Study</div>
                            <div class="panel-body">{{ $tracer_study->completed }}</div>
                        </div> <!-- div class="panel panel-default" -->
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="alert alert-info">No entries...</p>
    @endforelse

    {!! $tracer_studies->render() !!}
@stop