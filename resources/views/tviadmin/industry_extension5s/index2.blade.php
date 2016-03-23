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
    <h1>Industry Extension # 5</h1>

    <div class="panel panel-default">
        <div class="panel-heading"><a href="/industry-extension-5/create?id={{ $report_date->id }}" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <div class="panel-body">Report Date : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    {!! $industry_extension5s->render() !!}

    @forelse($industry_extension5s as $industry_extension5)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" href="{{ '#item' . $industry_extension5->id }}"><h4>{{ $industry_extension5->subsector->name }} - {{ $industry_extension5->ie_field }}</h4><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
                <a href="{{ '/industry-extension-5/' . $industry_extension5->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit"
                    aria-hidden="true"></span></a>&nbsp;<a href="{{ '/industry-extension-5/' . $industry_extension5->id }}/delete"
                title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div> <!-- div class="panel-heading" -->

            <div id="{{ 'item' . $industry_extension5->id }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Number of trainers capacitated</div>
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
                                                <th>Level C</th>
                                                <td>{{ $industry_extension5->level_c_male }}</td>
                                                <td>{{ $industry_extension5->level_c_female }}</td>
                                                <td>{{ $industry_extension5->level_c_male + $industry_extension5->level_c_female  }}</td>
                                            </tr>
                                            <tr>
                                                <th>Level B</th>
                                                <td>{{ $industry_extension5->level_b_male }}</td>
                                                <td>{{ $industry_extension5->level_b_female }}</td>
                                                <td>{{ $industry_extension5->level_b_male + $industry_extension5->level_b_female  }}</td>
                                            </tr>
                                            <tr>
                                                <th>Level A</th>
                                                <td>{{ $industry_extension5->level_a_male }}</td>
                                                <td>{{ $industry_extension5->level_a_female }}</td>
                                                <td>{{ $industry_extension5->level_a_male + $industry_extension5->level_a_female  }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>{{ $industry_extension5->level_c_male +
                                                        $industry_extension5->level_b_male +
                                                        $industry_extension5->level_a_male }}</td>
                                                <td>{{ $industry_extension5->level_c_female +
                                                        $industry_extension5->level_b_female +
                                                        $industry_extension5->level_a_female }}</td>
                                                <td>{{ $industry_extension5->level_c_male +
                                                        $industry_extension5->level_b_male +
                                                        $industry_extension5->level_a_male +
                                                        $industry_extension5->level_c_female +
                                                        $industry_extension5->level_b_female +
                                                        $industry_extension5->level_a_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->
                        </div> <!-- div class="col-md-6" -->

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Number of companies supported in IE by the TVET Institute (by type of company)</div>
                                <div class="panel-body">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Micro</th>
                                                <td>{{ $industry_extension5->micro }}</td>
                                            </tr>
                                            <tr>
                                                <th>Small</th>
                                                <td>{{ $industry_extension5->small }}</td>
                                            </tr>
                                            <tr>
                                                <th>Medium</th>
                                                <td>{{ $industry_extension5->medium }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->
                        </div> <!-- div class="col-md-6" -->

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Four supported fields of IE	</div>
                                <div class="panel-body">
                                    {{ $industry_extension5->ie_field }}
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->
                        </div> <!-- div class="col-md-6" -->

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Remarks</div>
                                <div class="panel-body">
                                    {{ $industry_extension5->remarks }}
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

    {!! $industry_extension5s->render() !!}
@stop