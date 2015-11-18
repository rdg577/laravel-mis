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
    <h1>Industry Extension # 2</h1>

    <div class="panel panel-default">
        <div class="panel-heading"><a href="/industry-extension-2/create?id={{ $report_date->id }}" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <div class="panel-body">Report Date : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    {!! $industry_extension2s->render() !!}

    @forelse($industry_extension2s as $industry_extension2)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" href="{{ '#item' . $industry_extension2->id }}"><h4>{{ $industry_extension2->occupation->name }}</h4><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
                <a href="{{ '/industry-extension-2/' . $industry_extension2->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit"
                    aria-hidden="true"></span></a>&nbsp;<a href="{{ '/industry-extension-2/' . $industry_extension2->id }}/delete"
                title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div> <!-- div class="panel-heading" -->

            <div id="{{ 'item' . $industry_extension2->id }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">STARTER</div>
                                <div class="panel-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td rowspan="2">Enterprises</td>
                                                <td colspan="2">MSE Operators</td>
                                                <td colspan="2">Number of MSE Operators supported by IE</td>
                                            </tr>
                                            <tr>
                                                <td>Male</td>
                                                <td>Female</td>
                                                <td>Male</td>
                                                <td>Female</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $industry_extension2->starter_enterprise }}</td>
                                                <td>{{ $industry_extension2->starter_mse_operator_male }}</td>
                                                <td>{{ $industry_extension2->starter_mse_operator_female }}</td>
                                                <td>{{ $industry_extension2->starter_mse_operator_supported_male }}</td>
                                                <td>{{ $industry_extension2->starter_mse_operator_supported_female }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-6" -->

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">ADVANCE</div>
                                <div class="panel-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td rowspan="2">Enterprises</td>
                                                <td colspan="2">MSE Operators</td>
                                                <td colspan="2">Number of MSE Operators supported by IE</td>
                                            </tr>
                                            <tr>
                                                <td>Male</td>
                                                <td>Female</td>
                                                <td>Male</td>
                                                <td>Female</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $industry_extension2->advance_enterprise }}</td>
                                                <td>{{ $industry_extension2->advance_mse_operator_male }}</td>
                                                <td>{{ $industry_extension2->advance_mse_operator_female }}</td>
                                                <td>{{ $industry_extension2->advance_mse_operator_supported_male }}</td>
                                                <td>{{ $industry_extension2->advance_mse_operator_supported_female }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-6" -->

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">COMPETENT</div>
                                <div class="panel-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td rowspan="2">Enterprises</td>
                                                <td colspan="2">MSE Operators</td>
                                                <td colspan="2">Number of MSE Operators supported by IE</td>
                                            </tr>
                                            <tr>
                                                <td>Male</td>
                                                <td>Female</td>
                                                <td>Male</td>
                                                <td>Female</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $industry_extension2->competent_enterprise }}</td>
                                                <td>{{ $industry_extension2->competent_mse_operator_male }}</td>
                                                <td>{{ $industry_extension2->competent_mse_operator_female }}</td>
                                                <td>{{ $industry_extension2->competent_mse_operator_supported_male }}</td>
                                                <td>{{ $industry_extension2->competent_mse_operator_supported_female }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-6" -->

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Remarks</div>
                                <div class="panel-body">
                                    {{ $industry_extension2->remarks }}
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

    {!! $industry_extension2s->render() !!}
@stop