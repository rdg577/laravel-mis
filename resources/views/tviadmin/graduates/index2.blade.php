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
    <h1>Graduates</h1>

    {!! $graduates->render() !!}

    <div class="panel panel-default">
        <div class="panel-heading">Report Schedule : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    @forelse($graduates as $graduate)
        <div class="panel panel-default">
            <div class="panel-heading">Occupation : {{ $graduate->occupation->name }}<br>
                <a href="{{ '/trainees-graduates/' . $graduate->id }}/edit"
                    title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>&nbsp;
                <a href="{{ '/trainees-graduates/' . $graduate->id }}/delete"
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
                                            <td>&nbsp;</td>
                                            <td>Male</td>
                                            <td>Female</td>
                                            <td>Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Level 1</td>
                                            <td>{{ $graduate->regular_level1_male }}</td>
                                            <td>{{ $graduate->regular_level1_female }}</td>
                                            <td>{{ $graduate->regular_level1_male + $graduate->regular_level1_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 2</td>
                                            <td>{{ $graduate->regular_level2_male }}</td>
                                            <td>{{ $graduate->regular_level2_female }}</td>
                                            <td>{{ $graduate->regular_level2_male + $graduate->regular_level2_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 3</td>
                                            <td>{{ $graduate->regular_level3_male }}</td>
                                            <td>{{ $graduate->regular_level3_female }}</td>
                                            <td>{{ $graduate->regular_level3_male + $graduate->regular_level3_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 4</td>
                                            <td>{{ $graduate->regular_level4_male }}</td>
                                            <td>{{ $graduate->regular_level4_female }}</td>
                                            <td>{{ $graduate->regular_level4_male + $graduate->regular_level4_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 5</td>
                                            <td>{{ $graduate->regular_level5_male }}</td>
                                            <td>{{ $graduate->regular_level5_female }}</td>
                                            <td>{{ $graduate->regular_level5_male + $graduate->regular_level5_female }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>TOTAL</td>
                                            <td>{{ $graduate->regular_level1_male +
                                                    $graduate->regular_level2_male +
                                                    $graduate->regular_level3_male +
                                                    $graduate->regular_level4_male +
                                                    $graduate->regular_level5_male }}</td>
                                            <td>{{ $graduate->regular_level1_female +
                                                    $graduate->regular_level2_female +
                                                    $graduate->regular_level3_female +
                                                    $graduate->regular_level4_female +
                                                    $graduate->regular_level5_female }}</td>
                                            <td>{{ $graduate->regular_level1_male +
                                                    $graduate->regular_level2_male +
                                                    $graduate->regular_level3_male +
                                                    $graduate->regular_level4_male +
                                                    $graduate->regular_level5_male +
                                                    $graduate->regular_level1_female +
                                                    $graduate->regular_level2_female +
                                                    $graduate->regular_level3_female +
                                                    $graduate->regular_level4_female +
                                                    $graduate->regular_level5_female }}</td>
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
                                            <td>{{ $graduate->extension_level1_male }}</td>
                                            <td>{{ $graduate->extension_level1_female }}</td>
                                            <td>{{ $graduate->extension_level1_male + $graduate->extension_level1_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 2</td>
                                            <td>{{ $graduate->extension_level2_male }}</td>
                                            <td>{{ $graduate->extension_level2_female }}</td>
                                            <td>{{ $graduate->extension_level2_male + $graduate->extension_level2_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 3</td>
                                            <td>{{ $graduate->extension_level3_male }}</td>
                                            <td>{{ $graduate->extension_level3_female }}</td>
                                            <td>{{ $graduate->extension_level3_male + $graduate->extension_level3_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 4</td>
                                            <td>{{ $graduate->extension_level4_male }}</td>
                                            <td>{{ $graduate->extension_level4_female }}</td>
                                            <td>{{ $graduate->extension_level4_male + $graduate->extension_level4_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 5</td>
                                            <td>{{ $graduate->extension_level5_male }}</td>
                                            <td>{{ $graduate->extension_level5_female }}</td>
                                            <td>{{ $graduate->extension_level5_male + $graduate->extension_level5_female }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>TOTAL</td>
                                            <td>{{ $graduate->extension_level1_male +
                                                    $graduate->extension_level2_male +
                                                    $graduate->extension_level3_male +
                                                    $graduate->extension_level4_male +
                                                    $graduate->extension_level5_male }}</td>
                                            <td>{{ $graduate->extension_level1_female +
                                                    $graduate->extension_level2_female +
                                                    $graduate->extension_level3_female +
                                                    $graduate->extension_level4_female +
                                                    $graduate->extension_level5_female }}</td>
                                            <td>{{ $graduate->extension_level1_male +
                                                    $graduate->extension_level2_male +
                                                    $graduate->extension_level3_male +
                                                    $graduate->extension_level4_male +
                                                    $graduate->extension_level5_male +
                                                    $graduate->extension_level1_female +
                                                    $graduate->extension_level2_female +
                                                    $graduate->extension_level3_female +
                                                    $graduate->extension_level4_female +
                                                    $graduate->extension_level5_female }}</td>
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

    {!! $graduates->render() !!}
@stop