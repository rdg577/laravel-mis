@extends('rtaadmin')

@section('content')

    <a href="/report-1/gov-industry-extension-5/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 1 - Government [Industry Extension 5]</h1>

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

                @foreach($entries as $entry)
                    @if($entry->sector->id == $sector->id)
                        <?php
                        $kaizen = $rpt1gov->getIndustryExtension5BySubsector($entry->id, 'Kaizen');
                        $entrep = $rpt1gov->getIndustryExtension5BySubsector($entry->id, 'Entrepreneurship');
                        $techskill = $rpt1gov->getIndustryExtension5BySubsector($entry->id, 'Technical Skill');
                        $techtrans = $rpt1gov->getIndustryExtension5BySubsector($entry->id, 'Technology Transfer');
                        ?>

                        <div class="panel panel-info" style="margin-top: 0.5em;">
                            <div class="panel-heading"><a data-toggle="collapse" href="#subsector">Sub-sector: {{ $entry->name }}</a></div>
                            <div class="panel-body" id="subsector">

                                @foreach($kaizen as $rec)
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Kaizen</div>
                                            <div class="panel-body">

                                                <table class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <td colspan="4" bgcolor="#f4ffea">Number of companies supported in Industry Extension by the TVET Institute (by type of company)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Micro</td><td>Small</td><td>Medium</td><td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>{{ $rec->micro }}</td>
                                                        <td>{{ $rec->small }}</td>
                                                        <td>{{ $rec->medium }}</td>
                                                        <td>{{ $rec->micro + $rec->small + $rec->medium }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                <table class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <td colspan="4" bgcolor="#f4ffea">Number of Trainers Capacitated</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td><td>Male</td><td>Female</td><td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Level C</td>
                                                        <td>{{ $rec->level_c_male }}</td>
                                                        <td>{{ $rec->level_c_female }}</td>
                                                        <td>{{ $rec->level_c_male + $rec->level_c_female }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level B</td>
                                                        <td>{{ $rec->level_b_male }}</td>
                                                        <td>{{ $rec->level_b_female }}</td>
                                                        <td>{{ $rec->level_b_male + $rec->level_b_female }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level A</td>
                                                        <td>{{ $rec->level_a_male }}</td>
                                                        <td>{{ $rec->level_a_female }}</td>
                                                        <td>{{ $rec->level_a_male + $rec->level_a_female }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>



                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach($entrep as $rec)
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Entrepreneurship</div>
                                            <div class="panel-body">

                                                <table class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <td colspan="4" bgcolor="#f4ffea">Number of companies supported in Industry Extension by the TVET Institute (by type of company)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Micro</td><td>Small</td><td>Medium</td><td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>{{ $rec->micro }}</td>
                                                        <td>{{ $rec->small }}</td>
                                                        <td>{{ $rec->medium }}</td>
                                                        <td>{{ $rec->micro + $rec->small + $rec->medium }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                <table class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <td colspan="4" bgcolor="#f4ffea">Number of Trainers Capacitated</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td><td>Male</td><td>Female</td><td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Level C</td>
                                                        <td>{{ $rec->level_c_male }}</td>
                                                        <td>{{ $rec->level_c_female }}</td>
                                                        <td>{{ $rec->level_c_male + $rec->level_c_female }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level B</td>
                                                        <td>{{ $rec->level_b_male }}</td>
                                                        <td>{{ $rec->level_b_female }}</td>
                                                        <td>{{ $rec->level_b_male + $rec->level_b_female }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level A</td>
                                                        <td>{{ $rec->level_a_male }}</td>
                                                        <td>{{ $rec->level_a_female }}</td>
                                                        <td>{{ $rec->level_a_male + $rec->level_a_female }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>



                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach($techskill as $rec)
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Technical Skill</div>
                                            <div class="panel-body">

                                                <table class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <td colspan="4" bgcolor="#f4ffea">Number of companies supported in Industry Extension by the TVET Institute (by type of company)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Micro</td><td>Small</td><td>Medium</td><td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>{{ $rec->micro }}</td>
                                                        <td>{{ $rec->small }}</td>
                                                        <td>{{ $rec->medium }}</td>
                                                        <td>{{ $rec->micro + $rec->small + $rec->medium }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                <table class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <td colspan="4" bgcolor="#f4ffea">Number of Trainers Capacitated</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td><td>Male</td><td>Female</td><td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Level C</td>
                                                        <td>{{ $rec->level_c_male }}</td>
                                                        <td>{{ $rec->level_c_female }}</td>
                                                        <td>{{ $rec->level_c_male + $rec->level_c_female }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level B</td>
                                                        <td>{{ $rec->level_b_male }}</td>
                                                        <td>{{ $rec->level_b_female }}</td>
                                                        <td>{{ $rec->level_b_male + $rec->level_b_female }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level A</td>
                                                        <td>{{ $rec->level_a_male }}</td>
                                                        <td>{{ $rec->level_a_female }}</td>
                                                        <td>{{ $rec->level_a_male + $rec->level_a_female }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>



                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach($techtrans as $rec)
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Technical Transfer</div>
                                            <div class="panel-body">

                                                <table class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <td colspan="4" bgcolor="#f4ffea">Number of companies supported in Industry Extension by the TVET Institute (by type of company)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Micro</td><td>Small</td><td>Medium</td><td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>{{ $rec->micro }}</td>
                                                        <td>{{ $rec->small }}</td>
                                                        <td>{{ $rec->medium }}</td>
                                                        <td>{{ $rec->micro + $rec->small + $rec->medium }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                <table class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <td colspan="4" bgcolor="#f4ffea">Number of Trainers Capacitated</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td><td>Male</td><td>Female</td><td>Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Level C</td>
                                                        <td>{{ $rec->level_c_male }}</td>
                                                        <td>{{ $rec->level_c_female }}</td>
                                                        <td>{{ $rec->level_c_male + $rec->level_c_female }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level B</td>
                                                        <td>{{ $rec->level_b_male }}</td>
                                                        <td>{{ $rec->level_b_female }}</td>
                                                        <td>{{ $rec->level_b_male + $rec->level_b_female }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level A</td>
                                                        <td>{{ $rec->level_a_male }}</td>
                                                        <td>{{ $rec->level_a_female }}</td>
                                                        <td>{{ $rec->level_a_male + $rec->level_a_female }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>



                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
            <?php $active = ""; ?>
        @endforeach
    </div>

@endsection