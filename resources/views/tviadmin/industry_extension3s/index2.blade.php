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
    <h1>Industry Extension # 3</h1>

    <div class="panel panel-default">
        <div class="panel-heading"><a href="/industry-extension-3/create?id={{ $report_date->id }}" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <div class="panel-body">Report Date : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    {!! $industry_extension3s->render() !!}

    @forelse($industry_extension3s as $industry_extension3)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" href="{{ '#item' . $industry_extension3->id }}"><h4>{{ $industry_extension3->subsector->name }}</h4><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
                <a href="{{ '/industry-extension-3/' . $industry_extension3->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit"
                    aria-hidden="true"></span></a>&nbsp;<a href="{{ '/industry-extension-3/' . $industry_extension3->id }}/delete"
                title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div> <!-- div class="panel-heading" -->

            <div id="{{ 'item' . $industry_extension3->id }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">High Level Managers</div>
                                <div class="panel-body">
                                    {{ $industry_extension3->high_level }}
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->
                        </div> <!-- div class="col-md-6" -->

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Middle Level Managers</div>
                                <div class="panel-body">
                                    {{ $industry_extension3->mid_level }}
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->
                        </div> <!-- div class="col-md-6" -->

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Low Level Managers</div>
                                <div class="panel-body">
                                    {{ $industry_extension3->low_level }}
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->
                        </div> <!-- div class="col-md-6" -->

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Remarks</div>
                                <div class="panel-body">
                                    {{ $industry_extension3->remarks }}
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->
                        </div> <!-- div class="col-md-6" -->

                    </div> {{--row--}}

                </div> <!-- div class="panel-body" -->
            </div>
        </div> <!-- div class="panel panel-default" -->
    @empty
        <p class="alert alert-info">No entries...</p>
    @endforelse

    {!! $industry_extension3s->render() !!}
@stop