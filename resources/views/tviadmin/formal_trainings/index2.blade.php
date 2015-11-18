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
    <h1>Formal Trainings</h1>

    <div class="panel panel-default">
        <div class="panel-heading"><a href="/formal-trainings/create" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <div class="panel-body">Report Date : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    {!! $formal_trainings->render() !!}

    @forelse($formal_trainings as $formal_training)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" href="{{ '#item' . $formal_training->id }}"><h4>{{ $formal_training->occupation->name }}</h4></a>
                <p>Duration : {{ $formal_training->course_started }} to {{ $formal_training->course_ended }}</p>
                <a data-toggle="collapse" href="{{ '#item' . $formal_training->id }}"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
                <a href="{{ '/formal-trainings/' . $formal_training->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit"
                    aria-hidden="true"></span></a>&nbsp;<a href="{{ '/formal-trainings/' . $formal_training->id }}/delete"
                title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div> <!-- div class="panel-heading" -->
            <div id="{{ 'item' . $formal_training->id }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Age Group</div>
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
                                                <td>Below 17</td>
                                                <td>{{ $formal_training->below17_male }}</td>
                                                <td>{{ $formal_training->below17_female }}</td>
                                                <td>{{ $formal_training->below17_male + $formal_training->below17_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>Aged 17 to 19</td>
                                                <td>{{ $formal_training->from17to19_male }}</td>
                                                <td>{{ $formal_training->from17to19_female }}</td>
                                                <td>{{ $formal_training->from17to19_male + $formal_training->from17to19_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>Beyond 19</td>
                                                <td>{{ $formal_training->above19_male }}</td>
                                                <td>{{ $formal_training->above19_female }}</td>
                                                <td>{{ $formal_training->above19_male + $formal_training->above19_female }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $formal_training->below17_male + $formal_training->from17to19_male + $formal_training->above19_male }}</td>
                                                <td>{{ $formal_training->below17_female + $formal_training->from17to19_female + $formal_training->above19_female }}</td>
                                                <td>{{ $formal_training->below17_male + $formal_training->below17_female +
                                                        $formal_training->from17to19_male + $formal_training->from17to19_female +
                                                        $formal_training->above19_male + $formal_training->above19_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-4" -->
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Training Mode</div>
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
                                                <td>{{ $formal_training->regular_male }}</td>
                                                <td>{{ $formal_training->regular_female }}</td>
                                                <td>{{ $formal_training->regular_male + $formal_training->regular_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>Extension</td>
                                                <td>{{ $formal_training->extension_male }}</td>
                                                <td>{{ $formal_training->extension_female }}</td>
                                                <td>{{ $formal_training->extension_male + $formal_training->extension_female }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $formal_training->regular_male + $formal_training->extension_male }}</td>
                                                <td>{{ $formal_training->regular_female + $formal_training->extension_female }}</td>
                                                <td>{{ $formal_training->regular_male + $formal_training->regular_female +
                                                        $formal_training->extension_male + $formal_training->extension_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-4" -->
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Educational Background</div>
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
                                                <td>Grade 10</td>
                                                <td>{{ $formal_training->from_grade10_male }}</td>
                                                <td>{{ $formal_training->from_grade10_female }}</td>
                                                <td>{{ ($formal_training->from_grade10_male + $formal_training->from_grade10_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Grade 11</td>
                                                <td>{{ $formal_training->from_grade11_male }}</td>
                                                <td>{{ $formal_training->from_grade11_female }}</td>
                                                <td>{{ ($formal_training->from_grade11_male + $formal_training->from_grade11_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Grade 12</td>
                                                <td>{{ $formal_training->from_grade12_male }}</td>
                                                <td>{{ $formal_training->from_grade12_female }}</td>
                                                <td>{{ ($formal_training->from_grade12_male + $formal_training->from_grade12_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Beyond Grade 12</td>
                                                <td>{{ $formal_training->beyond_grade12_male }}</td>
                                                <td>{{ $formal_training->beyond_grade12_female }}</td>
                                                <td>{{ ($formal_training->beyond_grade12_male + $formal_training->beyond_grade12_female) }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $formal_training->from_grade10_male + $formal_training->from_grade11_male +
                                                        $formal_training->from_grade12_male + $formal_training->beyond_grade12_male }}</td>
                                                <td>{{ $formal_training->from_grade10_female + $formal_training->from_grade11_female +
                                                        $formal_training->from_grade12_female + $formal_training->beyond_grade12_female }}</td>
                                                <td>{{ $formal_training->from_grade10_male + $formal_training->from_grade11_male +
                                                        $formal_training->from_grade12_male + $formal_training->beyond_grade12_male +
                                                        $formal_training->from_grade10_female + $formal_training->from_grade11_female +
                                                        $formal_training->from_grade12_female + $formal_training->beyond_grade12_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-4" -->
                    </div> <!-- div class="row" -->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Disabilities</div>
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
                                                <td>Mental</td>
                                                <td>{{ $formal_training->mental_male }}</td>
                                                <td>{{ $formal_training->mental_female }}</td>
                                                <td>{{ ($formal_training->mental_male + $formal_training->mental_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Visual</td>
                                                <td>{{ $formal_training->visual_male }}</td>
                                                <td>{{ $formal_training->visual_female }}</td>
                                                <td>{{ ($formal_training->visual_male + $formal_training->visual_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Hearing</td>
                                                <td>{{ $formal_training->hearing_male }}</td>
                                                <td>{{ $formal_training->hearing_female }}</td>
                                                <td>{{ ($formal_training->hearing_male + $formal_training->hearing_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Physical</td>
                                                <td>{{ $formal_training->physical_male }}</td>
                                                <td>{{ $formal_training->physical_female }}</td>
                                                <td>{{ ($formal_training->physical_male + $formal_training->physical_female) }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $formal_training->mental_male + $formal_training->visual_male +
                                                        $formal_training->hearing_male + $formal_training->physical_male }}</td>
                                                <td>{{ $formal_training->mental_female + $formal_training->visual_female +
                                                        $formal_training->hearing_female + $formal_training->physical_female }}</td>
                                                <td>{{ $formal_training->mental_male + $formal_training->visual_male +
                                                        $formal_training->hearing_male + $formal_training->physical_male +
                                                        $formal_training->mental_female + $formal_training->visual_female +
                                                        $formal_training->hearing_female + $formal_training->physical_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-4" -->
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Modalities</div>
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
                                                <td>Cooperative</td>
                                                <td>{{ $formal_training->cooperative_male }}</td>
                                                <td>{{ $formal_training->cooperative_female }}</td>
                                                <td>{{ ($formal_training->cooperative_male + $formal_training->cooperative_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Non-Cooperative</td>
                                                <td>{{ $formal_training->noncooperative_male }}</td>
                                                <td>{{ $formal_training->noncooperative_female }}</td>
                                                <td>{{ ($formal_training->noncooperative_male + $formal_training->noncooperative_female) }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $formal_training->cooperative_male + $formal_training->noncooperative_male }}</td>
                                                <td>{{ $formal_training->cooperative_female + $formal_training->noncooperative_female }}</td>
                                                <td>{{ $formal_training->cooperative_male + $formal_training->noncooperative_male +
                                                        $formal_training->cooperative_female + $formal_training->noncooperative_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div> <!-- div class="panel-body" -->
                            </div> <!-- div class="panel panel-default" -->
                        </div> <!-- div class="col-md-4" -->
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Remark</div>
                                <div class="panel-body">
                                    {{ $formal_training->remarks }}
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

    {!! $formal_trainings->render() !!}
@stop