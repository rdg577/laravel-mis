@extends('rtaadmin')

@section('content')

    <a href="/report-1/gov-industry-extension-1/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 1 - Government [Industry Extension 1]</h1>

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
                        $records = $rpt1gov->getIndustryExtension1BySubsector($entry->id);
                        ?>

                        <div class="panel panel-info" style="margin-top: 0.5em;">
                            <div class="panel-heading"><a data-toggle="collapse" href="#subsector">Sub-sector: {{ $entry->name }}</a></div>
                            <div class="panel-body" id="subsector">

                                @foreach($records as $rec)
                                    <div class="well well-sm">Number of Technologies identified through Value Chain Analysis : {{ $rec->identified_technologies }}</div>
                                    <div class="well well-sm">Benchmarked Technologies : : {{ $rec->benchmarked_technologies }}</div>
                                    <div class="well well-sm">Proper Documentation - Technology : {{ $rec->proper_documentation }}</div>
                                    <div class="well well-sm">Prototype - Technology : {{ $rec->prototype }}</div>
                                    <div class="well well-sm">Competent Entrepreneurs - Technology : {{ $rec->competent_entrepreneurs }}</div>
                                    <div class="well well-sm">Technology Transfer - Technology : {{ $rec->transferred }}</div>
                                    <div class="well well-sm">Capital in Million - Technology : {{ $rec->capital }}</div>
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