@extends("rtaadmin.summary_rpt2")

@section("content")

<h1>Tracer Study</h1>
<p>Institution: {{ $institution->name }}</p>
<p>Report Schedule : {{ $report_date->petsa }}</p>

<?php $entries = $isr->getEntriesFromTracerStudies(); ?>
@forelse($entries as $entry)
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Proposal</div>
                <div class="panel-body">{{ $entry->proposal }}</div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Completed</div>
                <div class="panel-body">{{ $entry->completed }}</div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Total</div>
                <div class="panel-body">{{ $entry->proposal + $entry->completed }}</div>
            </div>
        </div>
    </div>
@empty
    <p class="alert-info">...No record/s found...</p>
@endforelse

@endsection
