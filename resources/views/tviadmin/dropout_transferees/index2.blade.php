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
    <h1>Dropout From Transferees </h1>

    {!! $dropout_transferees->render() !!}

    <div class="panel panel-default">
        <div class="panel-heading">Report Schedule : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    @forelse($dropout_transferees as $dropout_transferee)
        <div class="panel panel-default">
            <div class="panel-heading">Occupation : {{ $dropout_transferee->occupation->name }}<br>
                <a href="{{ '/dropout-from-transferees/' . $dropout_transferee->id }}/edit"
                    title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>&nbsp;
                <a href="{{ '/dropout-from-transferees/' . $dropout_transferee->id }}/delete"
                    title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Regular</div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>From Level</td>
                                            <td>Male</td>
                                            <td>Female</td>
                                            <td>Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1 to 2</td>
                                            <td>{{ $dropout_transferee->regular_level1_to_level2_male }}</td>
                                            <td>{{ $dropout_transferee->regular_level1_to_level2_female }}</td>
                                            <td>{{ $dropout_transferee->regular_level1_to_level2_male + $dropout_transferee->regular_level1_to_level2_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>2 to 3</td>
                                            <td>{{ $dropout_transferee->regular_level2_to_level3_male }}</td>
                                            <td>{{ $dropout_transferee->regular_level2_to_level3_female }}</td>
                                            <td>{{ $dropout_transferee->regular_level2_to_level3_male + $dropout_transferee->regular_level2_to_level3_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>3 to 4</td>
                                            <td>{{ $dropout_transferee->regular_level3_to_level4_male }}</td>
                                            <td>{{ $dropout_transferee->regular_level3_to_level4_female }}</td>
                                            <td>{{ $dropout_transferee->regular_level3_to_level4_male + $dropout_transferee->regular_level3_to_level4_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>4 to 5</td>
                                            <td>{{ $dropout_transferee->regular_level4_to_level5_male }}</td>
                                            <td>{{ $dropout_transferee->regular_level4_to_level5_female }}</td>
                                            <td>{{ $dropout_transferee->regular_level4_to_level5_male + $dropout_transferee->regular_level4_to_level5_female }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>TOTAL</td>
                                            <td>{{ $dropout_transferee->regular_level1_to_level2_male +
                                                    $dropout_transferee->regular_level2_to_level3_male +
                                                    $dropout_transferee->regular_level3_to_level4_male +
                                                    $dropout_transferee->regular_level4_to_level5_male }}</td>
                                            <td>{{ $dropout_transferee->regular_level1_to_level2_female +
                                                    $dropout_transferee->regular_level2_to_level3_female +
                                                    $dropout_transferee->regular_level3_to_level4_female +
                                                    $dropout_transferee->regular_level4_to_level5_female }}</td>
                                            <td>{{ $dropout_transferee->regular_level1_to_level2_male +
                                                    $dropout_transferee->regular_level2_to_level3_male +
                                                    $dropout_transferee->regular_level3_to_level4_male +
                                                    $dropout_transferee->regular_level4_to_level5_male +
                                                    $dropout_transferee->regular_level1_to_level2_female +
                                                    $dropout_transferee->regular_level2_to_level3_female +
                                                    $dropout_transferee->regular_level3_to_level4_female +
                                                    $dropout_transferee->regular_level4_to_level5_female }}</td>
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
                                            <td>From Level</td>
                                            <td>Male</td>
                                            <td>Female</td>
                                            <td>Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1 to 2</td>
                                            <td>{{ $dropout_transferee->extension_level1_to_level2_male }}</td>
                                            <td>{{ $dropout_transferee->extension_level1_to_level2_female }}</td>
                                            <td>{{ $dropout_transferee->extension_level1_to_level2_male + $dropout_transferee->extension_level1_to_level2_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>2 to 3</td>
                                            <td>{{ $dropout_transferee->extension_level2_to_level3_male }}</td>
                                            <td>{{ $dropout_transferee->extension_level2_to_level3_female }}</td>
                                            <td>{{ $dropout_transferee->extension_level2_to_level3_male + $dropout_transferee->extension_level2_to_level3_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>3 to 4</td>
                                            <td>{{ $dropout_transferee->extension_level3_to_level4_male }}</td>
                                            <td>{{ $dropout_transferee->extension_level3_to_level4_female }}</td>
                                            <td>{{ $dropout_transferee->extension_level3_to_level4_male + $dropout_transferee->extension_level3_to_level4_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>4 to 5</td>
                                            <td>{{ $dropout_transferee->extension_level4_to_level5_male }}</td>
                                            <td>{{ $dropout_transferee->extension_level4_to_level5_female }}</td>
                                            <td>{{ $dropout_transferee->extension_level4_to_level5_male + $dropout_transferee->extension_level4_to_level5_female }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>TOTAL</td>
                                            <td>{{ $dropout_transferee->extension_level1_to_level2_male +
                                                    $dropout_transferee->extension_level2_to_level3_male +
                                                    $dropout_transferee->extension_level3_to_level4_male +
                                                    $dropout_transferee->extension_level4_to_level5_male }}</td>
                                            <td>{{ $dropout_transferee->extension_level1_to_level2_female +
                                                    $dropout_transferee->extension_level2_to_level3_female +
                                                    $dropout_transferee->extension_level3_to_level4_female +
                                                    $dropout_transferee->extension_level4_to_level5_female }}</td>
                                            <td>{{ $dropout_transferee->extension_level1_to_level2_male +
                                                    $dropout_transferee->extension_level2_to_level3_male +
                                                    $dropout_transferee->extension_level3_to_level4_male +
                                                    $dropout_transferee->extension_level4_to_level5_male +
                                                    $dropout_transferee->extension_level1_to_level2_female +
                                                    $dropout_transferee->extension_level2_to_level3_female +
                                                    $dropout_transferee->extension_level3_to_level4_female +
                                                    $dropout_transferee->extension_level4_to_level5_female }}</td>
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

    {!! $dropout_transferees->render() !!}
@stop