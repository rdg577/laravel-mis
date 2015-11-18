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
    <h1>Trainers</h1>

    <div class="panel panel-default">
        <div class="panel-heading"><a href="/trainers/create?id={{ $report_date->id }}" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <div class="panel-body">Report Date : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    {!! $trainers->render() !!}

    @forelse($trainers as $trainer)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" href="{{ '#item' . $trainer->id }}"><h4>{{ $trainer->occupation->name }}</h4><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
                <a href="{{ '/trainers/' . $trainer->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit"
                    aria-hidden="true"></span></a>&nbsp;<a href="{{ '/trainers/' . $trainer->id }}/delete"
                title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div> <!-- div class="panel-heading" -->
            <div id="{{ 'item' . $trainer->id }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">By Mode of Employment in the Institute</div>
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
                                                <td>Full-Time</td>
                                                <td>{{ $trainer->full_time_male }}</td>
                                                <td>{{ $trainer->full_time_female }}</td>
                                                <td>{{ $trainer->full_time_male + $trainer->full_time_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>Part-Time</td>
                                                <td>{{ $trainer->part_time_male }}</td>
                                                <td>{{ $trainer->part_time_female }}</td>
                                                <td>{{ $trainer->part_time_male + $trainer->part_time_female }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $trainer->full_time_male + $trainer->part_time_male }}</td>
                                                <td>{{ $trainer->full_time_female + $trainer->part_time_female }}</td>
                                                <td>{{ $trainer->full_time_male + $trainer->full_time_female +
                                                       $trainer->part_time_male + $trainer->part_time_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-4" -->

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">By Nationality</div>
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
                                                <td>Ethiopian</td>
                                                <td>{{ $trainer->ethiopian_male }}</td>
                                                <td>{{ $trainer->ethiopian_female }}</td>
                                                <td>{{ $trainer->ethiopian_male + $trainer->ethiopian_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>Non-Ethiopian</td>
                                                <td>{{ $trainer->non_ethiopian_male }}</td>
                                                <td>{{ $trainer->non_ethiopian_female }}</td>
                                                <td>{{ $trainer->non_ethiopian_male + $trainer->non_ethiopian_female }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $trainer->ethiopian_male + $trainer->non_ethiopian_male }}</td>
                                                <td>{{ $trainer->ethiopian_female + $trainer->non_ethiopian_female }}</td>
                                                <td>{{ $trainer->ethiopian_male + $trainer->ethiopian_female +
                                                       $trainer->non_ethiopian_male + $trainer->non_ethiopian_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-4" -->

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Number of Core Trainers</div>
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
                                                <td>Male</td>
                                                <td>{{ $trainer->core_male }}</td>
                                            </tr>
                                            <tr>
                                                <td>Female</td>
                                                <td>{{ $trainer->core_female }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $trainer->core_male + $trainer->core_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-4" -->
                    </div> {{--row--}}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Trainers who took TM</div>
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
                                                <td>Male</td>
                                                <td>{{ $trainer->took_tm_male }}</td>
                                            </tr>
                                            <tr>
                                                <td>Female</td>
                                                <td>{{ $trainer->took_tm_female }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $trainer->took_tm_male + $trainer->took_tm_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-4" -->

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Remarks</div>
                                <div class="panel-body">
                                    {{ $trainer->remarks }}
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->
                        </div> <!-- div class="col-md-4" -->

                    </div> <!-- div class="row" -->
                </div> <!-- div class="panel-body" -->
            </div>
        </div> <!-- div class="panel panel-default" -->
    @empty
        <p class="alert alert-info">No entries...</p>
    @endforelse

    {!! $trainers->render() !!}
@stop