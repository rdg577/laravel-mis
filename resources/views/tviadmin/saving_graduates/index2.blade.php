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
    <h1>Saving on Graduates</h1>

    {!! $saving_graduates->render() !!}

    <div class="panel panel-default">
        <div class="panel-heading">Report Schedule : {{ $report_date->petsa }}</div>
    </div> <!-- div class="panel panel-default" -->

    @forelse($saving_graduates as $saving_graduate)
        <div class="panel panel-default">
            <div class="panel-heading">Sub-sector : {{ $saving_graduate->subsector->name }}<br>
                Occupation : {{ $saving_graduate->occupation->name }}<br>
                <a href="{{ '/saving-graduates/' . $saving_graduate->id }}/edit"
                    title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>&nbsp;
                <a href="{{ '/saving-graduates/' . $saving_graduate->id }}/delete"
                    title="Remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
            </div>
            <div class="panel-body">
                
                <div class="row">
                    <div class="col-md-4 col-sm-4">
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
                                            <td>{{ $saving_graduate->regular_level1_male }}</td>
                                            <td>{{ $saving_graduate->regular_level1_female }}</td>
                                            <td>{{ $saving_graduate->regular_level1_male + $saving_graduate->regular_level1_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 2</td>
                                            <td>{{ $saving_graduate->regular_level2_male }}</td>
                                            <td>{{ $saving_graduate->regular_level2_female }}</td>
                                            <td>{{ $saving_graduate->regular_level2_male + $saving_graduate->regular_level2_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 3</td>
                                            <td>{{ $saving_graduate->regular_level3_male }}</td>
                                            <td>{{ $saving_graduate->regular_level3_female }}</td>
                                            <td>{{ $saving_graduate->regular_level3_male + $saving_graduate->regular_level3_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 4</td>
                                            <td>{{ $saving_graduate->regular_level4_male }}</td>
                                            <td>{{ $saving_graduate->regular_level4_female }}</td>
                                            <td>{{ $saving_graduate->regular_level4_male + $saving_graduate->regular_level4_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 5</td>
                                            <td>{{ $saving_graduate->regular_level5_male }}</td>
                                            <td>{{ $saving_graduate->regular_level5_female }}</td>
                                            <td>{{ $saving_graduate->regular_level5_male + $saving_graduate->regular_level5_female }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>TOTAL</td>
                                            <td>{{ $saving_graduate->regular_level1_male +
                                                    $saving_graduate->regular_level2_male +
                                                    $saving_graduate->regular_level3_male +
                                                    $saving_graduate->regular_level4_male +
                                                    $saving_graduate->regular_level5_male }}</td>
                                            <td>{{ $saving_graduate->regular_level1_female +
                                                    $saving_graduate->regular_level2_female +
                                                    $saving_graduate->regular_level3_female +
                                                    $saving_graduate->regular_level4_female +
                                                    $saving_graduate->regular_level5_female }}</td>
                                            <td>{{ $saving_graduate->regular_level1_male +
                                                    $saving_graduate->regular_level2_male +
                                                    $saving_graduate->regular_level3_male +
                                                    $saving_graduate->regular_level4_male +
                                                    $saving_graduate->regular_level5_male +
                                                    $saving_graduate->regular_level1_female +
                                                    $saving_graduate->regular_level2_female +
                                                    $saving_graduate->regular_level3_female +
                                                    $saving_graduate->regular_level4_female +
                                                    $saving_graduate->regular_level5_female }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> <!-- div class="col-md-4 col-sm-4" -->

                    <div class="col-md-4 col-sm-4">
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
                                            <td>{{ $saving_graduate->extension_level1_male }}</td>
                                            <td>{{ $saving_graduate->extension_level1_female }}</td>
                                            <td>{{ $saving_graduate->extension_level1_male + $saving_graduate->extension_level1_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 2</td>
                                            <td>{{ $saving_graduate->extension_level2_male }}</td>
                                            <td>{{ $saving_graduate->extension_level2_female }}</td>
                                            <td>{{ $saving_graduate->extension_level2_male + $saving_graduate->extension_level2_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 3</td>
                                            <td>{{ $saving_graduate->extension_level3_male }}</td>
                                            <td>{{ $saving_graduate->extension_level3_female }}</td>
                                            <td>{{ $saving_graduate->extension_level3_male + $saving_graduate->extension_level3_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 4</td>
                                            <td>{{ $saving_graduate->extension_level4_male }}</td>
                                            <td>{{ $saving_graduate->extension_level4_female }}</td>
                                            <td>{{ $saving_graduate->extension_level4_male + $saving_graduate->extension_level4_female }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level 5</td>
                                            <td>{{ $saving_graduate->extension_level5_male }}</td>
                                            <td>{{ $saving_graduate->extension_level5_female }}</td>
                                            <td>{{ $saving_graduate->extension_level5_male + $saving_graduate->extension_level5_female }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>TOTAL</td>
                                            <td>{{ $saving_graduate->extension_level1_male +
                                                    $saving_graduate->extension_level2_male +
                                                    $saving_graduate->extension_level3_male +
                                                    $saving_graduate->extension_level4_male +
                                                    $saving_graduate->extension_level5_male }}</td>
                                            <td>{{ $saving_graduate->extension_level1_female +
                                                    $saving_graduate->extension_level2_female +
                                                    $saving_graduate->extension_level3_female +
                                                    $saving_graduate->extension_level4_female +
                                                    $saving_graduate->extension_level5_female }}</td>
                                            <td>{{ $saving_graduate->extension_level1_male +
                                                    $saving_graduate->extension_level2_male +
                                                    $saving_graduate->extension_level3_male +
                                                    $saving_graduate->extension_level4_male +
                                                    $saving_graduate->extension_level5_male +
                                                    $saving_graduate->extension_level1_female +
                                                    $saving_graduate->extension_level2_female +
                                                    $saving_graduate->extension_level3_female +
                                                    $saving_graduate->extension_level4_female +
                                                    $saving_graduate->extension_level5_female }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> <!-- div class="col-md-4 col-sm-4" -->

                    <div class="col-md-4 col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Saving</div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>Regular</td>
                                        <td>Extension</td>
                                        <td>Total</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Level 1</td>
                                        <td>{{ $saving_graduate->regular_level1_saving }}</td>
                                        <td>{{ $saving_graduate->extension_level1_saving }}</td>
                                        <td>{{ $saving_graduate->regular_level1_saving + $saving_graduate->extension_level1_saving }}</td>
                                    </tr>
                                    <tr>
                                        <td>Level 2</td>
                                        <td>{{ $saving_graduate->regular_level2_saving }}</td>
                                        <td>{{ $saving_graduate->extension_level2_saving }}</td>
                                        <td>{{ $saving_graduate->regular_level2_saving + $saving_graduate->extension_level2_saving }}</td>
                                    </tr>
                                    <tr>
                                        <td>Level 3</td>
                                        <td>{{ $saving_graduate->regular_level3_saving }}</td>
                                        <td>{{ $saving_graduate->extension_level3_saving }}</td>
                                        <td>{{ $saving_graduate->regular_level3_saving + $saving_graduate->extension_level3_saving }}</td>
                                    </tr>
                                    <tr>
                                        <td>Level 4</td>
                                        <td>{{ $saving_graduate->regular_level4_saving }}</td>
                                        <td>{{ $saving_graduate->extension_level4_saving }}</td>
                                        <td>{{ $saving_graduate->regular_level4_saving + $saving_graduate->extension_level4_saving }}</td>
                                    </tr>
                                    <tr>
                                        <td>Level 5</td>
                                        <td>{{ $saving_graduate->regular_level5_saving }}</td>
                                        <td>{{ $saving_graduate->extension_level5_saving }}</td>
                                        <td>{{ $saving_graduate->regular_level5_saving + $saving_graduate->extension_level5_saving }}</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td>TOTAL</td>
                                        <td>{{ $saving_graduate->regular_level1_saving +
                                                    $saving_graduate->regular_level2_saving +
                                                    $saving_graduate->regular_level3_saving +
                                                    $saving_graduate->regular_level4_saving +
                                                    $saving_graduate->regular_level5_saving }}</td>
                                        <td>{{ $saving_graduate->extension_level1_saving +
                                                    $saving_graduate->extension_level2_saving +
                                                    $saving_graduate->extension_level3_saving +
                                                    $saving_graduate->extension_level4_saving +
                                                    $saving_graduate->extension_level5_saving }}</td>
                                        <td>{{ $saving_graduate->regular_level1_saving +
                                                    $saving_graduate->regular_level2_saving +
                                                    $saving_graduate->regular_level3_saving +
                                                    $saving_graduate->regular_level4_saving +
                                                    $saving_graduate->regular_level5_saving +
                                                    $saving_graduate->extension_level1_saving +
                                                    $saving_graduate->extension_level2_saving +
                                                    $saving_graduate->extension_level3_saving +
                                                    $saving_graduate->extension_level4_saving +
                                                    $saving_graduate->extension_level5_saving }}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> <!-- div class="col-md-4 col-sm-4" -->
                </div> <!-- div class="row" -->
            </div>
        </div> <!-- div class="panel panel-default" -->


    @empty
        <p class="alert alert-info">No entries...</p>
    @endforelse

    {!! $saving_graduates->render() !!}
@stop