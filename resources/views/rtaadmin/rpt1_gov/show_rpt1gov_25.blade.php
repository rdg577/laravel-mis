@extends('rtaadmin')

@section('content')

    <a href="/report-1/gov-industry-extension-4/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 1 - Government [Industry Extension 4]</h1>

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
                        $records = $rpt1gov->getIndustryExtension4BySubsector($entry->id);
                        ?>

                        <div class="panel panel-info" style="margin-top: 0.5em;">
                            <div class="panel-heading"><a data-toggle="collapse" href="#subsector">Sub-sector: {{ $entry->name }}</a></div>
                            <div class="panel-body" id="subsector">

                                @foreach($records as $rec)
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">No. of Trainees That Completed The Training</div>
                                            <div class="panel-body">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Short-Term Training</div>
                                                    <div class="list-group">
                                                        <div class="list-group-item">Male : {{ $rec->short_term_male }}</div>
                                                        <div class="list-group-item">Female : {{ $rec->short_term_female }}</div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Regular/Extension Training</div>
                                                    <table class="table table-responsive">
                                                        <thead>
                                                        <tr>
                                                            <td>Level</td><td>Male</td><td>Female</td><td>Total</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1 and 2</td><td>{{ $rec->level1n2_male }}</td><td>{{ $rec->level1n2_female }}</td>
                                                            <td>{{ $rec->level1n2_male + $rec->level1n2_female }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3 and 4</td><td>{{ $rec->level3n4_male }}</td><td>{{ $rec->level3n4_female }}</td>
                                                            <td>{{ $rec->level3n4_male + $rec->level3n4_female }}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Establish Firm and Started Work</div>
                                            <div class="list-group">
                                                <div class="list-group-item">MSE : {{ $rec->mse }}</div>
                                                <div class="list-group-item">Male Operator : {{ $rec->operator_male }}</div>
                                                <div class="list-group-item">Female Operator : {{ $rec->operator_female }}</div>
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