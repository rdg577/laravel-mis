@extends('rtaadmin')

@section('content')

    <a href="/report-1/gov-trainers/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 1 - Government [Trainers]</h1>

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
                    <div class="panel-heading"><a data-toggle="collapse" href="#new_enrollees">Trainers</a></div>
                    <div class="panel-body panel-collapse" id="new_enrollees">

                        @foreach($occupations as $occupation)
                            @if($occupation->subsector->sector->id == $sector->id)
                                <?php
                                $levelA = $rpt1gov->getTrainersLevelAByOccupation($occupation->id);
                                $levelB = $rpt1gov->getTrainersLevelBByOccupation($occupation->id);
                                $levelC = $rpt1gov->getTrainersLevelCByOccupation($occupation->id);
                                ?>

                                <div class="panel panel-default occupation">
                                    <div class="panel-heading">Occupation: {{ $occupation->name }} [Sub-sector: {{ $occupation->subsector->name }}]</div>
                                    <div class="panel-body">

                                        <div class="full_time col-lg-3 col-md-3 col-sm-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Fulltime Trainer</div>
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <td>Level</td>
                                                        <td>Male</td>
                                                        <td>Female</td>
                                                        <td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $total = 0; ?>
                                                    @foreach($levelA as $row)
                                                        <?php $total += $row->full_time_male + $row->full_time_female; ?>
                                                        <tr>
                                                            <td>A</td>
                                                            <td>{{ $row->full_time_male }}</td>
                                                            <td>{{ $row->full_time_female }}</td>
                                                            <td>{{ $row->full_time_male + $row->full_time_female }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach($levelB as $row)
                                                        <?php $total += $row->full_time_male + $row->full_time_female; ?>
                                                        <tr>
                                                            <td>B</td>
                                                            <td>{{ $row->full_time_male }}</td>
                                                            <td>{{ $row->full_time_female }}</td>
                                                            <td>{{ $row->full_time_male + $row->full_time_female }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach($levelB as $row)
                                                        <?php $total += $row->full_time_male + $row->full_time_female; ?>
                                                        <tr>
                                                            <td>C</td>
                                                            <td>{{ $row->full_time_male }}</td>
                                                            <td>{{ $row->full_time_female }}</td>
                                                            <td>{{ $row->full_time_male + $row->full_time_female }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="3">Total</td>
                                                        <td>{{ $total }}</td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="part_time col-lg-3 col-md-3 col-sm-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Part-time Trainer</div>
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <td>Level</td>
                                                        <td>Male</td>
                                                        <td>Female</td>
                                                        <td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $total = 0; ?>
                                                    @foreach($levelA as $row)
                                                        <?php $total += $row->part_time_male + $row->part_time_female; ?>
                                                        <tr>
                                                            <td>A</td>
                                                            <td>{{ $row->part_time_male }}</td>
                                                            <td>{{ $row->part_time_female }}</td>
                                                            <td>{{ $row->part_time_male + $row->part_time_female }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach($levelB as $row)
                                                        <?php $total += $row->part_time_male + $row->part_time_female; ?>
                                                        <tr>
                                                            <td>B</td>
                                                            <td>{{ $row->part_time_male }}</td>
                                                            <td>{{ $row->part_time_female }}</td>
                                                            <td>{{ $row->part_time_male + $row->part_time_female }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach($levelB as $row)
                                                        <?php $total += $row->part_time_male + $row->part_time_female; ?>
                                                        <tr>
                                                            <td>C</td>
                                                            <td>{{ $row->part_time_male }}</td>
                                                            <td>{{ $row->part_time_female }}</td>
                                                            <td>{{ $row->part_time_male + $row->part_time_female }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="3">Total</td>
                                                        <td>{{ $total }}</td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="ethiopian col-lg-3 col-md-3 col-sm-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Ethiopian Trainer</div>
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <td>Level</td>
                                                        <td>Male</td>
                                                        <td>Female</td>
                                                        <td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $total = 0; ?>
                                                    @foreach($levelA as $row)
                                                        <?php $total += $row->ethiopian_male + $row->ethiopian_female; ?>
                                                        <tr>
                                                            <td>A</td>
                                                            <td>{{ $row->ethiopian_male }}</td>
                                                            <td>{{ $row->ethiopian_female }}</td>
                                                            <td>{{ $row->ethiopian_male + $row->ethiopian_female }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach($levelB as $row)
                                                        <?php $total += $row->ethiopian_male + $row->ethiopian_female; ?>
                                                        <tr>
                                                            <td>B</td>
                                                            <td>{{ $row->ethiopian_male }}</td>
                                                            <td>{{ $row->ethiopian_female }}</td>
                                                            <td>{{ $row->ethiopian_male + $row->ethiopian_female }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach($levelB as $row)
                                                        <?php $total += $row->ethiopian_male + $row->ethiopian_female; ?>
                                                        <tr>
                                                            <td>C</td>
                                                            <td>{{ $row->ethiopian_male }}</td>
                                                            <td>{{ $row->ethiopian_female }}</td>
                                                            <td>{{ $row->ethiopian_male + $row->ethiopian_female }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="3">Total</td>
                                                        <td>{{ $total }}</td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="non_ethiopian col-lg-3 col-md-3 col-sm-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Ethiopian Trainer</div>
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <td>Level</td>
                                                        <td>Male</td>
                                                        <td>Female</td>
                                                        <td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $total = 0; ?>
                                                    @foreach($levelA as $row)
                                                        <?php $total += $row->non_ethiopian_male + $row->non_ethiopian_female; ?>
                                                        <tr>
                                                            <td>A</td>
                                                            <td>{{ $row->non_ethiopian_male }}</td>
                                                            <td>{{ $row->non_ethiopian_female }}</td>
                                                            <td>{{ $row->non_ethiopian_male + $row->non_ethiopian_female }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach($levelB as $row)
                                                        <?php $total += $row->non_ethiopian_male + $row->non_ethiopian_female; ?>
                                                        <tr>
                                                            <td>B</td>
                                                            <td>{{ $row->non_ethiopian_male }}</td>
                                                            <td>{{ $row->non_ethiopian_female }}</td>
                                                            <td>{{ $row->non_ethiopian_male + $row->non_ethiopian_female }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach($levelB as $row)
                                                        <?php $total += $row->non_ethiopian_male + $row->non_ethiopian_female; ?>
                                                        <tr>
                                                            <td>C</td>
                                                            <td>{{ $row->non_ethiopian_male }}</td>
                                                            <td>{{ $row->non_ethiopian_female }}</td>
                                                            <td>{{ $row->non_ethiopian_male + $row->non_ethiopian_female }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="3">Total</td>
                                                        <td>{{ $total }}</td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="core col-lg-3 col-md-3 col-sm-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Core Trainer</div>
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <td>Level</td>
                                                        <td>Male</td>
                                                        <td>Female</td>
                                                        <td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $total = 0; ?>
                                                    @foreach($levelA as $row)
                                                        <?php $total += $row->core_male + $row->core_female; ?>
                                                        <tr>
                                                            <td>A</td>
                                                            <td>{{ $row->core_male }}</td>
                                                            <td>{{ $row->core_female }}</td>
                                                            <td>{{ $row->core_male + $row->core_female }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach($levelB as $row)
                                                        <?php $total += $row->core_male + $row->core_female; ?>
                                                        <tr>
                                                            <td>B</td>
                                                            <td>{{ $row->core_male }}</td>
                                                            <td>{{ $row->core_female }}</td>
                                                            <td>{{ $row->core_male + $row->core_female }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach($levelB as $row)
                                                        <?php $total += $row->core_male + $row->core_female; ?>
                                                        <tr>
                                                            <td>C</td>
                                                            <td>{{ $row->core_male }}</td>
                                                            <td>{{ $row->core_female }}</td>
                                                            <td>{{ $row->core_male + $row->core_female }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="3">Total</td>
                                                        <td>{{ $total }}</td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="took_tm col-lg-3 col-md-3 col-sm-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Took TM Trainer</div>
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <td>Level</td>
                                                        <td>Male</td>
                                                        <td>Female</td>
                                                        <td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $total = 0; ?>
                                                    @foreach($levelA as $row)
                                                        <?php $total += $row->took_tm_male + $row->took_tm_female; ?>
                                                        <tr>
                                                            <td>A</td>
                                                            <td>{{ $row->took_tm_male }}</td>
                                                            <td>{{ $row->took_tm_female }}</td>
                                                            <td>{{ $row->took_tm_male + $row->took_tm_female }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach($levelB as $row)
                                                        <?php $total += $row->took_tm_male + $row->took_tm_female; ?>
                                                        <tr>
                                                            <td>B</td>
                                                            <td>{{ $row->took_tm_male }}</td>
                                                            <td>{{ $row->took_tm_female }}</td>
                                                            <td>{{ $row->took_tm_male + $row->took_tm_female }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach($levelB as $row)
                                                        <?php $total += $row->took_tm_male + $row->took_tm_female; ?>
                                                        <tr>
                                                            <td>C</td>
                                                            <td>{{ $row->took_tm_male }}</td>
                                                            <td>{{ $row->took_tm_female }}</td>
                                                            <td>{{ $row->took_tm_male + $row->took_tm_female }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="3">Total</td>
                                                        <td>{{ $total }}</td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
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