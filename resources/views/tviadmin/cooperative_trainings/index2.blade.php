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
    <h1>Cooperative Trainings</h1>

    <div class="panel panel-default">
        <div class="panel-heading"><a href="/cooperative-trainings/create?id={{ $report_date->id }}" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <div class="panel-body">Report Date : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    {!! $cooperative_trainings->render() !!}

    @forelse($cooperative_trainings as $cooperative_training)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" href="{{ '#item' . $cooperative_training->id }}"><h4>{{ $cooperative_training->occupation->name }}</h4><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
                <a href="{{ '/cooperative-trainings/' . $cooperative_training->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit"
                    aria-hidden="true"></span></a>&nbsp;<a href="{{ '/cooperative-trainings/' . $cooperative_training->id }}/delete"
                title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div> <!-- div class="panel-heading" -->
            <div id="{{ 'item' . $cooperative_training->id }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Micro and Small Enterprises</div>
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>No.</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>List of MSE's</td>
                                                <td>{{ $cooperative_training->mse_list }}</td>
                                            </tr>
                                            <tr>
                                                <td>Signed MoU</td>
                                                <td>{{ $cooperative_training->mse_mou }}</td>
                                            </tr>
                                            <tr>
                                                <td>Joint Plan</td>
                                                <td>{{ $cooperative_training->mse_joint_plan }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. of MSE's providing training</td>
                                                <td>{{ $cooperative_training->mse_training }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. of trainers in the industry</td>
                                                <td>{{ $cooperative_training->mse_trainers }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $cooperative_training->mse_list +
                                                        $cooperative_training->mse_mou +
                                                        $cooperative_training->mse_joint_plan +
                                                        $cooperative_training->mse_training +
                                                        $cooperative_training->mse_trainers }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-4" -->

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Medium and Large Companies</div>
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>No.</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>List of Medium and Large Companies</td>
                                                <td>{{ $cooperative_training->ml_list }}</td>
                                            </tr>
                                            <tr>
                                                <td>Signed MoU</td>
                                                <td>{{ $cooperative_training->ml_mou }}</td>
                                            </tr>
                                            <tr>
                                                <td>Formed a Joint Plan</td>
                                                <td>{{ $cooperative_training->ml_joint_plan }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. of Medium and Large companies providing training</td>
                                                <td>{{ $cooperative_training->ml_training }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. of In-Company Trainers</td>
                                                <td>{{ $cooperative_training->ml_trainers }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $cooperative_training->ml_list +
                                                        $cooperative_training->ml_mou +
                                                        $cooperative_training->ml_joint_plan +
                                                        $cooperative_training->ml_training +
                                                        $cooperative_training->ml_trainers }}</td>
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
                                    {{ $cooperative_training->remarks }}
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

    {!! $cooperative_trainings->render() !!}
@stop