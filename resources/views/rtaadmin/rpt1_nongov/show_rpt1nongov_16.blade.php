@extends('rtaadmin')

@section('content')

    <a href="/report-1/non-gov-saving-transferees/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 1 - Non-Government [Saving Transferees]</h1>

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
                <div class="panel panel-info saving_transferees" style="margin-top: 0.5em;">
                    <div class="panel-heading"><a data-toggle="collapse" href="#saving_transferees">Saving Transferees</a></div>
                    <div class="panel-body panel-collapse" id="saving_transferees">

                        @foreach($occupations as $occupation)
                            @if($occupation->subsector->sector->id == $sector->id)
                                <div class="panel panel-default occupation">
                                    <div class="panel-heading">Occupation: {{ $occupation->name }} [Sub-sector: {{ $occupation->subsector->name }}]</div>
                                    <div class="panel-body">
                                        <?php
                                        $reg_saving_transferees = $rpt1nongov->getRegularSavingTransfereesByOccupation($occupation->id);
                                        $ext_saving_transferees = $rpt1nongov->getExtensionSavingTransfereesByOccupation($occupation->id);
                                        $regext_saving_transferees = $rpt1nongov->getRegExtSavingTransfereesByOccupation($occupation->id);
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                @foreach($reg_saving_transferees as $reg_saving_transferee)
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
                                                                    <td>Level 1 to 2</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level1_to_level2_male }}</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level1_to_level2_female }}</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level1_to_level2_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 2 to 3</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level2_to_level3_male }}</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level2_to_level3_female }}</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level2_to_level3_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 3 to 4</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level3_to_level4_male }}</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level3_to_level4_female }}</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level3_to_level4_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 4 to 5</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level4_to_level5_male }}</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level4_to_level5_female }}</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level4_to_level5_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level1_to_level2_male +
                                                                            $reg_saving_transferee->reg_level2_to_level3_male +
                                                                            $reg_saving_transferee->reg_level3_to_level4_male +
                                                                            $reg_saving_transferee->reg_level4_to_level5_male }}</td>
                                                                    <td>{{  $reg_saving_transferee->reg_level1_to_level2_female +
                                                                            $reg_saving_transferee->reg_level2_to_level3_female +
                                                                            $reg_saving_transferee->reg_level3_to_level4_female +
                                                                            $reg_saving_transferee->reg_level4_to_level5_female }}</td>
                                                                    <td>{{ $reg_saving_transferee->reg_level1_to_level2_total +
                                                                            $reg_saving_transferee->reg_level2_to_level3_total +
                                                                            $reg_saving_transferee->reg_level3_to_level4_total +
                                                                            $reg_saving_transferee->reg_level4_to_level5_total }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                @foreach($ext_saving_transferees as $ext_saving_transferee)
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
                                                                    <td>Level 1 to 2</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level1_to_level2_male }}</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level1_to_level2_female }}</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level1_to_level2_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 2 to 3</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level2_to_level3_male }}</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level2_to_level3_female }}</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level2_to_level3_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 3 to 4</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level3_to_level4_male }}</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level3_to_level4_female }}</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level3_to_level4_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 4 to 5</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level4_to_level5_male }}</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level4_to_level5_female }}</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level4_to_level5_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level1_to_level2_male +
                                                                            $ext_saving_transferee->ext_level2_to_level3_male +
                                                                            $ext_saving_transferee->ext_level3_to_level4_male +
                                                                            $ext_saving_transferee->ext_level4_to_level5_male }}</td>
                                                                    <td>{{  $ext_saving_transferee->ext_level1_to_level2_female +
                                                                            $ext_saving_transferee->ext_level2_to_level3_female +
                                                                            $ext_saving_transferee->ext_level3_to_level4_female +
                                                                            $ext_saving_transferee->ext_level4_to_level5_female }}</td>
                                                                    <td>{{ $ext_saving_transferee->ext_level1_to_level2_total +
                                                                            $ext_saving_transferee->ext_level2_to_level3_total +
                                                                            $ext_saving_transferee->ext_level3_to_level4_total +
                                                                            $ext_saving_transferee->ext_level4_to_level5_total }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="col-md-4 col-lg-4 col-sm-4">
                                                @foreach($regext_saving_transferees as $row)
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">Savings</div>
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
                                                                <td>Level 1 to 2</td>
                                                                <td>{{ number_format($row->reg_level1_to_level2_saving, 2) }}</td>
                                                                <td>{{ number_format($row->ext_level1_to_level2_saving, 2) }}</td>
                                                                <td>{{ number_format(($row->reg_level1_to_level2_saving + $row->ext_level1_to_level2_saving), 2) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level 2 to 3</td>
                                                                <td>{{ number_format($row->reg_level2_to_level3_saving, 2) }}</td>
                                                                <td>{{ number_format($row->ext_level2_to_level3_saving, 2) }}</td>
                                                                <td>{{ number_format(($row->reg_level2_to_level3_saving + $row->ext_level2_to_level3_saving), 2) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level 3 to 4</td>
                                                                <td>{{ number_format($row->reg_level3_to_level4_saving, 2) }}</td>
                                                                <td>{{ number_format($row->ext_level3_to_level4_saving, 2) }}</td>
                                                                <td>{{ number_format(($row->reg_level3_to_level4_saving + $row->ext_level3_to_level4_saving), 2) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level 4 to 5</td>
                                                                <td>{{ number_format($row->reg_level4_to_level5_saving, 2) }}</td>
                                                                <td>{{ number_format($row->ext_level4_to_level5_saving, 2) }}</td>
                                                                <td>{{ number_format(($row->reg_level4_to_level5_saving + $row->ext_level4_to_level5_saving), 2) }}</td>
                                                            </tr>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <td>TOTAL</td>
                                                                <td>{{ number_format(($row->reg_level1_to_level2_saving +
                                                                                        $row->reg_level2_to_level3_saving +
                                                                                        $row->reg_level3_to_level4_saving +
                                                                                        $row->reg_level4_to_level5_saving), 2) }}</td>
                                                                <td>{{ number_format(($row->ext_level1_to_level2_saving +
                                                                                        $row->ext_level2_to_level3_saving +
                                                                                        $row->ext_level3_to_level4_saving +
                                                                                        $row->ext_level4_to_level5_saving), 2) }}</td>
                                                                <td>{{ number_format(($row->reg_level1_to_level2_saving +
                                                                                        $row->reg_level2_to_level3_saving +
                                                                                        $row->reg_level3_to_level4_saving +
                                                                                        $row->reg_level4_to_level5_saving +
                                                                                        $row->ext_level1_to_level2_saving +
                                                                                        $row->ext_level2_to_level3_saving +
                                                                                        $row->ext_level3_to_level4_saving +
                                                                                        $row->ext_level4_to_level5_saving), 2) }}</td>
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