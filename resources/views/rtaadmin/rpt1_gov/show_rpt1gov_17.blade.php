@extends('rtaadmin')

@section('content')

    <a href="/report-1/gov-saving-graduates/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h2>Report 1 - Government [Saving Graduates]</h2>

    <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

    <ul class="nav nav-tabs">
    <?php $active = "class=active"; ?>
    @foreach($sectors as $sector)
        <li {{ $active }}><a data-toggle="tab" href="#sector-{{ $sector->id }}">{{ $sector->name }}</a> </li>
        <?php $active = ""; ?>
    @endforeach
    </ul>

    <div class="tab-content">
        <?php $active = "in active"; ?>
        @foreach($sectors as $sector)
            <div id="sector-{{ $sector->id }}" class="tab-pane fade {{ $active }}">
                <div class="panel panel-info saving_graduates" style="margin-top: 0.5em;">
                    <div class="panel-heading"><a data-toggle="collapse" href="#saving_graduates">Saving Graduates</a></div>
                    <div class="panel-body panel-collapse" id="saving_graduates">

                        @foreach($occupations as $occupation)
                            @if($occupation->subsector->sector->id == $sector->id)
                                <div class="panel panel-default occupation">
                                    <div class="panel-heading">Occupation: {{ $occupation->name }} [Sub-sector: {{ $occupation->subsector->name }}]</div>
                                    <div class="panel-body">
                                        <?php
                                        $reg_saving_graduates = $rpt1gov->getRegularSavingGraduatesByOccupation($occupation->id);
                                        $ext_saving_graduates = $rpt1gov->getExtensionSavingGraduatesByOccupation($occupation->id);
                                        $regext_saving_graduates = $rpt1gov->getRegExtSavingGraduatesByOccupation($occupation->id);
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                @foreach($reg_saving_graduates as $reg_saving_graduate)
                                                    <div class="panel panel-default regular">
                                                        <div class="panel-heading">Regular</div>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td>&nbsp;</td><td>Male</td><td>Female</td><td>Total</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Level 2</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level2_male }}</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level2_female }}</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level2_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 2</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level2_male }}</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level2_female }}</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level2_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 3</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level3_male }}</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level3_female }}</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level3_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 4</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level4_male }}</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level4_female }}</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level4_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 5</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level5_male }}</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level5_female }}</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level5_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level2_male +
                                                                            $reg_saving_graduate->reg_level2_male +
                                                                            $reg_saving_graduate->reg_level3_male +
                                                                            $reg_saving_graduate->reg_level4_male +
                                                                            $reg_saving_graduate->reg_level5_male }}</td>
                                                                    <td>{{  $reg_saving_graduate->reg_level2_female +
                                                                            $reg_saving_graduate->reg_level2_female +
                                                                            $reg_saving_graduate->reg_level3_female +
                                                                            $reg_saving_graduate->reg_level4_female +
                                                                            $reg_saving_graduate->reg_level5_female }}</td>
                                                                    <td>{{ $reg_saving_graduate->reg_level2_total +
                                                                            $reg_saving_graduate->reg_level2_total +
                                                                            $reg_saving_graduate->reg_level3_total +
                                                                            $reg_saving_graduate->reg_level4_total +
                                                                            $reg_saving_graduate->reg_level5_total  }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                @foreach($ext_saving_graduates as $ext_saving_graduate)
                                                    <div class="panel panel-default extension">
                                                        <div class="panel-heading">Extension</div>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td>&nbsp;</td><td>Male</td><td>Female</td><td>Total</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Level 2</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level2_male }}</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level2_female }}</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level2_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 2</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level2_male }}</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level2_female }}</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level2_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 3</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level3_male }}</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level3_female }}</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level3_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 4</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level4_male }}</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level4_female }}</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level4_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 5</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level5_male }}</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level5_female }}</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level5_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level2_male +
                                                                            $ext_saving_graduate->ext_level2_male +
                                                                            $ext_saving_graduate->ext_level3_male +
                                                                            $ext_saving_graduate->ext_level4_male +
                                                                            $ext_saving_graduate->ext_level5_male }}</td>
                                                                    <td>{{  $ext_saving_graduate->ext_level2_female +
                                                                            $ext_saving_graduate->ext_level2_female +
                                                                            $ext_saving_graduate->ext_level3_female +
                                                                            $ext_saving_graduate->ext_level4_female +
                                                                            $ext_saving_graduate->ext_level5_female }}</td>
                                                                    <td>{{ $ext_saving_graduate->ext_level2_total +
                                                                            $ext_saving_graduate->ext_level2_total +
                                                                            $ext_saving_graduate->ext_level3_total +
                                                                            $ext_saving_graduate->ext_level4_total +
                                                                            $ext_saving_graduate->ext_level5_total }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                @foreach($regext_saving_graduates as $row)
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">Savings</div>
                                                        <table class="table table-responsive">
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
                                                                <td>{{ number_format($row->reg_level1_saving, 2) }}</td>
                                                                <td>{{ number_format($row->ext_level1_saving, 2) }}</td>
                                                                <td>{{ number_format($row->reg_level1_saving + $row->ext_level1_saving, 2) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level 2</td>
                                                                <td>{{ number_format($row->reg_level2_saving, 2) }}</td>
                                                                <td>{{ number_format($row->ext_level2_saving, 2) }}</td>
                                                                <td>{{ number_format($row->reg_level2_saving + $row->ext_level2_saving, 2) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level 3</td>
                                                                <td>{{ number_format($row->reg_level3_saving, 2) }}</td>
                                                                <td>{{ number_format($row->ext_level3_saving, 2) }}</td>
                                                                <td>{{ number_format($row->reg_level3_saving + $row->ext_level3_saving, 2) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level 4</td>
                                                                <td>{{ number_format($row->reg_level4_saving, 2) }}</td>
                                                                <td>{{ number_format($row->ext_level4_saving, 2) }}</td>
                                                                <td>{{ number_format($row->reg_level4_saving + $row->ext_level4_saving, 2) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level 5</td>
                                                                <td>{{ number_format($row->reg_level5_saving, 2) }}</td>
                                                                <td>{{ number_format($row->ext_level5_saving, 2) }}</td>
                                                                <td>{{ number_format($row->reg_level5_saving + $row->ext_level5_saving, 2) }}</td>
                                                            </tr>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <td>TOTAL</td>
                                                                <td>{{ number_format($row->reg_total_saving, 2) }}</td>
                                                                <td>{{ number_format($row->ext_total_saving, 2) }}</td>
                                                                <td>{{ number_format($row->reg_total_saving + $row->ext_total_saving, 2) }}</td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
                

            </div>
            <?php $active = ""; ?>
        @endforeach
    </div>

@endsection