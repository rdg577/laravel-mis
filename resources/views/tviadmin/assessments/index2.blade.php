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
    <h1>Assessments</h1>

    <div class="panel panel-default">
        <div class="panel-heading"><a href="/assessments/create?id={{ $report_date->id }}" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <div class="panel-body">Report Date : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    {!! $assessments->render() !!}

    @forelse($assessments as $assessment)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" href="{{ '#item' . $assessment->id }}"><h4>{{ $assessment->occupation->name }}</h4><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
                <a href="{{ '/assessments/' . $assessment->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit"
                    aria-hidden="true"></span></a>&nbsp;<a href="{{ '/assessments/' . $assessment->id }}/delete"
                title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div> <!-- div class="panel-heading" -->
            <div id="{{ 'item' . $assessment->id }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Assessed Students</div>
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>Male</td>
                                                <td>Female</td>
                                                <td>Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Regular</td>
                                                <td>{{ $assessment->assessed_regular_male }}</td>
                                                <td>{{ $assessment->assessed_regular_female }}</td>
                                                <td>{{ $assessment->assessed_regular_male + $assessment->assessed_regular_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>Extension</td>
                                                <td>{{ $assessment->assessed_extension_male }}</td>
                                                <td>{{ $assessment->assessed_extension_female }}</td>
                                                <td>{{ $assessment->assessed_extension_male + $assessment->assessed_extension_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>Short Term</td>
                                                <td>{{ $assessment->assessed_short_term_male }}</td>
                                                <td>{{ $assessment->assessed_short_term_female }}</td>
                                                <td>{{ $assessment->assessed_short_term_male + $assessment->assessed_short_term_female }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $assessment->assessed_regular_male + $assessment->assessed_extension_male + $assessment->assessed_short_term_male }}</td>
                                                <td>{{ $assessment->assessed_regular_female + $assessment->assessed_extension_female + $assessment->assessed_short_term_female }}</td>
                                                <td>{{ $assessment->assessed_regular_male + $assessment->assessed_regular_female +
                                                        $assessment->assessed_extension_male + $assessment->assessed_extension_female +
                                                        $assessment->assessed_short_term_male + $assessment->assessed_short_term_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-6" -->
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Competent Students</div>
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>Male</td>
                                                <td>Female</td>
                                                <td>Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Regular</td>
                                                <td>{{ $assessment->competent_regular_male }}</td>
                                                <td>{{ $assessment->competent_regular_female }}</td>
                                                <td>{{ $assessment->competent_regular_male + $assessment->competent_regular_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>Extension</td>
                                                <td>{{ $assessment->competent_extension_male }}</td>
                                                <td>{{ $assessment->competent_extension_female }}</td>
                                                <td>{{ $assessment->competent_extension_male + $assessment->competent_extension_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>Short Term</td>
                                                <td>{{ $assessment->competent_short_term_male }}</td>
                                                <td>{{ $assessment->competent_short_term_female }}</td>
                                                <td>{{ $assessment->competent_short_term_male + $assessment->competent_short_term_female }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $assessment->competent_regular_male + $assessment->competent_extension_male + $assessment->competent_short_term_male }}</td>
                                                <td>{{ $assessment->competent_regular_female + $assessment->competent_extension_female + $assessment->competent_short_term_female }}</td>
                                                <td>{{ $assessment->competent_regular_male + $assessment->competent_regular_female +
                                                        $assessment->competent_extension_male + $assessment->competent_extension_female +
                                                        $assessment->competent_short_term_male + $assessment->competent_short_term_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-6" -->
                    </div> <!-- div class="row" -->
                </div> <!-- div class="panel-body" -->
            </div>
        </div> <!-- div class="panel panel-default" -->
    @empty
        <p class="alert alert-info">No entries...</p>
    @endforelse

    {!! $assessments->render() !!}
@stop