@extends('printing')

@section('content')
    @foreach($sectors as $sector)
        <h1>Report 1 - Government : Industry Extension 3</h1>
        <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

        <div class="well well-sm">Sector : {{ $sector->name }}</div>

        @foreach($entries as $entry)
            @if($entry->sector->id == $sector->id)
                <?php
                $records = $rpt1gov->getIndustryExtension3BySubsector($entry->id);
                ?>

                <div class="panel panel-default" style="margin-top: 0.5em;">
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

    @endforeach

@endsection