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
    <h1>Short-Term Trainees</h1>
    <div class="panel panel-default">
        <div class="panel-heading"><a href="/short-term-trainees/create" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <div class="panel-body">Report Schedule : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    {!! $short_term_trainees->render() !!}

    @forelse($short_term_trainees as $short_term_trainee)

        <div class="row short-term-trainee">
            <div class="col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <a data-toggle="collapse" href="{{ '#item' . $short_term_trainee->id }}"><h4>{{ $short_term_trainee->occupation->name }}&nbsp;<span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></h4></a>
                        <a href="{{ '/short-term-trainees/' . $short_term_trainee->id }}/edit"
                        title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>&nbsp;
                        <a href="{{ '/short-term-trainees/' . $short_term_trainee->id }}/delete"
                        title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                    </div>

                    <div id="{{ 'item' . $short_term_trainee->id }}" class="panel-collapse collapse">
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
                                        <td>Registered</td>
                                        <td>{{ $short_term_trainee->registered_male }}</td>
                                        <td>{{ $short_term_trainee->registered_female }}</td>
                                        <td>{{ $short_term_trainee->registered_male + $short_term_trainee->registered_female }}</td>
                                    </tr>
                                    <tr>
                                        <td>Started Training</td>
                                        <td>{{ $short_term_trainee->started_training_male }}</td>
                                        <td>{{ $short_term_trainee->started_training_female }}</td>
                                        <td>{{ $short_term_trainee->started_training_male + $short_term_trainee->started_training_female }}</td>
                                    </tr>
                                    <tr>
                                        <td>Completed Training</td>
                                        <td>{{ $short_term_trainee->completed_training_male }}</td>
                                        <td>{{ $short_term_trainee->completed_training_female }}</td>
                                        <td>{{ $short_term_trainee->completed_training_male + $short_term_trainee->completed_training_female }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sent To Assessment</td>
                                        <td>{{ $short_term_trainee->sent_assessment_male }}</td>
                                        <td>{{ $short_term_trainee->sent_assessment_female }}</td>
                                        <td>{{ $short_term_trainee->sent_assessment_male + $short_term_trainee->sent_assessment_female }}</td>
                                    </tr>
                                    <tr>
                                        <td>Assessed</td>
                                        <td>{{ $short_term_trainee->assessed_male }}</td>
                                        <td>{{ $short_term_trainee->assessed_female }}</td>
                                        <td>{{ $short_term_trainee->assessed_male + $short_term_trainee->assessed_female }}</td>
                                    </tr>
                                    <tr>
                                        <td>Competent</td>
                                        <td>{{ $short_term_trainee->competent_male }}</td>
                                        <td>{{ $short_term_trainee->competent_female }}</td>
                                        <td>{{ $short_term_trainee->competent_male + $short_term_trainee->competent_female }}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>TOTAL</td>
                                        <td>{{ $short_term_trainee->registered_male +
                                                $short_term_trainee->started_training_male +
                                                $short_term_trainee->completed_training_male +
                                                $short_term_trainee->sent_assessment_male +
                                                $short_term_trainee->assessed_male +
                                                $short_term_trainee->competent_male }}</td>
                                        <td>{{ $short_term_trainee->registered_female +
                                                $short_term_trainee->started_training_female +
                                                $short_term_trainee->completed_training_female +
                                                $short_term_trainee->sent_assessment_female +
                                                $short_term_trainee->assessed_female +
                                                $short_term_trainee->competent_female }}</td>
                                        <td>{{ $short_term_trainee->registered_male +
                                                $short_term_trainee->started_training_male +
                                                $short_term_trainee->completed_training_male +
                                                $short_term_trainee->sent_assessment_male +
                                                $short_term_trainee->assessed_male +
                                                $short_term_trainee->competent_male +
                                                $short_term_trainee->registered_female +
                                                $short_term_trainee->started_training_female +
                                                $short_term_trainee->completed_training_female +
                                                $short_term_trainee->sent_assessment_female +
                                                $short_term_trainee->assessed_female +
                                                $short_term_trainee->competent_female }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- div class="col-md-6 col-sm-6" -->

        </div> <!-- div class="row" -->
    @empty
        <p class="alert alert-info">No entries...</p>
    @endforelse

    {!! $short_term_trainees->render() !!}
@stop