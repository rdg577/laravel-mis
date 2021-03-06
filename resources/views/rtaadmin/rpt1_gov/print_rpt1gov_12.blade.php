@extends('printing')

@section('content')
    @foreach($sectors as $sector)
        <h1>Report 1 - Government : Cooperative Training [With Industry Partners]</h1>
        <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

        <div class="well well-sm">{{ $sector->name }}</div>
        @foreach($occupations as $occupation)
            @if($occupation->subsector->sector->id == $sector->id)
                <div class="panel panel-default occupation">
                    <div class="panel-heading">Occupation: {{ $occupation->name }} [ Sub-sector: {{ $occupation->subsector->name }} ]</div>
                    <div class="panel-body">
                        <?php
                        $cooperative_training_with_industry_partners = $rpt1gov->getCooperativeTrainingWithIndustryPartnersByOccupation($occupation->id);
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

    @endforeach

@endsection