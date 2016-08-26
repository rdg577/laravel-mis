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
    <h1>Dropout Short-Term Trainees</h1>

    {!! $dropout_short_term->render() !!}

    <div class="panel panel-default">
        <div class="panel-heading">Report Schedule : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    @forelse($dropout_short_term as $dropout_shortterm)
        <div class="panel panel-default">
            <div class="panel-heading">Occupation : {{ $dropout_shortterm->occupation->name }}<br>
                <a href="{{ '/dropout-short-term/' . $dropout_shortterm->id }}/edit"
                    title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>&nbsp;
                <a href="{{ '/dropout-short-term/' . $dropout_shortterm->id }}/delete"
                    title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Regular</div>
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
                                            <td>Level 1</td>
                                            <td>{{ $dropout_shortterm->regular_level1_male }}</td>
                                            <td>{{ $dropout_shortterm->regular_level1_female }}</td>
                                            <td>{{ $dropout_shortterm->regular_level1_male + $dropout_shortterm->regular_level1_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 2</td>
                                            <td>{{ $dropout_shortterm->regular_level2_male }}</td>
                                            <td>{{ $dropout_shortterm->regular_level2_female }}</td>
                                            <td>{{ $dropout_shortterm->regular_level2_male + $dropout_shortterm->regular_level2_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 3</td>
                                            <td>{{ $dropout_shortterm->regular_level3_male }}</td>
                                            <td>{{ $dropout_shortterm->regular_level3_female }}</td>
                                            <td>{{ $dropout_shortterm->regular_level3_male + $dropout_shortterm->regular_level3_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 4</td>
                                            <td>{{ $dropout_shortterm->regular_level4_male }}</td>
                                            <td>{{ $dropout_shortterm->regular_level4_female }}</td>
                                            <td>{{ $dropout_shortterm->regular_level4_male + $dropout_shortterm->regular_level4_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 5</td>
                                            <td>{{ $dropout_shortterm->regular_level5_male }}</td>
                                            <td>{{ $dropout_shortterm->regular_level5_female }}</td>
                                            <td>{{ $dropout_shortterm->regular_level5_male + $dropout_shortterm->regular_level5_female }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>TOTAL</td>
                                            <td>{{ $dropout_shortterm->regular_level1_male +
                                                    $dropout_shortterm->regular_level2_male +
                                                    $dropout_shortterm->regular_level3_male +
                                                    $dropout_shortterm->regular_level4_male +
                                                    $dropout_shortterm->regular_level5_male }}</td>
                                            <td>{{ $dropout_shortterm->regular_level1_female +
                                                    $dropout_shortterm->regular_level2_female +
                                                    $dropout_shortterm->regular_level3_female +
                                                    $dropout_shortterm->regular_level4_female +
                                                    $dropout_shortterm->regular_level5_female }}</td>
                                            <td>{{ $dropout_shortterm->regular_level1_male +
                                                    $dropout_shortterm->regular_level2_male +
                                                    $dropout_shortterm->regular_level3_male +
                                                    $dropout_shortterm->regular_level4_male +
                                                    $dropout_shortterm->regular_level5_male +
                                                    $dropout_shortterm->regular_level1_female +
                                                    $dropout_shortterm->regular_level2_female +
                                                    $dropout_shortterm->regular_level3_female +
                                                    $dropout_shortterm->regular_level4_female +
                                                    $dropout_shortterm->regular_level5_female }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> <!-- div class="col-md-6 col-sm-6" -->

                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Extension</div>
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
                                            <td>Level 1</td>
                                            <td>{{ $dropout_shortterm->extension_level1_male }}</td>
                                            <td>{{ $dropout_shortterm->extension_level1_female }}</td>
                                            <td>{{ $dropout_shortterm->extension_level1_male + $dropout_shortterm->extension_level1_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 2</td>
                                            <td>{{ $dropout_shortterm->extension_level2_male }}</td>
                                            <td>{{ $dropout_shortterm->extension_level2_female }}</td>
                                            <td>{{ $dropout_shortterm->extension_level2_male + $dropout_shortterm->extension_level2_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 3</td>
                                            <td>{{ $dropout_shortterm->extension_level3_male }}</td>
                                            <td>{{ $dropout_shortterm->extension_level3_female }}</td>
                                            <td>{{ $dropout_shortterm->extension_level3_male + $dropout_shortterm->extension_level3_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 4</td>
                                            <td>{{ $dropout_shortterm->extension_level4_male }}</td>
                                            <td>{{ $dropout_shortterm->extension_level4_female }}</td>
                                            <td>{{ $dropout_shortterm->extension_level4_male + $dropout_shortterm->extension_level4_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 5</td>
                                            <td>{{ $dropout_shortterm->extension_level5_male }}</td>
                                            <td>{{ $dropout_shortterm->extension_level5_female }}</td>
                                            <td>{{ $dropout_shortterm->extension_level5_male + $dropout_shortterm->extension_level5_female }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>TOTAL</td>
                                            <td>{{ $dropout_shortterm->extension_level1_male +
                                                    $dropout_shortterm->extension_level2_male +
                                                    $dropout_shortterm->extension_level3_male +
                                                    $dropout_shortterm->extension_level4_male +
                                                    $dropout_shortterm->extension_level5_male }}</td>
                                            <td>{{ $dropout_shortterm->extension_level1_female +
                                                    $dropout_shortterm->extension_level2_female +
                                                    $dropout_shortterm->extension_level3_female +
                                                    $dropout_shortterm->extension_level4_female +
                                                    $dropout_shortterm->extension_level5_female }}</td>
                                            <td>{{ $dropout_shortterm->extension_level1_male +
                                                    $dropout_shortterm->extension_level2_male +
                                                    $dropout_shortterm->extension_level3_male +
                                                    $dropout_shortterm->extension_level4_male +
                                                    $dropout_shortterm->extension_level5_male +
                                                    $dropout_shortterm->extension_level1_female +
                                                    $dropout_shortterm->extension_level2_female +
                                                    $dropout_shortterm->extension_level3_female +
                                                    $dropout_shortterm->extension_level4_female +
                                                    $dropout_shortterm->extension_level5_female }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> <!-- div class="col-md-6 col-sm-6" -->
                </div> <!-- div class="row" -->
            </div>
        </div> <!-- div class="panel panel-default" -->


    @empty
        <p class="alert alert-info">No entries...</p>
    @endforelse

    {!! $dropout_short_term->render() !!}
@stop