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
    <h1>Industry Extension # 4</h1>

    <div class="panel panel-default">
        <div class="panel-heading"><a href="/industry-extension-4/create?id={{ $report_date->id }}" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <div class="panel-body">Report Schedule : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    {!! $industry_extension4s->render() !!}

    @forelse($industry_extension4s as $industry_extension4)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" href="{{ '#item' . $industry_extension4->id }}"><h4>{{ $industry_extension4->subsector->name }}</h4><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
                <a href="{{ '/industry-extension-4/' . $industry_extension4->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit"
                    aria-hidden="true"></span></a>&nbsp;<a href="{{ '/industry-extension-4/' . $industry_extension4->id }}/delete"
                title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div> <!-- div class="panel-heading" -->

            <div id="{{ 'item' . $industry_extension4->id }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Number of trainees who completed the training</div>
                                <div class="panel-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>Male</th>
                                                <th>Female</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Short Term Training</th>
                                                <td>{{ $industry_extension4->short_term_male }}</td>
                                                <td>{{ $industry_extension4->short_term_female }}</td>
                                                <td>{{ $industry_extension4->short_term_male + $industry_extension4->short_term_female  }}</td>
                                            </tr>
                                            <tr>
                                                <th>Level 1 and 2</th>
                                                <td>{{ $industry_extension4->level1n2_male }}</td>
                                                <td>{{ $industry_extension4->level1n2_female }}</td>
                                                <td>{{ $industry_extension4->level1n2_male + $industry_extension4->level1n2_female  }}</td>
                                            </tr>
                                            <tr>
                                                <th>Level 3 and 4</th>
                                                <td>{{ $industry_extension4->level3n4_male }}</td>
                                                <td>{{ $industry_extension4->level3n4_female }}</td>
                                                <td>{{ $industry_extension4->level3n4_male + $industry_extension4->level3n4_female  }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>{{ $industry_extension4->short_term_male +
                                                        $industry_extension4->level1n2_male +
                                                        $industry_extension4->level3n4_male }}</td>
                                                <td>{{ $industry_extension4->short_term_female +
                                                        $industry_extension4->level1n2_female +
                                                        $industry_extension4->level3n4_female }}</td>
                                                <td>{{ $industry_extension4->short_term_male +
                                                        $industry_extension4->level1n2_male +
                                                        $industry_extension4->level3n4_male +
                                                        $industry_extension4->short_term_female +
                                                        $industry_extension4->level1n2_female +
                                                        $industry_extension4->level3n4_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->
                        </div> <!-- div class="col-md-6" -->

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Establish firm and started work</div>
                                <div class="panel-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>Male</th>
                                                <th>Female</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Operators</th>
                                                <td>{{ $industry_extension4->operator_male }}</td>
                                                <td>{{ $industry_extension4->operator_female }}</td>
                                                <td>{{ $industry_extension4->operator_male + $industry_extension4->operator_female  }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>MSE</th>
                                                <td>{{ $industry_extension4->mse }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->
                        </div> <!-- div class="col-md-6" -->

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Remarks</div>
                                <div class="panel-body">
                                    {{ $industry_extension4->remarks }}
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

    {!! $industry_extension4s->render() !!}
@stop