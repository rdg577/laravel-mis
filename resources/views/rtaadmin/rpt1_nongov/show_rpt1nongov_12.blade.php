@extends('rtaadmin')

@section('content')

    <a href="/report-1/non-gov-cooperative-training-with-industry-partners/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 1 - Non-Government [Cooperative Training [With Industry Partners]]</h1>

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
                <div class="panel panel-info cooperative_training_with_industry_partners" style="margin-top: 0.5em;">
                    <div class="panel-heading"><a data-toggle="collapse" href="#cooperative_training_with_industry_partners">Cooperative Training [With Industry Partners]</a></div>
                    <div class="panel-body panel-collapse" id="cooperative_training_with_industry_partners">

                        @foreach($occupations as $occupation)
                            @if($occupation->subsector->sector->id == $sector->id)
                                <div class="panel panel-default occupation">
                                    <div class="panel-heading">Occupation: {{ $occupation->name }} [Sub-sector: {{ $occupation->subsector->name }}]</div>
                                    <div class="panel-body">
                                        <?php
                                        $cooperative_training_with_industry_partners = $rpt1nongov->getCooperativeTrainingWithIndustryPartnersByOccupation($occupation->id);
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                @foreach($cooperative_training_with_industry_partners as $cooperative_training_with_industry_partner)
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">Micro and Small Enterprises</div>
                                                        <table class="table table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <td>Company Name</td>
                                                                    <td>Has Signed Mem. of Understanding</td>
                                                                    <td>Has Joined Plan</td>
                                                                    <td>Has Provided Training</td>
                                                                    <td>Has Provided Trainers in the Industry</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ $cooperative_training_with_industry_partner->mse_list }}</td>
                                                                    <td>{{ $cooperative_training_with_industry_partner->mse_mou ? 'Yes':'No' }}</td>
                                                                    <td>{{ $cooperative_training_with_industry_partner->mse_joint_plan ? 'Yes':'No' }}</td>
                                                                    <td>{{ $cooperative_training_with_industry_partner->mse_training ? 'Yes':'No' }}</td>
                                                                    <td>{{ $cooperative_training_with_industry_partner->mse_trainers ? 'Yes':'No' }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">Medium and Large Enterprises</div>
                                                        <table class="table table-responsive">
                                                            <thead>
                                                            <tr>
                                                                <td>Company Name</td>
                                                                <td>Has Signed Mem. of Understanding</td>
                                                                <td>Has Formed a Joint Plan</td>
                                                                <td>Has Provided Training</td>
                                                                <td>Has Provided In-Company Trainers</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>{{ $cooperative_training_with_industry_partner->ml_list }}</td>
                                                                <td>{{ $cooperative_training_with_industry_partner->ml_mou ? 'Yes':'No' }}</td>
                                                                <td>{{ $cooperative_training_with_industry_partner->ml_joint_plan ? 'Yes':'No' }}</td>
                                                                <td>{{ $cooperative_training_with_industry_partner->ml_training ? 'Yes':'No' }}</td>
                                                                <td>{{ $cooperative_training_with_industry_partner->ml_trainers ? 'Yes':'No' }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
                

            </div>
            <?php $active = ""; ?>
        @endforeach
    </div>

@endsection