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
    <h1>Industry Extension # 1</h1>

    <div class="panel panel-default">
        <div class="panel-heading"><a href="/industry-extension-1/create?id={{ $report_date->id }}" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <div class="panel-body">Report Date : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    {!! $industry_extension1s->render() !!}

    @forelse($industry_extension1s as $industry_extension1)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" href="{{ '#item' . $industry_extension1->id }}"><h4>{{ $industry_extension1->occupation->name }}</h4><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
                <a href="{{ '/industry-extension-1/' . $industry_extension1->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit"
                    aria-hidden="true"></span></a>&nbsp;<a href="{{ '/industry-extension-1/' . $industry_extension1->id }}/delete"
                title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div> <!-- div class="panel-heading" -->

            <div id="{{ 'item' . $industry_extension1->id }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-6">

                            <div class="panel panel-default">
                                <div class="panel-heading">Number of Technologies identified through Value Chain Analysis</div>
                                <div class="panel-body">
                                    {{ $industry_extension1->identified_technologies }}
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->


                            <div class="panel panel-default">
                                <div class="panel-heading">Benchmarked Technologies</div>
                                <div class="panel-body">
                                    {{ $industry_extension1->benchmarked_technologies }}
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->

                            <div class="panel panel-default">
                                <div class="panel-heading">Remarks</div>
                                <div class="panel-body">
                                    {{ $industry_extension1->remarks }}
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->

                        </div> <!-- div class="col-md-6" -->

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Status of the Technology</div>
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Proper Documentation</td>
                                                <td>{{ $industry_extension1->proper_documentation }}</td>
                                            </tr>
                                            <tr>
                                                <td>Prototype</td>
                                                <td>{{ $industry_extension1->prototype }}</td>
                                            </tr>
                                            <tr>
                                                <td>Competent Entrepreneurs</td>
                                                <td>{{ $industry_extension1->competent_entrepreneurs }}</td>
                                            </tr>
                                            <tr>
                                                <td>Technology Transferred</td>
                                                <td>{{ $industry_extension1->transferred }}</td>
                                            </tr>
                                            <tr>
                                                <td>Capital in Million</td>
                                                <td>{{ $industry_extension1->capital }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-6" -->

                    </div> {{--row--}}

                </div> <!-- div class="panel-body" -->
            </div>
        </div> <!-- div class="panel panel-default" -->
    @empty
        <p class="alert alert-info">No entries...</p>
    @endforelse

    {!! $industry_extension1s->render() !!}
@stop