@extends('rtaadmin')

@section('content')

    <a href="/report-1/gov-industry-extension-3/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 1 - Government [Industry Extension 3]</h1>

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
                        $records = $rpt1gov->getIndustryExtension3BySubsector($entry->id);
                        ?>

                        <div class="panel panel-info" style="margin-top: 0.5em;">
                            <div class="panel-heading"><a data-toggle="collapse" href="#subsector">Sub-sector: {{ $entry->name }}</a></div>
                            <div class="panel-body" id="subsector">

                                @foreach($records as $rec)
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Level of Managers</div>
                                            <div class="list-group">
                                                <div class="list-group-item">High Level : {{ $rec->high_level }}</div>
                                                <div class="list-group-item">Middle Level : {{ $rec->mid_level }}</div>
                                                <div class="list-group-item">Low Level : {{ $rec->low_level }}</div>
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