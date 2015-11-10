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
    <h1>Dropouts</h1>

    <div class="panel panel-default">
        <div class="panel-heading"><a href="/dropouts/create?id={{ $report_date->id }}" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <div class="panel-body">Report Date : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    {!! $dropouts->render() !!}

    @forelse($dropouts as $dropout)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" href="{{ '#item' . $dropout->id }}">
                    <h4>{{ $dropout->occupation->name }}</h4>
                </a>
                <a href="{{ '/dropouts/' . $dropout->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit"
                    aria-hidden="true"></span></a>&nbsp;<a href="{{ '/dropouts/' . $dropout->id }}/delete"
                title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div> <!-- div class="panel-heading" -->
            <div id="{{ 'item' . $dropout->id }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Number of Dropout Trainees</div>
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
                                                <td>{{ $dropout->regular_male }}</td>
                                                <td>{{ $dropout->regular_female }}</td>
                                                <td>{{ $dropout->regular_male + $dropout->regular_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>Extension</td>
                                                <td>{{ $dropout->extension_male }}</td>
                                                <td>{{ $dropout->extension_female }}</td>
                                                <td>{{ $dropout->extension_male + $dropout->extension_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>Short-Term</td>
                                                <td>{{ $dropout->short_term_male }}</td>
                                                <td>{{ $dropout->short_term_female }}</td>
                                                <td>{{ $dropout->short_term_male + $dropout->short_term_female }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $dropout->regular_male + $dropout->extension_male + $dropout->short_term_male }}</td>
                                                <td>{{ $dropout->regular_female + $dropout->extension_female + $dropout->short_term_female }}</td>
                                                <td>{{ $dropout->regular_male + $dropout->regular_female +
                                                       $dropout->extension_male + $dropout->extension_female +
                                                       $dropout->short_term_male + $dropout->short_term_female}}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-4" -->

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Highest Completed Level Before Dropout</div>
                                <div class="panel-body">
                                    {{ $dropout->completed_level }}
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->
                        </div> <!-- div class="col-md-4" -->

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Remarks</div>
                                <div class="panel-body">
                                    {{ $dropout->remarks }}
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->
                        </div> <!-- div class="col-md-4" -->

                    </div> {{--row--}}

                </div> <!-- div class="panel-body" -->
            </div>
        </div> <!-- div class="panel panel-default" -->
    @empty
        <p class="alert alert-info">No entries...</p>
    @endforelse

    {!! $dropouts->render() !!}
@stop