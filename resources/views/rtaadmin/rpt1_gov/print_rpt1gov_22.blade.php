@extends('printing')

@section('content')
    @foreach($sectors as $sector)
        <h1>Report 1 - Government : Industry Extension 1</h1>
        <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

        <div class="well well-sm">Sector : {{ $sector->name }}</div>

        @foreach($entries as $entry)
            @if($entry->sector->id == $sector->id)
                <?php
                $records = $rpt1gov->getIndustryExtension1BySubsector($entry->id);
                ?>

                <div class="panel panel-default" style="margin-top: 0.5em;">
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

    @endforeach

@endsection