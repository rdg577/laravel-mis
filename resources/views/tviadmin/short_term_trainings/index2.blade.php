<?php
    // $url = \Illuminate\Support\Facades\Request::url();
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
    <h1>Short-Term Trainings</h1>
    <div class="panel panel-default">
        <div class="panel-heading"><a href="/short-term-trainings/create?id={{ $report_date->id }}" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <div class="panel-body">Report Date : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    {!! $short_term_trainings->render() !!}

    @forelse($short_term_trainings as $short_term_training)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" href="{{ '#item' . $short_term_training->id }}"><h4>{{ $short_term_training->occupation->name }}</h4></a>
                <p>{{ $short_term_training->competency->name }} :: Duration : {{ $short_term_training->course_started }} to {{ $short_term_training->course_ended }}</p>
                <a data-toggle="collapse" href="{{ '#item' . $short_term_training->id }}"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
                <a href="{{ '/short-term-trainings/' . $short_term_training->id }}/edit"
                    title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>&nbsp;<a href="{{ '/short-term-trainings/' . $short_term_training->id }}/delete"
                    title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div> <!-- div class="panel-heading" -->
            <div id="{{ 'item' . $short_term_training->id }}" class="panel-collapse collapse">
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
                                                <td>{{ $short_term_training->below17_male }}</td>
                                                <td>{{ $short_term_training->below17_female }}</td>
                                                <td>{{ $short_term_training->below17_male + $short_term_training->below17_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>Aged 17 to 19</td>
                                                <td>{{ $short_term_training->from17to19_male }}</td>
                                                <td>{{ $short_term_training->from17to19_female }}</td>
                                                <td>{{ $short_term_training->from17to19_male + $short_term_training->from17to19_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>Beyond 19</td>
                                                <td>{{ $short_term_training->above19_male }}</td>
                                                <td>{{ $short_term_training->above19_female }}</td>
                                                <td>{{ $short_term_training->above19_male + $short_term_training->above19_female }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $short_term_training->below17_male + $short_term_training->from17to19_male + $short_term_training->above19_male }}</td>
                                                <td>{{ $short_term_training->below17_female + $short_term_training->from17to19_female + $short_term_training->above19_female }}</td>
                                                <td>{{ $short_term_training->below17_male + $short_term_training->below17_female +
                                                        $short_term_training->from17to19_male + $short_term_training->from17to19_female +
                                                        $short_term_training->above19_male + $short_term_training->above19_female }}</td>
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
                                                <td>No Education</td>
                                                <td>{{ $short_term_training->no_education_male }}</td>
                                                <td>{{ $short_term_training->no_education_female }}</td>
                                                <td>{{ ($short_term_training->no_education_male + $short_term_training->no_education_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Elementary</td>
                                                <td>{{ $short_term_training->elementary_male }}</td>
                                                <td>{{ $short_term_training->elementary_female }}</td>
                                                <td>{{ ($short_term_training->elementary_male + $short_term_training->elementary_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>High School</td>
                                                <td>{{ $short_term_training->high_school_male }}</td>
                                                <td>{{ $short_term_training->high_school_female }}</td>
                                                <td>{{ ($short_term_training->high_school_male + $short_term_training->high_school_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Preparatory</td>
                                                <td>{{ $short_term_training->preparatory_male }}</td>
                                                <td>{{ $short_term_training->preparatory_female }}</td>
                                                <td>{{ ($short_term_training->preparatory_male + $short_term_training->preparatory_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Higher Education</td>
                                                <td>{{ $short_term_training->higher_education_male }}</td>
                                                <td>{{ $short_term_training->higher_education_female }}</td>
                                                <td>{{ ($short_term_training->higher_education_male + $short_term_training->higher_education_female) }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $short_term_training->no_education_male +
                                                        $short_term_training->elementary_male +
                                                        $short_term_training->high_school_male +
                                                        $short_term_training->preparatory_male +
                                                        $short_term_training->higher_education_male }}</td>
                                                <td>{{ $short_term_training->no_education_female +
                                                        $short_term_training->elementary_female +
                                                        $short_term_training->high_school_female +
                                                        $short_term_training->preparatory_female +
                                                        $short_term_training->higher_education_female }}</td>
                                                <td>{{ $short_term_training->no_education_male +
                                                        $short_term_training->elementary_male +
                                                        $short_term_training->high_school_male +
                                                        $short_term_training->preparatory_male +
                                                        $short_term_training->higher_education_male +
                                                        $short_term_training->no_education_female +
                                                        $short_term_training->elementary_female +
                                                        $short_term_training->high_school_female +
                                                        $short_term_training->preparatory_female +
                                                        $short_term_training->higher_education_female }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- div class="col-md-4" -->
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
                                                <td>{{ $short_term_training->mental_male }}</td>
                                                <td>{{ $short_term_training->mental_female }}</td>
                                                <td>{{ ($short_term_training->mental_male + $short_term_training->mental_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Visual</td>
                                                <td>{{ $short_term_training->visual_male }}</td>
                                                <td>{{ $short_term_training->visual_female }}</td>
                                                <td>{{ ($short_term_training->visual_male + $short_term_training->visual_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Hearing</td>
                                                <td>{{ $short_term_training->hearing_male }}</td>
                                                <td>{{ $short_term_training->hearing_female }}</td>
                                                <td>{{ ($short_term_training->hearing_male + $short_term_training->hearing_female) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Physical</td>
                                                <td>{{ $short_term_training->physical_male }}</td>
                                                <td>{{ $short_term_training->physical_female }}</td>
                                                <td>{{ ($short_term_training->physical_male + $short_term_training->physical_female) }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $short_term_training->mental_male + $short_term_training->visual_male +
                                                        $short_term_training->hearing_male + $short_term_training->physical_male }}</td>
                                                <td>{{ $short_term_training->mental_female + $short_term_training->visual_female +
                                                        $short_term_training->hearing_female + $short_term_training->physical_female }}</td>
                                                <td>{{ $short_term_training->mental_male + $short_term_training->visual_male +
                                                        $short_term_training->hearing_male + $short_term_training->physical_male +
                                                        $short_term_training->mental_female + $short_term_training->visual_female +
                                                        $short_term_training->hearing_female + $short_term_training->physical_female }}</td>
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
                                <div class="panel-heading">Modalities</div>
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
                                                <td>Cooperative</td>
                                                <td>{{ $short_term_training->cooperative }}</td>
                                            </tr>
                                            <tr>
                                                <td>Non-Cooperative</td>
                                                <td>{{ $short_term_training->non_cooperative }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>{{ $short_term_training->cooperative + $short_term_training->non_cooperative }}</td>
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
                                    {{ $short_term_training->remarks }}
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


    {!! $short_term_trainings->render() !!}
@stop