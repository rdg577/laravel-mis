@extends('rtaadmin')

@section('content')

    <a href="/report-1/gov-tracer-study/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 1 - Government [Tracer Study]</h1>

    <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Number of Proposed Tracer Study</div>
                <div class="panel-body">

                    @foreach($tracer_studies as $tracer_study)
                        <div class="well well-sm">{{ $tracer_study->proposal }}</div>
                    @endforeach

                </div>
            </div>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-success">
                <div class="panel-heading">Number of Completed Tracer Study</div>
                <div class="panel-body">

                    @foreach($tracer_studies as $tracer_study)
                        <div class="well well-sm">{{ $tracer_study->completed }}</div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection