@extends('rtaadmin')

@section('content')

    <a href="/report-1/gov-action-research/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 1 - Government [Action Research]</h1>

    <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Proposed Research</div>
                <div class="panel-body">
                    <?php
                    $ctr = 0;
                    ?>
                    @foreach($action_researches as $action_research)
                        <?php
                        $titles = $action_research->titles->where('type', 'proposal')->sortBy('title');
                        ?>
                        @foreach($titles as $title)
                            <div class="well well-sm">{{ ++$ctr }}. {{ $title->title }}</div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-success">
                <div class="panel-heading">Completed Research</div>
                <div class="panel-body">
                    <?php
                    $ctr = 0;
                    ?>
                    @foreach($action_researches as $action_research)
                        <?php
                        $titles = $action_research->titles->where('type', 'completed')->sortBy('title');
                        ?>
                        @foreach($titles as $title)
                            <div class="well well-sm">{{ ++$ctr }}. {{ $title->title }}</div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection