@extends('rtaadmin')

@section('content')

    <a href="/report-1/gov-industry-extension-2/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 1 - Government [Industry Extension 2]</h1>

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
                        $records = $rpt1gov->getIndustryExtension2BySubsector($entry->id);
                        ?>

                        <div class="panel panel-info" style="margin-top: 0.5em;">
                            <div class="panel-heading"><a data-toggle="collapse" href="#subsector">Sub-sector: {{ $entry->name }}</a></div>
                            <div class="panel-body" id="subsector">

                                @foreach($records as $rec)
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Starter (MSE)</div>
                                            <div class="list-group">
                                                <div class="list-group-item">Number of Enterprises : {{ $rec->starter_enterprise }}</div>
                                                <div class="list-group-item">Operator - Male : {{ $rec->starter_mse_operator_male }}</div>
                                                <div class="list-group-item">Operator - Female : {{ $rec->starter_mse_operator_female }}</div>
                                                <div class="list-group-item">No. of Operator supported by IE - Male : {{ $rec->starter_mse_operator_supported_male }}</div>
                                                <div class="list-group-item">No. of Operator supported by IE - Female : {{ $rec->starter_mse_operator_supported_male }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Advance (MSE)</div>
                                            <div class="list-group">
                                                <div class="list-group-item">Number of Enterprises : {{ $rec->advance_enterprise }}</div>
                                                <div class="list-group-item">Operator - Male : {{ $rec->advance_mse_operator_male }}</div>
                                                <div class="list-group-item">Operator - Female : {{ $rec->advance_mse_operator_female }}</div>
                                                <div class="list-group-item">No. of Operator supported by IE - Male : {{ $rec->advance_mse_operator_supported_male }}</div>
                                                <div class="list-group-item">No. of Operator supported by IE - Female : {{ $rec->advance_mse_operator_supported_male }}</div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Competent (MSE)</div>
                                            <div class="list-group">
                                                <div class="list-group-item">Number of Enterprises : {{ $rec->competent_enterprise }}</div>
                                                <div class="list-group-item">Operator - Male : {{ $rec->competent_mse_operator_male }}</div>
                                                <div class="list-group-item">Operator - Female : {{ $rec->competent_mse_operator_female }}</div>
                                                <div class="list-group-item">No. of Operator supported by IE - Male : {{ $rec->competent_mse_operator_supported_male }}</div>
                                                <div class="list-group-item">No. of Operator supported by IE - Female : {{ $rec->competent_mse_operator_supported_male }}</div>
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