@extends('rtaadmin')

@section('content')

    <a href="/report-1/gov-new-enrollees/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 1 - Government [New Enrollees]</h1>

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
                <div class="panel panel-info new_enrollees" style="margin-top: 0.5em;">
                    <div class="panel-heading"><a data-toggle="collapse" href="#new_enrollees">New Enrollees</a></div>
                    <div class="panel-body panel-collapse" id="new_enrollees">

                        @foreach($occupations as $occupation)
                            @if($occupation->subsector->sector->id == $sector->id)
                                <div class="panel panel-default occupation">
                                    <div class="panel-heading">Occupation: {{ $occupation->name }} [Sub-sector: {{ $occupation->subsector->name }}]</div>
                                    <div class="panel-body">
                                        <?php
                                        $reg_new_enrollees = $rpt1gov->getRegularNewEnrolleesByOccupation($occupation->id);
                                        $ext_new_enrollees = $rpt1gov->getExtensionNewEnrolleesByOccupation($occupation->id);
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                @foreach($reg_new_enrollees as $reg_new_enrollee)
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
                                                                    <td>Level 1</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level1_male }}</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level1_female }}</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level1_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 2</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level2_male }}</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level2_female }}</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level2_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 3</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level3_male }}</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level3_female }}</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level3_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 4</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level4_male }}</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level4_female }}</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level4_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 5</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level5_male }}</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level5_female }}</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level5_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level1_male +
                                                                            $reg_new_enrollee->reg_level2_male +
                                                                            $reg_new_enrollee->reg_level3_male +
                                                                            $reg_new_enrollee->reg_level4_male +
                                                                            $reg_new_enrollee->reg_level5_male }}</td>
                                                                    <td>{{  $reg_new_enrollee->reg_level1_female +
                                                                            $reg_new_enrollee->reg_level2_female +
                                                                            $reg_new_enrollee->reg_level3_female +
                                                                            $reg_new_enrollee->reg_level4_female +
                                                                            $reg_new_enrollee->reg_level5_female }}</td>
                                                                    <td>{{ $reg_new_enrollee->reg_level1_total +
                                                                            $reg_new_enrollee->reg_level2_total +
                                                                            $reg_new_enrollee->reg_level3_total +
                                                                            $reg_new_enrollee->reg_level4_total +
                                                                            $reg_new_enrollee->reg_level5_total }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                @foreach($ext_new_enrollees as $ext_new_enrollee)
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
                                                                    <td>Level 1</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level1_male }}</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level1_female }}</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level1_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 2</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level2_male }}</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level2_female }}</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level2_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 3</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level3_male }}</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level3_female }}</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level3_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 4</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level4_male }}</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level4_female }}</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level4_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level 5</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level5_male }}</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level5_female }}</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level5_total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level1_male +
                                                                            $ext_new_enrollee->ext_level2_male +
                                                                            $ext_new_enrollee->ext_level3_male +
                                                                            $ext_new_enrollee->ext_level4_male +
                                                                            $ext_new_enrollee->ext_level5_male }}</td>
                                                                    <td>{{  $ext_new_enrollee->ext_level1_female +
                                                                            $ext_new_enrollee->ext_level2_female +
                                                                            $ext_new_enrollee->ext_level3_female +
                                                                            $ext_new_enrollee->ext_level4_female +
                                                                            $ext_new_enrollee->ext_level5_female }}</td>
                                                                    <td>{{ $ext_new_enrollee->ext_level1_total +
                                                                            $ext_new_enrollee->ext_level2_total +
                                                                            $ext_new_enrollee->ext_level3_total +
                                                                            $ext_new_enrollee->ext_level4_total +
                                                                            $ext_new_enrollee->ext_level5_total}}</td>
                                                                </tr>
                                                            </tbody>
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